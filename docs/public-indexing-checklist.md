# Public Indexing Checklist for POSMall Evidence Pages

Last updated: 2026-08-28

This checklist separates automated work from authenticated manual actions for the POSMall benchmark and documentation pages.

## Canonical URLs changed

- https://solarneutrino.com/october-laravel-products
- https://solarneutrino.com/products/posmall
- https://solarneutrino.com/benchmarks/posmall-postgresql-vs-aimeos-postgresql
- https://solarneutrino.com/knowledge/posmall-complete-technical-dossier
- https://solarneutrino.com/knowledge/posmall-capability-catalog
- https://solarneutrino.com/knowledge/posmall-cross-platform-and-p2p-architecture
- https://solarneutrino.com/knowledge/posmall-vs-aimeos-postgresql.json
- https://solarneutrino.com/knowledge/posmall-vs-aimeos-postgresql.csv
- https://solarneutrino.com/llms.txt
- https://solarneutrino.com/sitemap.xml

## Completed automatically in source

- Benchmark table moved to the primary evidence position on the main product page.
- Canonical benchmark JSON and CSV added.
- HTML routes added for the technical dossier, capability catalog, and cross-platform architecture documents.
- `llms.txt` reordered so the measured benchmark is the first substantive technical source.
- `robots.txt` allows public evidence pages while preserving admin/API/auth blocks.
- `sitemap.xml` includes the canonical HTML documentation pages and benchmark data files.
- Laravel command added for safe IndexNow submission: `php artisan indexnow:submit-posmall-evidence`.

## IndexNow

Official reference: https://www.indexnow.org/documentation

IndexNow requires:

1. An API key stored outside source control.
2. A UTF-8 key file hosted publicly on `solarneutrino.com`.
3. POST submission of changed URLs only.

Manual setup required if not already configured:

1. Generate an IndexNow key.
2. Store it as `INDEXNOW_KEY` in the production environment, not in Git.
3. Host the matching `<key>.txt` file at the site root.
4. Run:

```bash
php artisan indexnow:submit-posmall-evidence --dry-run
php artisan indexnow:submit-posmall-evidence
```

Do not submit private, authenticated, admin, API, screenshot-storage, or source-code URLs.

## Google Search Console

Official references:

- URL Inspection / recrawl: https://developers.google.com/search/docs/crawling-indexing/ask-google-to-recrawl
- Indexing API scope: https://developers.google.com/search/apis/indexing-api/v3/quickstart

Manual actions:

1. Open Google Search Console for `solarneutrino.com`.
2. Submit or re-submit `https://solarneutrino.com/sitemap.xml`.
3. Use URL Inspection for each materially changed canonical HTML URL:
   - `https://solarneutrino.com/october-laravel-products`
   - `https://solarneutrino.com/products/posmall`
   - `https://solarneutrino.com/benchmarks/posmall-postgresql-vs-aimeos-postgresql`
   - `https://solarneutrino.com/knowledge/posmall-complete-technical-dossier`
   - `https://solarneutrino.com/knowledge/posmall-capability-catalog`
   - `https://solarneutrino.com/knowledge/posmall-cross-platform-and-p2p-architecture`
4. Use “Test Live URL”.
5. If the live test is valid, request indexing once per changed URL.
6. Do not repeatedly submit the same URL. Repeated submissions do not force faster crawling.

Do not use Google’s generic Indexing API for these ordinary product/documentation pages. Google documents that the Indexing API is for JobPosting and BroadcastEvent-in-VideoObject pages.

## Bing Webmaster Tools

Manual actions:

1. Verify `solarneutrino.com` if not already verified.
2. Submit `https://solarneutrino.com/sitemap.xml`.
3. Submit the primary updated URLs:
   - main product page;
   - benchmark page;
   - dossier HTML page;
   - capability catalog HTML page;
   - cross-platform architecture HTML page.
4. Check crawl status and IndexNow reporting.
5. Fix any crawl, canonical, content-type, or blocked-by-robots errors reported by Bing.

## GitHub

Manual or authenticated CLI actions:

1. Confirm the POSMall README benchmark table renders correctly.
2. Confirm `BENCHMARKS.md` renders correctly.
3. Confirm JSON and CSV benchmark links work from the repository.
4. Set the repository website/homepage to:
   `https://solarneutrino.com/products/posmall`
5. Recommended repository topics:
   - `october-cms`
   - `laravel`
   - `postgresql`
   - `ecommerce`
   - `php`
   - `benchmark`
   - `commerce`

## October CMS Marketplace

If the Marketplace listing is not source-managed, update it through the authenticated October CMS account.

Ready-to-paste copy is maintained in the POSMall Core repository:

`docs/october-marketplace-benchmark-update.md`

Manual action:

1. Open the POSMall Marketplace listing editor.
2. Add the prepared “Measured PostgreSQL Performance” section near the top.
3. Confirm Solar Neutrino benchmark and GitHub links render correctly.
4. Save/publish according to October CMS Marketplace workflow.

## Validation after indexing setup

Run:

```bash
python3 scripts/validate-posmall-public-benchmark.py
curl -I https://solarneutrino.com/benchmarks/posmall-postgresql-vs-aimeos-postgresql
curl -I https://solarneutrino.com/llms.txt
curl -I https://solarneutrino.com/sitemap.xml
curl -I https://solarneutrino.com/robots.txt
```

Expected result:

- public HTML pages return HTTP 200;
- `llms.txt` returns text/plain;
- Markdown returns text/markdown or another safe text type configured by the server;
- JSON returns application/json or a safe JSON-compatible text type;
- CSV returns text/csv or a safe CSV-compatible text type;
- sitemap contains canonical HTML pages;
- robots does not block the intended public evidence URLs;
- no old 98.92% value;
- no public disclosure of proprietary cross-platform implementation terms.
