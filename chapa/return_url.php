<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.chapa.co/v1/transaction/verify/chewatatest-147852145626hfhfhcscsa5g',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
'Authorization: Bearer CHASECK_TEST-hmilgLDNaC80WwOyUkQ42hX8ZmsHAAlK'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

echo $response;
    
  