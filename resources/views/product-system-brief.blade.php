<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $page['title'] }} | Roman Primerov</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5" />
    <meta name="description" content="{{ $page['summary'] }}" />
    <meta name="author" content="Roman Primerov" />
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large" />
    <link rel="canonical" href="{{ $page['canonical'] }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $page['title'] }}" />
    <meta property="og:description" content="{{ $page['summary'] }}" />
    <meta property="og:url" content="{{ $page['canonical'] }}" />
    <meta property="og:image" content="https://solarneutrino.com{{ $page['image'] }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="/css/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="/css/pe-icon-7-stroke.css" type="text/css">
    <link rel="stylesheet" href="/css/main.css" type="text/css">
    <style>
      @verbatim
      :root {
        --sn-orange: #ff724c;
        --sn-dark: #222;
        --sn-muted: #666;
        --sn-border: #e6e6e6;
      }

      body.knowledge-brief {
        background: #f0f0f0 url('/images/Background_FullStack_Web_Developer_Laravel_PHP_JavaScript_AWS_MySQL_Roman_Primerov.svg') center center / cover fixed no-repeat;
        color: var(--sn-dark);
      }

      .brief-page {
        min-height: 100vh;
        padding: 42px 18px;
      }

      .brief-shell {
        max-width: 960px;
        margin: 0 auto;
        background: rgba(255, 255, 255, .98);
        border-radius: 18px;
        box-shadow: 0 18px 60px rgba(0, 0, 0, .16);
        overflow: hidden;
      }

      .brief-topbar,
      .brief-hero,
      .brief-section,
      .brief-cta {
        padding: 28px 34px;
      }

      .brief-topbar {
        border-bottom: 1px solid var(--sn-border);
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 12px;
      }

      .brief-topbar a,
      .brief-links a {
        color: var(--sn-orange);
        font-weight: 800;
      }

      .brief-hero {
        background: linear-gradient(135deg, #fff 0%, #fff6f2 100%);
      }

      .eyebrow {
        color: var(--sn-orange);
        text-transform: uppercase;
        letter-spacing: .14em;
        font-size: 12px;
        font-weight: 800;
        margin-bottom: 12px;
      }

      h1 {
        font-family: Oxygen, Helvetica, sans-serif;
        font-size: clamp(32px, 5vw, 52px);
        line-height: 1.08;
        margin: 0 0 16px;
      }

      .brief-summary {
        font-size: 19px;
        line-height: 1.7;
        color: #444;
        max-width: 850px;
      }

      .status-pill {
        display: inline-block;
        border-radius: 999px;
        padding: 8px 12px;
        background: #fff0ea;
        color: #c75231;
        font-weight: 800;
        margin-top: 14px;
      }

      .brief-section {
        border-top: 1px solid var(--sn-border);
      }

      .brief-section h2 {
        margin-top: 0;
      }

      .brief-section p,
      .brief-section li {
        line-height: 1.7;
      }

      .brief-section li + li {
        margin-top: 7px;
      }

      .brief-image {
        border-top: 1px solid var(--sn-border);
        background: #fafafa;
        padding: 22px 34px;
      }

      .brief-image img {
        width: 100%;
        height: auto;
        border-radius: 14px;
        border: 1px solid var(--sn-border);
      }

      .brief-links {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
      }

      .brief-links a {
        border: 2px solid var(--sn-orange);
        border-radius: 999px;
        padding: 10px 14px;
      }

      .brief-note {
        background: #fff7f3;
        border-left: 4px solid var(--sn-orange);
        padding: 16px;
        border-radius: 10px;
      }

      .brief-table-wrap {
        overflow-x: auto;
        margin-top: 18px;
      }

      .brief-comparison-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
      }

      .brief-comparison-table caption {
        caption-side: top;
        color: #555;
        font-weight: 800;
        padding: 0 0 10px;
        text-align: left;
      }

      .brief-comparison-table th,
      .brief-comparison-table td {
        border: 1px solid var(--sn-border);
        padding: 11px 12px;
        text-align: left;
        vertical-align: top;
      }

      .brief-comparison-table th {
        background: #fff6f2;
      }

      .brief-steps {
        counter-reset: benchmark-step;
        list-style: none;
        margin: 18px 0 0;
        padding: 0;
      }

      .brief-steps li {
        counter-increment: benchmark-step;
        border: 1px solid var(--sn-border);
        border-radius: 12px;
        margin: 0 0 10px;
        padding: 14px 16px 14px 52px;
        position: relative;
      }

      .brief-steps li::before {
        content: counter(benchmark-step);
        position: absolute;
        left: 16px;
        top: 14px;
        display: inline-grid;
        place-items: center;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: var(--sn-orange);
        color: #fff;
        font-weight: 900;
      }

      .brief-cta {
        background: #222;
        color: #fff;
      }

      .brief-cta a {
        color: #fff;
        text-decoration: underline;
      }

      @media (max-width: 720px) {
        .brief-topbar,
        .brief-hero,
        .brief-section,
        .brief-cta,
        .brief-image {
          padding-left: 22px;
          padding-right: 22px;
        }
      }
      @endverbatim
    </style>
    @php
      $schema = [
          '@context' => 'https://schema.org',
          '@type' => 'Article',
          'headline' => $page['title'],
          'description' => $page['summary'],
          'url' => $page['canonical'],
          'dateModified' => $page['updated'],
          'author' => [
              '@type' => 'Person',
              'name' => 'Roman Primerov',
              'url' => 'https://solarneutrino.com/',
          ],
          'image' => 'https://solarneutrino.com' . $page['image'],
          'isPartOf' => [
              '@type' => 'CollectionPage',
              'name' => 'October CMS and Laravel Product Systems by Roman Primerov',
              'url' => 'https://solarneutrino.com/october-laravel-products',
          ],
      ];
    @endphp
    <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>
  </head>
  <body class="knowledge-brief">
    <main class="brief-page" itemscope itemtype="https://schema.org/Article">
      <article class="brief-shell">
        <nav class="brief-topbar" aria-label="Product knowledge navigation">
          <a href="/october-laravel-products">← Product systems landing</a>
          <a href="/">Roman Primerov Portfolio</a>
        </nav>

        <header class="brief-hero">
          <p class="eyebrow">{{ $page['eyebrow'] }}</p>
          <h1 itemprop="headline">{{ $page['title'] }}</h1>
          <p class="brief-summary" itemprop="description">{{ $page['summary'] }}</p>
          <p class="status-pill">{{ $page['status'] }} · Updated {{ $page['updated'] }}</p>
        </header>

        <div class="brief-image">
          <img src="{{ $page['image'] }}" alt="{{ $page['title'] }} visual evidence screenshot" loading="eager">
        </div>

        @foreach ($page['sections'] as $section)
          <section class="brief-section">
            <h2>{{ $section['title'] }}</h2>
            <p>{{ $section['body'] }}</p>
            @if (!empty($section['points']))
              <ul>
                @foreach ($section['points'] as $point)
                  <li>{{ $point }}</li>
                @endforeach
              </ul>
            @endif
          </section>
        @endforeach

        @if (!empty($page['benchmark_table']))
          <section class="brief-section">
            <h2>{{ $page['benchmark_table']['title'] ?? 'Benchmark table' }}</h2>
            @if (!empty($page['benchmark_table']['intro']))
              <p>{{ $page['benchmark_table']['intro'] }}</p>
            @endif
            <div class="brief-table-wrap">
              <table class="brief-comparison-table">
                @if (!empty($page['benchmark_table']['caption']))
                  <caption>{{ $page['benchmark_table']['caption'] }}</caption>
                @endif
                <thead>
                  <tr>
                    @foreach ($page['benchmark_table']['columns'] as $column)
                      <th>{{ $column }}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach ($page['benchmark_table']['rows'] as $row)
                    <tr>
                      @foreach ($row as $cell)
                        <td>{{ $cell }}</td>
                      @endforeach
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </section>
        @endif

        @if (!empty($page['instructions']))
          <section class="brief-section">
            <h2>{{ $page['instructions']['title'] ?? 'How to reproduce' }}</h2>
            @if (!empty($page['instructions']['intro']))
              <p>{{ $page['instructions']['intro'] }}</p>
            @endif
            <ol class="brief-steps">
              @foreach ($page['instructions']['steps'] as $step)
                <li>{{ $step }}</li>
              @endforeach
            </ol>
          </section>
        @endif

        @if (!empty($page['limitations']))
          <section class="brief-section">
            <h2>Claims, limits, and safe interpretation</h2>
            <div class="brief-note">
              <ul>
                @foreach ($page['limitations'] as $limit)
                  <li>{{ $limit }}</li>
                @endforeach
              </ul>
            </div>
          </section>
        @endif

        @if (!empty($page['related']))
          <section class="brief-section">
            <h2>Related citation pages</h2>
            <div class="brief-links">
              @foreach ($page['related'] as $link)
                <a href="{{ $link['url'] }}" @if (str_starts_with($link['url'], 'http')) target="_blank" rel="noopener" @endif>{{ $link['label'] }}</a>
              @endforeach
            </div>
          </section>
        @endif

        <section class="brief-cta">
          <h2>Need the private walkthrough?</h2>
          <p>
            Public facts are summarized here for search, AI assistants, recruiters, and buyers.
            For private screenshots, source review, migration planning, or a technical demo, contact
            <a href="mailto:j@solarneutrino.com?subject={{ rawurlencode($page['title']) }}">j@solarneutrino.com</a>.
          </p>
        </section>
      </article>
    </main>
  </body>
</html>
