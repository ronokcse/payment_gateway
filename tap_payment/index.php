<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.tap.company/v2/invoices",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"draft\":false,\"due\":161113753214524224,\"expiry\":16111375321452422,\"description\":\"test invoice\",\"mode\":\"INVOICE\",\"note\":\"test note\",\"notifications\":{\"channels\":[\"SMS\",\"EMAIL\"],\"dispatch\":true},\"currencies\":[\"KWD\"],\"metadata\":{\"udf1\":\"1\",\"udf2\":\"2\",\"udf3\":\"3\"},\"charge\":{\"receipt\":{\"email\":true,\"sms\":true},\"statement_descriptor\":\"test\"},\"customer\":{\"email\":\"test@test.com\",\"first_name\":\"test\",\"last_name\":\"test\",\"middle_name\":\"test\",\"phone\":{\"country_code\":\"965\",\"number\":\"51234567\"}},\"order\":{\"amount\":300 ,\"currency\":\"KWD\",\"items\":[{\"amount\":10,\"currency\":\"KWD\",\"description\":\"test\",\"discount\":{\"type\":\"P\",\"value\":0},\"image\":\"\",\"name\":\"test\",\"quantity\":1}],\"shipping\":{\"amount\":1,\"currency\":\"KWD\",\"description\":\"test\",\"provider\":\"ARAMEX\",\"service\":\"test\"},\"tax\":[{\"description\":\"test\",\"name\":\"VAT\",\"rate\":{\"type\":\"F\",\"value\":1}}]},\"payment_methods\":[\"\"],\"post\":{\"url\":\"http://localhost/payment_gateway/tap_payment/success.php\"},\"redirect\":{\"url\":\"http://localhost/payment_gateway/tap_payment/redirect.php\"},\"reference\":{\"invoice\":\"INV_00001\",\"order\":\"ORD_00001\"}}",
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
