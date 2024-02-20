<?php 

  //   curl --request POST \
  // --url https://api.paymongo.com/v1/sources \
  // --header 'Authorization: Basic cGtfdGVzdF9udHB5VmJKcUMzUEw1QVJieXJ1cWFLNmE6' \
  // --header 'Content-Type: application/json' \
  // --data '{"data":{"attributes":{"amount":100000,"redirect":{"success":"http://localhost/phpmyadmin","failed":"http://localhost/phpmyadmin"},"billing":{"address":{"line1":"Shaheb Bazar","state":"Rajshahi","postal_code":"6300","city":"Rajshaahi","country":"BD"},"name":"Md Ronok","email":"ronok.akash@gmail.com","phone":"01521455439"},"type":"grab_pay","currency":"PHP"}}}'

$curl = curl_init();
$params = [ 
  'data' =>[
     'attributes'=>[
        'amount' => 10000,
        'redirect' => [
            'success'=>'http://localhost/payment_gateway/paymongo/success.php',
            'failed' => 'http://localhost/payment_gateway/paymongo/fail.php',
        ],
        'currency' => 'PHP',
        'type' => 'grab_pay',
        'livemode' => false
     ]
   ]

];
$params = json_encode($params);
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.paymongo.com/v1/sources',
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
    'Authorization: Basic cGtfdGVzdF9udHB5VmJKcUMzUEw1QVJieXJ1cWFLNmE6',
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;
$response = json_decode($response,true);
echo '<pre>';
print_r($response);

// $check_out_url = $response['data']['attributes']['redirect']['checkout_url'];
// print_r($check_out_url);

// header('Location:'.$check_out_url);






 ?>