<?php
// Raw PHP cURL implementation for Sifalo Pay e‑Wallet and Checkout APIs

// 1) Configure your API credentials here
$sifaloApiUsername = 'HorvLWb9n';
$sifaloApiPassword = '97677024485f8f5a959e025c9c9f7a863c27addd';

// 2) Endpoints
$SIFALO_USER = 'HorvLWb9n';
$SIFALO_PASS = '97677024485f8f5a959e025c9c9f7a863c27addd';
$RETURN_URL  = 'http://localhost/checkout_return.php';
$AMOUNT      = '22.00'; // string
$endpoint = 'https://api.sifalopay.com/gateway/';
// 2) SAFETY: no output buffering issues
if (headers_sent()) {
    http_response_code(500);
    exit('Headers already sent; cannot redirect.');
}

// 3) INIT CHECKOUT
$endpoint = 'https://api.sifalopay.com/gateway/';
$payload  = [
    'amount'     => $AMOUNT,
    'gateway'    => 'checkout',
    'currency'   => 'USD',
    'return_url' => $RETURN_URL,
];

$ch = curl_init($endpoint);
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_HTTPHEADER     => [
        'Content-Type: application/json',
        'Authorization: ' . ('Basic ' . base64_encode($SIFALO_USER . ':' . $SIFALO_PASS)),
    ],
    CURLOPT_POSTFIELDS     => json_encode($payload, JSON_UNESCAPED_SLASHES),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 30,
]);

$response = curl_exec($ch);
if ($response === false) {
    http_response_code(502);
    exit('Init cURL error: ' . curl_error($ch));
}
$http = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
curl_close($ch);

$data = json_decode($response, true);

$key = $data['key'];
$token = $data['token'];
  
// 4) BASIC VALIDATION
if ($http < 200 || $http >= 300 || !is_array($data) || empty($data['key']) || empty($data['token'])) {
    http_response_code(502);
    // Uncomment for debug:
    // header('Content-Type: text/plain');
    // echo "Init failed. HTTP $http\n$response";
    exit('Failed to initialize payment link.');
}

// 5) BUILD CHECKOUT URL (no double-encoding)
$base   = 'https://pay.sifalo.com/checkout/?key=' . $key . '&token=' . $token;



// 6) IMMEDIATE REDIRECT (no echo before this!)
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Location: ' . $base, true, 302);
exit;