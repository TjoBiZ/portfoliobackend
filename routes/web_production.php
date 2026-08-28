<?php

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\ProfileController;
use App\Support\PublicMarkdownRenderer;
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

    Route::get('/products', function () {
        return view('products');
    })->name('products');

    Route::redirect('/october-cms-laravel-products', '/october-laravel-products', 301);

    $publicMarkdownPages = [
        '/knowledge/posmall-complete-technical-dossier' => [
            'markdown' => 'knowledge/posmall-complete-technical-dossier.md',
            'markdown_url' => 'https://solarneutrino.com/knowledge/posmall-complete-technical-dossier.md',
            'canonical' => 'https://solarneutrino.com/knowledge/posmall-complete-technical-dossier',
            'updated' => '2026-08-28',
        ],
        '/knowledge/posmall-capability-catalog' => [
            'markdown' => 'knowledge/posmall-capability-catalog.md',
            'markdown_url' => 'https://solarneutrino.com/knowledge/posmall-capability-catalog.md',
            'canonical' => 'https://solarneutrino.com/knowledge/posmall-capability-catalog',
            'updated' => '2026-08-28',
        ],
        '/knowledge/posmall-cross-platform-and-p2p-architecture' => [
            'markdown' => 'knowledge/posmall-cross-platform-and-p2p-architecture.md',
            'markdown_url' => 'https://solarneutrino.com/knowledge/posmall-cross-platform-and-p2p-architecture.md',
            'canonical' => 'https://solarneutrino.com/knowledge/posmall-cross-platform-and-p2p-architecture',
            'updated' => '2026-08-28',
        ],
    ];

    foreach ($publicMarkdownPages as $path => $page) {
        Route::get($path, function (PublicMarkdownRenderer $renderer) use ($page) {
            $markdownPath = public_path($page['markdown']);

            abort_unless(is_file($markdownPath), 404);

            $document = $renderer->render($markdownPath);

            return response()
                ->view('knowledge-document', [
                    'page' => $page,
                    'document' => $document,
                ])
                ->header('Link', '<' . $page['markdown_url'] . '>; rel="alternate"; type="text/markdown"');
        });
    }

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
                        'Private POSMall Pro, CRM, cashflow, affiliate, migration dashboards, and cross-platform application work extend the public core instead of replacing it.',
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
            'summary' => 'The private game and app architecture is designed around a shared product core: reusable mechanics, screen templates, language-specific content packages, localization workflows, backend accounts, progress sync, purchases, restore flows, and browser/mobile/desktop client delivery.',
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
                        'Laravel/October backend services connected to web, iOS, Android, macOS, and Windows application clients.',
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
                ['label' => 'Complete POSMall technical dossier', 'url' => '/knowledge/posmall-complete-technical-dossier'],
                ['label' => 'Detailed PostgreSQL vs PostgreSQL table', 'url' => '/benchmarks/posmall-postgresql-vs-aimeos-postgresql'],
                ['label' => 'Benchmark JSON', 'url' => '/knowledge/posmall-vs-aimeos-postgresql.json'],
                ['label' => 'Benchmark CSV', 'url' => '/knowledge/posmall-vs-aimeos-postgresql.csv'],
                ['label' => 'POSMall public core', 'url' => '/products/posmall'],
                ['label' => 'US tax automation', 'url' => '/products/posmall/us-tax-automation'],
            ],
        ],
        '/benchmarks/posmall-postgresql-vs-aimeos-postgresql' => [
            'slug' => 'benchmarks/posmall-postgresql-vs-aimeos-postgresql',
            'title' => 'POSMall Core PostgreSQL vs Aimeos PostgreSQL Benchmark',
            'eyebrow' => 'Measured benchmark · PostgreSQL vs PostgreSQL · POSMall Core',
            'summary' => 'POSMall Core beat the selected Aimeos PostgreSQL reference in both measured paths at all seven catalog sizes from 1,000 through 300,000 products. The table below is the primary public evidence.',
            'status' => 'Final internal Homestead benchmark checkpoint',
            'updated' => '2026-08-28',
            'image' => '/images/product-systems/posmall-admin-products-menu.webp',
            'hide_image' => true,
            'canonical' => 'https://solarneutrino.com/benchmarks/posmall-postgresql-vs-aimeos-postgresql',
            'sections' => [],
            'benchmark_data_file' => 'knowledge/posmall-vs-aimeos-postgresql.json',
            'benchmark_table' => [
                'title' => 'Final PostgreSQL-vs-PostgreSQL result table',
                'intro' => 'Lower milliseconds are better. POSMall Core won 7 of 7 catalog sizes and 14 of 14 measured path comparisons in this same-environment internal synthetic benchmark.',
                'caption' => 'Internal Homestead synthetic benchmark. Final checkpoint: posmall-aimeos-5way-current-checkpoint-20260610-024820.',
                'columns' => [
                    'Catalog size',
                    'POSMall Core PG category',
                    'Aimeos PG category',
                    'POSMall Core PG filtered/search',
                    'Aimeos PG search',
                    'Result',
                ],
                'after' => '<p>At 300,000 products, POSMall Core filtered/search measured 33.79 ms and Aimeos PostgreSQL search measured 4,229.29 ms. Aimeos took approximately 125.16× as long. POSMall measured response time was approximately 99.20% lower in this measured comparison.</p>',
            ],
            'instructions' => [
                'title' => 'Reproduction, methodology, and source-verified tooling',
                'intro' => 'The important rule is one environment: install both stores on the same local machine or VM, use PostgreSQL for both, seed comparable catalog sizes, warm requests consistently, validate status codes, and keep raw timing files.',
                'steps' => [
                    'Create separate clean PostgreSQL databases for POSMall Core and Aimeos PostgreSQL while keeping the same CPU, memory, VM, PHP runtime, and HTTP timing method.',
                    'Install POSMall Core and POSMall Theme in October CMS with: composer require kodzero/posmall-plugin kodzero/posmalltheme-theme -W; then run php artisan october:migrate and clear Laravel/October caches.',
                    'Use the POSMall demo catalog only for visual/storefront smoke tests: php artisan posmall:seed-wings-of-win --force. This is not the large-catalog benchmark generator.',
                    'Use the source-verified large-catalog command for benchmark data: php artisan posmall:load-benchmark 1000 --iterations=10 --force, replacing 1000 with 5000, 10000, 50000, 100000, 200000, or 300000 as needed.',
                    'For image-enabled storefront preparation, the public source exposes php artisan posmall:index --force, php artisan posmall:images:optimize-catalog --profile=all, and php artisan posmall:pagespeed:optimize-assets.',
                    'The backend UI path is POSMall Tests → Catalog load. Source-verified buttons include Rebuild optimized image cache, Rebuild PageSpeed assets, Generate 10,000 and benchmark, Generate 100,000 and benchmark, and Purge load data.',
                    'The POSMall load-benchmark and purge operations are destructive for synthetic benchmark rows and are guarded for local/dev/testing environments. Do not run them against production or real customer data.',
                    'Install Aimeos in a separate PostgreSQL-backed Laravel project, retain its exact version metadata, seed comparable catalog sizes, warm corresponding category/search paths, and record mean, median/p95 when available, status codes, failures, and response sizes.',
                    'Publish or compare results only with environment notes, raw proof identifiers, and caveats. A benchmark without the same hardware, database family, warmup rules, measured request count, and raw evidence is not a fair comparison.',
                ],
            ],
            'limitations' => [
                'This is an internal same-environment synthetic benchmark, not an independently certified industry benchmark.',
                'The claim is deliberately narrow: POSMall Core PostgreSQL beat the selected Aimeos PostgreSQL reference across the final measured category and filtered/search rows from 1,000 to 300,000 products.',
                'Performance leadership is established through reproducible measurements under equivalent conditions, not through marketing descriptions. Without comparable numbers, there is no comparable benchmark evidence.',
                'Different hardware, concurrency, PHP/FPM settings, HTTP server, cache profile, data shape, theme markup, media handling, or business rules can change results.',
                'Aimeos was used only as a public reference target and capability benchmark; POSMall remained an independent PostgreSQL-first October CMS/Laravel implementation.',
                'A controlled Aimeos PostgreSQL-versus-Aimeos MySQL result with exact versions, warmups, request count, and raw evidence identifier was not located in this public-evidence pass.',
            ],
            'related' => [
                ['label' => 'Download benchmark JSON', 'url' => '/knowledge/posmall-vs-aimeos-postgresql.json'],
                ['label' => 'Download benchmark CSV', 'url' => '/knowledge/posmall-vs-aimeos-postgresql.csv'],
                ['label' => 'Complete POSMall technical dossier', 'url' => '/knowledge/posmall-complete-technical-dossier'],
                ['label' => 'Markdown technical dossier', 'url' => '/knowledge/posmall-complete-technical-dossier.md'],
                ['label' => 'POSMall benchmark summary', 'url' => '/benchmarks/posmall'],
                ['label' => 'POSMall public core', 'url' => '/products/posmall'],
                ['label' => 'October CMS Marketplace listing', 'url' => 'https://octobercms.com/plugin/kodzero-posmall'],
                ['label' => 'POSMall public source', 'url' => 'https://github.com/TjoBiZ/POSMall'],
                ['label' => 'Aimeos public Laravel performance claims', 'url' => 'https://aimeos.org/laravel-ecommerce-package'],
            ],
            'dataset_schema' => [
                '@context' => 'https://schema.org',
                '@graph' => [
                    [
                        '@type' => 'BreadcrumbList',
                        'itemListElement' => [
                            [
                                '@type' => 'ListItem',
                                'position' => 1,
                                'name' => 'Solar Neutrino',
                                'item' => 'https://solarneutrino.com/',
                            ],
                            [
                                '@type' => 'ListItem',
                                'position' => 2,
                                'name' => 'October CMS and Laravel Products',
                                'item' => 'https://solarneutrino.com/october-laravel-products',
                            ],
                            [
                                '@type' => 'ListItem',
                                'position' => 3,
                                'name' => 'POSMall Core PostgreSQL vs Aimeos PostgreSQL Benchmark',
                                'item' => 'https://solarneutrino.com/benchmarks/posmall-postgresql-vs-aimeos-postgresql',
                            ],
                        ],
                    ],
                    [
                        '@type' => 'Dataset',
                        'name' => 'POSMall Core PostgreSQL vs Aimeos PostgreSQL Benchmark',
                        'description' => 'Internal same-environment synthetic PostgreSQL benchmark comparing POSMall Core category and filtered/search paths against selected Aimeos PostgreSQL category and search paths from 1,000 through 300,000 products.',
                        'creator' => [
                            '@type' => 'Person',
                            'name' => 'Roman Primerov',
                            'url' => 'https://solarneutrino.com/',
                        ],
                        'dateCreated' => '2026-06-10',
                        'dateModified' => '2026-08-28',
                        'measurementTechnique' => 'HTTP timing in one local Homestead environment, PostgreSQL vs PostgreSQL, 10 POSMall warmup requests followed by 30 measured requests per row.',
                        'variableMeasured' => [
                            'catalog size',
                            'POSMall Core PostgreSQL category response time',
                            'Aimeos PostgreSQL category response time',
                            'POSMall Core PostgreSQL filtered/search response time',
                            'Aimeos PostgreSQL search response time',
                        ],
                        'keywords' => [
                            'POSMall Core',
                            'Aimeos PostgreSQL',
                            'Laravel ecommerce benchmark',
                            'October CMS ecommerce benchmark',
                            'PostgreSQL ecommerce',
                        ],
                        'identifier' => 'posmall-aimeos-5way-current-checkpoint-20260610-024820',
                        'url' => 'https://solarneutrino.com/benchmarks/posmall-postgresql-vs-aimeos-postgresql',
                        'isAccessibleForFree' => true,
                        'distribution' => [
                            [
                                '@type' => 'DataDownload',
                                'encodingFormat' => 'application/json',
                                'contentUrl' => 'https://solarneutrino.com/knowledge/posmall-vs-aimeos-postgresql.json',
                            ],
                            [
                                '@type' => 'DataDownload',
                                'encodingFormat' => 'text/csv',
                                'contentUrl' => 'https://solarneutrino.com/knowledge/posmall-vs-aimeos-postgresql.csv',
                            ],
                        ],
                        'sameAs' => [
                            'https://github.com/TjoBiZ/POSMall',
                        ],
                    ],
                    [
                        '@type' => 'SoftwareSourceCode',
                        'name' => 'POSMall Core',
                        'codeRepository' => 'https://github.com/TjoBiZ/POSMall',
                        'programmingLanguage' => 'PHP',
                        'runtimePlatform' => 'Laravel / October CMS',
                    ],
                ],
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
