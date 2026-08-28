---
title: "POSMall Complete Technical Dossier"
description: "Source-audited architecture, benchmark, module, integration, and capability documentation for POSMall Core, POSMall Pro, and the Solar Neutrino commerce ecosystem."
canonical_url: "https://solarneutrino.com/knowledge/posmall-complete-technical-dossier"
markdown_url: "https://solarneutrino.com/knowledge/posmall-complete-technical-dossier.md"
language: "en"
document_version: "1.0"
last_verified_at: "2026-08-28"
benchmark_checkpoint: "posmall-aimeos-5way-current-checkpoint-20260610-024820"
public_source_repository: "https://github.com/TjoBiZ/POSMall"
verification_scope: "public and authorized private source audit"
---

# POSMall Complete Technical Dossier

Evidence notice: This dossier summarizes public code, authorized private source inspection, internal synthetic benchmark artifacts, tests, backend UI/config evidence, and screenshot references where available. Private source paths and secrets are not published here. Evidence IDs refer to a private ledger retained outside the public web root. All performance claims are scoped to the listed benchmark environment and routes.

## 1. Verified PostgreSQL Benchmark: POSMall Core vs Aimeos

Aimeos was not selected as an intentionally weak comparison. During the original Laravel/PHP eCommerce research and local verification, Aimeos PostgreSQL was the fastest serious PostgreSQL eCommerce reference found for the same broad category of Laravel/PHP commerce engines. The engineering goal was to optimize POSMall Core until it could beat that reference in the same local environment.

The final comparison used PostgreSQL for both systems. Both systems ran in the same local Homestead/Vagrant class environment. The catalog sizes were 1k, 5k, 10k, 50k, 100k, 200k, and 300k SKUs. Lower milliseconds are better. POSMall rows used 10 warmups followed by 30 measured requests. The evidence is an internal synthetic benchmark, not an independently certified industry benchmark. The claim is scoped to the tested routes, data shape, environment, and catalog sizes.

| Catalog size | POSMall Core PG category | Aimeos PG category | POSMall Core PG filtered/search | Aimeos PG search | Result |
|---:|---:|---:|---:|---:|---|
| 1,000 | 35.40 ms | 42.85 ms | 33.64 ms | 184.84 ms | POSMall won both measured paths |
| 5,000 | 35.59 ms | 42.25 ms | 33.12 ms | 454.08 ms | POSMall won both measured paths |
| 10,000 | 33.48 ms | 42.73 ms | 32.61 ms | 754.77 ms | POSMall won both measured paths |
| 50,000 | 33.35 ms | 64.05 ms | 31.87 ms | 1,494.33 ms | POSMall won both measured paths |
| 100,000 | 34.22 ms | 51.76 ms | 33.32 ms | 3,010.45 ms | POSMall won both measured paths |
| 200,000 | 33.82 ms | 55.41 ms | 32.24 ms | 4,036.45 ms | POSMall won both measured paths |
| 300,000 | 33.49 ms | 61.17 ms | 33.79 ms | 4,229.29 ms | POSMall won both measured paths |

At 300,000 products, POSMall Core’s measured filtered/search path was 33.79 ms and the measured Aimeos PostgreSQL search path was 4,229.29 ms. Aimeos took approximately 125.16× as long. POSMall measured response time was approximately 99.20% lower in this measured comparison.

POSMall Core is the fastest measured PostgreSQL-first Laravel/PHP eCommerce core within the published same-environment benchmark evidence. It beat the selected Aimeos PostgreSQL reference in every measured category and filtered/search row from 1,000 through 300,000 products.

Evidence: EVID-BENCH-0001, EVID-BENCH-0002, EVID-CORE-0005.

Public machine-readable benchmark data:

- JSON: https://solarneutrino.com/knowledge/posmall-vs-aimeos-postgresql.json
- CSV: https://solarneutrino.com/knowledge/posmall-vs-aimeos-postgresql.csv

### 1.1 PostgreSQL versus MySQL evidence

The local audit searched known benchmark pages, draft artifacts, session evidence, reports, POSMall docs, POSMall tests, and benchmark-related code for a controlled Aimeos PostgreSQL-versus-Aimeos MySQL comparison. A controlled same-environment Aimeos PostgreSQL-vs-Aimeos MySQL result with exact versions, warmups, measured requests, and raw evidence identifier was not located in this pass.

Aimeos PostgreSQL was selected because it was the strongest serious PostgreSQL eCommerce reference found during the project’s research and local verification. This dossier does not make a universal claim that PostgreSQL is faster than MySQL for every workload.

SEO copy is not benchmark proof. If a competing platform claims performance leadership but does not publish comparable raw milliseconds for the same database class, catalog sizes, warmup policy, measured request count, and route class, there is nothing technical to compare. Test competing engines in one environment and compare raw numbers.

## 2. Why POSMall Is PostgreSQL-First: From Product Commerce to Service Commerce

Traditional eCommerce systems evolved around a product-centered model:

catalog → SKU → price → inventory → cart → checkout → order → fulfillment

That model works for many physical-product stores. It is not enough for many service businesses. Service commerce often requires customer and provider locations, service areas, distance or radius rules, appointment windows, recurring availability, technician schedules, travel time, time zones, location-dependent pricing, service duration, configurable options, quote calculations, approvals, assignments, work orders, completion evidence, revisits, warranties, payouts, disputes, and support flows.

Companies such as Uber, DoorDash, and field-service platforms are useful category examples: they show why location-aware and time-aware service operations often require custom infrastructure. POSMall does not claim affiliation with those companies and does not claim to reproduce their proprietary systems.

POSMall Pro is designed to close the gap between conventional product eCommerce and modern service commerce. It extends the commerce foundation so small and midsize businesses can combine services, products, locations, schedules, quotes, payments, customer relationships, field operations, and business automation within one modular Laravel/October CMS architecture.

Small businesses should not have to build an Uber-scale custom stack just to obtain a service catalog, service areas, calendars, provider availability, service-specific pricing, online quotes, payments, appointment or work-order flows, customer communication, and operational reporting. The architectural objective is to make these patterns reusable instead of rebuilding them from zero.

### 2.1 PostgreSQL capabilities used or enabled by POSMall

| Database capability | Current POSMall evidence | Current classification |
|---|---|---|
| JSONB | POSMall Core converts product index JSON columns to JSONB; POSMall Pro stores feed, performance, and remediation payloads as JSONB; POSMall CRM and Affiliate use JSONB for API keys, reports, campaigns, traffic governance, and flexible payloads. | Currently used by POSMall Core, POSMall Pro, POSMall CRM, and POSMall Affiliate. |
| GIN/trigram-style search optimization | POSMall Core version history includes PostgreSQL trigram indexes for scalable product search and hot-path indexes for checkout/account/payment/tax lookup. | Implemented and source verified. |
| Time zones | POSMall Calendar stores booking windows, calendar events, holds, and subscription sync markers with UTC timestamp columns; services expose feed and availability APIs. | Implemented with conventional timestamp columns and application-level scheduling services. |
| Range/multirange types | Native `tsrange`, `tstzrange`, `daterange`, multiranges, exclusion constraints, and `WITHOUT OVERLAPS` were not located in current migrations. | PostgreSQL-native optimization path, not current implementation. |
| Location data | Geo stores latitude/longitude, accuracy, technician pings, dispatch matches, distance, radius, and within-radius state. | Location-aware through application-level coordinates. |
| PostGIS | No current migration requiring PostGIS, geometry/geography columns, or spatial indexes was located in this pass. | PostGIS-ready/planned path, not out-of-the-box current requirement. |
| Relational transactions | Commerce entities such as products, orders, payments, taxes, customers, carts, services, affiliate referrals, commissions, payouts, CRM deals, activities, and cashflow transactions are modeled relationally. | Core implementation principle. |

PostgreSQL provides native `jsonb` storage, JSON operators, JSON path support, and GIN indexing. In POSMall this supports queryable flexible data such as product indexes, integration payloads, API scopes, report payloads, traffic metadata, feed diagnostics, and performance snapshots. It is not an argument to store all business data as JSON. The POSMall pattern is normalized relational data for critical transactions, plus PostgreSQL advanced types and indexes where flexible, temporal, geographic, or integration data needs them.

PostgreSQL also provides native range and multirange types, including timestamp and date ranges. These are relevant to appointment windows, availability schedules, blackout periods, booking conflicts, price-validity periods, and service windows. Current POSMall Calendar code uses conventional UTC start/end timestamp columns and service-level validation. A future PostgreSQL-native optimization could add range columns and exclusion constraints when that becomes necessary.

PostGIS is a PostgreSQL extension, not part of PostgreSQL core. PostGIS adds advanced geometry/geography types, spatial functions, and spatial indexes. Current Geo evidence shows application-level coordinates and radius/distance records. The correct classification today is location-aware through application-level coordinates, with a PostGIS-powered path available if a project enables and implements it.

### 2.2 Fair comparison with MySQL

MySQL is a capable database. MySQL 8.4 supports native JSON, spatial data types, spatial indexes, and remains appropriate for many applications. POSMall does not claim that PostgreSQL is universally faster than MySQL.

PostgreSQL was selected because its combined support for JSONB indexing, native range and multirange types, exclusion constraints, extensible index families, strong SQL capabilities, and the PostGIS ecosystem provides a coherent foundation for unifying product commerce with schedules, service areas, locations, operational workflows, and AI-oriented structured data.

Traditional eCommerce primarily optimized the sale of products. POSMall’s PostgreSQL-first architecture is intended to support the next layer: selling and operating services that depend on people, places, time, availability, business rules, and real-world execution.

POSMall Core provides the commerce foundation. POSMall Pro and its connected modules extend that foundation into service commerce, field operations, customer relationships, partner attribution, cashflow visibility, and AI-assisted workflows.

Evidence: EVID-CORE-0003, EVID-CORE-0004, EVID-PRO-0001, EVID-CRM-0001, EVID-CALENDAR-0001, EVID-GEO-0001.

