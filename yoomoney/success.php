<?php 

   session_start();
   $invoice_id = $_SESSION['invoice_id'];
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, 'https://api.yookassa.ru/v3/payments/'.$invoice_id);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);



   $headers = array();
   $headers[] = 'Content-Type: application/json';

   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_USERPWD, "922443:test_IVneFLkbhkGTrf1Q_GABFxWaFgmLlBT5WV0MNWmF0KE");

   $result = curl_exec($ch);
   $response = json_decode($result,true);

   echo '<pre>';
   print_r($response);
   
   if (curl_errno($ch)) {
     echo 'Error:' . curl_error($ch);
  }
  curl_close($ch);

?>