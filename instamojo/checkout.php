<?php

    // $ch = curl_init();

    // curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
    // curl_setopt($ch, CURLOPT_HEADER, FALSE);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    // curl_setopt($ch, CURLOPT_HTTPHEADER,
    //     array("X-Api-Key:test_65c5a046846619c5da353cc139f",
    //       "X-Auth-Token:test_3a951eb52f2c2bb78dafde3d3d7"));
    // $payload = Array(
    //     'purpose' => 'Software update',
    //     'amount' => '4599',
    //     'phone' => '01521455439',
    //     'buyer_name' => 'Mamuduzzaman',
    //     'email' => 'ronok.konok123@gmail.com',
    //     'redirect_url' => 'http://localhost/personal%20project/payment_gateway/instamojo/success.php',
    //     'send_email' => false,
    //     'webhook' => '',
    //     'send_sms' => true,
    //     'allow_repeated_payments' => false
    // );
    // curl_setopt($ch, CURLOPT_POST, true);
    // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
    // $response = curl_exec($ch);
    // curl_close($ch); 

    // $response = json_decode( $response,true );
    // // echo '<pre>';
    // // print_r($response);
    // // exit();
    // $longurl = $response['payment_request']['longurl'];
    // echo $longurl;
    // header('Location:'.$longurl);
    // die();


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/oauth2/token/');     
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

    $payload = Array(
        'grant_type' => 'client_credentials',
        'client_id' => 'test_gRq0HGUnHf8E6q0xqVVXKYT3uBs6MXqa2IO',
        'client_secret' =>'test_1uu4kM7uzQKgv5czd5C667bKtNb9he1oLDTjeyERHIy0JimJGQsqcWrVDPQ5x4nsbPK5SrxHJhbWPVRZdyU88TfMzlFaptAtZaE1DR1UmVckLYZntVtIgElLhKg'
      );

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
    $response = curl_exec($ch);
    curl_close($ch); 
 
    $response = json_decode($response,true);
    $access_token = $response['access_token'];


    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/v2/payment_requests/');
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER,array('Authorization: Bearer '.$access_token));

    $payload = Array(
      'purpose' => 'FIFA 16',
      'amount' => '2500',
      'buyer_name' => 'John Doe',
      'email' => 'foo@example.com',
      'phone' => '9999999999',
      'redirect_url' => 'http://localhost/personal%20project/payment_gateway/instamojo/success.php',
      'send_email' => 'True',
      'webhook' => 'http://www.example.com/webhook/',
      'allow_repeated_payments' => 'False',
    );

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
    $response = curl_exec($ch);

    $response = json_decode( $response,true );
    curl_close($ch); 


   
    $longurl = $response['longurl'];
    header('Location:'.$longurl);


            
    ?>