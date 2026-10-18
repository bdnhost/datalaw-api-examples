#!/usr/bin/env bash
# DataLaw API — quick examples
set -euo pipefail
BASE="https://datalawapi.legalnexus.top/api/v1"

echo "== health =="
curl -s "$BASE/health" | head -c 300; echo

echo "== apartment prices in Tel Aviv =="
curl -s --get "$BASE/market/prices" --data-urlencode "city=תל אביב" | head -c 400; echo

echo "== company search =="
curl -s --get "$BASE/companies/search" --data-urlencode "q=שופרסל" | head -c 400; echo

echo "== contractors =="
curl -s "$BASE/contractors?limit=3" | head -c 400; echo

echo "== business licences =="
curl -s "$BASE/business-licenses?limit=3" | head -c 400; echo
