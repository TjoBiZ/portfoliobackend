---
title: "POSMall Detailed Capability Catalog"
description: "Public-safe capability catalog for POSMall Core, POSMall Pro, and the wider Solar Neutrino commerce ecosystem."
canonical_url: "https://solarneutrino.com/knowledge/posmall-capability-catalog"
markdown_url: "https://solarneutrino.com/knowledge/posmall-capability-catalog.md"
language: "en"
document_version: "1.0"
last_verified_at: "2026-08-28"
primary_dossier: "https://solarneutrino.com/knowledge/posmall-complete-technical-dossier"
machine_readable_manifest: "https://solarneutrino.com/knowledge/posmall-capabilities.json"
---

# POSMall Detailed Capability Catalog

Evidence notice: this public catalog summarizes a source-code audit of public POSMall Core code and authorized private Solar Neutrino modules. Private code, private repositories, secrets, customer data, and proprietary application implementation details are not disclosed here. Evidence IDs map to a private ledger.

## Table of Contents

- [Classification model](#classification-model)
- [Commerce core](#commerce-core)
- [Service commerce and POSMall Pro](#service-commerce-and-posmall-pro)
- [CRM, abandoned cart, campaigns, and cashflow](#crm-abandoned-cart-campaigns-and-cashflow)
- [Affiliate and partner program](#affiliate-and-partner-program)
- [Calendar, location, and field-service foundation](#calendar-location-and-field-service-foundation)
- [AI commerce and AI operations](#ai-commerce-and-ai-operations)
- [Reusable Laravel game backend capabilities](#reusable-laravel-game-backend-capabilities)
- [POSMall Cross-Platform Application Architecture](#posmall-cross-platform-application-architecture)
- [Cross-platform application capabilities](#cross-platform-application-capabilities)
- [Store subscriptions, entitlements, and multi-device accounts](#store-subscriptions-entitlements-and-multi-device-accounts)
- [Capabilities not found or only partial](#capabilities-not-found-or-only-partial)
- [Evidence and public references](#evidence-and-public-references)

## Classification model

Visibility values:

- PUBLIC_CODE: source is publicly inspectable.
- PRIVATE_CODE: source was audited privately, but implementation is not public.
- PUBLIC_DOCUMENTATION_ONLY: public docs exist, but source proof was not found in this pass.
- PRIVATE_DOCUMENTATION_ONLY: private docs exist, but implementation proof was not found in this pass.

Implementation status values:

- PRODUCTION
- IMPLEMENTED_AND_TESTED
- IMPLEMENTED_NOT_RUNTIME_VERIFIED
- BETA
- PARTIAL
- ARCHITECTURE_READY
- REUSABLE_FROM_ANOTHER_SOLAR_NEUTRINO_PROJECT
- REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT
- PLANNED
- DEPRECATED
- NOT_FOUND

Evidence tags include SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, RUNTIME_VERIFIED, AUTOMATED_TEST_VERIFIED, BENCHMARK_VERIFIED, UI_VERIFIED, API_VERIFIED, SCREENSHOT_VERIFIED, PRODUCTION_DATASET_EVIDENCE, and DOCUMENTED_ONLY.

## Commerce core

| Capability | Module | Visibility | Implementation status | Evidence | Integrations | Limitations |
|---|---|---|---|---|---|---|
| Product catalog | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, UI_VERIFIED | Theme, REST, GraphQL, benchmark index | Public benchmark uses synthetic catalog data. |
| Categories, brands, properties, filters | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, BENCHMARK_VERIFIED | PostgreSQL product index, storefront, APIs | Speed claim is scoped to measured routes and data shape. |
| Variants and variant pricing | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Cart, checkout, index | Per-deployment currency/pricing rules should be retested. |
| Stock and warehouses | POSMall Core | PUBLIC_CODE | IMPLEMENTED_NOT_RUNTIME_VERIFIED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED | Vendor/channel/warehouse endpoints | Not audited as a full warehouse-management system. |
| Physical products | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, UI_VERIFIED | Shipping, taxes, checkout, orders | Carrier configuration is deployment-specific. |
| Virtual/downloadable products | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, API_VERIFIED | Download grants, customer/order screens | Secure delivery depends on configured files and tokens. |
| Services and service options | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | POSMall Pro estimates, cart, checkout | Advanced scheduling belongs to POSMall Pro/Calendar. |
| Custom fields and product customization | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Cart line customization, service estimate carrier products | Complex calculators are private Pro features. |
| Wishlists and reviews | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, UI_VERIFIED | Storefront/account features | Moderation policy is project-specific. |
| Cart, guest cart, persistent cart | POSMall Core + CRM | PUBLIC_CODE + PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Abandoned cart capture, checkout | Guest identity depends on session/consent behavior. |
| Checkout, orders, order states | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, UI_VERIFIED | Payments, CRM order sync, affiliate attribution | Payment provider credentials are not public. |
| Payments: Stripe, PayPal, Omnipay | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, API_VERIFIED | Payment logs, payment links, webhooks | Live payment validation is environment-specific. |
| Payment links | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, API_VERIFIED | Voice/service estimates, order payment flows | Requires a valid token/order flow. |
| Shipping | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Cart totals, checkout | Carrier integrations require configuration. |
| USA tax automation | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, UI_VERIFIED | Cart tax preview, checkout, tax imports | This is software functionality, not tax/legal advice. |
| Discounts and coupon codes | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Cart/order totals | Promotion-stacking policy should be tested per store. |
| Product index and benchmark tooling | POSMall Core | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, BENCHMARK_VERIFIED, UI_VERIFIED | `posmall:index`, `posmall:load-benchmark`, POSMall Tests UI | Benchmark is internal/synthetic, not independently certified. |
| Image optimization and PageSpeed assets | POSMall Core + Theme | PUBLIC_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, UI_VERIFIED | Storefront rendering, catalog images | Actual Lighthouse scores depend on deployment/media/scripts. |
| Merchant feeds | POSMall Pro | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, API_VERIFIED, UI_VERIFIED | Google, Meta, Microsoft/Bing feed profiles | Private implementation summarized only. |

## Service commerce and POSMall Pro

| Capability | Module | Visibility | Implementation status | Evidence | Integrations | Limitations |
|---|---|---|---|---|---|---|
| Service landing pages | POSMall Pro + Alrty Theme | PRIVATE_CODE | PRODUCTION | SOURCE_VERIFIED, UI_VERIFIED, SCREENSHOT_VERIFIED | POSMall Core services/products/cart | Public screenshots are sanitized/demo. |
| Dynamic service options | POSMall Pro | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Estimate calculators, cart line summaries | Rules are business-specific. |
| TV mounting service calculator | POSMall Pro | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, AUTOMATED_TEST_VERIFIED, UI_VERIFIED | Landing estimates, voice API, cart handoff | This is a field-service-grade calculator example, not the only possible service model. |
| Availability-window validation | POSMall Pro + Calendar | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, AUTOMATED_TEST_VERIFIED | Booking requests, calendar events | Current storage uses conventional UTC timestamps. |
| Estimate review and checkout conversion | POSMall Pro + POSMall Core | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, AUTOMATED_TEST_VERIFIED | Cart, orders, affiliate attribution | Payment completion still depends on configured payment provider. |
| Estimate-to-order linking | POSMall Pro + CRM | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | CRM order sync, voice sessions | Deployment-specific customer matching must be tested. |
| Technical load catalog | POSMall Pro | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, BENCHMARK_VERIFIED | POSMall Core index/projections | Local/dev only; protected from accidental production use. |
| Performance observability | POSMall Pro | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, API_VERIFIED, UI_VERIFIED | Route samples, query groups, DB-process snapshots, benchmark gates | Current report is operational evidence, not independent certification. |

## CRM, abandoned cart, campaigns, and cashflow

| Capability | Module | Visibility | Implementation status | Evidence | Integrations | Limitations |
|---|---|---|---|---|---|---|
| Contacts and accounts | POSMall CRM | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, UI_VERIFIED | Orders, imports, activities, timelines | Private source not public. |
| Leads | POSMall CRM | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Sources, activities, deals | Public docs expose states only. |
| Deals, pipelines, stages | POSMall CRM | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, UI_VERIFIED | Order links, cashflow forecasts | Pipeline policy is configurable. |
| Activities, notes, follow-ups | POSMall CRM | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | SLA, timelines, dashboards | Not audited as a general task-management product. |
| POSMall order sync into CRM | POSMall CRM | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, AUTOMATED_TEST_VERIFIED | Contacts, accounts, deals, order links, timeline | Full production data remains private. |
| Abandoned sessions/carts/items | POSMall CRM | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, AUTOMATED_TEST_VERIFIED | Cart, browser capture, reports | Recovery depends on consent and sender configuration. |
| Abandoned forms/calculators | POSMall CRM + POSMall Pro | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, AUTOMATED_TEST_VERIFIED | Service landings, recovery campaigns | PII handling is consent-gated. |
| Recovery reminders and campaigns | POSMall CRM | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, AUTOMATED_TEST_VERIFIED, API_VERIFIED | Campaigns, recipients, suppression, unsubscribe | Delivery channel setup is deployment-specific. |
| Commercial attribution | POSMall CRM + Affiliate | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Referral clicks, deals, orders, revenue | Multi-touch attribution beyond verified fields is not claimed. |
| Cash accounts and categories | POSMall CRM | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Orders, commissions, payouts, plans | Not a replacement for formal accounting software. |
| Cashflow transactions | POSMall CRM | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, AUTOMATED_TEST_VERIFIED | Order revenue, partner commissions, refunds, payouts | External bank reconciliation depends on input/import. |
| Forecasts, plans, scenarios, alerts | POSMall CRM | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, AUTOMATED_TEST_VERIFIED, API_VERIFIED | Open deals, planned/posted transactions | Forecast quality depends on clean CRM data. |
| Traffic/security analytics | POSMall CRM | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, API_VERIFIED | Request capture, firewall rules, reports | Public docs do not expose rule internals. |

## Affiliate and partner program

| Capability | Module | Visibility | Implementation status | Evidence | Integrations | Limitations |
|---|---|---|---|---|---|---|
| Partner registration and portal login | POSMall Affiliate | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, UI_VERIFIED | Portal identity sync, partner dashboard | Public docs do not expose portal internals. |
| Referral links and compact public codes | POSMall Affiliate | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Tracking middleware, QR exports | Public links use compact codes; UTM details are server-side. |
| Click tracking and attribution persistence | POSMall Affiliate | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Session/cookie attribution, order events | Exact attribution windows are deployment-configurable. |
| Conversion/referral records | POSMall Affiliate | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | POSMall orders, CRM attribution | Refund/dispute handling requires business review. |
| Commission calculation | POSMall Affiliate | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, AUTOMATED_TEST_VERIFIED | Order totals, partner commission rates | Commission policy can be changed by operators. |
| Referral approval/rejection/paid states | POSMall Affiliate | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Payment-state listeners, cashflow | Automated external payout is not fully claimed. |
| Payout records and reporting | POSMall Affiliate + CRM Cashflow | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, UI_VERIFIED | Partner dashboard, cashflow rebuild | External payout execution is project-specific. |
| Affiliate analytics REST/GraphQL | POSMall Affiliate | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, API_VERIFIED, AUTOMATED_TEST_VERIFIED | Assistant playbook, snapshots | Read-only reporting for AI/operator use. |

## Calendar, location, and field-service foundation

| Capability | Module | Visibility | Implementation status | Evidence | Integrations | Limitations |
|---|---|---|---|---|---|---|
| Calendars and resources | POSMall Calendar | PRIVATE_CODE | BETA | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Service requests, technician portal | Scheduling policy is still modular. |
| Booking requests and customer windows | POSMall Calendar | PRIVATE_CODE | BETA | SOURCE_VERIFIED, AUTOMATED_TEST_VERIFIED | POSMall Pro estimates, contacts | Current implementation uses UTC start/end columns. |
| Booking holds | POSMall Calendar | PRIVATE_CODE | BETA | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Availability checks, conflicts | Native PostgreSQL range/exclusion constraints were not found. |
| Calendar events and ICS feeds | POSMall Calendar | PRIVATE_CODE | BETA | SOURCE_VERIFIED, API_VERIFIED | Technician portal, read API | Feed access is tokenized/rate-limited. |
| Technician portal | POSMall Calendar + Domains | PRIVATE_CODE | BETA | SOURCE_VERIFIED, UI_VERIFIED | Portal identities, event status, GEO ping | General work-order lifecycle is partial. |
| Location capture | GEO | PRIVATE_CODE | BETA | SOURCE_VERIFIED, API_VERIFIED | Technician portal, calendar events/resources | Uses application-level coordinates in audited migrations. |
| Radius/distance dispatch matching | GEO | PRIVATE_CODE | BETA | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Calendar events, technician pings | PostGIS-powered storage was not found. |
| Field-service work orders/signatures/warranties/disputes | Calendar/GEO/Pro | PRIVATE_CODE | PARTIAL | SOURCE_VERIFIED | Service estimates, event status, technician workflow foundation | Complete generalized lifecycle not proven in this audit. |

## AI commerce and AI operations

| Capability | Module | Visibility | Implementation status | Evidence | Integrations | Limitations |
|---|---|---|---|---|---|---|
| AI-ready structured commerce context | POSMall Pro | PRIVATE_CODE | BETA | SOURCE_VERIFIED, API_VERIFIED | Service context, quote/estimate API | Provider-specific runtime is not public. |
| Voice service quote | POSMall Pro | PRIVATE_CODE | BETA | SOURCE_VERIFIED, AUTOMATED_TEST_VERIFIED | TV mounting calculator, service estimates | Scoped to verified service tools. |
| Voice session and review/payment link workflow | POSMall Pro | PRIVATE_CODE | BETA | SOURCE_VERIFIED, API_VERIFIED | Estimates, orders, voice sessions | No card collection by phone; secure payment link handoff. |
| Generic AI product add-to-cart | POSMall Pro | PRIVATE_CODE | NOT_FOUND | SOURCE_VERIFIED | None verified | Source policy explicitly does not claim this yet. |
| Runtime assistant configuration/logs | VoiceAssistant | PRIVATE_CODE | BETA | SOURCE_VERIFIED, API_VERIFIED | GraphQL runtime API, change/location logs | Not a claim of a fully autonomous AI agent in every deployment. |
| Factory Agents / AI operations dashboard | Factory Agents | PRIVATE_CODE | PARTIAL | PRIVATE_DOCUMENTATION_ONLY | Project knowledge, advisory workflows | Separate system; not public POSMall source. |

## Reusable Laravel game backend capabilities

Solar Neutrino also maintains game-related Laravel backend plugins and services. Their business logic is relevant to POSMall because it proves reusable backend patterns for accounts, devices, paid access, store purchases, restore flows, gameplay/session gating, feedback, support, moderation, and live multi-user workflows. This section describes only backend business capabilities. It does not disclose the proprietary client/application implementation layer.

| Capability | Module | Visibility | Implementation status | Evidence | Integrations | Limitations |
|---|---|---|---|---|---|---|
| Player/account identity | Reusable Solar Neutrino Laravel game backend | PRIVATE_CODE | REUSABLE_FROM_ANOTHER_SOLAR_NEUTRINO_PROJECT | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED | account identity and entitlement backend, player profiles, account emails/phones/usernames, site users | Not described as a POSMall-specific customer app until an adapter is verified. |
| Store purchase, entitlement, restore-style reconciliation | account identity and entitlement backend + game backend | PRIVATE_CODE | REUSABLE_FROM_ANOTHER_SOLAR_NEUTRINO_PROJECT | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, AUTOMATED_TEST_VERIFIED, API_VERIFIED | Store purchase events, paid access, account/device access decisions | Public docs do not expose keys, store credentials, package identities, or private submission details. |
| Device registry and device limits | account identity and entitlement backend + game backend | PRIVATE_CODE | REUSABLE_FROM_ANOTHER_SOLAR_NEUTRINO_PROJECT | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, AUTOMATED_TEST_VERIFIED | Account devices, gameplay sessions, entitlement gate | POSMall-specific device cabinet is architecture-ready, not claimed as deployed. |
| Gameplay session authority | Game backend | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED | Session acquire, heartbeat, release, forced release, entitlement guard | Reusable as a pattern for paid feature/session gating. |
| Score, run, and leaderboard verification | Game backend | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Cups, leagues, duel runs, best-run comparison, player stats | Private gameplay algorithms are not public. |
| Normalized board proof ledger | Game backend | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED | Board facts, proof ledgers, replay checks, publishability gate | Public docs summarize the proof pipeline without exposing proprietary puzzle data. |
| Duel matchmaking and settlement | Game backend | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED | Matchmaking queue, pair leases, duel settlement, ratings/stats | Latest pair-stability work was observed in source; platform-specific client behavior is not disclosed. |
| Nearby rivals and privacy-aware matching | GEO / GeoUsers + game backend | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED | Coarse geo signals, country/language preferences, contacts, invites | Uses privacy-preserving coarse matching; exact private location handling is not public. |
| Feedback, support, attachments, and moderation | Feedback Board / Feedback Attachments + game backend | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, UI_VERIFIED, API_VERIFIED | Feedback intake, support board lookup, moderation actions, report handling | Public docs do not expose private support routing or storage topology. |
| Store publishing preparation | Game backend + account identity and entitlement backend | PRIVATE_CODE | BUILD_PIPELINE_READY | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, UI_VERIFIED | Store profile fields, checklists, tasks, dry-run publishing plan | Public docs can describe submission readiness, not private credentials or package internals. |

Business meaning for POSMall: these modules are not presented as “the POSMall app.” They are reusable Solar Neutrino Laravel backend capabilities that can be connected to POSMall through API/adapters when a specific product requires mobile, desktop, paid-access, or multi-user operational surfaces.

## POSMall Cross-Platform Application Architecture

This is a first-class POSMall ecosystem capability. POSMall is not limited to website screens. The public, defensible claim is that POSMall’s Laravel/October backend APIs and business modules can be connected to web, mobile, tablet, desktop, and store-distributed application clients. Solar Neutrino’s private ecosystem also contains reusable application capabilities proven in another product family.

| Capability | Module | Visibility | Implementation status | Evidence | Integrations | Limitations |
|---|---|---|---|---|---|---|
| POSMall Cross-Platform Application Architecture | POSMall APIs + reusable Solar Neutrino application architecture | PRIVATE_CODE | ARCHITECTURE_READY + REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | SOURCE_VERIFIED, API_VERIFIED, DATABASE_SCHEMA_VERIFIED | POSMall Core APIs, POSMall Pro services, account/device/entitlement backend, store channels | POSMall-branded clients are not claimed as released unless separately verified. |
| Application-client architecture for web, iOS, Android, macOS, and Windows | Reusable Solar Neutrino application architecture | PRIVATE_CODE | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | SOURCE_VERIFIED, API_VERIFIED | Shared account, store entitlement, device, local data, notification/background, direct device communication capability | Public docs describe only WHAT/WHERE, not HOW it is implemented. |
| Business backend reuse across commerce, services, CRM, field operations, and subscriptions | POSMall ecosystem | PRIVATE_CODE | ARCHITECTURE_READY | SOURCE_VERIFIED, API_VERIFIED | Customer, technician, partner, management, and AI-assisted application roles | Product-specific client workflows require implementation and tests per store/platform. |

## Cross-platform application capabilities

Public boundary: this section describes what Solar Neutrino’s private application architecture can support. It does not disclose the internal application technology, framework, device layer, packaging internals, private protocols, or build techniques.

| Capability | Web | iOS / iPadOS | Android | macOS | Windows / Microsoft | Implementation status | Evidence |
|---|---|---|---|---|---|---|---|
| Authentication | PRODUCTION | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | POSMall web production; application clients reusable | EVID-APP-0002 |
| User accounts | PRODUCTION | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | Account-level backend exists; POSMall app-specific clients architecture-ready | EVID-APP-0002, EVID-GAME-BACKEND-0001 |
| Account synchronization | PRODUCTION | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | Backend account synchronization pattern verified in another product | EVID-APP-0002 |
| Catalog | PRODUCTION | ARCHITECTURE_READY | ARCHITECTURE_READY | ARCHITECTURE_READY | ARCHITECTURE_READY | POSMall web/API implemented; client-specific presentation remains separate | POSMall REST/GraphQL and storefront evidence |
| Services | PRODUCTION | ARCHITECTURE_READY | ARCHITECTURE_READY | ARCHITECTURE_READY | ARCHITECTURE_READY | POSMall service logic implemented; client-specific presentation remains separate | POSMall Core + Pro evidence |
| Orders | PRODUCTION | ARCHITECTURE_READY | ARCHITECTURE_READY | ARCHITECTURE_READY | ARCHITECTURE_READY | POSMall orders/payments implemented; store-client order surface not claimed as released | POSMall order/payment APIs |
| Local data | PARTIAL | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | Reusable private capability; POSMall-specific offline catalog adapter not verified | EVID-APP-0002 |
| Offline behavior | PARTIAL | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | Reusable private capability; final POSMall commerce state remains backend-authoritative | EVID-APP-0002 |
| Background operation | PLANNED_FOR_POSMALL | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | Reusable private capability; POSMall-specific background jobs need product tests | EVID-APP-0002 |
| Notifications | PLANNED_FOR_POSMALL | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | Reusable private capability; POSMall notification UX remains project-specific | EVID-APP-0002 |
| Store purchases | ARCHITECTURE_READY | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | IMPLEMENTED_AND_TESTED / BUILD_PIPELINE_READY | Store-specific purchase verification paths audited; POSMall app release not claimed | EVID-ACCOUNT-ENTITLEMENT-0001, EVID-APP-0002 |
| Subscriptions | ARCHITECTURE_READY | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | IMPLEMENTED_AND_TESTED | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | IMPLEMENTED_AND_TESTED / BUILD_PIPELINE_READY | Subscription metadata, lifecycle, and refresh scheduling verified in backend | EVID-ACCOUNT-ENTITLEMENT-0001 |
| Entitlements | ARCHITECTURE_READY | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | IMPLEMENTED_AND_TESTED | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | IMPLEMENTED_AND_TESTED | Store transaction is normalized into backend access state where verified | EVID-ACCOUNT-ENTITLEMENT-0001 |
| Purchase restoration | ARCHITECTURE_READY | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | IMPLEMENTED_AND_TESTED | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | IMPLEMENTED_AND_TESTED | Restore-style reconciliation and recovery tests exist; platform policies still apply | EVID-APP-0002, EVID-ACCOUNT-ENTITLEMENT-0001 |
| Multi-device account | ARCHITECTURE_READY | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | IMPLEMENTED_AND_TESTED | Multiple devices can be tied to one account in the audited backend capability | EVID-GAME-BACKEND-0001 |
| Device recovery | ARCHITECTURE_READY | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | IMPLEMENTED_AND_TESTED | Recovery and replacement behavior is source/test evidenced in the private backend | EVID-APP-0002, EVID-GAME-BACKEND-0001 |
| Device limits | ARCHITECTURE_READY | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | IMPLEMENTED_AND_TESTED | Backend device controls exist; exact per-product limits are policy-specific | EVID-GAME-BACKEND-0001 |
| Direct device-to-device communication | ARCHITECTURE_READY | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | Reusable capability exists in another product; POSMall workflow adapter not verified | EVID-P2P-0001, EVID-P2P-0002 |

## Store subscriptions, entitlements, and multi-device accounts

| Capability | Module | Visibility | Implementation status | Evidence | Integrations | Limitations |
|---|---|---|---|---|---|---|
| Store-independent entitlement model | Account/device/entitlement backend | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, AUTOMATED_TEST_VERIFIED | Apple, Google Play, Microsoft Store channels; user account; device registry | Public docs do not claim cross-store purchase portability. |
| Apple subscription verification path | Account/device/entitlement backend | PRIVATE_CODE | REUSABLE_AND_PROVEN_IN_ANOTHER_SOLAR_NEUTRINO_PRODUCT | SOURCE_VERIFIED, AUTOMATED_TEST_VERIFIED | App Store account and purchase events, entitlement lifecycle | Public docs do not disclose private request details, keys, endpoints, or private client logic. |
| Google Play subscription verification and recovery path | Account/device/entitlement backend | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, AUTOMATED_TEST_VERIFIED | Google Play subscription token validation/recovery concepts, entitlement lifecycle | POSMall Android client release is not claimed. |
| Microsoft Store subscription verification and readiness path | Account/device/entitlement backend | PRIVATE_CODE | IMPLEMENTED_AND_TESTED / BUILD_PIPELINE_READY | SOURCE_VERIFIED, AUTOMATED_TEST_VERIFIED, UI_VERIFIED | Store preparation, entitlement verification, restore/recovery scenarios | Store review/public release status is product-specific. |
| Account-level ownership | Account/device/entitlement backend | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED | Store transaction, user account, device registry, access decisions | Does not mean a user can freely transfer purchases across unrelated store ecosystems. |
| Multi-device account access | Account/device/entitlement backend | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, AUTOMATED_TEST_VERIFIED | Device registration, restore/recovery, session gating | Exact device limit policy is product-specific. |
| Device recovery and replacement | Account/device/entitlement backend | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, AUTOMATED_TEST_VERIFIED | Reinstall, new device, lost local state, account recovery | Public docs do not expose fingerprinting, anti-fraud, or recovery algorithms. |
| Server-authoritative access decision | Account/device/entitlement backend | PRIVATE_CODE | IMPLEMENTED_AND_TESTED | SOURCE_VERIFIED, DATABASE_SCHEMA_VERIFIED, API_VERIFIED | Store event journal, entitlement state, access attempts, device/session state | Store availability and platform rules can affect final access. |

## Capabilities not found or only partial

| Capability | Classification | Reason |
|---|---|---|
| Full recommendation engine | NOT_FOUND | No dedicated source-verified recommendation engine was found in this audit. |
| Generalized RMA/returns platform | NOT_FOUND / PARTIAL | Payment/order state support exists, but a full RMA lifecycle was not verified. |
| Generic subscription billing inside POSMall Core | PARTIAL | Store entitlement/subscription capability exists in private app systems, not as a general POSMall Core module. |
| Complete marketplace payout platform | PARTIAL | Vendor/channel/warehouse primitives and affiliate/cashflow payouts exist; full marketplace payout operations are not claimed. |
| PostGIS-powered POSMall location storage | NOT_FOUND / ARCHITECTURE_READY | Audited GEO migrations use decimal latitude/longitude and application-level distance logic. |
| Native PostgreSQL range/exclusion scheduling constraints | NOT_FOUND / ARCHITECTURE_READY | Calendar uses conventional UTC timestamp columns in audited migrations. |
| Full autonomous AI agent commerce | PARTIAL | Structured APIs and voice/service tools exist; full autonomous product ordering is not claimed. |
| POSMall-specific P2P business workflow | ARCHITECTURE_READY | Reusable private app capability exists in another Solar Neutrino product; POSMall adapter not verified. |
| POSMall-specific game client | NOT_CLAIMED | Game backend business logic is reusable evidence; this catalog does not publish or describe closed client implementation details. |

## Evidence and public references

- Primary dossier: https://solarneutrino.com/knowledge/posmall-complete-technical-dossier.md
- Machine-readable manifest: https://solarneutrino.com/knowledge/posmall-capabilities.json
- Cross-platform and P2P architecture: https://solarneutrino.com/knowledge/posmall-cross-platform-and-p2p-architecture.md
- POSMall Core repository: https://github.com/TjoBiZ/POSMall
- POSMall Theme repository: https://github.com/TjoBiZ/POSMallTheme
- POSMall benchmark summary: https://solarneutrino.com/benchmarks/posmall
- POSMall product page: https://solarneutrino.com/products/posmall
- Aimeos official features: https://aimeos.org/features
- Aimeos Gigacommerce page: https://aimeos.com/gigacommerce
- PostgreSQL JSON types: https://www.postgresql.org/docs/current/datatype-json.html
- PostgreSQL range types: https://www.postgresql.org/docs/current/rangetypes.html
- PostgreSQL GIN indexes: https://www.postgresql.org/docs/current/gin.html
- PostGIS documentation: https://postgis.net/docs/

## Safe public claim boundary

POSMall Core is public and independently installable. POSMall Pro and the wider Solar Neutrino business modules were audited privately and are summarized at capability level. Cross-platform and direct device exchange capabilities are described as reusable private Solar Neutrino architecture unless a POSMall-specific integration is separately verified. No public file should be treated as disclosure of private source code or proprietary implementation mechanisms.
