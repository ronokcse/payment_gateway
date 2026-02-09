<?php
/**
 * M-Pesa STK Push - Simple PHP cURL Implementation
 * 
 * তোমার credentials এখানে বসাও:
 */

// ============================================
// CONFIGURATION - তোমার credentials বসাও
// ============================================
$consumer_key = 'jTA0HQuOpvJsRdQAgyingZhwDRHAQwYENVnGQusG2fLa9flm';
$consumer_secret = 'pTz98awIGxk3lxeqlpodwPmYqGWDowtZ79i7OhV5naPk7qIQatJPtJZrlDYaqg3w';
$business_shortcode = '174379'; // তোমার shortcode
$passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919'; // তোমার passkey
$callback_url = 'https://a3a7edec7bb7.ngrok-free.app/mpesa/callback.php'; // তোমার callback URL

// // STK Push Parameters
$phone = '254712345678'; // Customer phone (2547XXXXXXXX format)
$amount = 1; // Amount in KES
$account_reference = 'Test123'; // Account reference
$transaction_desc = 'Payment'; // Transaction description

// Environment (sandbox or live)
$environment = 'sandbox'; // 'sandbox' or 'live'

// ============================================
// STEP 1: Get Access Token
// ============================================
$token_url = ($environment === 'sandbox') 
    ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
    : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

$ch = curl_init($token_url);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json; charset=utf8']);
curl_setopt($ch, CURLOPT_USERPWD, $consumer_key . ':' . $consumer_secret);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$token_response = curl_exec($ch);
curl_close($ch);

$token_data = json_decode($token_response, true);
$access_token = $token_data['access_token'] ?? null;

if (!$access_token) {
    die('Error: Could not get access token. Response: ' . $token_response);
}

echo "✅ Access Token: " . substr($access_token, 0, 20) . "...\n\n";

// ============================================
// STEP 2: Prepare STK Push Request
// ============================================
$timestamp = date('YmdHis'); // Format: YYYYMMDDHHmmss
$password = base64_encode($business_shortcode . $passkey . $timestamp);

$stkpush_url = ($environment === 'sandbox')
    ? 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest'
    : 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

$payload = [
    'BusinessShortCode' => $business_shortcode,
    'Password' => $password,
    'Timestamp' => $timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' => 1,
    'PartyA' => '600978',
    'PartyB' => '600000',
    'PhoneNumber' => '254708374149',
    'CallBackURL' => $callback_url,
    'AccountReference' => 'ronok',
    'TransactionDesc' => 'test payment',
];

// ============================================
// STEP 3: Send STK Push Request
// ============================================
$ch = curl_init($stkpush_url);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type:application/json',
    'Authorization:Bearer ' . $access_token
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// ============================================
// STEP 4: Display Response
// ============================================
echo "📤 STK Push Response:\n";
echo "HTTP Code: " . $http_code . "\n\n";
echo "Response:\n";
echo json_encode(json_decode($response, true), JSON_PRETTY_PRINT);

?>
