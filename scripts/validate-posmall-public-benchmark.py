#!/usr/bin/env python3
"""Validate public POSMall benchmark evidence and disclosure boundaries.

This script keeps the benchmark copies aligned with the canonical JSON dataset
and prevents stale or overly specific public wording from reappearing.
"""

from __future__ import annotations

import csv
import json
import re
import sys
from decimal import Decimal, ROUND_HALF_UP
from pathlib import Path


ROOT = Path(__file__).resolve().parents[1]

BENCHMARK_ID = "posmall-aimeos-5way-current-checkpoint-20260610-024820"

EXPECTED_ROWS = [
    (1000, Decimal("35.40"), Decimal("42.85"), Decimal("33.64"), Decimal("184.84")),
    (5000, Decimal("35.59"), Decimal("42.25"), Decimal("33.12"), Decimal("454.08")),
    (10000, Decimal("33.48"), Decimal("42.73"), Decimal("32.61"), Decimal("754.77")),
    (50000, Decimal("33.35"), Decimal("64.05"), Decimal("31.87"), Decimal("1494.33")),
    (100000, Decimal("34.22"), Decimal("51.76"), Decimal("33.32"), Decimal("3010.45")),
    (200000, Decimal("33.82"), Decimal("55.41"), Decimal("32.24"), Decimal("4036.45")),
    (300000, Decimal("33.49"), Decimal("61.17"), Decimal("33.79"), Decimal("4229.29")),
]

EXPECTED_PUBLIC_FILES = [
    ROOT / "resources/views/october-laravel-products.blade.php",
    ROOT / "resources/views/products.blade.php",
    ROOT / "resources/views/portfolio.blade.php",
    ROOT / "resources/views/product-system-brief.blade.php",
    ROOT / "routes/web_production.php",
    ROOT / "public/llms.txt",
    ROOT / "public/robots.txt",
    ROOT / "public/sitemap.xml",
    ROOT / "public/knowledge/product-systems.md",
    ROOT / "public/knowledge/product-systems.json",
    ROOT / "public/knowledge/posmall-complete-technical-dossier.md",
    ROOT / "public/knowledge/posmall-capability-catalog.md",
    ROOT / "public/knowledge/posmall-cross-platform-and-p2p-architecture.md",
    ROOT / "public/knowledge/posmall-capabilities.json",
    ROOT / "public/knowledge/posmall-vs-aimeos-postgresql.json",
    ROOT / "public/knowledge/posmall-vs-aimeos-postgresql.csv",
]

FORBIDDEN_PUBLIC_PATTERNS = [
    re.compile(r"98\.92%"),
    re.compile(r"No numbers = SEO manipulation"),
    re.compile(r"\bIonic\b"),
    re.compile(r"\bCapacitor\b"),
    re.compile(r"wrapped for app-store channels", re.IGNORECASE),
    re.compile(r"internal mobile wrapper", re.IGNORECASE),
    re.compile(r"native bridge", re.IGNORECASE),
    re.compile(r"private package name", re.IGNORECASE),
    re.compile(r"internal P2P protocol", re.IGNORECASE),
]


def fail(message: str) -> None:
    print(f"FAIL: {message}", file=sys.stderr)
    raise SystemExit(1)


def rounded(value: Decimal) -> Decimal:
    return value.quantize(Decimal("0.01"), rounding=ROUND_HALF_UP)


