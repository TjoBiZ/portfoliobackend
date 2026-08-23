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
            'updated' => '2026-08-22',
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
            'updated' => '2026-08-22',
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
            'updated' => '2026-08-22',
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
            'updated' => '2026-08-22',
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
        '/engineering/ai-agent-factory-harness' => [
            'slug' => 'engineering/ai-agent-factory-harness',
            'title' => 'AI Agent Factory and Validation Harness Engineering Workflow',
            'eyebrow' => 'Engineering process · AI-assisted delivery · human architecture control',
            'summary' => 'The work uses AI-assisted research, specialized advisors, validation harnesses, screenshots, tests, release-readiness checks, and human-owned architecture decisions to move faster without treating AI output as automatically correct.',
            'status' => 'Private engineering workflow',
            'updated' => '2026-08-22',
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
        '/benchmarks/posmall' => [
            'slug' => 'benchmarks/posmall',
            'title' => 'POSMall Internal Benchmark Summary',
            'eyebrow' => 'Benchmark page · June 2026 · local synthetic results',
            'summary' => 'POSMall has internal local synthetic benchmark evidence for large PostgreSQL catalogs. The numbers are useful engineering evidence, not independent certification or a universal performance guarantee.',
            'status' => 'Internal local synthetic benchmark summary',
            'updated' => '2026-08-22',
            'image' => '/images/product-systems/posmall-admin-products-menu.webp',
            'canonical' => 'https://solarneutrino.com/benchmarks/posmall',
            'sections' => [
                [
                    'title' => 'Published summary',
                    'body' => 'The current public summary is intentionally caveated so it can be cited without overstating the result.',
                    'points' => [
                        'POSMall 300k category, PostgreSQL, warmed anonymous storefront cache: mean 72.91 ms, p50 64 ms, p95 155 ms, 0/60 failed.',
                        'POSMall 300k filtered/search-like route: mean 70.78 ms, p50 65 ms, p95 159 ms, 0/60 failed.',
                        'POSMall vs old October Mall-style baseline at 300k: about 94% faster in the current measured category and filtered rows.',
                        'POSMall vs Aimeos PostgreSQL filtered/search-like path at 300k: about 98% faster in the measured filtered/search-like row.',
                        'CRM operational benchmark: 13,479 contacts, 13,691 deals, dashboard snapshot avg 2.85 ms, pipeline board avg 24.25 ms.',
                    ],
                ],
                [
                    'title' => 'Important caveat',
                    'body' => 'The numbers are internal local synthetic results from June 2026. Versions, hardware, cache profile, data shape, concurrency, and infrastructure matter.',
                    'points' => [
                        'Re-run benchmarks on the target infrastructure before procurement decisions.',
                        'Aimeos PostgreSQL remained faster on a simple category/list HTTP path in the same local comparison.',
                        'POSMall’s strongest measured advantage was flexible PostgreSQL-first filtered/search-like commerce under large catalog conditions.',
                    ],
                ],
            ],
            'limitations' => [
                'Not independently certified.',
                'Not a universal claim that POSMall is faster in every workload.',
                'A fuller methodology page can be published later if the benchmark becomes part of a customer or investor packet.',
            ],
            'related' => [
                ['label' => 'POSMall public core', 'url' => '/products/posmall'],
                ['label' => 'US tax automation', 'url' => '/products/posmall/us-tax-automation'],
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
