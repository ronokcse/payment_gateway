<?php
// Collect form data
$merchant_id = '10034169';
$merchant_key = 'p46yivjhnv6wb';
$return_url = 'https://5b3d-103-121-60-46.ngrok-free.app/test.php';
$notify_url = 'https://5b3d-103-121-60-46.ngrok-free.app/notify_url.php';
$amount = 100;
$item_name = 'Test';

// Prepare data to be sent to PayFast
$data = array(
    'merchant_id' => $merchant_id,
    'merchant_key' => $merchant_key,
    'm_payment_id' => '12964456',
    'notify_url' => $notify_url,
    'return_url' => $return_url,
    'amount' => $amount,
    'item_name' => $item_name
);

// Convert data array to query string
$data_string = http_build_query($data);

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, "https://sandbox.payfast.co.za/eng/process");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    echo $response;
}

// Close cURL session
curl_close($ch);
?>
