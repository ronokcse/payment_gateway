<?php
$client_id = "TEST-M22DA6KPBNAN7_25042";
$client_secret = "YmM0MTU0YmMtMzBlZi00MjkyLWFiOGMtNGI1OWRhMzEzZmM3";
$client_version = "1"; // Use version from credentials email for PROD

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
echo "<pre>";
print_r($data);
exit;
$access_token = $data['access_token'];

$access_token = "O-Bearer " . $access_token; // from previous step

$merchantOrderId = "TX" . time();

$payload = [
    "merchantOrderId" => $merchantOrderId,
    "amount" => 1000,
    "expireAfter" => 1200,
    "metaInfo" => [
        "udf1" => "info1",
        "udf2" => "info2"
    ],
    "paymentFlow" => [
        "type" => "PG_CHECKOUT",
        "message" => "Thank you for your order!",
        "merchantUrls" => [
            "redirectUrl" => "http://localhost/phonepe/success.php?order_id=$merchantOrderId"
        ]
    ]
];
$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://api-preprod.phonepe.com/apis/pg-sandbox/checkout/v2/pay",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($payload),
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "Authorization: $access_token"
    ]
]);

$response = curl_exec($curl);
curl_close($curl);

$data = json_decode($response, true);
$redirectUrl = $data['redirectUrl'] ?? null;

if ($redirectUrl) {
    header("Location: $redirectUrl");
    exit;
} else {
    echo "Failed to create order: " . json_encode($data);
}



