// DataLaw API — Node 18+ quickstart
const BASE = "https://datalawapi.legalnexus.top/api/v1";

async function get(path, params = {}) {
  const url = new URL(BASE + path);
  Object.entries(params).forEach(([k, v]) => url.searchParams.set(k, v));
  const res = await fetch(url);
  if (!res.ok) throw new Error(`HTTP ${res.status}`);
  return res.json();
}

(async () => {
  console.log("health:", await get("/health"));
  console.log("prices:", JSON.stringify(await get("/market/prices", { city: "תל אביב" })).slice(0, 300));
  console.log("companies:", JSON.stringify(await get("/companies/search", { q: "שופרסל" })).slice(0, 300));
})();
