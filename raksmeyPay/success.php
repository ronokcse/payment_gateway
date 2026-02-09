<?php

print_r($_GET);

$profile_key = 'd4f8353655452037ab99ea36fdb45a1e82f0ac4ca75062136060b867cd3b1173947f126dad665f1a'; // same as above
$transaction_id = $_GET['transaction_id'] ?? '';
$success_time = $_GET['success_time'] ?? '';
$success_amount = $_GET['success_amount'] ?? '';
$bakong_hash = $_GET['bakong_hash'] ?? '';
$success_hash = $_GET['success_hash'] ?? '';


// Recalculate hash
$calculated_hash = sha1($profile_key . $success_time . $success_amount . $bakong_hash . $transaction_id);

if ($calculated_hash !== $success_hash) {
    die("Invalid hash");
}



$expected_amount = $_GET['amount'] ?? '';

// Create hash
$hash = sha1($profile_key . $transaction_id);

// cURL POST request to RaksmeyPay verify API
$verify_url = "https://raksmeypay.com/api/payment/verify/84664a0f03d8e981a0570652f0c59518";
$data = [
    'transaction_id' => $transaction_id,
    'hash' => $hash,
];

$ch = curl_init($verify_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$response = curl_exec($ch);
curl_close($ch);

// Decode response
$responseData = json_decode($response, true);
echo"<pre>";
print_r($responseData);    
exit;

// Validate response
if (!empty($responseData['payment_status']) &&
    strtoupper($responseData['payment_status']) === 'SUCCESS' &&
    $responseData['payment_amount'] == $expected_amount
) {
    // ✅ Credit balance here using $transaction_id
    echo "✅ Payment verified successfully. Credit user now.";
} else {
    echo "❌ Payment verification failed.";
}

exit;