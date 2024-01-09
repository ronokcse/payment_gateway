   
 <?php

$merchant_id = '733160975384269';
$secretkey = '3183-1053214963';
 $params = [ 
        'detail' => 'Example of software',
        'amount' => '250' ,   // The format must be in 2 decimal places. Example 25.50.
        'order_id' => 'demo_'.uniqid(),
        'name' => 'Admin',
        'email' => 'ropnok@gmail.com',
        'phone' => '01235489634',

      ];

# this part is to process data from the form that user key in, make sure that all of the info is passed so that we can process the payment
if(isset($params['detail']) && isset($params['amount']) && isset($params['order_id']) && isset($params['name']) && isset($params['email']) && isset($params['phone']))
{
    # assuming all of the data passed is correct and no validation required. Preferably you will need to validate the data passed
    $hashed_string = md5($secretkey.urldecode($params['detail']).urldecode($params['amount']).urldecode($params['order_id']));
    
    ?>
    <html>
    <head>
    <title>senangPay Sample Code</title>
    </head>
    <body onload="document.order.submit()">
        <form name="order" method="POST" action="https://sandbox.senangpay.my/payment/<?php echo $merchant_id; ?>">
            <input type="hidden" name="detail" value="<?php echo $params['detail']; ?>">
            <input type="hidden" name="amount" value="<?php echo $params['amount']; ?>">
            <input type="hidden" name="order_id" value="<?php echo $params['order_id']; ?>">
            <input type="hidden" name="name" value="<?php echo $params['name']; ?>">
            <input type="hidden" name="email" value="<?php echo $params['email']; ?>">
            <input type="hidden" name="phone" value="<?php echo $params['phone']; ?>">
            <input type="hidden" name="hash" value="<?php echo $hashed_string; ?>">
        </form>
    </body>
    </html>
    <?php
}
