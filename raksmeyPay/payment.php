<?php

    $my_payment_url = "https://raksmeypay.com/payment/request/84664a0f03d8e981a0570652f0c59518";
    $profile_key = "d4f8353655452037ab99ea36fdb45a1e82f0ac4ca75062136060b867cd3b1173947f126dad665f1a"; //Replace with your Profile Key
    $transaction_id = 123456780;  // Replace with a unique transaction ID (e.g., using time() or any other unique identifier)
    $amount = 0.01; // Replace with your transaction amount
    $success_url = urlencode("http://localhost/success.php?transaction_id=123456780&token=17533497789");
    $remark = "payment Ronok";
    $hash = sha1($profile_key . $transaction_id . $amount . $success_url . $remark);
    $parameters = [
        "transaction_id" => $transaction_id,
        "amount" => $amount,
        "success_url" => $success_url,
        "remark" => $remark,
        "hash" => $hash
    ];
    $queryString = http_build_query($parameters);
    $payment_link_url = $my_payment_url."?".$queryString;

    //Here is Payment button to put on your website
    echo '<a style="background: #1a9bfc; color: white; padding: 10px 20px;" href="'.$payment_link_url.'">Pay Now</a>';
?>
