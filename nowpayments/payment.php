<?php 
    

    $now_payments_api_key = '624BPHX-959M2AD-NZAM3BB-9CESRHC';
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api-sandbox.nowpayments.io/v1/invoice',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
      "price_amount": 20000,
      "price_currency": "usd",
      "order_id": "RGDBP-21314",
      "order_description": "Apple Macbook Pro 2017 x 1",
      "ipn_callback_url": "https://nowpayments.io",
      "success_url": "http://localhost/success.php",
      "cancel_url": "http://localhost/success.php",
      "partially_paid_url": "https://nowpayments.io",
      "is_fixed_rate": true,
      "is_fee_paid_by_user": false
    }

    ',
      CURLOPT_HTTPHEADER => array(
        'x-api-key: 624BPHX-959M2AD-NZAM3BB-9CESRHC',
        'Content-Type: application/json'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;





 ?>
