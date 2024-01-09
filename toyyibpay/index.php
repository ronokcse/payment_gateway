<?php
  $some_data = array(
    'userSecretKey'=>'ypz805hc-7gfg-hvaw-k25v-lj3nfiw6kn5o',
    'categoryCode'=>'6owdv32t',
    'billName'=>'Car Rental WXX123',
    'billDescription'=>'Car Rental WXX123 On Sunday',
    'billPriceSetting'=>0,
    'billPayorInfo'=>1,
    'billAmount'=>650,
    'billReturnUrl'=>'http://localhost/payment_gateway/toyyibpay/success.php',
    //'billCallbackUrl'=>'http://localhost/payment_gateway/toyyibpay/callback.php',
    'billExternalReferenceNo' => 'AFR341DFI',
    'billTo'=>'John Doe',
    'billEmail'=>'jd@gmail.com',
    'billPhone'=>'0194342411',
    'billSplitPayment'=>0,
    'billSplitPaymentArgs'=>'',
    'billPaymentChannel'=>'2',
    'billContentEmail'=>'Thank you for purchasing our product!',
    'billChargeToCustomer'=>''
  );  

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/createBill');  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

  $result = curl_exec($curl);
  $info = curl_getinfo($curl);  
  curl_close($curl);
  $obj = json_decode($result,true);
  $bill_code = $obj[0]['BillCode'];
  $url = 'https://dev.toyyibpay.com/'.$bill_code;
  header('Location:'.$url);

