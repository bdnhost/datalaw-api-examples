"""DataLaw API — Python quickstart (requests)."""
import requests

BASE = "https://datalawapi.legalnexus.top/api/v1"


def get(path, **params):
    r = requests.get(f"{BASE}{path}", params=params, timeout=20)
    r.raise_for_status()
    return r.json()


if __name__ == "__main__":
    print("health:", get("/health"))

    prices = get("/market/prices", city="תל אביב")
    print("prices:", str(prices)[:300])

    companies = get("/companies/search", q="שופרסל")
    print("companies:", str(companies)[:300])

    licences = get("/business-licenses", limit=3)
    print("licences:", str(licences)[:300])
