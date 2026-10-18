<?php
// DataLaw API — PHP quickstart (cURL)
const BASE = "https://datalawapi.legalnexus.top/api/v1";

function get(string $path, array $params = []): array {
    $url = BASE . $path . ($params ? "?" . http_build_query($params) : "");
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 20,
        CURLOPT_HTTPHEADER => ["Accept: application/json"],
    ]);
    $body = curl_exec($ch);
    if ($body === false) { throw new RuntimeException(curl_error($ch)); }
    curl_close($ch);
    return json_decode($body, true) ?? [];
}

echo "health: " . json_encode(get("/health"), JSON_UNESCAPED_UNICODE) . PHP_EOL;
echo "prices: " . json_encode(get("/market/prices", ["city" => "תל אביב"]), JSON_UNESCAPED_UNICODE) . PHP_EOL;
echo "companies: " . json_encode(get("/companies/search", ["q" => "שופרסל"]), JSON_UNESCAPED_UNICODE) . PHP_EOL;
