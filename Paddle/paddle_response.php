<?php

$curl = curl_init();


curl_setopt_array($curl, [
  CURLOPT_URL => "https://sandbox-vendors.paddle.com/api/2.0/product/generate_pay_link",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "vendor_id=5746&vendor_auth_code=f87134e253253e311a22a47f82bfa3761e8a3384005cab0983&product_id=27228&customer_email=konok@gmail.com&return_url=https://xeroneit.net/",
  CURLOPT_HTTPHEADER => [
   "Content-Type: application/x-www-form-urlencoded",
    "Prefer: code=200, example=application/json"
  ],
]);

$response = curl_exec($curl);

$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $result = json_decode($response, true);
  header("Location: {$result['response']['url']}");
}