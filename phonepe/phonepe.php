<?php 

	$payload =[
	  	  "merchantId"=> "PGTESTPAYUAT",
	  	  "merchantTransactionId"=> "MT7850590.068188104",
	  	  "merchantUserId" => "MUID123",
	  	  "amount"=> 90000,
	  	  "redirectUrl"=>"http://localhost/payment_gateway/phonepe/success.php",
	  	  "redirectMode"=>"http://localhost/payment_gateway/phonepe/success.php",
	  	  "callbackUrl"=>"http://localhost/success.php",
	  	  "mobileNumber"=> "9999999999",
	  	  "paymentInstrument"=>[
	  	    "type"=> "PAY_PAGE"
	  	  ]
	];

 	$encod = json_encode($payload);
 	$encoded = base64_encode($encod);
    $saltKey = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
    $saltIndex = '1';
    $string = $encoded."/pg/v1/pay".$saltKey;
    $sha256_code = hash('sha256',$string);
    $final_x_header = $sha256_code.'###'.$saltIndex;


    // $url = "https://api.phonepe.com/apis/hermes/pg/v1/pay"; <PRODUCTION URL>

    $url = "https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay"; // <TESTING URL>

    $headers = array(
        "Content-Type: application/json",
        "accept: application/json",
        "X-VERIFY: " . $final_x_header,
    );

    $data = json_encode(['request' => $encoded]);
    
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    $resp = curl_exec($curl);

    curl_close($curl);

    $response = json_decode($resp);
    echo "<pre>";
    header('Location:' . $response->data->instrumentResponse->redirectInfo->url);
    


 ?>

