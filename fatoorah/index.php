<?php

  // test card : 4600410123456789    cvv: 1234

##########Send Payment (Offline)###########
		$token = "rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL"; #token value to be placed here;
		$basURL = "https://apitest.myfatoorah.com";
		$data_post = array (
		  'NotificationOption' => 'ALL',
		  'CustomerName' => 'Ahmed',
		  'DisplayCurrencyIso' => 'KWD',
		  'MobileCountryCode' => '+880',
		  'CustomerMobile' => '1724816054',
		  'CustomerEmail' => 'xx@yy.com',
		  'InvoiceValue' => 100,
		  'CallBackUrl' => 'https://xerochat.in/success.php',
		  'ErrorUrl' => 'https://xerochat.in/success.php',
		  'Language' => 'en',
		  // 'CustomerReference' => 'ref 1',
		  // 'CustomerCivilId' => 12345678,
		  // 'UserDefinedField' => 'Custom field',
		  // 'ExpireDate' => '',
		  // 'CustomerAddress' => 
		  // array (
		  //   'Block' => '',
		  //   'Street' => '',
		  //   'HouseBuildingNo' => '',
		  //   'Address' => '',
		  //   'AddressInstructions' => '',
		  // ),
		  'InvoiceItems' => 
		  array (
		    0 => 
		    array (
		      'ItemName' => 'Product 01',
		      'Quantity' => 1,
		      'UnitPrice' => 100,
		    ),
		  ),
		);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "$basURL/v2/SendPayment",
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => json_encode($data_post),
		    CURLOPT_HTTPHEADER => array("Authorization: Bearer $token","Content-Type: application/json"),

		));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$response = json_decode(curl_exec($curl),true);
		$err = curl_error($curl);

		// echo '<pre>';
		// print_r($response);
		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  $checkout_url = $response['Data']['InvoiceURL'];
		  header('Location:'.$checkout_url);
		  die();
		}

  

?>