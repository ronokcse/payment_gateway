<?php

$url = "https://payment.greenwordpress.com/api/create-charge";

$data = [
    "full_name"     => "Demo",
    "email_mobile"  => "demo@gmail.com",
    "amount"        => "10",
    "metadata"      => [ "product_id" => "5" ],
    "redirect_url"  => "https://piprapay.com",
    "return_type"   => "GET",
    "cancel_url"    => "http://localhost/success.php",
    "webhook_url"   => "https://piprapay.com",
    "currency"      => "BDT"
];

// Replace this with your actual API key
$apiKey = "1841567823687b6ffc56af84040849261130761998687b6ffc56afc957154151";

$headers = [
    "Accept: application/json",
    "Content-Type: application/json",
    "mh-piprapay-api-key: $apiKey"
];

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);

curl_close($ch);
