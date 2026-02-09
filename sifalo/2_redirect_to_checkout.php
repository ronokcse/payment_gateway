<?php
// 2_redirect_to_checkout.php
$key   = $_GET['key']   ?? '';
$token = $_GET['token'] ?? '';

if ($key === '' || $token === '') {
    http_response_code(400);
    exit('Missing key/token.');
}

// Build checkout URL
$checkoutBase = 'https://pay.sifalo.com/checkout/';
$query        = http_build_query(['key' => $key, 'token' => $token], '', '&', PHP_QUERY_RFC3986);
$checkoutUrl  = $checkoutBase . '?' . $query;

// Send the user to Sifalo’s hosted page
header('Location: ' . $checkoutUrl);
exit;
