<?php
// Collect form data
$merchant_id = '10034169';
$merchant_key = 'p46yivjhnv6wb';
$return_url = 'https://5b3d-103-121-60-46.ngrok-free.app/success.php'; //Success url change your own url
$notify_url = 'https://5b3d-103-121-60-46.ngrok-free.app/notify_url.php'; //notify url . (this url must be server based ngrok or live server, where you can not access thsis url. after complete the payment the payfast give e response as webhook. and you need to insert the response in database for further check.)
$amount = 100;
$item_name = 'Test';

// Prepare data to be sent to PayFast


$data = array(
    'merchant_id' => $merchant_id,
    'merchant_key' => $merchant_key,
    'm_payment_id' => '12963s444456',
    'notify_url' => $notify_url,
    'return_url' => $return_url,
    'amount' => $amount,
    'name_first'=> 'Ronok',
    'email_address'=> 'ronok.akash@gmail.com',
    'item_name' => $item_name
);

// Convert data array to JSON string
$data_string = json_encode($data);

// Initialize cURL session
$ch = curl_init();

// For live : https://www.payfast.co.za/eng/process

// Set cURL options
curl_setopt($ch, CURLOPT_URL, "https://sandbox.payfast.co.za/eng/process");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string)
));

// Execute cURL request
$response = curl_exec($ch);
print_r($response);
exit;
// Check for errors
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    echo $response;
}
// Close cURL session
curl_close($ch);
?>
