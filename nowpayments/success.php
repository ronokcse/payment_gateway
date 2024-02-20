<?php 

	$payment_id = $_GET['NP_id'];


	$curl = curl_init();

	curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://api-sandbox.nowpayments.io/v1/payment/'.$payment_id,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'GET',
	CURLOPT_HTTPHEADER => array(
		'x-api-key: 624BPHX-959M2AD-NZAM3BB-9CESRHC'
	),
	));

	$response = curl_exec($curl);

	curl_close($curl);
	echo "<pre>";
	print_r(json_decode($response));





 ?>