<?php
session_start();
$curl = curl_init();
  /** 

    1. Encode the Secret Api key  above into Base64 format
    2. Make sure to include ( : ) at the end of the secret Api key
  
  ***/
$secret_api_key = 'xnd_development_mI7X057K9Lv1V0CneUAbxPFdmWlVHRDVcdpOIFGHJlzmAG6vgTz1Iy4apMN:';
$secret_api_key = base64_encode($secret_api_key);
$params = [ 
  'external_id' => 'demo_'.uniqid(),
  'payer_email' => 'ronok.konok123@gmail.com',
  'description' => 'Software maintaince',
  'amount' => 10000,
  'success_redirect_url' => 'http://localhost/payment_gateway/xendit/success.php',
  'failure_redirect_url' => 'http://localhost/payment_gateway/xendit/success.php',
  'currency' => 'IDR',

];
$params = json_encode($params);
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.xendit.co/v2/invoices',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$params,
    CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic '.$secret_api_key,
    'Cookie: visid_incap_2182539=gbPSM59jRHebZE1evmfNVGpE7F8AAAAAQUIPAAAAAADBsA1NmcP5npE9eqj7NJWx; nlbi_2182539=NTHXJ+a+xHZW3ckajjCKbQAAAABOFjauz2/OfLCFxCOPeeDC; incap_ses_714_2182539=/502a4SHST+V5O7NaqPoCb6k8l8AAAAAmvYHuz6v8DN7E0vNYqcg1A=='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;
$response = json_decode($response,true);

// echo '<pre>';
// print_r($response);
// exit();
$invoice_id = $response['id'];
$_SESSION['invoice_id'] = $invoice_id;
$invoice_url = $response['invoice_url'];
echo '<pre>';
print_r($invoice_url);
header('Location:'.$invoice_url);