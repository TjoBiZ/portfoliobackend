<?php

declare(strict_types=1);

namespace App\Support;

final class PublicMarkdownRenderer
{
    /**
     * Render a constrained public Markdown document into crawlable HTML.
     *
     * The renderer intentionally supports the subset used by the public
     * POSMall knowledge documents: front matter, headings, paragraphs, lists,
     * fenced code, block quotes, inline code, links, emphasis, and pipe tables.
     */
    public function render(string $path): array
    {
        $markdown = file_get_contents($path);

        if ($markdown === false) {
            throw new \RuntimeException('Unable to read public Markdown document.');
        }

        [$frontMatter, $body] = $this->splitFrontMatter($markdown);

        return [
            'front_matter' => $frontMatter,
            'html' => $this->toHtml($body),
            'title' => $frontMatter['title'] ?? $this->extractTitle($body),
            'description' => $frontMatter['description'] ?? '',
        ];
    }

    private function splitFrontMatter(string $markdown): array
    {
        if (!str_starts_with($markdown, "---\n")) {
            return [[], $markdown];
        }

        $end = strpos($markdown, "\n---\n", 4);

        if ($end === false) {
            return [[], $markdown];
        }

        $rawFrontMatter = substr($markdown, 4, $end - 4);
        $body = substr($markdown, $end + 5);
        $frontMatter = [];

        foreach (explode("\n", $rawFrontMatter) as $line) {
            if (!str_contains($line, ':')) {
                continue;
            }

            [$key, $value] = explode(':', $line, 2);
            $frontMatter[trim($key)] = trim(trim($value), '"');
        }

        return [$frontMatter, $body];
    }

    private function extractTitle(string $body): string
    {
        foreach (explode("\n", $body) as $line) {
            if (str_starts_with($line, '# ')) {
                return trim(substr($line, 2));
            }
        }

        return 'Solar Neutrino Knowledge Document';
    }

    private function toHtml(string $markdown): string
    {
        $lines = preg_split('/\R/', $markdown) ?: [];
        $html = [];
        $paragraph = [];
        $inCode = false;
        $code = [];
        $inList = false;

        $flushParagraph = function () use (&$html, &$paragraph): void {
            if ($paragraph === []) {
                return;
            }

            $text = trim(implode(' ', $paragraph));
            $html[] = '<p>' . $this->inline($text) . '</p>';
            $paragraph = [];
        };

        $closeList = function () use (&$html, &$inList): void {
            if ($inList) {
                $html[] = '</ul>';
                $inList = false;
            }
        };

        for ($i = 0; $i < count($lines); $i++) {
            $line = rtrim($lines[$i]);

            if (str_starts_with($line, '```')) {
                if ($inCode) {
                    $html[] = '<pre><code>' . e(implode("\n", $code)) . '</code></pre>';
                    $code = [];
                    $inCode = false;
                } else {
                    $flushParagraph();
                    $closeList();
                    $inCode = true;
                }
                continue;
            }

            if ($inCode) {
                $code[] = $line;
                continue;
            }

            if ($line === '') {
                $flushParagraph();
                $closeList();
                continue;
            }

            if ($this->startsTable($lines, $i)) {
                $flushParagraph();
                $closeList();
                [$tableHtml, $nextIndex] = $this->renderTable($lines, $i);
                $html[] = $tableHtml;
                $i = $nextIndex;
                continue;
            }

            if (preg_match('/^(#{1,6})\s+(.+)$/', $line, $matches)) {
                $flushParagraph();
                $closeList();
                $level = strlen($matches[1]);
                $text = trim($matches[2]);
                $id = $this->slug($text);
                $html[] = sprintf('<h%d id="%s">%s</h%d>', $level, e($id), $this->inline($text), $level);
                continue;
            }

            if (preg_match('/^\s*[-*]\s+(.+)$/', $line, $matches)) {
                $flushParagraph();
                if (!$inList) {
                    $html[] = '<ul>';
                    $inList = true;
                }
                $html[] = '<li>' . $this->inline(trim($matches[1])) . '</li>';
                continue;
            }

            if (str_starts_with($line, '>')) {
                $flushParagraph();
                $closeList();
                $html[] = '<blockquote>' . $this->inline(trim(ltrim($line, '> '))) . '</blockquote>';
                continue;
            }

            $paragraph[] = $line;
        }

        $flushParagraph();
        $closeList();

        return implode("\n", $html);
    }

    private function startsTable(array $lines, int $index): bool
    {
        $line = trim((string)($lines[$index] ?? ''));
        $next = trim((string)($lines[$index + 1] ?? ''));

        return str_starts_with($line, '|')
            && str_ends_with($line, '|')
            && preg_match('/^\|?[\s:\-|\t]+\|?$/', $next) === 1;
    }

    private function renderTable(array $lines, int $index): array
    {
        $header = $this->tableCells((string)$lines[$index]);
        $rows = [];
        $i = $index + 2;

        while (isset($lines[$i])) {
            $line = trim((string)$lines[$i]);

            if ($line === '' || !str_starts_with($line, '|') || !str_ends_with($line, '|')) {
                break;
            }

            $rows[] = $this->tableCells($line);
            $i++;
        }

        $html = ['<div class="knowledge-table-wrap"><table>'];
        $html[] = '<thead><tr>';
        foreach ($header as $cell) {
            $html[] = '<th>' . $this->inline($cell) . '</th>';
        }
        $html[] = '</tr></thead><tbody>';

        foreach ($rows as $row) {
            $html[] = '<tr>';
            foreach ($row as $cell) {
                $html[] = '<td>' . $this->inline($cell) . '</td>';
            }
            $html[] = '</tr>';
        }

        $html[] = '</tbody></table></div>';

        return [implode("\n", $html), $i - 1];
    }

    private function tableCells(string $line): array
    {
        $line = trim($line);
        $line = trim($line, '|');

        return array_map('trim', explode('|', $line));
    }

    private function inline(string $text): string
    {
        $escaped = e($text);

        $escaped = preg_replace('/`([^`]+)`/', '<code>$1</code>', $escaped) ?? $escaped;
        $escaped = preg_replace('/\*\*([^*]+)\*\*/', '<strong>$1</strong>', $escaped) ?? $escaped;
        $escaped = preg_replace_callback(
            '/\[([^\]]+)\]\(([^)]+)\)/',
            fn (array $matches): string => sprintf(
                '<a href="%s">%s</a>',
                e($matches[2]),
                e($matches[1])
            ),
            $escaped
        ) ?? $escaped;

        return $escaped;
    }

    private function slug(string $text): string
    {
        $slug = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $text) ?? ''));
        $slug = trim($slug, '-');

        return $slug !== '' ? $slug : 'section';
    }
}
