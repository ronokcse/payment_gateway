<?php

	$secret_key = 'sk_test_XKokBfNWv6FIYuTMg5sLPjhJ';
	$ch = curl_init();

	$data = array(
		"amount" => 10,
		"currency" => "KWD",
		"customer_initiated" => true,
		"description" => "Test Description",
		"customer" => array(
			"first_name" => "test",
			"middle_name" => "test",
			"last_name" => "test",
			"email" => "test@test.com",
		),
		"source" => array(
			"id" => "src_all"
		),
		"redirect" => array(
			"url" => "http://localhost/payment_gateway/tap/success.php"
		)
	);

	$options = array(
		CURLOPT_URL => "https://api.tap.company/v2/charges",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => json_encode($data),
		CURLOPT_HTTPHEADER => array(
			"Authorization: Bearer ".$secret_key,
			"accept: application/json",
			"content-type: application/json"
		)
	);

	curl_setopt_array($ch, $options);

	$response = curl_exec($ch);
	$err = curl_error($ch);

	curl_close($ch);

	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		$response = json_decode($response);
		$checkout_url = $response->transaction->url;
		header('Location:'.$checkout_url);
	}
?>