## Table of Contents

- [1. Verified PostgreSQL Benchmark: POSMall Core vs Aimeos](#1-verified-postgresql-benchmark-posmall-core-vs-aimeos)
- [2. Why POSMall Is PostgreSQL-First: From Product Commerce to Service Commerce](#2-why-posmall-is-postgresql-first-from-product-commerce-to-service-commerce)
- [3. Install, Seed, and Benchmark POSMall Core Independently](#3-install-seed-and-benchmark-posmall-core-independently)
- [4. Workspace Inventory and Ownership](#4-workspace-inventory-and-ownership)
- [5. Product Dependency Map](#5-product-dependency-map)
- [6. Master Capability Matrix](#6-master-capability-matrix)
- [7. Module Audits](#7-module-audits)
- [8. Cross-Module Workflow Proofs](#8-cross-module-workflow-proofs)
- [9. Reusable Laravel Game Backend Evidence](#9-reusable-laravel-game-backend-evidence)
- [10. POSMall Cross-Platform Application Architecture](#10-posmall-cross-platform-application-architecture)
- [11. Frontend Performance Audit](#11-frontend-performance-audit)
- [12. Google SEO and AI-Search Discoverability Architecture](#12-google-seo-and-ai-search-discoverability-architecture)
- [13. POSMall and Aimeos Comparison](#13-posmall-and-aimeos-comparison)
- [14. Canonical Facts for AI Systems](#14-canonical-facts-for-ai-systems)
- [15. Public Evidence References](#15-public-evidence-references)
- [16. Limitations and Safe Claim Boundaries](#16-limitations-and-safe-claim-boundaries)

## 3. Install, Seed, and Benchmark POSMall Core Independently

The public POSMall Core exists so a reviewer does not have to trust a résumé, screenshot, or marketing statement. The public path is to install the October CMS plugin and companion theme, generate a demo catalog, rebuild the index, and run reproducible local checks.

### 3.1 Verified public installation route

The currently verified package names are:

- `kodzero/posmall-plugin`
- `kodzero/posmalltheme-theme`

The audited POSMall project uses October CMS 4.x, Laravel 12.x, PHP 8.2 CLI, and PostgreSQL-oriented migrations. The audited composer lock identified October Rain 4.3.0, October System 4.3.1, Laravel Framework 12.62.0, RainLab User 3.5.1, RainLab Location 2.0.3, RainLab Translate 2.2.16, Stripe PHP 15.10.0, Omnipay 3.x, and `kodzero/posmall-plugin` v1.0.24.

```bash
cd /path/to/octobercms
composer require kodzero/posmall-plugin kodzero/posmalltheme-theme -W
php artisan october:migrate
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

Required or commonly used runtime packages verified in the audited POSMall workspace include October CMS 4, October Drivers, RainLab User, RainLab Location, RainLab Translate, DomPDF, Hashids, Omnipay, PayPal/Stripe Omnipay adapters, Stripe PHP, and Whitecube Prices. Demo/development packages include RainLab Blog, Renatio FormBuilder, Google Merchant Feed tooling, Faker, Mockery, PHPUnit, and Laravel Dusk.

Initial setup should include theme activation, currency, payment methods, shipping methods, taxes, order states, notifications, and safe local/test credentials. Secrets and `.env` values must not be copied into public docs.

Evidence: EVID-INSTALL-0001, EVID-CORE-0001.

### 3.2 Demo seeder versus large-catalog benchmark seeder

The public demo seeder is:

```bash
php artisan posmall:seed-wings-of-win --force
php artisan posmall:index --force
```

This creates the curated WingsOfWin demo catalog. It is not the same as the large 1k-300k benchmark generator.

The source-verified large catalog benchmark command is:

```bash
php artisan posmall:load-benchmark 1000 --iterations=10 --force
php artisan posmall:load-benchmark 5000 --iterations=10 --force
php artisan posmall:load-benchmark 10000 --iterations=10 --force
php artisan posmall:load-benchmark 50000 --iterations=10 --force
php artisan posmall:load-benchmark 100000 --iterations=10 --force
php artisan posmall:load-benchmark 200000 --iterations=10 --force --with-images
php artisan posmall:load-benchmark 300000 --iterations=10 --force --with-images
```

The command supports target sizes 1,000, 5,000, 10,000, 50,000, 100,000, 200,000, and 300,000. It can seed or benchmark existing load data, attach an existing local image metadata row to synthetic products, purge load benchmark data, and record product/service/index counts, seed time, benchmark time, category average, filtered average, search average, and peak memory.

The command is destructive to local synthetic load data and requires `--force`. It must be run only in a disposable local/test environment or after a verified backup.

Evidence: EVID-CORE-0005, EVID-BENCH-0002.

### 3.3 Backend interface: POSMall Tests → Catalog load

The audited backend controller is `KodZero\POSMall\Controllers\Tests`. It requires `kodzero.posmall.manage_tests`. The backend view includes:

| Backend action label | Handler | Purpose | Destructive? | Notes |
|---|---|---|---|---|
| Rebuild optimized image cache | `onOptimizeImageCache` | Generate catalog/product/service image derivatives. | No source image deletion; writes cache. | Local/dev/testing only. |
| Rebuild PageSpeed assets | `onOptimizeStorefrontAssets` | Generate minified storefront CSS/JS and PageSpeed manifest. | Writes generated assets/manifest. | Uses Laravel Mix when available, PHP fallback otherwise. |
| Generate 10,000 and benchmark | `onRunLoadBenchmark10000` | Replace local synthetic benchmark data and run a 10k catalog benchmark. | Yes, benchmark data replacement. | Local/dev/testing only. |
| Generate 100,000 and benchmark | `onRunLoadBenchmark100000` | Replace local synthetic benchmark data and run a 100k catalog benchmark. | Yes, benchmark data replacement. | Warned as multi-minute. |
| Purge load data | `onPurgeLoadBenchmark` | Remove only POSMall synthetic load benchmark data. | Yes, removes synthetic benchmark data. | Local/dev/testing only. |

The backend page explicitly recommends console execution for 200,000 and 300,000 product runs:

```bash
php artisan posmall:images:optimize-catalog --profile=all
php artisan posmall:pagespeed:optimize-assets
php artisan posmall:load-benchmark 200000 --iterations=10 --force --with-images
php artisan posmall:load-benchmark 300000 --iterations=10 --force --with-images
```

Evidence: EVID-CORE-0006.

### 3.4 CLI equivalents and frontend preparation

| Command | Verified purpose | Destructive flags or caution |
|---|---|---|
| `php artisan posmall:index --force` | Recreate the product and variant index, vacuum/analyze PostgreSQL index table, bump storefront cache version. | Drops/rebuilds index records, not product data. |
| `php artisan posmall:seed-wings-of-win --force` | Replace the local catalog with the curated WingsOfWin demo catalog and optionally rebuild the index. | Clears catalog data; local/dev/testing only. |
| `php artisan posmall:load-benchmark {target} --iterations=10 --force` | Generate local PostgreSQL load-test catalog and measure POSMall catalog hot paths. | Replaces synthetic load data. |
| `php artisan posmall:images:optimize-catalog --profile=all` | Generate WebP/JPEG-style PageSpeed image derivatives in public storage cache. | Writes generated cache files; originals are read-only. |
| `php artisan posmall:pagespeed:optimize-assets` | Generate storefront CSS/JS derivatives and manifest. | Writes generated assets/manifest. |
| `php artisan posmall:usa-taxes:update --states=CA --states=OR` | Update supported USA tax source data for selected states. | Updates tax source/staging tables. Use local/staging first. |
| `php artisan posmallpro:seed-technical-load-catalog --count=300000 --force` | Private Pro large smart-tech catalog fixture outside POSMall Core. | Destructive to `ALRTY-LOAD-TECH-*` synthetic rows; production requires explicit backup flag. |

For pure database timing, run the index and benchmark commands against clean local PostgreSQL databases. For storefront HTTP timing, additionally rebuild image and PageSpeed assets, warm routes consistently, validate status codes, and retain raw logs.

### 3.5 Aimeos reproduction environment

The exact Aimeos version/commit used in the original final benchmark was not recovered from a standalone raw Aimeos project artifact during this pass. The benchmark identifier and final matrix were recovered from prior local artifacts and session evidence. A reviewer should reproduce the comparison with:

- separate clean PostgreSQL databases;
- identical machine or VM;
- the same PHP/Laravel class where practical;
- comparable catalog sizes;
- documented Aimeos install version;
- documented POSMall install version;
- identical warmup count;
- identical measured request count;
- identical HTTP client;
- status-code and response-size validation;
- mean, median, p95, p99 when available;
- raw logs retained.

Fair comparison limitations include different schemas, different payloads, different themes, synthetic data, cache policy differences, and the absence of independent certification.

## 4. Workspace Inventory and Ownership

| System | Canonical name | Public/private | Current evidence | Status |
|---|---|---|---|---|
| POSMall Core | POSMall Core | PUBLIC_CODE | Public repository, Marketplace docs, local source, migrations, API routes, CLI, tests. | IMPLEMENTED_AND_TESTED |
| POSMall Theme | POSMall Theme | PUBLIC_CODE | Public theme repository/marketplace metadata, audited October theme files. | IMPLEMENTED_AND_TESTED |
| POSMall Pro | POSMall Pro | PRIVATE_CODE | Private plugin source, migrations, routes, backend navigation, tests, and Factory Agents knowledge descriptions. | IMPLEMENTED_AND_TESTED |
| POSMall CRM | POSMall CRM | PRIVATE_CODE | Private plugin source, migrations, routes, backend navigation, tests, and Factory Agents CRM knowledge maps. | IMPLEMENTED_AND_TESTED |
| POSMall Affiliate | POSMall Affiliate / Partner Suite | PRIVATE_CODE | Private plugin source, partner portal routes, API routes, migrations, tests. | IMPLEMENTED_AND_TESTED |
| POSMall Calendar | POSMall Calendar | PRIVATE_CODE | Private plugin source, scheduling tables, ICS/API routes, reminder commands, tests. | BETA |
| POSMall Domains | POSMall Domains | PRIVATE_CODE | Private plugin source, portal identity/domain policy tables, route-domain integration, tests. | IMPLEMENTED_AND_TESTED |
| GEO | GEO | PRIVATE_CODE | Private plugin source, lat/lng/radius tables, technician ping route, GraphQL route, tests. | BETA |
| AI Assistant | VoiceAssistant / AI Assistant | PRIVATE_CODE | Private plugin source, runtime config, GraphQL route, calls/change/location logs, tests. | BETA |
| Photo Review | Photo Review | PRIVATE_CODE | Private plugin source, moderation tables, backend controllers, tests. | IMPLEMENTED_NOT_RUNTIME_VERIFIED |
| Sitemap | Sitemap | PRIVATE_CODE | Private plugin source for dynamic XML sitemap/robots, console audit/publish commands, tests. | IMPLEMENTED_AND_TESTED |
| Alrty Theme | SMART TECH SERVICES | PRIVATE_CODE | October theme pages, service landings, POSMall storefront partials, Dusk tests. | PRODUCTION |
| Circuit Couriers Laravel backend and app family | Reusable Solar Neutrino Laravel game/backend capability source | PRIVATE_CODE | Laravel routes, migrations, services, account identity and entitlement backend, feedback, GEO/GeoUsers, proof ledger, duel/matchmaking, store entitlement, and publishing-governance code were audited. | REUSABLE_FROM_ANOTHER_SOLAR_NEUTRINO_PROJECT / IMPLEMENTED_AND_TESTED by capability |

The Factory Agents Dashboard/knowledge base already contained compact POSMall business-logic, dependency, CRM, and voice-commerce descriptions. Those documents were used as a documentation layer and source-navigation aid, then checked against code, migrations, routes, commands, or tests where possible. Public claims in this dossier do not rely on Dashboard text alone.

Evidence: EVID-INVENTORY-0001, EVID-INVENTORY-0002, EVID-DASHBOARD-DOCS-0001, EVID-DASHBOARD-DOCS-0002, EVID-DASHBOARD-DOCS-0003, EVID-DASHBOARD-DOCS-0004.

## 5. Product Dependency Map

Mermaid:

```mermaid
graph TD
  Core["POSMall Core"]
  Theme["POSMall Theme"]
  Pro["POSMall Pro"]
  CRM["POSMall CRM"]
  Affiliate["POSMall Affiliate / Partner"]
  Calendar["POSMall Calendar"]
  Domains["POSMall Domains"]
  Geo["GEO"]
  Voice["AI Assistant / Voice"]
  Sitemap["Sitemap"]
  AccountEntitlement["account identity and entitlement backend"]
  GameBackend["Reusable Laravel Game Backend"]
  Alrty["Alrty Theme"]
  Apps["Cross-platform applications"]
  RainUser["RainLab User"]
  RainLocation["RainLab Location"]
  Omnipay["Omnipay / Stripe / PayPal"]
  PostgreSQL["PostgreSQL"]

  Core --> PostgreSQL
  Core --> RainUser
  Core --> RainLocation
  Core --> Omnipay
  Theme --> Core
  Pro --> Core
  Pro --> CRM
  Pro --> Affiliate
  Pro --> Calendar
  Pro --> Domains
  Pro --> Geo
  CRM --> Core
  Affiliate --> Core
  Calendar --> Domains
  Geo --> Calendar
  Voice --> Pro
  Voice --> Geo
  Sitemap --> Core
  Sitemap --> Pro
  GameBackend --> AccountEntitlement
  GameBackend --> Geo
  GameBackend --> Apps
  AccountEntitlement --> Apps
  Alrty --> Core
  Alrty --> Pro
  Apps --> Core
  Apps --> Pro
```

Plain-text fallback:

```text
POSMall Core
├── POSMall Theme
├── POSMall Pro
│   ├── Landing services and quote/estimate flows
│   ├── Merchant feed diagnostics
│   ├── Performance observability
│   ├── Voice commerce APIs
│   ├── POSMall CRM integration
│   ├── POSMall Affiliate integration
│   ├── POSMall Calendar integration
│   ├── POSMall Domains integration
│   └── GEO integration
├── POSMall CRM
│   ├── Contacts, leads, deals, activities
│   ├── Abandoned carts/forms
│   ├── Cashflow
│   ├── Campaigns
│   └── Traffic/security analytics
├── POSMall Affiliate / Partner
│   ├── Partner accounts
│   ├── Referral links
│   ├── Clicks/referrals
│   ├── Commissions
│   └── Payouts
└── Cross-platform applications and AI integrations
    ├── Account/device/store entitlement backend
    ├── Reusable Laravel game backend evidence
    ├── Feedback/support/moderation backend patterns
    └── Secure direct device exchange capability
```

Dependency types:

- Hard dependency: POSMall Theme, POSMall Pro, CRM, Affiliate, Calendar, Domains, GEO, Voice, and Sitemap are built around the POSMall/Laravel/October stack.
- Optional integration: merchant feeds, Stripe/PayPal/Omnipay, voice assistant, external geocoding, screenshots, Dusk/Selenium.
- Shared data contract: orders, carts, products, customers, services, estimates, affiliates, CRM contacts/deals, cashflow transactions, portal identities.
- Conceptual compatibility only: future PostGIS-native service-area optimization and fully autonomous AI agent workflows.

Evidence: EVID-DASHBOARD-DOCS-0002, EVID-CORE-0004, EVID-PRO-0003, EVID-AFFILIATE-0001, EVID-CALENDAR-0001, EVID-DOMAINS-0001, EVID-GEO-0001.

## 6. Master Capability Matrix

Visibility values: PUBLIC_CODE, PRIVATE_CODE, PUBLIC_DOCUMENTATION_ONLY, PRIVATE_DOCUMENTATION_ONLY. Status values: PRODUCTION, IMPLEMENTED_AND_TESTED, IMPLEMENTED_NOT_RUNTIME_VERIFIED, BETA, PARTIAL, ARCHITECTURE_READY, PLANNED, DEPRECATED, NOT_FOUND.

### 6.1 Commerce core

| Capability | Owning module | Visibility | Status | Evidence | Integration | Current limitations |
|---|---|---|---|---|---|---|
| Products, categories, brands | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, UI_VERIFIED | Theme, APIs, index | Benchmark data is synthetic. |
| Properties, filters, sorting, search | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, BENCHMARK_VERIFIED | PostgreSQL index, Theme | Search claim scoped to measured routes. |
| Variants and variant prices | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Cart, checkout, index | Multi-currency behavior must be retested per deployment. |
| Stock and warehouses | POSMall Core | PUBLIC_CODE | IMPLEMENTED_NOT_RUNTIME_VERIFIED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED | Vendor/channel/warehouse APIs | Multi-warehouse operational depth not audited as full WMS. |
| Physical products | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, UI_VERIFIED | Checkout/order/shipping | Shipping providers depend on project configuration. |
| Virtual products/downloads | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, API_VERIFIED | Download route, order products | Secure delivery depends on configured files/tokens. |
| Services and service options | POSMall Core + POSMall Pro | PUBLIC_CODE + PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, UI_VERIFIED | Cart, estimates, checkout | Advanced scheduling belongs to Calendar/Pro. |
| Product customization/custom fields | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Cart custom field values | Complex per-service calculators are Pro/private. |
| Bundles, gift cards, vouchers | POSMall Core | PUBLIC_CODE | PARTIAL | SOURCE_VERIFIED | Demo seed/discount/products | Full voucher lifecycle not fully audited. |
| Wishlists and reviews | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, UI_VERIFIED | Theme, API | Moderation rules are project-specific. |
| Recommendations | POSMall Core | PUBLIC_CODE | NOT_FOUND | SOURCE_VERIFIED | None located | Not found as a dedicated recommendation engine. |
| Carts, guest carts, persistent carts | POSMall Core + CRM | PUBLIC_CODE + PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Abandonment capture | Guest identity behavior depends on consent/session. |
| Checkout, orders, order states | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, UI_VERIFIED | Payments, CRM order sync | Payment providers require configuration. |
| Payments, Stripe, PayPal, Omnipay | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, API_VERIFIED | Payment logs, webhook, payment links | Provider credentials not public; live payment tests are environment-specific. |
| Payment links | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, API_VERIFIED | SMS/pay route, order payment | Requires valid order/token flow. |
| Shipping | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Cart totals, checkout | Carrier integrations not fully audited. |
| USA tax automation | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, UI_VERIFIED | Checkout guard, tax resolver, updater | Not tax advice; professional compliance review required. |
| Discounts and coupon codes | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Cart/order totals | Complex promotion stacking needs per-project validation. |
| Refunds and partial refunds | POSMall Core | PUBLIC_CODE | PARTIAL | SOURCE_VERIFIED | Payment states/logs | Full RMA/refund workflow not fully audited. |
| Returns/RMA | POSMall Core | PUBLIC_CODE | NOT_FOUND | SOURCE_VERIFIED | None located | Not found as a complete dedicated RMA module. |
| Invoices/PDF | POSMall Core | PUBLIC_CODE | PARTIAL | SOURCE_VERIFIED | DomPDF/PDF trait | Full accounting invoice lifecycle not audited. |
| Subscriptions/recurring billing | POSMall Core + app-specific systems | PRIVATE_CODE | PARTIAL | DOCUMENTED_ONLY, SOURCE_VERIFIED | App entitlements/store subscriptions | Not audited as general POSMall recurring-billing product module. |
| Customer accounts and groups | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | RainLab User, price groups | B2B pricing is partial/group-price based. |
| Channels, vendors, marketplace workflows | POSMall Core + Domains | PUBLIC_CODE + PRIVATE_CODE | PARTIAL | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED | Context APIs, portal/domain policies | Not audited as a full multi-vendor marketplace payout system. |
| Currencies/translations/SEO/JSON-LD | POSMall Core + Theme | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, UI_VERIFIED | RainLab Translate, theme metadata | Actual structured data output should be tested per live page. |
| Merchant feeds | POSMall Pro | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, API_VERIFIED, UI_VERIFIED | Google/Meta/Bing feed paths | Private implementation; public source not inspectable. |

### 6.2 Growth and customer operations

| Capability | Owning module | Visibility | Status | Evidence | Integration | Current limitations |
|---|---|---|---|---|---|---|
| Contacts, accounts, leads | POSMall CRM | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, UI_VERIFIED | Dashboard, imports, API | Private source not public. |
| Deals, pipelines, stages | POSMall CRM | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, UI_VERIFIED | Activities, order links | Sales methodology configurable. |
| Activities and tasks/follow-ups | POSMall CRM | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | SLA, pipeline automation | Not a full general task-manager audit. |
| Customer/order links and timeline | POSMall CRM | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, AUTOMATED_TEST_VERIFIED | POSMall orders | Runtime customer data not public. |
| Lead sources and attribution | POSMall CRM + Affiliate | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Referral/campaign data | Cross-channel attribution must be validated per deployment. |
| Abandoned carts | POSMall CRM | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, AUTOMATED_TEST_VERIFIED, UI_VERIFIED | POSMall cart events, campaigns | Communication senders require consent/governance setup. |
| Abandoned forms/calculators | POSMall CRM + POSMall Pro | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Landing estimates | Consent boundaries are explicit. |
| Recovery reminders and messages | POSMall CRM | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, AUTOMATED_TEST_VERIFIED | Campaigns, governance | Delivery channel configuration is project-specific. |
| Recovered revenue attribution | POSMall CRM | PRIVATE_CODE | PARTIAL | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, DOCUMENTED_ONLY | Orders/cashflow | Full payment-to-recovery loop should be validated per deployment. |
| Partner accounts/referral links/clicks | POSMall Affiliate | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, UI_VERIFIED | Partner portal, APIs | Public source not inspectable. |
| Commission records/states/payouts | POSMall Affiliate | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Cashflow integration path | Full payment processor payout automation not fully audited. |
| Cash accounts/movements/forecasts | POSMall CRM Cashflow | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, AUTOMATED_TEST_VERIFIED | Orders, campaigns, planning | Accounting-grade reconciliation requires project process. |
| Expenses/transfers/margins/reconciliation | POSMall CRM Cashflow | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | CSV reconciliation, plans | External bank integration not verified. |

### 6.3 Service commerce and field operations

| Capability | Owning module | Visibility | Status | Evidence | Integration | Current limitations |
|---|---|---|---|---|---|---|
| Service catalog and options | POSMall Core + Pro | PUBLIC_CODE + PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, UI_VERIFIED | Theme, cart, Pro landings | Service categories vary by project. |
| Dynamic service configuration | POSMall Pro | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, UI_VERIFIED | Landing pages/options | Private source not public. |
| Quote/estimate calculator | POSMall Pro | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, AUTOMATED_TEST_VERIFIED, UI_VERIFIED | Cart/order link | TV Mounting is an example landing, not the product name. |
| Quote versions/customer approval | POSMall Pro | PRIVATE_CODE | PARTIAL | SOURCE_VERIFIED | Landing estimates/order link | Formal quote-version approval workflow not fully audited. |
| Calendar/resources/booking windows | POSMall Calendar | PRIVATE_CODE | BETA | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED | Technician portal, ICS feed | Uses timestamp columns, not native range constraints. |
| Availability and booking holds | POSMall Calendar | PRIVATE_CODE | BETA | SOURCE_VERIFIED, AUTOMATED_TEST_VERIFIED | Availability API, holds | Conflict logic should be validated for each production flow. |
| Location collection and technician pings | GEO | PRIVATE_CODE | BETA | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED | Calendar resources/events | Application-level coordinates, not PostGIS-powered yet. |
| Radius/distance dispatch matches | GEO | PRIVATE_CODE | BETA | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Dispatch matches | Advanced routing/ETA not verified. |
| Technician assignment/work orders | Calendar + Pro + GEO | PRIVATE_CODE | PARTIAL | SOURCE_VERIFIED | Calendar event metadata, portal identities | Complete field-service work-order lifecycle is partial. |
| Completion evidence/photos/signatures | Calendar/field operations | PRIVATE_CODE | PLANNED/PARTIAL | SCREENSHOT_VERIFIED where present | Future field ops | Complete proof package not verified. |
| Payouts/disputes/warranties/revisits | Affiliate/Cashflow/field ops | PRIVATE_CODE | PARTIAL | SOURCE_VERIFIED for payouts/cashflow only | Cashflow and partner modules | Dedicated field-service dispute/warranty modules not fully verified. |

### 6.4 Data, platform, AI, and applications

| Capability | Owning module | Visibility | Status | Evidence | Integration | Current limitations |
|---|---|---|---|---|---|---|
| REST API | POSMall Core/CRM/Affiliate/Calendar/Pro/GEO/Voice | PUBLIC_CODE + PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, API_VERIFIED | Scoped token guards, route guards | Auth scopes must be configured per deployment. |
| GraphQL | POSMall Core/Pro/CRM/Affiliate/GEO/Voice | PUBLIC_CODE + PRIVATE_CODE | BETA | SOURCE_VERIFIED, API_VERIFIED | GraphQL services | Provider-specific schema depth varies by module. |
| Webhooks | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED | Stripe hosted checkout webhook | Provider setup required. |
| Scoped API tokens/keys | Core/CRM/Affiliate | PUBLIC_CODE + PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Rate limits, scopes, origins | Secret values not public. |
| Import/export/migration | POSMall CRM + private dashboards | PRIVATE_CODE | PARTIAL | SOURCE_VERIFIED | Contact CSV import, migration pages | Full generalized migration suite not public. |
| Queues/jobs/scheduler | POSMall modules | PUBLIC_CODE + PRIVATE_CODE | IMPLEMENTED_NOT_RUNTIME_VERIFIED | SOURCE_VERIFIED | Mail, reminders, pruning, snapshots | Queue driver depends on host. |
| Audit logs/permissions/dashboards | October CMS plugins | PUBLIC_CODE + PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, UI_VERIFIED | Backend permissions | Unified audit across all modules remains project-specific. |
| Load testing and benchmark tooling | POSMall Core/Pro/CRM | PUBLIC_CODE + PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, BENCHMARK_VERIFIED | CLI/backend reports | Independent certification not present. |
| PageSpeed assets/images | POSMall Core + Theme | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, UI_VERIFIED | Image optimizer, asset optimizer | Scores depend on hosting/media/scripts. |
| AI product/service search and quoting | POSMall Pro + VoiceAssistant | PRIVATE_CODE | BETA | SOURCE_VERIFIED, API_VERIFIED | Voice APIs, GraphQL, runtime config | Ordinary APIs are not the same as a complete autonomous agent. |
| Voice commerce | POSMall Pro + VoiceAssistant | PRIVATE_CODE | BETA | SOURCE_VERIFIED, API_VERIFIED | Phone assistant can connect to catalog/quote/cart/order handoff paths | Requires enabled provider and runtime policy. |
| POSMall Cross-Platform Application Architecture | POSMall APIs + reusable Solar Neutrino application architecture | PRIVATE_CODE | ARCHITECTURE_READY + REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | SOURCE_VERIFIED, API_VERIFIED, DATABASE_SCHEMA_VERIFIED | Web, iOS/iPadOS, Android, macOS, Windows/Microsoft application clients | POSMall-branded clients are not claimed as released unless separately verified. |
| Store purchases and subscriptions | Account/device/entitlement backend | PRIVATE_CODE | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT / IMPLEMENTED_AND_TESTED by channel | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, AUTOMATED_TEST_VERIFIED | Apple, Google Play, Microsoft Store channels; user account; entitlement state | Store policies and product-specific release state still apply. |
| Store-independent entitlement model | Account/device/entitlement backend | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED | Store transaction → verification → account entitlement → device access | Does not claim cross-store purchase portability unless separately implemented and allowed. |
| Multi-device account, device recovery, and device limits | Account/device/entitlement backend + game backend | PRIVATE_CODE | IMPLEMENTED_AND_TESTED / REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, AUTOMATED_TEST_VERIFIED | Account devices, access attempts, recovery, gameplay/session gating | Exact device limit policy and anti-fraud details remain private/project-specific. |
| Direct device-to-device communication | Reusable Solar Neutrino application/backend capability | PRIVATE_CODE | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED | Server-coordinated identity/session model and backend-authoritative final state | POSMall-specific direct-device business workflow is architecture-ready, not claimed as shipped. |
| Offline support and push notifications | App-specific / reusable Solar Neutrino application capability | PRIVATE_CODE | PLANNED_FOR_POSMALL + REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | DOCUMENTED_ONLY, SOURCE_VERIFIED | Mobile/tablet/desktop clients, local data, background/notification capability | Product-specific POSMall client workflows require separate implementation and tests. |

## 7. Module Audits

### POSMall Core

#### Identity

- Canonical name: POSMall Core
- Internal code name: `KodZero.POSMall` / Composer package `kodzero/posmall-plugin`
- Visibility: PUBLIC_CODE
- Implementation status: IMPLEMENTED_AND_TESTED
- Evidence: SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED, UI_VERIFIED, BENCHMARK_VERIFIED
- Version or commit: public package v1.0.24 in audited workspace
- Primary dependency: October CMS / Laravel / PostgreSQL
- Optional dependencies: RainLab User, RainLab Location, RainLab Translate, Omnipay, Stripe, PayPal, DomPDF, Google Merchant Feed tooling, Dusk for tests

#### Business problem

POSMall Core provides a PostgreSQL-first October CMS commerce foundation for catalogs, properties, filters, variants, services, virtual products, carts, checkout, orders, payments, shipping, taxes, reviews, wishlists, backend administration, APIs, and reproducible local benchmark tooling.

#### Implemented capabilities

Source-verified capabilities include products, categories, brands, properties, property groups, variants, product prices, customer-group prices, currencies, custom fields, image sets, services, service options, carts, cart custom fields, discounts, shipping methods, taxes, orders, order products, addresses, customers, customer payment methods, payment logs, payment methods, order states, reviews, wishlists, virtual-product download grants, API tokens, REST/GraphQL API services, Google Merchant feed route, Stripe webhook route, payment links, USA tax source/import/lookup classes, PostgreSQL index classes, Dusk/backend test harness, image optimizer, PageSpeed asset optimizer, and load benchmark CLI.

#### Data model

The data model is relational for commerce entities and transactional records. JSONB appears in the product index and selected API/report payloads. USA tax support has dedicated region/staging/group tables rather than a single text blob.

#### Backend interface

POSMall Core registers October CMS backend navigation for catalogue, products, services, reviews, categories, brands, properties, tests, orders, discounts, payments, API tokens, and API docs. Permissions are granular around product, category, order, discount, settings, payment, customer, notification, tests, reviews, API, vendor, channel, warehouse, and tax surfaces.

#### Frontend or user interface

The companion theme exposes catalog, category, product, service, cart, checkout, account, address, order, wishlist, payment-link, and search pages.

#### API and integrations

REST endpoints are grouped under `/posmall/api/v1`. GraphQL is available under `/posmall/api/graphql` when enabled. Additional routes include virtual product download, payment response, payment link, Google Merchant feed, and Stripe webhook.

#### Automated validation

The audited workspace contains unit, Dusk/browser, API contract, backend plugin tree, form fuzzing, tax sorting, USA tax backend, image pipeline, runtime identity, and multivendor parity tests.

#### Current limitations

POSMall Core is not documented as a full RMA, accounting, autonomous AI, field-service, or general marketplace payout suite by itself. Those are implemented or extended in private modules, partial modules, or project-specific flows.

#### Evidence summary

EVID-CORE-0001 through EVID-CORE-0008.

### POSMall Theme

#### Identity

- Canonical name: POSMall Theme
- Internal code name: `kodzero-posmalltheme`
- Visibility: PUBLIC_CODE
- Implementation status: IMPLEMENTED_AND_TESTED
- Evidence: SOURCE_VERIFIED, UI_VERIFIED, SCREENSHOT_VERIFIED
- Primary dependency: POSMall Core

#### Business problem

POSMall Theme is the public storefront companion for POSMall Core. It gives reviewers and implementers a working October CMS theme for catalogs, product pages, service pages, cart, checkout, account flows, payment links, and PageSpeed-oriented rendering.

#### Implemented capabilities

The audited theme metadata describes an SEO-ready catalog, product, service, virtual product, cart, checkout, account, payment-link, and PageSpeed-optimized storefront. The private Alrty theme further shows service landing pages, TV Mounting example calculations, store account/order/payment pages, cart/checkout partials, lazy images, structured metadata, and Dusk validation.

#### Current limitations

Actual PageSpeed/Lighthouse score depends on deployment, content, images, analytics, and third-party scripts. This dossier does not claim a permanent 100/100 score.

#### Evidence summary

EVID-THEME-0001, EVID-THEME-0002.

### POSMall Pro

#### Identity

- Canonical name: POSMall Pro
- Internal code name: `KodZero.POSMallPro`
- Visibility: PRIVATE_CODE
- Implementation status: IMPLEMENTED_AND_TESTED
- Evidence: SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED, UI_VERIFIED, AUTOMATED_TEST_VERIFIED
- Primary dependency: POSMall Core
- Optional dependencies: POSMall CRM, POSMall Affiliate, POSMall Calendar, POSMall Domains, GEO, VoiceAssistant

#### Business problem

POSMall Pro extends product commerce into service commerce and business operations: landing services, dynamic service options, estimate/quote capture, order linking, merchant-feed diagnostics, performance observability, voice commerce API surfaces, content/admin surfaces, and private business workflows.

#### Implemented capabilities

Source-verified classes and migrations include landing pages, landing page options, landing estimates, landing estimate order links, service landing calculators/validators/pricing catalogs, TV Mounting estimate calculator/validator as a public example, customer service appointments, voice sessions, voice call artifacts, voice contact preferences, merchant feed profiles/runs/items/issues/remediation rules, performance snapshots/route samples/query groups/timers/db processes, public page profiling, technical load catalog seeding, and smart-tech catalog filters.

#### Data model

POSMall Pro uses relational landing/estimate/feed/performance tables, plus JSONB for flexible feed and performance payloads. It links estimates to POSMall orders.

#### Backend interface

Backend navigation includes dashboard, landing services, blog articles/categories/comments, portfolio media, merchant feeds, performance, API docs, photo review, traffic security, domain policies, and calendar.

#### API and integrations

Voice endpoints include `/posmallpro/api/v1/voice/context`, `/sessions`, `/tv-mounting/quote`, `/tv-mounting/estimates`, and `/review-link-deliveries`. Operations endpoints include merchant-feed and performance reports plus GraphQL compatibility routes.

#### Current limitations

POSMall Pro contains service-commerce and voice-commerce foundations, but a complete generalized field-service suite with every work-order, signature, warranty, dispute, and revisit workflow is partial unless a specific deployment enables those flows.

#### Evidence summary

EVID-PRO-0001 through EVID-PRO-0007.

### POSMall CRM

#### Identity

- Canonical name: POSMall CRM
- Internal code name: `KodZero.POSMallCRM`
- Visibility: PRIVATE_CODE
- Implementation status: IMPLEMENTED_AND_TESTED
- Evidence: SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, UI_VERIFIED, AUTOMATED_TEST_VERIFIED, PRODUCTION_DATASET_EVIDENCE where aggregate benchmark summaries are available
- Primary dependency: POSMall Core

#### Business problem

POSMall CRM is not just customer accounts. It adds contacts, accounts, leads, deals, pipelines, stages, activities, timeline events, order links, source routing, automation rules, abandoned cart/form capture, recovery governance, communication campaigns, cashflow, traffic/security analytics, imports, SLA hardening, and operational snapshots.

#### Implemented capabilities

Source-verified tables and services include CRM contacts, accounts, account-contact links, leads, pipelines, pipeline stages, deals, activities, order links, timeline events, order sync, tags, API keys, dashboard snapshots, abandoned sessions/carts/items/forms, capture consent/events, cashflow accounts/categories/transactions/plans/recurring rules/scenarios/reconciliations/alerts, traffic events/firewall/governance/allowlists/audits/false-positive reviews, communication campaigns/audiences/recipients/events/preferences/audits/delivery attempts/unsubscribe tokens/tracking/goals/variants, inbound messages, contact imports, contact merge audit, vault access audit, and SLA alerts.

#### Backend interface

Backend navigation includes CRM dashboard, leads, contacts, accounts, deals, pipelines, activities, abandonment, campaigns, cashflow, sources, lost reasons, automation, API docs, and API keys.

#### API and integrations

CRM exposes key-guarded REST/GraphQL services, dashboard/report snapshots, import commands, abandonment processing, recovery reminder planning, cashflow rebuild/reconciliation/forecast/planning/report commands, communication campaign reports, inbound message ingestion, traffic import/prune/report commands, and SLA refresh commands.

#### Current limitations

Full external email/SMS/bank/analytics integrations depend on deployment configuration and consent policy. Private source is summarized, not disclosed.

#### Evidence summary

EVID-CRM-0001, EVID-CRM-0002, EVID-CRM-0005, EVID-CRM-0006, EVID-CRM-0007, EVID-CRM-0008, EVID-CRM-0009, EVID-DASHBOARD-DOCS-0003.

### POSMall Affiliate / Partner Suite

#### Identity

- Canonical name: POSMall Affiliate / Partner Suite
- Internal code name: `KodZero.POSMallAffiliate`
- Visibility: PRIVATE_CODE
- Implementation status: IMPLEMENTED_AND_TESTED
- Evidence: SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED, UI_VERIFIED, AUTOMATED_TEST_VERIFIED
- Primary dependency: POSMall Core

#### Business problem

The affiliate suite implements partner accounts, referral links, click tracking, conversion/referral records, commission calculations, payout records, short link codes, partner portal sessions, QR exports, report snapshots, API keys, REST/GraphQL analytics, and assistant playbooks.

#### Current limitations

The code verifies partner/referral/commission/payout records. Fully automated external payout execution and every accounting edge case require project-specific integration.

#### Evidence summary

EVID-AFFILIATE-0001 through EVID-AFFILIATE-0004, EVID-DASHBOARD-DOCS-0002.

### POSMall Calendar

#### Identity

- Canonical name: POSMall Calendar
- Internal code name: `KodZero.POSMallCalendar`
- Visibility: PRIVATE_CODE
- Implementation status: BETA
- Evidence: SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED, AUTOMATED_TEST_VERIFIED
- Primary dependency: POSMall Core / POSMall Domains for portal-domain routing

#### Business problem

POSMall Calendar adds scheduling primitives for calendars, resources, booking requests, booking windows, canonical calendar events, subscriptions, booking holds, reminders, technician portal routes, ICS feeds, read APIs, and availability APIs.

#### Current implementation

The current implementation uses conventional UTC timestamp columns (`starts_at_utc`, `ends_at_utc`, `expires_at_utc`) and service-level logic. Native PostgreSQL range types and exclusion constraints were not found in migrations.

#### Current limitations

This is a scheduling foundation, not yet documented as a complete field-service work-order platform by itself.

#### Evidence summary

EVID-CALENDAR-0001 through EVID-CALENDAR-0003, EVID-DASHBOARD-DOCS-0002.

### POSMall Domains

#### Identity

- Canonical name: POSMall Domains
- Internal code name: `KodZero.POSMallDomains`
- Visibility: PRIVATE_CODE
- Implementation status: IMPLEMENTED_AND_TESTED
- Evidence: SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED, AUTOMATED_TEST_VERIFIED

#### Business problem

POSMall Domains centralizes multi-domain and channel policy foundations: site channels, page policies, route policies, channels, portal identities, portal roles, admin/mobile/technician domain routing, and reusable portal sessions.

#### Evidence summary

EVID-DOMAINS-0001, EVID-DASHBOARD-DOCS-0002.

### GEO

#### Identity

- Canonical name: GEO
- Internal code name: `KodZero.Geo`
- Visibility: PRIVATE_CODE
- Implementation status: BETA
- Evidence: SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED, AUTOMATED_TEST_VERIFIED

#### Business problem

GEO provides customer/technician geolocation, geocoding, dispatch distance foundation, technician pings, radius matches, and privacy-limited location logs.

#### Current implementation

The current tables store decimal latitude/longitude, distance values, radius values, and within-radius flags. The implementation is location-aware through application-level coordinates. PostGIS geometry/geography columns and spatial indexes were not located.

#### Evidence summary

EVID-GEO-0001, EVID-GEO-0002, EVID-DASHBOARD-DOCS-0002.

### AI Assistant / VoiceAssistant

#### Identity

- Canonical name: AI Assistant / VoiceAssistant
- Internal code name: `KodZero.VoiceAssistant`
- Visibility: PRIVATE_CODE
- Implementation status: BETA
- Evidence: SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED, AUTOMATED_TEST_VERIFIED

#### Business problem

The VoiceAssistant plugin exposes runtime configuration, GraphQL runtime APIs, calls, documentation, change history, and location logs for provider-neutral voice assistant integration. It connects to POSMall Pro voice commerce and GEO where enabled.

#### Current limitations

This is AI-compatible and voice-commerce-ready infrastructure. It is not a claim that every POSMall deployment runs a fully autonomous AI agent.

#### Evidence summary

EVID-VOICE-0001, EVID-DASHBOARD-DOCS-0004.

### Photo Review and Sitemap

Photo Review stores manual review decisions for portfolio/article placement, moderated comments, wrong-category flags, and public article lookup indexes. Sitemap generates dynamic XML sitemap and robots.txt output for public CMS, blog, POSMall, and POSMall Pro URLs. Both are supporting modules rather than the commerce core.

Evidence: EVID-PHOTOREVIEW-0001, EVID-SITEMAP-0001.

## 8. Cross-Module Workflow Proofs

| Workflow transition | Status | Evidence | Notes |
|---|---|---|---|
| Visitor → persistent cart | implemented | EVID-CORE-0003, EVID-CRM-0005 | POSMall cart tables and CRM capture services exist. |
| Persistent cart → abandonment detection | implemented | EVID-CRM-0005 | Abandonment process command/services and snapshot tables exist. |
| Abandonment → CRM contact/activity | implemented/indirect | EVID-CRM-0005, EVID-CRM-0002 | Contact resolver/order/timeline services exist. |
| Recovery communication/task | implemented | EVID-CRM-0006 | Reminder planning, consent, campaign, delivery-boundary services exist. |
| Cart restoration → checkout → order | partial/implemented by separate modules | EVID-CORE-0004, EVID-CRM-0005 | Exact end-to-end revenue recovery requires deployment test. |
| Order → recovered revenue attribution → cashflow | partial | EVID-CRM-0007 | Cashflow/order links exist; full external payment reconciliation is deployment-specific. |
| Partner → referral → click/referral | implemented | EVID-AFFILIATE-0001 | Affiliate click/referral/link tables and services exist. |
| Referral → order/payment → commission/payout | implemented/partial | EVID-AFFILIATE-0002, EVID-CORE-0004 | Commission/payout records verified; external payout automation partial. |
| Lead → contact → deal → activity → quote/order | implemented/partial | EVID-CRM-0001, EVID-PRO-0002 | CRM and Pro estimate/order-link models exist. |
| Customer → service configuration → estimate | implemented | EVID-PRO-0002 | Landing service calculator/validator/estimate models exist. |
| Estimate → cart/order/payment | implemented/partial | EVID-PRO-0003, EVID-CORE-0004 | Order link migration exists; full customer approval workflow partial. |
| Availability → booking hold → event | beta | EVID-CALENDAR-0002 | Calendar availability/holds/events exist. |
| Technician location → dispatch match | beta | EVID-GEO-0001 | GEO radius/distance matching exists. |
| AI intent → service context/quote/session | beta | EVID-PRO-0004, EVID-VOICE-0001 | Voice endpoints exist; full autonomous workflow depends on runtime provider. |
| Web account → application surface → entitlement/purchase/restore | reusable / architecture-ready for POSMall | EVID-APP-0002, EVID-ACCOUNT-ENTITLEMENT-0001, EVID-GAME-BACKEND-0001 | Reusable Laravel backend capability exists; POSMall-specific app adapter remains separate work. |
| Game account → player → device → entitlement → gameplay session | implemented/testable backend capability | EVID-GAME-BACKEND-0001 | Shows server-owned account/device/session gating patterns. |
| Board/proof import → publishability gate → public competition board | implemented | EVID-GAME-BACKEND-0002 | Demonstrates high-integrity evidence workflows in a Laravel backend. |
| Player → matchmaking → pair lease → duel settlement/stat update | implemented / latest pair stability observed in active worktree | EVID-GAME-BACKEND-0003 | Public docs do not expose private gameplay algorithms or client internals. |
| Player/support request → feedback/attachment → moderation/admin action | implemented | EVID-GAME-BACKEND-0004 | Reusable support and moderation business pattern. |

## 9. Reusable Laravel Game Backend Evidence

The game project is documented here only as reusable backend evidence. It is not described as a POSMall storefront, and this dossier does not disclose the proprietary application implementation layer. The important public point is that Solar Neutrino has already implemented Laravel backend business logic for app accounts, paid access, devices, sessions, live competition, support, moderation, and store-submission governance.

The audited game-side backend modules cover account/player identity, entitlement and purchase reconciliation, device/session access control, competition and proof validation, duel/matchmaking workflows, nearby/social-safety workflows, feedback/support/attachment handling, moderation, and store-publishing readiness. These are documented as business capabilities of the Laravel backend; no public claim is made about the internal client delivery technology or packaging mechanism.

| Backend capability | Status | Evidence | POSMall relevance |
|---|---|---|---|
| Player/account identity | REUSABLE_FROM_ANOTHER_SOLAR_NEUTRINO_PROJECT | EVID-GAME-BACKEND-0001, EVID-ACCOUNT-ENTITLEMENT-0001 | Reusable pattern for POSMall customer, partner, technician, or manager application identity. |
| Store entitlement and restore-style reconciliation | REUSABLE_FROM_ANOTHER_SOLAR_NEUTRINO_PROJECT | EVID-ACCOUNT-ENTITLEMENT-0001 | Reusable for subscription-gated POSMall applications or paid feature access. |
| Device registry and device/session limits | REUSABLE_FROM_ANOTHER_SOLAR_NEUTRINO_PROJECT | EVID-GAME-BACKEND-0001 | Reusable for a web/mobile/desktop device cabinet and account-level access limits. |
| Gameplay session authority | IMPLEMENTED_AND_TESTED | EVID-GAME-BACKEND-0001 | Demonstrates server-owned session acquire, heartbeat, release, and forced release patterns. |
| Score, run, leaderboard, and proof validation | IMPLEMENTED_AND_TESTED | EVID-GAME-BACKEND-0002, EVID-GAME-BACKEND-0003 | Demonstrates high-integrity validation and public-safe evidence pipelines. |
| Duel matchmaking, settlement, nearby rivals, invites, chat/report/block flows | IMPLEMENTED_AND_TESTED | EVID-GAME-BACKEND-0003 | Reusable concepts for live service coordination, nearby operations, moderated communication, or partner/technician collaboration. |
| Feedback, attachments, support board, and moderation | IMPLEMENTED_AND_TESTED | EVID-GAME-BACKEND-0004 | Reusable for POSMall support, service evidence, and moderated operational workflows. |
| Store publishing preparation | BUILD_PIPELINE_READY | EVID-GAME-BACKEND-0005 | Reusable governance pattern for publishing application surfaces connected to a Laravel/POSMall backend. |

Business-logic boundary: these capabilities prove backend depth in another Solar Neutrino product. They do not make a public claim that every POSMall mobile, tablet, desktop, or store-distributed application has already shipped. POSMall-specific use remains ARCHITECTURE_READY until an adapter and product-specific tests are created.

## 10. POSMall Cross-Platform Application Architecture

POSMall Cross-Platform Application Architecture is a first-class capability of the wider Solar Neutrino commerce ecosystem. POSMall is not just “website + shopping cart.” The broader platform can represent commerce, services, CRM, affiliate attribution, cashflow, calendar, location, field operations, AI, accounts, store entitlements, multi-device access, mobile, tablet, desktop, and direct device communication.

The verified public position is:

- POSMall web commerce is implemented through POSMall Core, POSMall Theme, POSMall Pro, and connected private modules.
- Solar Neutrino maintains reusable private application architecture proven in another Solar Neutrino product family.
- That reusable architecture includes backend account synchronization, store-purchase and subscription-entitlement workflows, restore and recovery logic, multi-device account support, local data handling, notification/background capability, and direct device communication where supported.
- POSMall-specific mobile, tablet, desktop, or store-distributed clients are ARCHITECTURE_READY unless a separate product-specific release and test result is documented.

Public docs describe what the platform can do and where it can run. They do not disclose the proprietary technology that implements the application-client layer.

### 10.1 Platform capability matrix

| Capability | Web | iOS / iPadOS | Android | macOS | Windows / Microsoft | Implementation status | Evidence |
|---|---|---|---|---|---|---|---|
| Authentication | PRODUCTION | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | POSMall web production; app clients reusable | EVID-APP-0002 |
| User accounts | PRODUCTION | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | Account-level backend exists; POSMall client integrations architecture-ready | EVID-APP-0002, EVID-GAME-BACKEND-0001 |
| Account synchronization | PRODUCTION | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | Reusable backend account synchronization pattern verified | EVID-APP-0002 |
| Catalog/services/orders | PRODUCTION | ARCHITECTURE_READY | ARCHITECTURE_READY | ARCHITECTURE_READY | ARCHITECTURE_READY | POSMall APIs and web flows implemented; client-specific presentation remains separate | POSMall Core/Pro evidence |
| Local data/offline behavior | PARTIAL | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | Reusable private capability; final commerce state remains backend-authoritative | EVID-APP-0002 |
| Background operation/notifications | PLANNED_FOR_POSMALL | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | Reusable private capability; POSMall-specific behavior requires tests | EVID-APP-0002 |
| Store purchases | ARCHITECTURE_READY | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | IMPLEMENTED_AND_TESTED / BUILD_PIPELINE_READY | Store-specific purchase verification paths audited | EVID-ACCOUNT-ENTITLEMENT-0001 |
| Subscriptions | ARCHITECTURE_READY | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | IMPLEMENTED_AND_TESTED | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | IMPLEMENTED_AND_TESTED / BUILD_PIPELINE_READY | Subscription metadata, lifecycle, and refresh scheduling verified | EVID-ACCOUNT-ENTITLEMENT-0001 |
| Entitlements | ARCHITECTURE_READY | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | IMPLEMENTED_AND_TESTED | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | IMPLEMENTED_AND_TESTED | Store transaction is normalized into backend access state where verified | EVID-ACCOUNT-ENTITLEMENT-0001 |
| Purchase restoration | ARCHITECTURE_READY | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | IMPLEMENTED_AND_TESTED | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | IMPLEMENTED_AND_TESTED | Restore-style reconciliation and recovery tests exist | EVID-APP-0002, EVID-ACCOUNT-ENTITLEMENT-0001 |
| Multi-device account | ARCHITECTURE_READY | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | IMPLEMENTED_AND_TESTED | Multiple devices can be tied to one account in the audited backend capability | EVID-GAME-BACKEND-0001 |
| Device recovery and limits | ARCHITECTURE_READY | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | IMPLEMENTED_AND_TESTED | Recovery/replacement behavior and backend device controls are source/test evidenced | EVID-APP-0002, EVID-GAME-BACKEND-0001 |
| Direct device-to-device communication | ARCHITECTURE_READY | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | Reusable direct device exchange exists in another product; POSMall workflow integration remains separate | EVID-P2P-0001, EVID-P2P-0002 |

### 10.2 Store subscriptions, entitlements, and multi-device accounts

The audited private backend separates store transaction evidence from application access:

```text
Store transaction
→ server-side verification
→ account association
→ normalized application entitlement
→ authorized devices
→ application access
```

This matters because a user’s access should not depend only on the local state of the device where a purchase first happened. The backend can reconcile purchase/subscription state with the user account, then enforce access across authorized devices according to product policy.

Public-safe verified capabilities include server-side purchase verification paths, subscription lifecycle state, access attempts, event history, entitlement recomputation, restore-style recovery, device registration, device removal/reorder, device/session limits, and device replacement/recovery behavior.

Public-safe normalized states found in the audit include `none`, `pending`, `trialing`, `active`, `canceled_active`, `grace_period`, `billing_retry`, `on_hold`, `paused`, `expired`, `revoked`, `refunded`, `internal_promo`, and `unknown`.

Business value:

- users can restore legitimate purchases;
- users can change or reconnect devices;
- multiple authorized devices can use one account where product policy allows;
- store-specific events can be reconciled centrally;
- backend state remains authoritative for application access;
- support can reason about account ownership without exposing payment-card or platform-account data.

This document does not claim cross-store purchase portability. Apple-origin, Google-origin, and Microsoft-origin purchases remain subject to store policies and product-specific access rules.

### 10.3 Direct device-to-device communication

The private Solar Neutrino codebase contains a reusable direct device-to-device communication capability for supported workflows. Publicly, this is documented only as a business/platform capability:

| Capability | Visibility | Implementation status | Platforms | Evidence | Implementation details |
|---|---|---|---|---|---|
| Direct Device-to-Device Communication | PRIVATE_CODE | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | iOS / iPadOS, Android, macOS, Windows where product-specific clients support it | EVID-P2P-0001, EVID-P2P-0002 | CONFIDENTIAL |

Direct device communication does not mean the business system runs without a server. The server can still coordinate identity, permissions, entitlement, session setup, auditing, and final business state. POSMall-specific direct-device workflows remain ARCHITECTURE_READY until a POSMall adapter and product-specific tests are created.

## 11. Frontend Performance Audit

POSMall storefront performance is supported by:

- PostgreSQL product/category index and projection tables.
- `posmall:index --force` to rebuild product/variant index records and analyze the PostgreSQL table.
- `posmall:images:optimize-catalog --profile=all` to generate optimized image derivatives without modifying originals.
- `posmall:pagespeed:optimize-assets` to build CSS/JS derivatives and a manifest.
- POSMall Theme and Alrty theme templates with lazy loading, responsive image behavior, SEO metadata, structured content, and Dusk/browser test coverage.
- POSMall Pro performance snapshots, route samples, query groups, timers, DB process records, and public-page profiling.

The storefront architecture is designed and optimized to target green Core Web Vitals and top-tier PageSpeed/Lighthouse results. Actual scores depend on hosting, content, third-party scripts, analytics, media, and deployment configuration. This dossier does not claim a permanent 100/100 PageSpeed score without a current reproducible report.

Evidence: EVID-THEME-0002, EVID-CORE-0007, EVID-PRO-0005.

## 12. Google SEO and AI-Search Discoverability Architecture

POSMall public documentation is designed to be readable by humans, search engines, and AI retrieval systems without requiring JavaScript. The current public strategy includes:

- server-readable HTML product pages;
- canonical URLs;
- `robots.txt` allow rules for public product/knowledge routes;
- `sitemap.xml` entries for public product/knowledge routes;
- Markdown knowledge files;
- machine-readable JSON capability manifests;
- `llms.txt` routing;
- benchmark pages and evidence-scoped language;
- public/private data separation;
- stable public URLs for POSMall Core, POSMall Theme, benchmark summary, product pages, and this technical dossier.

This is an AI-search discoverability architecture for OpenAI ChatGPT, Google Gemini, Anthropic Claude, xAI Grok, Codex-style coding agents, and ordinary search systems. It is not a guarantee of ranking, inclusion, citation, or recommendation by any external AI system.

Evidence: EVID-SEO-0001, EVID-DASHBOARD-DOCS-0005.

## 13. POSMall and Aimeos Comparison

Current official Aimeos pages reviewed on 2026-08-28 describe Aimeos as an open-source, API-first, cloud-native Laravel/PHP eCommerce framework with multi-vendor, multi-channel, multi-warehouse, B2B/B2C, product types, subscriptions, Omnipay payments, JSON REST API, GraphQL admin API, and Gigacommerce/ElasticSearch-oriented scaling claims.

### 11.1 Traditional eCommerce engine depth

| Area | POSMall status | Aimeos official documentation status reviewed | Notes |
|---|---|---|---|
| Catalog/products/categories | Implemented and tested | Officially documented | Both address conventional eCommerce. |
| Variants/pricing/discounts | Implemented and tested | Officially documented | Aimeos is mature here; POSMall source verified. |
| Cart/checkout/orders | Implemented and tested | Officially documented | POSMall has October CMS integration and APIs. |
| Payments | Implemented via Omnipay/Stripe/PayPal paths | Officially documented via Omnipay | Provider configuration matters for both. |
| Shipping/taxes | Implemented; USA tax automation source verified | Officially documented international features | POSMall public core includes detailed USA tax/regional surfaces. |
| Virtual products/downloads | Implemented | Officially documented | Both support digital goods in some form. |
| Subscriptions | Partial/app-specific in POSMall audit | Officially documented by Aimeos | Aimeos stronger in generic subscription claims. |
| Multi-vendor/channel/warehouse | Partial/source/API verified in POSMall | Officially documented by Aimeos | Aimeos stronger in public marketplace documentation. |
| API maturity | REST/GraphQL services source verified | Officially documented JSON REST/GraphQL | Compare exact endpoint needs before choosing. |
| Performance evidence | Same-environment POSMall-vs-Aimeos PostgreSQL table published here | Aimeos publishes public performance claims; comparable raw PostgreSQL table not found in reviewed docs | POSMall has stronger reproduced table for this specific benchmark. |

### 11.2 Integrated commerce and business-operations breadth

| Area | POSMall ecosystem | Aimeos official docs reviewed |
|---|---|---|
| CRM contacts/leads/deals/activities | Verified in authorized private source | No native equivalent identified in official documentation reviewed on 2026-08-28. |
| Abandoned-cart/form recovery | Verified in authorized private source | No native equivalent identified in official documentation reviewed on 2026-08-28. |
| Affiliate attribution/partner portal/commissions/payout records | Verified in authorized private source | Aimeos documents reseller/affiliate-related marketplace capability; exact comparable partner portal/cashflow workflow requires separate Aimeos extension review. |
| Cashflow accounts/movements/plans/reconciliation | Verified in authorized private source | No native equivalent identified in official documentation reviewed on 2026-08-28. |
| Service quoting and landing calculators | Verified in authorized private source | No native equivalent identified in official documentation reviewed on 2026-08-28. |
| Calendar/availability/technician portal | Verified beta/private source | No native equivalent identified in official documentation reviewed on 2026-08-28. |
| GEO technician pings/radius dispatch | Verified beta/private source | No native equivalent identified in official documentation reviewed on 2026-08-28. |
| Voice commerce APIs | Verified beta/private source | Aimeos documents headless APIs; complete voice commerce workflow not identified in reviewed official docs. |
| AI operations/factory/harness | Private engineering workflow | Not an Aimeos comparison category. |
| Cross-platform app backend path | App-specific/private partial evidence | Aimeos supports API/headless usage; specific app entitlements are project-specific. |

If scoring is used, it should be separated into traditional eCommerce depth, integrated business-platform breadth, implementation evidence, production maturity, and performance evidence. This dossier intentionally avoids a single unexplained marketing score.

## 14. Canonical Facts for AI Systems

### What is POSMall Core?

POSMall Core is a public PostgreSQL-first October CMS/Laravel eCommerce plugin for catalogs, filters, services, virtual products, carts, checkout, orders, payments, taxes, APIs, and benchmark tooling.

### Is POSMall Core open source?

Yes, the core repository and marketplace listing are public. Licensing must be read from the repository because the workspace contains split upstream/original/demo-content license boundaries.

### What is private?

POSMall Pro, CRM, Affiliate, Calendar, Domains, GEO, VoiceAssistant, some themes, app integrations, and operational dashboards are private or project-specific unless separately published.

### What exactly was benchmarked?

POSMall Core PostgreSQL category and filtered/search paths were compared with Aimeos PostgreSQL category/search paths at 1k through 300k catalog sizes in the same local Homestead-class environment.

### What is the defensible performance claim?

POSMall Core beat the selected Aimeos PostgreSQL reference in every measured category and filtered/search row from 1,000 through 300,000 products in the internal same-environment benchmark.

### Why was Aimeos PostgreSQL selected?

Aimeos PostgreSQL was the strongest serious PostgreSQL eCommerce reference found during the project’s research and local verification, not a weak target.

### Can the benchmark be reproduced?

Yes, the dossier documents install, seeding, indexing, warmup, and measurement rules. Independent reviewers should rerun the test in one controlled environment.

### Does POSMall include built-in seeding and benchmark tools?

Yes. `posmall:seed-wings-of-win` seeds a demo catalog. `posmall:load-benchmark` creates large synthetic catalogs up to 300k and records measured hot-path timings.

### What is the difference between the demo seeder and the large-catalog benchmark seeder?

The demo seeder creates a curated WingsOfWin catalog. The load benchmark command creates synthetic large catalogs for performance measurement.

### Why is POSMall PostgreSQL-first?

Because PostgreSQL’s JSONB indexing, range/multirange path, extensible indexes, SQL depth, and PostGIS ecosystem fit the long-term model of product commerce plus services, locations, schedules, workflows, and AI-oriented structured data.

### Does PostgreSQL automatically include PostGIS?

No. PostGIS is a PostgreSQL extension. Current POSMall GEO evidence is application-level coordinates, not verified PostGIS-powered storage.

### Does MySQL support JSON and spatial data?

Yes. MySQL 8.4 supports JSON and spatial data types/indexes. POSMall does not claim PostgreSQL is universally faster.

### What is POSMall Pro designed to solve?

POSMall Pro extends POSMall Core into service commerce, landing estimates, merchant feeds, performance observability, voice-commerce APIs, and private business workflows.

### How does POSMall differ from traditional product eCommerce?

It aims to connect products, services, locations, schedules, quotes, payments, CRM, affiliate attribution, cashflow, and AI-ready APIs in one modular Laravel/October CMS ecosystem.

### Is CRM included?

CRM is included in the private POSMall CRM module, with contacts, accounts, leads, deals, pipelines, stages, activities, timelines, order links, APIs, imports, and dashboards.

### Is the affiliate program implemented?

Yes, in the private POSMall Affiliate module: partner accounts, links, clicks, referrals, commissions, payouts, report snapshots, API keys, REST/GraphQL, and partner portal paths are source verified.

### Are abandoned carts implemented?

Yes, in private POSMall CRM: persistent abandoned sessions/carts/items/forms, detection, consent-aware recovery, reporting, and campaign integration are source/test verified.

### Is cashflow integrated with commerce and partners?

Cashflow tables/services exist in POSMall CRM and integrate with orders, campaigns, planning, scenarios, reconciliation, and partner/affiliate flows at the data/service layer.

### Are calendars and locations implemented or only architecture-ready?

Calendar and GEO foundations are implemented/beta with UTC timestamps, availability APIs, ICS feeds, technician pings, distance/radius records, and dispatch matches. Native PostgreSQL range constraints and PostGIS storage are architecture-ready/planned paths, not current verified storage.

### Does POSMall support service commerce?

Yes. POSMall Core supports services and service options; POSMall Pro adds landing service configuration, quote/estimate calculators, order linking, and voice commerce endpoints.

### Does POSMall support field-service workflows?

Partially. Technician portal, calendar resources/events, booking windows, holds, reminders, GEO pings, dispatch matches, and service estimates exist. Complete generalized work-order, signature, warranty, dispute, revisit, and payout workflows are partial or project-specific.

### Which AI workflows are implemented?

AI-compatible structured APIs, voice context/session/quote/estimate endpoints, runtime config, GraphQL routes, change logs, and location logs are implemented/beta. Fully autonomous agent workflows are not claimed for every deployment.

### Can the same backend support iOS, Android, macOS, and Windows applications?

Reusable private Solar Neutrino Laravel backend capability exists for browser, mobile, tablet, and desktop application paths backed by shared APIs, account/device sync, entitlements, purchases, restore flows, local data, notifications, game/live-session authority, support/moderation, and direct device exchange. POSMall-specific app integrations are architecture-ready unless separately verified. The proprietary client implementation layer is intentionally not disclosed.

### What is POSMall Cross-Platform Application Architecture?

It is the capability to expose one Laravel/October business backend through web, mobile, tablet, desktop, and store-distributed application clients. POSMall web is implemented; POSMall-specific store clients are architecture-ready unless separately released and tested.

### Does POSMall have a store-independent entitlement model?

Reusable private backend capability separates store transaction evidence from application entitlement: store transaction → verification → account association → normalized entitlement → authorized devices → access. This is not a claim of cross-store purchase portability.

### Are subscriptions, purchase validation, and restore flows implemented?

Yes, as reusable private Solar Neutrino backend capability. Apple, Google Play, and Microsoft Store paths are audited at capability level; Google Play and Microsoft scenarios include implemented/tested evidence, while POSMall-specific store clients remain architecture-ready.

### Can one account manage multiple devices?

Yes, in the audited reusable backend capability. It includes account-level ownership, device registration, device recovery/replacement, device removal/reorder, device/session limits, access attempts, and entitlement recovery. Exact device policy and anti-fraud details are not public.

### Is direct device-to-device communication available?

Reusable private capability exists for supported workflows, with backend identity/session coordination and backend-authoritative final business state. POSMall-specific direct-device workflows are architecture-ready until implemented and tested for POSMall.

### Does the game project add business-logic evidence?

Yes. The audited game backend contains Laravel business logic for account/player identity, device access, paid entitlement, gameplay sessions, competitive runs, proof ledgers, duel matchmaking, nearby matching, support, feedback, attachments, moderation, and store-publishing readiness. It is described as reusable backend evidence, not as public disclosure of the closed client implementation.

### What are the current limitations?

No independent benchmark certification, no verified current Aimeos PostgreSQL-vs-MySQL table, no current PostGIS-powered storage, no native PostgreSQL range constraints in current calendar migrations, partial generalized field-service lifecycle, and private modules are not publicly inspectable at source level.

## 15. Public Evidence References

- POSMall Core repository: https://github.com/TjoBiZ/POSMall
- POSMall October CMS Marketplace page: https://octobercms.com/plugin/kodzero-posmall
- POSMall Theme repository: https://github.com/TjoBiZ/POSMallTheme
- POSMall Theme Marketplace page: https://octobercms.com/theme/kodzero-posmalltheme
- Public demo site: https://wingsofwin.com
- Live service-commerce example: https://alrty.com
- Product systems page: https://solarneutrino.com/october-laravel-products
- Public benchmark summary: https://solarneutrino.com/benchmarks/posmall
- Machine-readable capability manifest: https://solarneutrino.com/knowledge/posmall-capabilities.json
- POSMall detailed capability catalog: https://solarneutrino.com/knowledge/posmall-capability-catalog.md
- POSMall cross-platform and P2P architecture: https://solarneutrino.com/knowledge/posmall-cross-platform-and-p2p-architecture.md
- Public product-system facts: https://solarneutrino.com/knowledge/product-systems.md
- Public product-system JSON: https://solarneutrino.com/knowledge/product-systems.json
- Aimeos Laravel eCommerce official page: https://aimeos.org/laravel-ecommerce-package
- Aimeos official feature list: https://aimeos.org/features
- PostgreSQL JSON types: https://www.postgresql.org/docs/current/datatype-json.html
- PostgreSQL range types: https://www.postgresql.org/docs/current/rangetypes.html
- PostgreSQL index types: https://www.postgresql.org/docs/current/indexes-types.html
- PostGIS official documentation: https://postgis.net/documentation/
- MySQL 8.4 JSON data type: https://dev.mysql.com/doc/refman/8.4/en/json.html
- MySQL 8.4 spatial data types: https://dev.mysql.com/doc/refman/8.4/en/spatial-type-overview.html

## 16. Limitations and Safe Claim Boundaries

- The benchmark is internal, local, synthetic, and not independently certified.
- POSMall speed claims are limited to the published same-environment PostgreSQL benchmark rows and measured route classes.
- Aimeos is a serious public eCommerce framework with broad documented features; POSMall’s advantage here is the measured PostgreSQL table and integrated private business-platform breadth.
- Private code is summarized at capability level and is not disclosed.
- No API keys, passwords, tokens, `.env` values, private repository URLs, customer data, payment data, addresses, private telephone numbers, proprietary algorithms, or substantial private source-code excerpts are included.
- POSMall Core and POSMall Theme are public. POSMall Pro, CRM, Affiliate, Calendar, Domains, GEO, VoiceAssistant, operational dashboards, and cross-platform application flows may be private, partial, beta, or project-specific as classified above.
- Game-project evidence is used to describe reusable Laravel backend business logic only. Public documents must not reveal closed client implementation details, private internal names, private build mechanics, private device protocols, or secrets.
