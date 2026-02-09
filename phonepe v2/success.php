<?php
$client_id = "TEST-M22DA6KPBNAN7_25042";
$client_secret = "YmM0MTU0YmMtMzBlZi00MjkyLWFiOGMtNGI1OWRhMzEzZmM3";
$client_version = "1"; // For sandbox

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://api-preprod.phonepe.com/apis/pg-sandbox/v1/oauth/token",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query([
        'client_id' => $client_id,
        'client_version' => $client_version,
        'client_secret' => $client_secret,
        'grant_type' => 'client_credentials'
    ]),
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/x-www-form-urlencoded"
    ]
]);

$response = curl_exec($curl);
curl_close($curl);

$data = json_decode($response, true);
$access_token = $data['access_token'] ?? null;

if (!$access_token) {
    die("❌ Failed to get access token.");
}



$merchantOrderId = $_GET['order_id'] ?? null;

if (!$merchantOrderId) {
    die("Missing order ID in URL.");
}

$url = "https://api-preprod.phonepe.com/apis/pg-sandbox/checkout/v2/order/{$merchantOrderId}/status";

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "Authorization: O-Bearer $access_token"
    ]
]);

$response = curl_exec($curl);
curl_close($curl);

$data = json_decode($response, true);

echo "<pre>";
print_r($data);

if (isset($data['code']) && $data['code'] === 'PAYMENT_SUCCESS') {
    echo "<h2>✅ Payment Successful</h2>";
} elseif (isset($data['code']) && $data['code'] === 'PAYMENT_PENDING') {
    echo "<h2>⏳ Payment Pending</h2>";
} else {
    echo "<h2>❌ Payment Failed or Invalid</h2>";
}
