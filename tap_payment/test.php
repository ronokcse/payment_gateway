<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.tap.company/v2/authorize",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"amount\":1,\"currency\":\"KWD\",\"customer\":{\"first_name\":\"test\",\"middle_name\":\"test\",\"last_name\":\"test\",\"email\":\"test@test.com\",\"phone\":{\"country_code\":\"965\",\"number\":\"50000000\"}},\"source\":{\"id\":\"tok_34nmhg7nbvh45d7g\"},\"auto\":{\"type\":\"VOID\",\"time\":100},\"post\":{\"url\":\"http://localhost/payment_gateway/tap_payment/success.php\"},\"redirect\":{\"url\":\"http://localhost/payment_gateway/tap_payment/redirect.php\"}}",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer sk_test_XKokBfNWv6FIYuTMg5sLPjhJ",
    "content-type: application/json"
  ),
));

$response = json_decode(curl_exec($curl),true);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo '<pre>';
  print_r($response);
}
