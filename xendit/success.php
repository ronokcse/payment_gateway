<?php 
	session_start();
	$invoice_id = $_SESSION['invoice_id'];
 /** 

    1. Encode the Secret Api key  above into Base64 format
    2. Make sure to include ( : ) at the end of the secret Api key
  
  ***/
    $secret_api_key = 'xnd_development_mI7X057K9Lv1V0CneUAbxPFdmWlVHRDVcdpOIFGHJlzmAG6vgTz1Iy4apMN:';
    $secret_api_key = base64_encode($secret_api_key);
    
    $curl = curl_init();

    curl_setopt_array($curl, array(
    	CURLOPT_URL => 'https://api.xendit.co/v2/invoices/'.$invoice_id,
    	CURLOPT_RETURNTRANSFER => true,
    	CURLOPT_ENCODING => '',
    	CURLOPT_MAXREDIRS => 10,
    	CURLOPT_TIMEOUT => 0,
    	CURLOPT_FOLLOWLOCATION => true,
    	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    	CURLOPT_CUSTOMREQUEST => 'GET',
    	CURLOPT_HTTPHEADER => array(
    		'Authorization: Basic eG5kX2RldmVsb3BtZW50X21JN1gwNTdLOUx2MVYwQ25lVUFieFBGZG1XbFZIUkRWY2RwT0lGR0hKbHptQUc2dmdUejFJeTRhcE1OOg==',
    		'Cookie: visid_incap_2182539=gbPSM59jRHebZE1evmfNVGpE7F8AAAAAQUIPAAAAAADBsA1NmcP5npE9eqj7NJWx; nlbi_2182539=xryvT4w/TFdCCRzFjjCKbQAAAABZA7IBlYCl714TNa94Bs2O; incap_ses_714_2182539=XTxPeZx0lnE4HNbNaqPoCT6o8V8AAAAAZEgo713UH5uxKhUWP1x+ug=='
    	),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $response = json_decode( $response, true );
echo '<pre>';
print_r($response);
exit();

    $status = $response['status'];
    if($status == 'PAID')
    {
    	echo 'Succussefully payment PAID';
    }

    if($status == 'PENDING' )
    {
    	echo 'Your payment is pending';
    }


    ?>
    xnd_public_development_CPVF1iBMEVYlR4n5Re1OTF05XpzGGLCflouT9Hkclv9CtJHKUYCCRoo3If7