
<?php
session_start();
$key = uniqid('', true);

$fields = [
    "amount" => ["value" => "1000.00", "currency" => "RUB"],
   /*  "recipient" => [
        "account_id" => "100500",
        "gateway_id" => "100700"
    ], */
    "capture" => true,
    "confirmation" => [
        "type" => "redirect",
        "return_url" => "http://localhost/success.php",
    ],
    "description" => "Order No. 1",
    "metadata" => ["order_id" => "37"],
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.yookassa.ru/v3/payments');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Idempotence-key: ' . $key;

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_USERPWD, "922443:test_IVneFLkbhkGTrf1Q_GABFxWaFgmLlBT5WV0MNWmF0KE");

$result = curl_exec($ch);
$response = json_decode($result,true);


$invoice_id = $response['id'];
$_SESSION['invoice_id'] = $invoice_id;
$invoice_url = $response['confirmation']['confirmation_url'];
header('Location:'.$invoice_url);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
