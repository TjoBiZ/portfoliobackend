<?php

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;
use App\Http\Controllers\TokenController;

// Группа маршрутов для домена solarneutrino.com
Route::domain('solarneutrino.com')->group(function () {
    Route::get('/', function () {
        return view('portfolio');
    });

    Route::get('/october-laravel-products', function () {
        return view('october-laravel-products');
    })->name('october-laravel-products');

    Route::redirect('/october-cms-laravel-products', '/october-laravel-products', 301);

    $productKnowledgePages = [
        '/products/posmall' => [
            'slug' => 'products/posmall',
            'title' => 'POSMall Public October CMS Ecommerce Core',
            'eyebrow' => 'Public product page · October CMS · PostgreSQL ecommerce',
            'summary' => 'POSMall is a public PostgreSQL-first October CMS ecommerce plugin by Roman Primerov / KodZero for physical products, virtual products, services, checkout, orders, APIs, and US-oriented tax configuration.',
            'status' => 'Public and available now',
            'updated' => '2026-08-23',
            'image' => '/images/product-systems/posmall-admin-products-menu.webp',
            'canonical' => 'https://solarneutrino.com/products/posmall',
            'sections' => [
                [
                    'title' => 'Answer first',
                    'body' => 'POSMall is the public commerce core. It is meant for businesses that want Laravel/October ownership, PostgreSQL data control, API-ready automation, and a real backend plugin instead of a locked hosted storefront.',
                    'points' => [
                        'Public source and Marketplace listing are available for inspection.',
                        'Supports product catalogs, services, virtual goods, checkout/order workflows, discounts, reviews, backend permissions, and integration surfaces.',
                        'Includes US-oriented tax and regional configuration in the public core.',
                        'Private POSMall Pro, CRM, cashflow, affiliate, migration dashboards, and app-wrapper work extend the public core instead of replacing it.',
                    ],
                ],
                [
                    'title' => 'Evidence links',
                    'body' => 'The public assets can be checked directly through October CMS Marketplace, GitHub, and the demo storefront.',
                    'points' => [
                        'Marketplace: https://octobercms.com/plugin/kodzero-posmall',
                        'Source: https://github.com/TjoBiZ/POSMall',
                        'Theme: https://octobercms.com/theme/kodzero-posmalltheme',
                        'Demo: https://wingsofwin.com',
                    ],
                ],
            ],
            'limitations' => [
                'Private business modules are described only at high level on this public site.',
                'Benchmark numbers are internal local synthetic results and should be rerun on the target infrastructure.',
                'Tax configuration helps structure setup work but is not tax/legal advice.',
            ],
            'related' => [
                ['label' => 'US tax automation', 'url' => '/products/posmall/us-tax-automation'],
                ['label' => 'Conversational commerce', 'url' => '/capabilities/conversational-commerce'],
                ['label' => 'Benchmarks', 'url' => '/benchmarks/posmall'],
            ],
        ],
        '/products/posmall/us-tax-automation' => [
            'slug' => 'products/posmall/us-tax-automation',
            'title' => 'POSMall US Tax Automation and Regional Configuration',
            'eyebrow' => 'Public capability · POSMall Core · US tax configuration',
            'summary' => 'US-oriented tax and regional configuration is part of the public POSMall Core, not only a private extension. It helps represent state/local jurisdiction logic, location coverage, and tax preview workflows for growing ecommerce operations.',
            'status' => 'Public POSMall Core capability',
            'updated' => '2026-08-23',
            'image' => '/images/product-systems/posmall-admin-settings-taxes.webp',
            'canonical' => 'https://solarneutrino.com/products/posmall/us-tax-automation',
            'sections' => [
                [
                    'title' => 'Why this matters',
                    'body' => 'Many lightweight storefront plugins stop at a product catalog. POSMall’s public core goes further by including US-oriented tax and regional configuration surfaces that matter when a store expands beyond a single simple locality.',
                    'points' => [
                        'Designed to reduce repetitive regional setup work for operators and accountants.',
                        'Useful for businesses selling across multiple states, counties, local jurisdictions, and service areas.',
                        'Connects tax logic to ecommerce operations instead of leaving it as a disconnected spreadsheet.',
                        'Makes the free/public plugin more serious for small-to-medium businesses with growth plans.',
                    ],
                ],
                [
                    'title' => 'Safe scope',
                    'body' => 'The public claim is intentionally precise: POSMall can help structure and preview tax configuration. It does not replace professional compliance review.',
                    'points' => [
                        'Final tax configuration remains subject to merchant and qualified professional review.',
                        'The system does not determine nexus, file returns, remit taxes, or guarantee legal compliance.',
                        'The business value is reducing repetitive setup, handoff, and reconciliation work.',
                    ],
                ],
            ],
            'limitations' => [
                'No public statement on this page should be read as tax advice.',
                'Exact tax behavior must be reviewed against the business, jurisdiction, source data, and deployment configuration.',
            ],
            'related' => [
                ['label' => 'POSMall public core', 'url' => '/products/posmall'],
                ['label' => 'Product systems landing', 'url' => '/october-laravel-products'],
            ],
        ],
        '/capabilities/conversational-commerce' => [
            'slug' => 'capabilities/conversational-commerce',
            'title' => 'AI Voice and Chat Commerce Architecture',
            'eyebrow' => 'Integration-ready capability · AI agents · ecommerce APIs',
            'summary' => 'The POSMall/Laravel architecture is prepared for controlled voice and chat commerce: product discovery, service quoting, cart/order initiation, tax preview, customer account actions, and human-reviewed operations can be exposed through permissioned APIs.',
            'status' => 'Integration-ready architecture',
            'updated' => '2026-08-23',
            'image' => '/images/product-systems/posmall-admin-api-documentation.webp',
            'canonical' => 'https://solarneutrino.com/capabilities/conversational-commerce',
            'sections' => [
                [
                    'title' => 'What an AI assistant can connect to',
                    'body' => 'The useful idea is not that an LLM replaces the store. The useful idea is that a real store exposes clean commerce actions that a phone assistant, chat assistant, web widget, or support channel can call safely.',
                    'points' => [
                        'Catalog/search and product or service discovery.',
                        'Quote flows and guided service selection.',
                        'Cart/order initiation with permission and confirmation boundaries.',
                        'Tax preview and checkout-adjacent data where enabled.',
                        'Customer account, order tracking, callback, and support workflows.',
                    ],
                ],
                [
                    'title' => 'Boundaries',
                    'body' => 'Autonomous selling needs guardrails. Identity, payment confirmation, fulfillment rules, compliance, and channel adapters remain deployment-specific.',
                    'points' => [
                        'Do not expose payment capture or sensitive account actions without explicit business controls.',
                        'Human confirmation can remain part of the workflow for high-risk actions.',
                        'Voice and chat channels should use the same permissioned API model instead of scraping the storefront.',
                    ],
                ],
            ],
            'limitations' => [
                'This page describes architecture readiness, not a claim that every channel is already deployed for every client.',
                'Voice/chat adapters, identity, compliance, and payment confirmation are configured per implementation.',
            ],
            'related' => [
                ['label' => 'AI agent factory and harness', 'url' => '/engineering/ai-agent-factory-harness'],
                ['label' => 'Alrty live example', 'url' => 'https://alrty.com'],
            ],
        ],
        '/services/ecommerce-postgresql-migration' => [
            'slug' => 'services/ecommerce-postgresql-migration',
            'title' => 'Legacy Ecommerce Migration to PostgreSQL Laravel Architecture',
            'eyebrow' => 'Private service capability · PostgreSQL modernization',
            'summary' => 'Private dashboard and migration tooling can help inventory an older ecommerce stack, map legacy data to PostgreSQL-oriented models, run staged imports, validate results, and move the business toward a modern Laravel/October architecture.',
            'status' => 'Private modernization tooling',
            'updated' => '2026-08-23',
            'image' => '/images/product-systems/alrty-smart-tech-services.webp',
            'canonical' => 'https://solarneutrino.com/services/ecommerce-postgresql-migration',
            'sections' => [
                [
                    'title' => 'Migration flow',
                    'body' => 'The safer promise is a controlled migration workflow, not a one-click miracle. The private dashboard approach is meant to make legacy data visible, mapped, tested, and reconciled.',
                    'points' => [
                        'Inventory legacy catalog, customer, order, service, and operational data.',
                        'Map source fields into PostgreSQL-first Laravel/October models.',
                        'Run staged import and dry-run validation before final cutover.',
                        'Reconcile counts, relationships, and key business records.',
                        'Keep audit evidence and rollback planning part of the process.',
                    ],
                ],
                [
                    'title' => 'Who this is for',
                    'body' => 'This is for businesses that have outgrown brittle builders or old plugin stacks and need ownership, speed, custom workflows, and a database that can support future analytics and automation.',
                    'points' => [
                        'Stores moving from rigid hosted builders.',
                        'Companies leaving fragile WordPress/plugin workflows.',
                        'Service businesses that want ecommerce, CRM, and AI-assisted sales in one architecture.',
                    ],
                ],
            ],
            'limitations' => [
                'Exact migration speed depends on source system quality, schema shape, media size, and business rules.',
                'No claim of zero-downtime, lossless, or one-click migration is made on this public page.',
            ],
            'related' => [
                ['label' => 'POSMall public core', 'url' => '/products/posmall'],
                ['label' => 'Conversational commerce', 'url' => '/capabilities/conversational-commerce'],
            ],
        ],
        '/solutions/ai-operations-dashboard' => [
            'slug' => 'solutions/ai-operations-dashboard',
            'title' => 'Private AI Operations Dashboard Architecture',
            'eyebrow' => 'Private capability · operations control plane · AI-readable state',
            'summary' => 'The private dashboard architecture is designed as an operational control plane for human operators and supervisory AI agents: tasks, owners, dependencies, evidence, documents, validation results, migration state, approvals, and release-readiness gates can be represented as structured state.',
            'status' => 'Private operations architecture',
            'updated' => '2026-08-23',
            'image' => '/images/product-systems/posmall-admin-api-permission-tree.webp',
            'canonical' => 'https://solarneutrino.com/solutions/ai-operations-dashboard',
            'sections' => [
                [
                    'title' => 'Answer first',
                    'body' => 'The dashboard concept is broader than reporting. It is a control plane that helps a person and a supervisory AI agent understand what is happening in a project without depending only on an unstructured chat transcript.',
                    'points' => [
                        'Projects, tasks, owners, priorities, states, retries, blocked work, and escalation paths.',
                        'Human-created tasks and AI-created subtasks with evidence, screenshots, tests, and validation results.',
                        'Document and artifact handoff between specialized agents.',
                        'Release-readiness gates, approval boundaries, audit trail, and rollback evidence.',
                        'Commerce, CRM, customer, order, service-operation, migration, and reconciliation status.',
                    ],
                ],
                [
                    'title' => 'Why this matters',
                    'body' => 'AI becomes more useful when it can inspect structured state. The dashboard is designed to make project progress, risks, evidence, and decisions machine-readable while remaining understandable to a human supervisor.',
                    'points' => [
                        'Reduces reliance on memory and long chat history.',
                        'Makes blocked work and dependencies visible.',
                        'Supports review by advisor agents and technical consultants.',
                        'Keeps sensitive operational details private unless intentionally shared.',
                    ],
                ],
            ],
            'limitations' => [
                'This is a private architecture described publicly at high level.',
                'The public page does not disclose private source code, prompts, credentials, internal URLs, or customer data.',
            ],
            'related' => [
                ['label' => 'AI agent factory and harness', 'url' => '/engineering/ai-agent-factory-harness'],
                ['label' => 'Technical consultant feedback', 'url' => '/engineering/technical-consultant-feedback'],
                ['label' => 'PostgreSQL migration', 'url' => '/services/ecommerce-postgresql-migration'],
            ],
        ],
        '/engineering/ai-agent-factory-harness' => [
            'slug' => 'engineering/ai-agent-factory-harness',
            'title' => 'AI Agent Factory and Validation Harness Engineering Workflow',
            'eyebrow' => 'Engineering process · AI-assisted delivery · human architecture control',
            'summary' => 'The work uses AI-assisted research, specialized advisors, validation harnesses, screenshots, tests, release-readiness checks, and human-owned architecture decisions to move faster without treating AI output as automatically correct.',
            'status' => 'Private engineering workflow',
            'updated' => '2026-08-23',
            'image' => '/images/product-systems/circuit-couriers-support-feedback.webp',
            'canonical' => 'https://solarneutrino.com/engineering/ai-agent-factory-harness',
            'sections' => [
                [
                    'title' => 'How AI is used',
                    'body' => 'AI tools are used as an engineering accelerator: research, implementation assistance, review, documentation, screenshot evidence, testing support, benchmark analysis, and release-readiness reasoning.',
                    'points' => [
                        'Factory-agents workflow coordinates specialized analysis and review.',
                        'Fable/advisor review helps challenge assumptions and improve copy, UX, SEO, and architecture.',
                        'Validation harnesses and tests keep changes evidence-driven.',
                        'Human architecture and release decisions remain the controlling authority.',
                    ],
                ],
                [
                    'title' => 'What this does not mean',
                    'body' => 'The agent factory is an internal engineering capability, not a public customer dependency and not proof that every generated line is correct by itself.',
                    'points' => [
                        'AI assistance is paired with tests, reviews, screenshots, and deployment checks.',
                        'Sensitive client code or secrets should not be exposed to external AI providers without policy approval.',
                    ],
                ],
            ],
            'limitations' => [
                'This public page describes the engineering workflow at a high level and does not disclose private prompts, credentials, source code, or deployment details.',
            ],
            'related' => [
                ['label' => 'Conversational commerce', 'url' => '/capabilities/conversational-commerce'],
                ['label' => 'Benchmarks', 'url' => '/benchmarks/posmall'],
            ],
        ],
        '/engineering/technical-consultant-feedback' => [
            'slug' => 'engineering/technical-consultant-feedback',
            'title' => 'Technical Consultant Feedback Layer for AI-Assisted Engineering',
            'eyebrow' => 'Engineering governance · smallest safe solution · duplicate detection',
            'summary' => 'The technical consultant concept checks whether a requested task is the right technical solution before more code is written. It can detect duplicates, challenge assumptions, propose a simpler path, and return important decisions to a human owner.',
            'status' => 'Private advisor pattern',
            'updated' => '2026-08-23',
            'image' => '/images/product-systems/posmall-admin-api-documentation.webp',
            'canonical' => 'https://solarneutrino.com/engineering/technical-consultant-feedback',
            'sections' => [
                [
                    'title' => 'What the consultant layer does',
                    'body' => 'The goal is not to generate the largest amount of code. The goal is to reach the correct business result with the smallest safe and maintainable implementation.',
                    'points' => [
                        'Identify incorrect technical assumptions before implementation expands.',
                        'Detect when a task duplicates an existing capability.',
                        'Recommend a configuration change or reuse path instead of a new subsystem.',
                        'Explain conflicts with the current architecture.',
                        'Route high-impact choices back to a human for approval.',
                    ],
                ],
                [
                    'title' => 'How it supports Catalog First',
                    'body' => 'The consultant layer pairs naturally with a knowledge base: find existing assets, understand dependencies, compare alternatives, and only build new logic when reuse or extension is not enough.',
                    'points' => [
                        'Prevents duplicated plugin logic.',
                        'Preserves existing features and workflows.',
                        'Turns reviewer feedback into explicit implementation constraints.',
                    ],
                ],
            ],
            'limitations' => [
                'This page describes an engineering pattern and private workflow, not a public SaaS product claim.',
                'AI recommendations still require human architecture control, testing, and source review.',
            ],
            'related' => [
                ['label' => 'AI operations dashboard', 'url' => '/solutions/ai-operations-dashboard'],
                ['label' => 'AI agent factory and harness', 'url' => '/engineering/ai-agent-factory-harness'],
            ],
        ],
        '/solutions/field-service-commerce' => [
            'slug' => 'solutions/field-service-commerce',
            'title' => 'Field-Service Commerce and Contractor Workflow Architecture',
            'eyebrow' => 'Service commerce · scheduling · technician operations',
            'summary' => 'The commerce architecture is informed by real service-business workflow patterns: technician assignment, work orders, scheduling, service areas, customer approval, evidence, completion reports, quality control, payouts, disputes, warranty, and revisits.',
            'status' => 'Private service-commerce architecture',
            'updated' => '2026-08-23',
            'image' => '/images/product-systems/alrty-smart-tech-services.webp',
            'canonical' => 'https://solarneutrino.com/solutions/field-service-commerce',
            'sections' => [
                [
                    'title' => 'Why service commerce is different',
                    'body' => 'A service order does not end at checkout. It has to be scheduled, performed, documented, verified, supported, and financially reconciled.',
                    'points' => [
                        'Technician assignment, availability, dispatch, and service-area logic.',
                        'Customer approval, change orders, before-and-after evidence, and completion reports.',
                        'Quality-control workflows, payouts, disputes, warranty, and revisit handling.',
                        'Service catalogs connected to products, quotes, orders, CRM, and support.',
                    ],
                ],
                [
                    'title' => 'Alrty reference',
                    'body' => 'Alrty.com is used as a public service-commerce reference implementation for smart-tech services, account actions, favorites, order tracking, callbacks, and service-oriented conversion surfaces.',
                    'points' => [
                        'Live reference: https://alrty.com',
                        'The public screenshot proves service-commerce UX direction, not a claim that every private workflow is exposed publicly.',
                    ],
                ],
            ],
            'limitations' => [
                'This page describes high-level field-service workflow architecture and does not imply affiliation with any named third-party platform.',
                'Exact technician, payout, compliance, and dispatch rules are project-specific.',
            ],
            'related' => [
                ['label' => 'Conversational commerce', 'url' => '/capabilities/conversational-commerce'],
                ['label' => 'Alrty live example', 'url' => 'https://alrty.com'],
            ],
        ],
        '/products/multilingual-game-architecture' => [
            'slug' => 'products/multilingual-game-architecture',
            'title' => 'Reusable Multi-Language Game and Cross-Platform App Architecture',
            'eyebrow' => 'Private product-family architecture · web · mobile · desktop',
            'summary' => 'The private game and app architecture is designed around a shared product core: reusable mechanics, screen templates, language-specific content packages, localization workflows, backend accounts, progress sync, purchases, restore flows, and web/native wrapper delivery.',
            'status' => 'Advanced private architecture',
            'updated' => '2026-08-23',
            'image' => '/images/product-systems/circuit-couriers-core-route-active.webp',
            'canonical' => 'https://solarneutrino.com/products/multilingual-game-architecture',
            'sections' => [
                [
                    'title' => 'Reusable product-family model',
                    'body' => 'The goal is not to rebuild a separate app for every language or store channel. The architecture is designed so individual language-learning games can share backend services, account patterns, validation rules, content workflows, and cross-platform delivery infrastructure.',
                    'points' => [
                        'Shared game mechanics and reusable interaction templates.',
                        'Language-specific content packages, localization, and translation workflows.',
                        'Account, progress, challenge, synchronization, entitlement, purchase, subscription, and restore patterns.',
                        'Laravel/October backend services connected to web, iOS, Android, macOS, and Windows wrappers.',
                        'AI-assisted generation and validation of content can be used where quality gates allow it.',
                    ],
                ],
                [
                    'title' => 'Safe status wording',
                    'body' => 'This is an advanced architecture and product-family capability. It is not a public claim that every language edition and every store channel has completed release.',
                    'points' => [
                        'Store publishing depends on the product, account, compliance, assets, and review status.',
                        'Each language edition should pass its own content, UX, localization, and store-readiness checks.',
                    ],
                ],
            ],
            'limitations' => [
                'Private architecture only; this page does not disclose source code, store credentials, private content, or release artifacts.',
                'The public claim is reusable architecture and readiness patterns, not universal completed release.',
            ],
            'related' => [
                ['label' => 'AI agent factory and harness', 'url' => '/engineering/ai-agent-factory-harness'],
                ['label' => 'Main product systems page', 'url' => '/october-laravel-products'],
            ],
        ],
        '/benchmarks/posmall' => [
            'slug' => 'benchmarks/posmall',
            'title' => 'POSMall PostgreSQL Benchmark Summary',
            'eyebrow' => 'Benchmark summary · POSMall PostgreSQL · Aimeos PostgreSQL target',
            'summary' => 'POSMall has internal Homestead benchmark evidence showing POSMall PostgreSQL beating the Aimeos PostgreSQL target across the measured 1k–300k category and filtered/search rows. The detailed table and reproduction notes are published on the dedicated benchmark page.',
            'status' => 'Internal Homestead PostgreSQL benchmark summary',
            'updated' => '2026-08-23',
            'image' => '/images/product-systems/posmall-admin-products-menu.webp',
            'canonical' => 'https://solarneutrino.com/benchmarks/posmall',
            'sections' => [
                [
                    'title' => 'Answer first',
                    'body' => 'The final documented comparison was POSMall PostgreSQL against Aimeos PostgreSQL in the same local Homestead benchmark environment. Aimeos PostgreSQL was selected because it was the fastest Laravel/PHP ecommerce target found and verified during the reference research, so the useful question was whether POSMall could catch and beat that PostgreSQL target.',
                    'points' => [
                        'Final checkpoint: posmall-aimeos-5way-current-checkpoint-20260610-024820.',
                        'Measured sizes: 1k, 5k, 10k, 50k, 100k, 200k, and 300k products.',
                        'POSMall PostgreSQL won every measured PostgreSQL target row in the final table: category and filtered/search.',
                        'At 300k, POSMall category was 33.49 ms versus Aimeos PostgreSQL category at 61.17 ms.',
                        'At 300k, POSMall filtered/search-like response was 33.79 ms versus Aimeos PostgreSQL search at 4229.29 ms.',
                    ],
                ],
                [
                    'title' => 'Reproduce instead of trusting marketing',
                    'body' => 'The public POSMall core can be installed locally with PostgreSQL, and the benchmark/test tooling can be run in a controlled environment. The honest way to evaluate the claim is to place POSMall PostgreSQL and Aimeos PostgreSQL on the same machine, seed the same benchmark sizes, warm the same type of requests, and compare raw averages, p95 latency, failures, and methodology notes.',
                    'points' => [
                        'Use one local machine or VM for both systems.',
                        'Use PostgreSQL for both stores.',
                        'Run the POSMall PostgreSQL benchmark tests and load-benchmark commands included with the core.',
                        'Keep raw files and methodology notes so the comparison remains auditable.',
                    ],
                ],
            ],
            'limitations' => [
                'Not independently certified.',
                'Internal Homestead synthetic benchmark evidence, not a universal production SLA.',
                'Target infrastructure, concurrency, PHP/FPM settings, cache profile, data shape, and page design can change results.',
                'The precise claim is POSMall PostgreSQL beat the Aimeos PostgreSQL target across the final measured 1k–300k rows, not that every possible ecommerce workload is faster everywhere.',
            ],
            'related' => [
                ['label' => 'Detailed PostgreSQL vs PostgreSQL table', 'url' => '/benchmarks/posmall-postgresql-vs-aimeos-postgresql'],
                ['label' => 'POSMall public core', 'url' => '/products/posmall'],
                ['label' => 'US tax automation', 'url' => '/products/posmall/us-tax-automation'],
            ],
        ],
        '/benchmarks/posmall-postgresql-vs-aimeos-postgresql' => [
            'slug' => 'benchmarks/posmall-postgresql-vs-aimeos-postgresql',
            'title' => 'POSMall PostgreSQL vs Aimeos PostgreSQL Benchmark',
            'eyebrow' => 'Benchmark proof · same Homestead environment · PostgreSQL vs PostgreSQL',
            'summary' => 'Final Homestead benchmark evidence from June 2026: POSMall PostgreSQL beat the Aimeos PostgreSQL target across all measured 1k–300k category and filtered/search rows. Public competitor figures were checked; stronger comparable PostgreSQL-only evidence was not found, so this is the scoped #1 technical positioning we can defend.',
            'status' => 'Final internal Homestead benchmark checkpoint',
            'updated' => '2026-08-23',
            'image' => '/images/product-systems/posmall-admin-products-menu.webp',
            'canonical' => 'https://solarneutrino.com/benchmarks/posmall-postgresql-vs-aimeos-postgresql',
            'sections' => [
                [
                    'title' => 'Why Aimeos PostgreSQL was the target',
                    'body' => 'The benchmark did not compare POSMall against an intentionally weak system. Aimeos PostgreSQL was selected because, during Laravel/PHP ecommerce research and local verification, it was the fastest serious PostgreSQL target found. The goal was to make POSMall PostgreSQL competitive against that strongest reference, then keep optimizing until the measured PostgreSQL rows were won.',
                    'points' => [
                        'Aimeos was used as a performance reference and capability checklist only; no Aimeos implementation code was copied.',
                        'The final target comparison was PostgreSQL against PostgreSQL, on one local Homestead benchmark environment.',
                        'Both systems were measured with synthetic large-catalog rows from 1k to 300k products.',
                        'The final report stopped after POSMall PostgreSQL won every measured PostgreSQL target row in the table.',
                    ],
                ],
                [
                    'title' => 'World #1 positioning: measured milliseconds, not SEO reputation',
                    'body' => 'The claim is intentionally technical and scoped. POSMall Core is presented as the leading PostgreSQL-first October CMS/Laravel commerce core in the measured 1k–300k catalog benchmark class because the final table contains reproducible row-by-row numbers. We looked for public competitor figures. Some public numbers exist, but stronger comparable PostgreSQL-only numbers in this same measured class were not found. Search rankings, brand reputation, broad enterprise copy, and unpublished performance claims are not counted as technical victories.',
                    'points' => [
                        'Aimeos was selected because it publicly positions itself around high-speed large-catalog commerce, including 20 ms / billion-item messaging and a #gigacommerce path that uses ElasticSearch.',
                        'Bagisto publishes 10 million product response times, but its published explanation relies on standard indexing, dedicated search, queues, and memory-based caching, so it is useful context rather than a PostgreSQL-only same-environment comparison.',
                        'Sylius and similar enterprise-oriented frameworks may be strong implementation platforms, but no comparable public PostgreSQL-only 100k–300k timing table was found in this review.',
                        'Frameworks without comparable public PostgreSQL-only timing tables are not placed into the winner table merely because they are known, popular, SEO-visible, or enterprise-oriented.',
                        'If another project publishes comparable raw numbers for the same database class and catalog sizes, the correct response is to rerun the benchmark and update the evidence.',
                        'Until then, SEO visibility without comparable milliseconds is positioning, not benchmark proof, and POSMall’s #1 wording is tied to the strongest reproducible PostgreSQL benchmark evidence available in this measured class.',
                    ],
                ],
                [
                    'title' => 'What was proven',
                    'body' => 'The final checkpoint shows that POSMall stayed near 32–36 ms across the measured 1k–300k public hot category and filtered/search rows, while Aimeos PostgreSQL remained slower on the corresponding target rows. At 300k, POSMall category was 33.49 ms versus Aimeos PostgreSQL category at 61.17 ms.',
                    'points' => [
                        'Final proof identifier: posmall-aimeos-5way-current-checkpoint-20260610-024820.',
                        'POSMall runtime in the final report: PHP 8.2.31, October CMS 4, Laravel 12.61.1, PostgreSQL.',
                        'POSMall HTTP rows: fresh-server production-like run, 30 requests per row after 10 warmups.',
                        'The 10k outlier from the first run was replaced with a clean one-size rerun before the final table was recorded.',
                    ],
                ],
            ],
            'benchmark_table' => [
                'title' => 'Final PostgreSQL-vs-PostgreSQL result table',
                'intro' => 'Lower milliseconds are better. Every row below is a POSMall PostgreSQL win against the Aimeos PostgreSQL target for the measured category and filtered/search comparison.',
                'caption' => 'Internal Homestead synthetic benchmark, June 2026. Final checkpoint: 20260610-024820.',
                'columns' => [
                    'Catalog size',
                    'POSMall PG category',
                    'Aimeos PG category',
                    'POSMall PG filtered/search',
                    'Aimeos PG search',
                    'Winner',
                ],
                'rows' => [
                    ['1k', '35.40 ms', '42.85 ms', '33.64 ms', '184.84 ms', 'POSMall PG won both rows'],
                    ['5k', '35.59 ms', '42.25 ms', '33.12 ms', '454.08 ms', 'POSMall PG won both rows'],
                    ['10k', '33.48 ms', '42.73 ms', '32.61 ms', '754.77 ms', 'POSMall PG won both rows'],
                    ['50k', '33.35 ms', '64.05 ms', '31.87 ms', '1494.33 ms', 'POSMall PG won both rows'],
                    ['100k', '34.22 ms', '51.76 ms', '33.32 ms', '3010.45 ms', 'POSMall PG won both rows'],
                    ['200k', '33.82 ms', '55.41 ms', '32.24 ms', '4036.45 ms', 'POSMall PG won both rows'],
                    ['300k', '33.49 ms', '61.17 ms', '33.79 ms', '4229.29 ms', 'POSMall PG won both rows'],
                ],
            ],
            'instructions' => [
                'title' => 'How to reproduce the benchmark fairly',
                'intro' => 'The important rule is one environment: install both stores on the same local machine or VM, use PostgreSQL for both, seed the same catalog sizes, and keep raw timing files. Do not compare one project on a warmed local VM against another project on different hosting.',
                'steps' => [
                    'Install PostgreSQL locally or in a local VM/container, then create separate databases for POSMall and Aimeos so each store has its own clean schema while sharing the same hardware.',
                    'Install the free/public POSMall Core for October CMS and configure it to use PostgreSQL. The public core includes PostgreSQL-focused tests and benchmark tooling for the catalog/read-model paths.',
                    'Install Aimeos in a separate Laravel project configured against PostgreSQL. Use it as the fastest target reference, not as code to copy.',
                    'Seed both systems with matching benchmark sizes: 1k, 5k, 10k, 50k, 100k, 200k, and 300k products. Keep seed logs and database counts.',
                    'Warm each measured path consistently before recording timings. In the final POSMall run, each row used 30 requests after 10 warmups.',
                    'Run POSMall’s PostgreSQL benchmark checks and load-benchmark tooling, for example the POSMall PostgreSQL/load benchmark tests plus the POSMall load-benchmark command for each target size.',
                    'Run the matching Aimeos PostgreSQL category/search paths with the same HTTP timing tool and record mean, p95, status codes, failure count, and response size.',
                    'Publish the table only with environment notes, raw proof identifiers, and caveats. A benchmark without the same hardware, same database family, same warmup rules, and raw evidence is not a fair comparison.',
                ],
            ],
            'limitations' => [
                'These are internal Homestead synthetic benchmark numbers from June 2026, not an independently certified industry benchmark.',
                'The claim is deliberately narrow: POSMall PostgreSQL beat Aimeos PostgreSQL across the final measured category and filtered/search rows from 1k to 300k products.',
                'World #1 wording is scoped to the measured PostgreSQL-first benchmark class and the comparable public evidence found, not to every ecommerce workload, every hosting setup, every SEO ranking, or every possible feature category.',
                'Different hardware, concurrency, PHP/FPM settings, HTTP server, cache profile, data shape, theme markup, media handling, or business rules can change results.',
                'Aimeos was used only as a public reference target and capability benchmark; POSMall remained an independent PostgreSQL-first October CMS/Laravel implementation.',
            ],
            'related' => [
                ['label' => 'POSMall benchmark summary', 'url' => '/benchmarks/posmall'],
                ['label' => 'POSMall public core', 'url' => '/products/posmall'],
                ['label' => 'October CMS Marketplace listing', 'url' => 'https://octobercms.com/plugin/kodzero-posmall'],
                ['label' => 'POSMall public source', 'url' => 'https://github.com/TjoBiZ/POSMall'],
                ['label' => 'Aimeos public Laravel performance claims', 'url' => 'https://aimeos.org/laravel-ecommerce-package'],
                ['label' => 'Bagisto public 10M product benchmark context', 'url' => 'https://bagisto.com/en/scaling-bagisto-for-10-million-products/'],
            ],
        ],
    ];

    foreach ($productKnowledgePages as $path => $page) {
        Route::get($path, function () use ($page) {
            return view('product-system-brief', ['page' => $page]);
        })->name('product-knowledge.' . str_replace(['/', '-'], ['.', '_'], trim($path, '/')));
    }

    Route::get('/video', function () {
        return view('video');
    });

    Route::post('/contact-form', function (Request $request) {
        return app(ContactFormController::class)->sendMessage($request);
    });
});

// Группа маршрутов для админских поддоменов solarneutrino.com
Route::domain('admin.solarneutrino.com')->group(function () {
    Route::get('/robots.txt', function () {
        return response("User-agent: *\nDisallow: /\n", 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    });

    Route::get('/laravel', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/contact-messages', [ContactMessageController::class, 'index'])->middleware(['auth', 'verified', RoleMiddleware::class . ':superadmin'])->name('contact-messages');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
});

Route::middleware('auth')->get('/get-token', [TokenController::class, 'getTokenForAuthenticatedUser'])->name('get-token');
