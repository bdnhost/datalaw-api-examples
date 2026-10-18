# DataLaw API — דוגמאות וקוד מוכן

[![Docs](https://img.shields.io/badge/docs-datalawapi.legalnexus.top-0b5d4b)](https://datalawapi.legalnexus.top/docs/)
[![OpenAPI](https://img.shields.io/badge/OpenAPI-3.0-blue)](https://datalawapi.legalnexus.top/openapi.json)
[![License](https://img.shields.io/badge/license-MIT-green)](LICENSE)

REST API חינמי לנתוני ממשלה ישראליים — **45 נקודות קצה** על **106,844 מאגרי נתונים**.
נדל"ן, חברות, רישוי עסקים, מזון, מכס, סיכונים ומחשבונים. JSON, בעברית, בלי להתקין כלום.

> Free REST API for Israeli open-government data: real estate, companies, business licensing, food, customs, risk and calculators.

## התחלה מהירה

```bash
curl "https://datalawapi.legalnexus.top/api/v1/market/prices?city=תל אביב"
```

```python
import requests

r = requests.get(
    "https://datalawapi.legalnexus.top/api/v1/companies/search",
    params={"q": "שופרסל"},
    timeout=20,
)
r.raise_for_status()
for company in r.json().get("results", [])[:5]:
    print(company)
```

```javascript
const res = await fetch(
  "https://datalawapi.legalnexus.top/api/v1/contractors?limit=10"
);
const data = await res.json();
console.log(data);
```

## מה יש כאן

| קטגוריה | דוגמאות |
|---|---|
| **נדל"ן** | `/market/prices`, `/market/trends`, `/construction/active`, `/urban-renewal`, `/zoning` |
| **חברות** | `/companies/search`, `/companies/{company_number}`, `/companies/new`, `/companies/violating` |
| **רישוי וסיכון** | `/business-licenses`, `/fire-safety/categories`, `/risk/lookup`, `/risk/contamination` |
| **מכס ומזון** | `/customs/lookup`, `/food/manufacturers`, `/food/importers`, `/food/prices` |
| **מחשבונים** | `/calculator/purchase-tax`, `/calculator/mortgage`, `/calculator/roi` |
| **תשתית** | `/health`, `/stats`, `/sync-logs` |

הרשימה המלאה: **[תיעוד](https://datalawapi.legalnexus.top/docs/)** · **[OpenAPI JSON](https://datalawapi.legalnexus.top/openapi.json)**

## מפתח API

רוב נקודות הקצה פתוחות ללא מפתח. להרשמה חינמית ולמכסה גבוהה יותר:

```bash
curl -X POST https://datalawapi.legalnexus.top/api/v1/auth/register \
  -H "Content-Type: application/json" \
  -d '{"name":"Your Name","email":"you@example.com","use_case":"real estate analytics"}'
```

התשובה כוללת `api_key`. שימוש:

```bash
curl -H "Authorization: Bearer YOUR_KEY" \
  "https://datalawapi.legalnexus.top/api/v1/companies/stats"
```

## דוגמאות בריפו

| קובץ | מה זה |
|---|---|
| `examples/curl.sh` | חמש קריאות מוכנות לשורה אחת |
| `examples/python_quickstart.py` | חיפוש חברה, מחירי דירה, רישיון עסק |
| `examples/node_quickstart.js` | Node 18+ עם fetch |
| `examples/php_quickstart.php` | PHP עם cURL |

## הערות

- הנתונים מגיעים ממאגרי ממשלה פתוחים ומתעדכנים אוטומטית (סנכרון אחרון: 17.10.2026).
- השירות אינו ייעוץ משפטי או פיננסי.
- שימוש הוגן: אנא הגבילו קצב ובקשו מפתח לשימוש אינטנסיבי.

## רישיון

MIT — ראו [LICENSE](LICENSE).
