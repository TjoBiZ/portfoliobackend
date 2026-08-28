<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $document['title'] }} | Solar Neutrino</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5" />
    <meta name="description" content="{{ $document['description'] }}" />
    <meta name="author" content="Roman Primerov" />
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large" />
    <link rel="canonical" href="{{ $page['canonical'] }}" />
    <link rel="alternate" type="text/markdown" href="{{ $page['markdown_url'] }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $document['title'] }}" />
    <meta property="og:description" content="{{ $document['description'] }}" />
    <meta property="og:url" content="{{ $page['canonical'] }}" />
    <meta name="twitter:card" content="summary" />
    <style>
      @verbatim
      :root {
        --sn-orange: #ff724c;
        --sn-dark: #222;
        --sn-muted: #666;
        --sn-border: #e6e6e6;
      }
      body {
        margin: 0;
        background: #f7f7f7;
        color: var(--sn-dark);
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Arial, sans-serif;
        line-height: 1.65;
      }
      .knowledge-shell {
        max-width: 1120px;
        margin: 0 auto;
        padding: 36px 18px 64px;
      }
      .knowledge-card {
        background: #fff;
        border: 1px solid var(--sn-border);
        border-radius: 18px;
        box-shadow: 0 18px 60px rgba(0, 0, 0, .08);
        overflow: hidden;
      }
      .knowledge-nav,
      .knowledge-content {
        padding: 26px 34px;
      }
      .knowledge-nav {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        border-bottom: 1px solid var(--sn-border);
      }
      a {
        color: var(--sn-orange);
        font-weight: 700;
      }
      h1, h2, h3 {
        line-height: 1.18;
      }
      h1 {
        font-size: clamp(34px, 5vw, 56px);
      }
      h2 {
        border-top: 1px solid var(--sn-border);
        margin-top: 34px;
        padding-top: 28px;
      }
      code {
        background: #fff0ea;
        border-radius: 5px;
        padding: 2px 5px;
      }
      pre {
        overflow-x: auto;
        background: #171717;
        color: #fff;
        border-radius: 12px;
        padding: 18px;
      }
      pre code {
        background: transparent;
        color: inherit;
        padding: 0;
      }
      .knowledge-table-wrap {
        overflow-x: auto;
      }
      table {
        border-collapse: collapse;
        width: 100%;
        margin: 18px 0;
        font-size: 14px;
      }
      th, td {
        border: 1px solid var(--sn-border);
        padding: 10px 12px;
        vertical-align: top;
      }
      th {
        background: #fff6f2;
      }
      blockquote {
        border-left: 5px solid var(--sn-orange);
        margin: 18px 0;
        padding: 10px 18px;
        background: #fffaf7;
        color: #444;
      }
      @media (max-width: 720px) {
        .knowledge-nav,
        .knowledge-content {
          padding-left: 20px;
          padding-right: 20px;
        }
      }
      @endverbatim
    </style>
    @php
      $schema = [
          '@context' => 'https://schema.org',
          '@type' => 'TechArticle',
          'headline' => $document['title'],
          'description' => $document['description'],
          'url' => $page['canonical'],
          'dateModified' => $page['updated'],
          'author' => [
              '@type' => 'Person',
              'name' => 'Roman Primerov',
              'url' => 'https://solarneutrino.com/',
          ],
          'isPartOf' => [
              '@type' => 'WebSite',
              'name' => 'Solar Neutrino',
              'url' => 'https://solarneutrino.com/',
          ],
      ];
    @endphp
    <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>
  </head>
  <body>
    <main class="knowledge-shell">
      <article class="knowledge-card">
        <nav class="knowledge-nav" aria-label="Knowledge document navigation">
          <a href="/october-laravel-products">Product systems landing</a>
          <a href="/benchmarks/posmall-postgresql-vs-aimeos-postgresql">POSMall Core vs Aimeos PostgreSQL benchmark</a>
          <a href="{{ $page['markdown_url'] }}">Markdown source</a>
          <a href="/llms.txt">llms.txt</a>
        </nav>
        <section class="knowledge-content">
          {!! $document['html'] !!}
        </section>
      </article>
    </main>
  </body>
</html>