def validate_json() -> None:
    path = ROOT / "public/knowledge/posmall-vs-aimeos-postgresql.json"
    data = json.loads(path.read_text(encoding="utf-8"))

    if data.get("benchmark_id") != BENCHMARK_ID:
        fail("benchmark_id drifted")

    rows = data.get("rows", [])
    if len(rows) != 7:
        fail(f"expected 7 benchmark rows, got {len(rows)}")

    for row, expected in zip(rows, EXPECTED_ROWS):
        size, pos_cat, aim_cat, pos_search, aim_search = expected
        checks = {
            "catalog_size": size,
            "posmall_category_ms": pos_cat,
            "aimeos_category_ms": aim_cat,
            "posmall_filtered_search_ms": pos_search,
            "aimeos_search_ms": aim_search,
        }
        for key, expected_value in checks.items():
            actual = row.get(key)
            if isinstance(expected_value, Decimal):
                actual_value = Decimal(str(actual))
                if actual_value != expected_value:
                    fail(f"{key} drifted for {size}: expected {expected_value}, got {actual_value}")
            elif actual != expected_value:
                fail(f"{key} drifted: expected {expected_value}, got {actual}")

        if row.get("posmall_category_won") is not True:
            fail(f"POSMall category win flag missing for {size}")
        if row.get("posmall_filtered_search_won") is not True:
            fail(f"POSMall filtered/search win flag missing for {size}")

    wins = sum(1 for row in rows if row["posmall_category_won"]) + sum(
        1 for row in rows if row["posmall_filtered_search_won"]
    )
    if wins != 14:
        fail(f"expected 14 measured path wins, got {wins}")

    row_300k = rows[-1]
    ratio = rounded(Decimal(str(row_300k["aimeos_search_ms"])) / Decimal(str(row_300k["posmall_filtered_search_ms"])))
    reduction = rounded(
        (
            (Decimal(str(row_300k["aimeos_search_ms"])) - Decimal(str(row_300k["posmall_filtered_search_ms"])))
            / Decimal(str(row_300k["aimeos_search_ms"]))
        )
        * Decimal("100")
    )

    if ratio != Decimal("125.16"):
        fail(f"300k timing ratio must round to 125.16x, got {ratio}")
    if reduction != Decimal("99.20"):
        fail(f"300k response-time reduction must round to 99.20%, got {reduction}")

    summary = data.get("summary", {})
    if summary.get("measured_path_comparisons_won") != 14:
        fail("summary measured_path_comparisons_won must be 14")
    if Decimal(str(summary.get("largest_catalog_aimeos_timing_ratio"))) != Decimal("125.16"):
        fail("summary 300k timing ratio drifted")
    if Decimal(str(summary.get("largest_catalog_posmall_response_time_reduction_percent"))) != Decimal("99.2"):
        fail("summary 300k response-time reduction drifted")

    limitations = data.get("limitations", [])
    if not any("Not independently certified" in item for item in limitations):
        fail("benchmark limitations must mention independent certification scope")


def validate_csv() -> None:
    path = ROOT / "public/knowledge/posmall-vs-aimeos-postgresql.csv"
    with path.open(newline="", encoding="utf-8") as handle:
        rows = list(csv.DictReader(handle))

    expected_fields = [
        "catalog_size",
        "posmall_category_ms",
        "aimeos_category_ms",
        "posmall_filtered_search_ms",
        "aimeos_search_ms",
        "posmall_category_won",
        "posmall_filtered_search_won",
    ]
    if rows and list(rows[0].keys()) != expected_fields:
        fail("CSV columns drifted")
    if len(rows) != 7:
        fail(f"expected 7 CSV rows, got {len(rows)}")

    for row, expected in zip(rows, EXPECTED_ROWS):
        size, pos_cat, aim_cat, pos_search, aim_search = expected
        if int(row["catalog_size"]) != size:
            fail("CSV catalog_size drifted")
        if Decimal(row["posmall_category_ms"]) != pos_cat:
            fail(f"CSV POSMall category drifted for {size}")
        if Decimal(row["aimeos_category_ms"]) != aim_cat:
            fail(f"CSV Aimeos category drifted for {size}")
        if Decimal(row["posmall_filtered_search_ms"]) != pos_search:
            fail(f"CSV POSMall filtered/search drifted for {size}")
        if Decimal(row["aimeos_search_ms"]) != aim_search:
            fail(f"CSV Aimeos search drifted for {size}")
        if row["posmall_category_won"] != "true" or row["posmall_filtered_search_won"] != "true":
            fail(f"CSV win flags drifted for {size}")


def validate_public_text() -> None:
    missing = [str(path.relative_to(ROOT)) for path in EXPECTED_PUBLIC_FILES if not path.exists()]
    if missing:
        fail(f"missing expected public files: {missing}")

    for path in EXPECTED_PUBLIC_FILES:
        text = path.read_text(encoding="utf-8", errors="ignore")
        for pattern in FORBIDDEN_PUBLIC_PATTERNS:
            if pattern.search(text):
                fail(f"forbidden public wording matched {pattern.pattern!r} in {path.relative_to(ROOT)}")

    main = (ROOT / "resources/views/october-laravel-products.blade.php").read_text(encoding="utf-8")
    intro_pos = main.find("benchmark-primary")
    module_pos = main.find("solution-hub")
    if intro_pos < 0:
        fail("main page must contain benchmark-primary section")
    if module_pos >= 0 and intro_pos > module_pos:
        fail("benchmark-primary must appear before solution/module sections")

    llms = (ROOT / "public/llms.txt").read_text(encoding="utf-8")
    first_benchmark = llms.find("POSMall Core vs Aimeos PostgreSQL benchmark")
    first_dossier = llms.find("Complete POSMall technical dossier")
    if first_benchmark < 0:
        fail("llms.txt must route to benchmark")
    if first_dossier >= 0 and first_benchmark > first_dossier:
        fail("llms.txt benchmark route must appear before detailed dossier route")


def main() -> None:
    validate_json()
    validate_csv()
    validate_public_text()
    print("POSMall public benchmark validation passed")


if __name__ == "__main__":
    main()
