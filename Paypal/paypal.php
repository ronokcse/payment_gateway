<?php 

    function paypal_test()
    {
       $provider = new PayPalClient;
       $provider->getAccessToken();
       $order = $provider->createOrder([
             'intent'=> 'CAPTURE',
             'purchase_units'=> [[
                 'reference_id' => 'transaction_test_number',
                 'amount'=> [
                   'currency_code'=> 'USD',
                   'value'=> '20.00'
                 ]
             ]],
             'application_context' => [
                  'cancel_url' => 'http://hotelsystem.test/paypal/cancel',
                  'return_url' => 'http://hotelsystem.test/paypal/success'
             ]
         ]);
         // Send user to PayPal to confirm payment
       return redirect($order['links'][1]['href'])->send();
    }



 ?>