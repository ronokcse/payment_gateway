		<?php 

		/* PHP */
		$post_data = array();
		$post_data['store_id'] = "xeron5fe8151f5dfd1";
		$post_data['store_passwd'] = "xeron5fe8151f5dfd1@ssl";
		$post_data['total_amount'] = "5000";
		$post_data['currency'] = "BDT";
		$post_data['tran_id'] = "SSLCZ_TEST_".uniqid();
		$post_data['success_url'] = "http://localhost/payment_gateway/sslcommerz/result.php";
		$post_data['fail_url'] = "http://localhost/payment_gateway/sslcommerz/fail.php";
		$post_data['cancel_url'] = "http://localhost/payment_gateway/sslcommerz/fail.php";


# CUSTOMER INFORMATION
			$post_data['cus_name'] = "Ronok";
			$post_data['cus_email'] = "ronok.konok@gmail.com";
			$post_data['cus_add1'] = "N/A";
			// $post_data['cus_add2'] = "Dhaka";
			$post_data['cus_city'] = "Dhaka";
			// $post_data['cus_state'] = "Dhaka";
			$post_data['cus_postcode'] = "1000";
			$post_data['cus_country'] = "";
			$post_data['cus_phone'] = 'N/A';
			# SHIPMENT INFORMATION
			$post_data['shipping_method'] = "NO";
			$post_data['num_of_item'] = 1;
			// $post_data['ship_name'] = "Customer";
			// $post_data['ship_add1'] = 'Dhaka';
			// $post_data['ship_city'] = "Dhaka";
			// $post_data['ship_state'] = "Dhaka";
			// $post_data['ship_postcode'] = "1000";
			// $post_data['ship_country'] = "Bangladesh";


			#product Details

			$post_data['product_name'] = "Computer";
			$post_data['product_category'] = "Electronic ";
			$post_data['product_profile'] = "general";

			# OPTIONAL PARAMETERS
			// $post_data['value_a'] = "ref001";
			// $post_data['value_b '] = "ref002";
			// $post_data['value_c'] = "ref003";
			// $post_data['value_d'] = "ref004";

			# EMI STATUS
			$post_data['emi_option'] = "1";

			# CART PARAMETERS
			// $post_data['cart'] = json_encode(array(
			//     array("product"=>"DHK TO BRS AC A1","amount"=>"200.00"),
			//     array("product"=>"DHK TO BRS AC A2","amount"=>"200.00"),
			//     array("product"=>"DHK TO BRS AC A3","amount"=>"200.00"),
			//     array("product"=>"DHK TO BRS AC A4","amount"=>"200.00")
			// ));
			// $post_data['product_amount'] = "100";
			// $post_data['vat'] = "5";
			// $post_data['discount_amount'] = "5";
			// $post_data['convenience_fee'] = "3";


			//$post_data['allowed_bin'] = "3,4";
			//$post_data['allowed_bin'] = "470661";
			//$post_data['allowed_bin'] = "470661,376947";


			# REQUEST SEND TO SSLCOMMERZ
			$direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v4/api.php";

			$handle = curl_init();
			curl_setopt($handle, CURLOPT_URL, $direct_api_url );
			curl_setopt($handle, CURLOPT_TIMEOUT, 30);
			curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
			curl_setopt($handle, CURLOPT_POST, 1 );
			curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
			curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


			$content = curl_exec($handle );

			$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

			if($code == 200 && !( curl_errno($handle))) {
			    curl_close( $handle);
			    $sslcommerzResponse = $content;
			} else {
			    curl_close( $handle);
			    echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
			    exit;
			}

			# PARSE THE JSON RESPONSE
			$sslcz = json_decode($sslcommerzResponse, true );

			// var_dump($sslcz); exit;

			if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="") {
				// this is important to show the popup, return or echo to sent json response back
			   echo   json_encode(['status' => 'success', 'data' => $sslcz['GatewayPageURL'], 'logo' => $sslcz['storeLogo'] ]);
			} else {
			   echo   json_encode(['status' => 'fail', 'data' => null, 'message' => "JSON Data parsing error!"]);
			}
      


?>