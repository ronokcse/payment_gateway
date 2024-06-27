<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.chapa.co/v1/transaction/initialize',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
	"amount":"1000",
  "currency": "ETB",
  "email": "sagarsarker2611@gmail.com",
  "first_name": "Sagar",
  "last_name": "Sarker",
  "phone_number": "01725872838",
  "tx_ref": "chewatatest-147852145626cscsa5g",
  "return_url": "http://localhost/chapa/return_url.php",
  "callback_url": "http://localhost/chapa/return_url.php",
  "customization[title]": "Payment for my favourite merchant",
  "customization[description]": "I love online payments."
  }',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer CHASECK_TEST-hmilgLDNaC80WwOyUkQ42hX8ZmsHAAlK',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

$response = json_decode($response);

$checkout_url = $response->data->checkout_url;
header("Location:".$checkout_url);  
?>

