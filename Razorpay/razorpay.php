<?php 
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/payment_links/');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"amount\": 1000,\n  \"currency\": \"INR\",\n  \"accept_partial\": true,\n  \"first_min_partial_amount\": 100,\n  \"expire_by\": 1694846441,\n  \"reference_id\": \"TS19s89d34fd56\",\n  \"description\": \"Payment for policy no #23456\",\n  \"customer\": {\n    \"name\": \"Gaurav Kumar\",\n    \"contact\": \"+919000090000\",\n    \"email\": \"gaurav.kumar@example.com\"\n  },\n  \"notify\": {\n    \"sms\": true,\n    \"email\": true\n  },\n  \"reminder_enable\": true,\n  \"notes\": {\n    \"policy_name\": \"Jeevan Bima\"\n  },\n  \"callback_url\": \"http://localhost/success.php\",\n  \"callback_method\": \"get\"\n}");
	curl_setopt($ch, CURLOPT_USERPWD, 'rzp_test_kJIR4rxMItEVJ8:1fhBEjNVluu1AS16ZBaxICfw');
	$headers = array();
	$headers[] = 'Content-Type: application/json';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	echo "<pre>";
	print_r(json_decode($result));exit;

	if (curl_errno($ch)) {
	    echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);


 ?>