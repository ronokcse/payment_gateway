<?php 
    
    $secret_key = 'sk_test_XKokBfNWv6FIYuTMg5sLPjhJ';
    $tap_id = $_GET['tap_id'];
    $ch = curl_init();

    $options = array(
        CURLOPT_URL => "https://api.tap.company/v2/charges/".$tap_id, // Replace "charge_id" with the actual charge ID
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPGET => true,
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer ".$secret_key,
            "accept: application/json"
        )
    );

    curl_setopt_array($ch, $options);

    $response = curl_exec($ch);
    $err = curl_error($ch);


    echo "<pre>";
    print_r($response);

    curl_close($ch);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo "<pre>";
        $response = json_decode($response);
        if(isset($response->status) &&  $response->status == 'CAPTURED'){
            echo 'payment is successfull';
        }
    }
   
   

?>
