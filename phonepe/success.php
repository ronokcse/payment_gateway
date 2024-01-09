<?php 

	$response = $_POST;
    
	$saltKey = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
	$saltIndex = 1;
	$string = '/pg/v1/status/'.$response['merchantId'].'/'.$response['transactionId'].$saltKey;
    $sha256 = hash('sha256', $string);
    $finalXHeader = $sha256.'###'.$saltIndex; 
    $url = "https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/status/".$response['merchantId']."/".$response['transactionId'];
    $headers = array(
        "Content-Type: application/json",
        "accept: application/json",
        "X-VERIFY: " . $finalXHeader,
        "X-MERCHANT-ID: " . $response['merchantId']
    );

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $resp = curl_exec($curl);

    curl_close($curl);

    $response = json_decode($resp);

    echo "<pre>";
    print_r($response);

 ?>