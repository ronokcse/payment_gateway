<?php 
   
// $payment_id = $_REQUEST['payment_id'];
// $payment_request_id = $_REQUEST['payment_request_id'];
// $url = 'https://test.instamojo.com/api/1.1/payment-requests/'.$payment_request_id.'/'.$payment_id;

// $ch = curl_init();

// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_HEADER, FALSE);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
// curl_setopt($ch, CURLOPT_HTTPHEADER,
// array("X-Api-Key:test_65c5a046846619c5da353cc139f",
//       "X-Auth-Token:test_3a951eb52f2c2bb78dafde3d3d7"));
// $response = curl_exec($ch);
// curl_close($ch); 

//         echo '<pre>';
//         echo $response;
      

            // $payment_id = $_REQUEST['payment_id'];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/oauth2/token/');     
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

            $payload = Array(
            'grant_type' => 'client_credentials',
            'client_id' => 'test_G8tMgT7OD6ggKN1dQryhiRzIDmjo98IR9We',
            'client_secret' =>'test_E8DkPS5tdPFpShH09QNtpukY1QchhZ4dV6hjSvHdTffTCw2O8JwhTaUTKWRW1lSGwDq0YsBhJSWnEJbdqGDpnR9BIiMnUcBCOaJeXrm4QXouVuqYlUvZlU0NWlw'
            );

            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
            $response = curl_exec($ch);
            curl_close($ch); 

            $response = json_decode($response,true);
            $access_token = $response['access_token'];

            $url = 'https://test.instamojo.com/v2/payments/MOJO3713J05A60967550/';
            // echo $url;exit;





            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/v2/payment_requests/MOJO3713J05A60967550/');
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER,array('Authorization: Bearer '.$access_token));

            $response = curl_exec($ch);
            curl_close($ch);
            $response = json_decode( $response, true );
            print_r($response);






 ?>



<!--  if($this->instamojo_v2_mode=='sandbox') $this->instamojo_v2_api_url="https://test.instamojo.com/v2/";
    else $this->instamojo_v2_api_url="https://api.instamojo.com/v2/payments";
    $url = $this->instamojo_v2_api_url.$this->payment_id.'/';

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "https://test.instamojo.com/oauth2/token/");     
      curl_setopt($ch, CURLOPT_HEADER, FALSE);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

      $payload = Array(
          'grant_type' => 'client_credentials',
          'client_id' => $this->instamojo_client_id,
          'client_secret' => $this->instamojo_client_secret,
          
        );

      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
      $response = curl_exec($ch);
      curl_close($ch); 
      $response = json_decode($response,true);

     
      $instamojo_access_token = $response['access_token'];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER,
    array('Authorization: Bearer '.$instamojo_access_token));

    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode( $response, true );
    dd($response);
    return $response; -->