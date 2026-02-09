<?php

   $live_password_1  =  "iGr6ZhRIETnb6j7DqQ73";
   $live_password_2  =  "GxxDNHQ0nYV46a5FPf8e";

  $test_password_1  =  "jIVY3hxcyy3m07f7JoWR";
  $test_password_2  =  "QP4fxQsHF6nKWG69cYl6";


          // $merchant_login = "leadbot";
          // $password_1 = "iGr6ZhRIETnb6j7DqQ73";
          // $invid = 123;
          // $description = "тариф Srart";
          // $out_sum = "5000.00";
          // $signature_value = md5("$merchant_login:$out_sum:$invid:$live_password_1");
          // print "<html><script language=JavaScript ".
          //   "src='https://auth.robokassa.kz/Merchant/PaymentForm/FormMS.js?".
          //   "MerchantLogin=$merchant_login&OutSum=$out_sum&InvoiceID=$invid".
          //   "&Description=$description&SignatureValue=$signature_value'></script></html>";

          $mrh_login = "leadbot";
          $mrh_pass1 = $test_password_1;
          $inv_id = 678678;
          $inv_desc = "Товары для животных";
          $out_summ = "100.00";
          $IsTest = 1;
          $crc = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1");
          print "<html><script language=JavaScript ".
            "src='https://auth.robokassa.kz/Merchant/PaymentForm/FormMS.js?".
            "MerchantLogin=$mrh_login&OutSum=$out_summ&InvoiceID=$inv_id".
            "&Description=$inv_desc&SignatureValue=$crc&IsTest=$IsTest'></script></html>";
