<?php

//file_put_contents('paddle.txt', json_encode($_POST) , FILE_APPEND);
//reinsert value to $_POST
// $_POST = json_decode('{"marketing_consent":"0","p_country":"BD","p_coupon":"","p_coupon_savings":"0.00","p_currency":"USD","p_customer_email":"rifatkhan137552@gmail.com","p_customer_name":"Mehedi Hasan","p_order_id":"152378","p_paddle_fee":"0.55","p_price":"1.00","p_product_id":"27228","p_quantity":"1","p_sale_gross":"1.00","p_tax_amount":"0.00","p_used_price_override":"1","passthrough":"46","quantity":"1","p_signature":"AfOY124JXrka0gUqBCfvLdLLAkvHdfdsiSKvHcq60qxyE6SoEUTPi3pQbgz2FQI4613K33ycYhFskiTvj5+qqaJ87zgaM60tIf+KiXuBoDm8WRb5TKduPtd\/EBuxNgxK9D5vdl5TX5TfyAsRTsqtehbP7l\/kxZTJoXm+Y5wxwl4d7O+lb5DPz9urS9RIPDGWmmzSWoLecvNEqbhrLGAF55hnUYbRaPB6i0AHUCbslsfibcTeOlZfc6ofewcszs2icFq6PeLqBZtrtAU33OMF3agqF1VoRlPBE5C6fUPbMlgRnqc53M6AAHa2d2XZq26T6YdQoNbkR\/Gtm8Q7FG6gjb5JjftMY+WJTN07oKWd\/5hNM30J50kvs2cBXxPprC8TTofdS7UE+fK3o\/n8lDU4KaG7mU+gAQpfr7ByRacgQHI+6Bqw5\/0FtAra+gpdmJ\/G4sD4NplLSYXed+nnCkKOIxVYfU4\/89ujmdyp3lXtWAC8uR6pDzGsbPE\/QpXAFFMu4FJyq4UbHz2tWYjmwZrvxw1FVDXe8X4IH9q9jMoGRfiP9kQ9YG9Q5W9ipKnGMZ0nFP1CWqRrOMRMe0tFeMjs\/o6WkKTPIEoRHn9Xg6ERATPO6hPtdwtXtbvXL1EAX7DImVvK1\/BIyokAPzXl674qVDnTngKahu2SWeDBBU53fyU="}',true);

// // Your Paddle 'Public Key'

//   $public_key = '-----BEGIN PUBLIC KEY-----
// MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAm31LkyxNIHgoTDX0wXUe
// /W18+Ot/f9aWQ/bGiCE0JrSl4lXee3M8aL6cJgyYTksX67cWkfke5/RICTA2/CPa
// /kRqlbNmPh5BRshK4ICB/poKxxWkX42f1yJ7r7cTIKkkcRcItd4uIKRc4lG6OMtI
// JdaIVH3gvJerGHTvPK7gAp/SsWC2Pv9HFGekF89Dn0RbMpyD/S9I284Bam7+klCv
// cUIjhOEJjDCURZFqIW6b5U2pZfijymP4hmYYKpSSmhgO1dEN+VsNQeaASGR2RW8g
// IpZLNp+YiBVJaR5hHz35TUGa4KjR9bGLZKXDSOWxR0pSuCLkCV4yzbrixDNgPlu+
// PT+vyFETHQ/LGnqKztt8w/PTXRWnFgTcpuf800KDvYOJ9GaASrFfSASqTL1BfDiA
// MNXXzxJ4dsWpJhox2G968zd188xOglwEMgTyjD3dsyTJbFQ31s0Y2o/r9JjA6z8C
// Qm7KXG5xJIsi72MMx5r358pW+vYgjdmd8X1+51GYA9WU3IRHJ8RRbqailJjEMKDR
// u3Cr+9WTjJwYFB0OKYQj8xp9ChieRRKUu2kD1ciZCN27FFycPywTdS6qGt3rbfC9
// 3iNzH7aWMFzIR2/D+wHTuSfcmrcG50zmSC156rWAvEwEqQcjLYkJFjWHfC65VQds
// 59lL0qogJ0FEs1ts9g7SuIsCAwEAAQ==
// -----END PUBLIC KEY-----';
  
//   // Get the p_signature parameter & base64 decode it.
//  $signature = base64_decode($_POST['p_signature']);



  
//   // Get the fields sent in the request, and remove the p_signature parameter
//   $fields = $_POST;
//   unset($fields['p_signature']);
  
//   // ksort() and serialize the fields
//   ksort($fields);

//   foreach($fields as $k => $v) {
// 	  if(!in_array(gettype($v), array('object', 'array'))) {
// 		  $fields[$k] = "$v";
// 	  }
//   }
//   $data = serialize($fields);

  
//   // Verify the signature
//   $verification = openssl_verify($data, $signature, $public_key, OPENSSL_ALGO_SHA1);
  
// if ($verification != 1) {
//     // We could not verify the Paddle webhook
//     header('HTTP/1.0 200 Status');
//     die('We could not verify the Paddle webhook');
// }

 echo "response successfull";

  $data = [
      'vendor_id'=>5746,
      'vendor_auth_code'=>'f87134e253253e311a22a47f82bfa3761e8a3384005cab0983',
      'title'=>'Subscribe Please',
      // 'prices'=>25,
      // 'recurring_prices'=>'20',
      // 'return_url'=>'paddle_webhook.php',
      // 'quantity'=> 3,
      // 'customer_email'=>'Miraz@gmail.com'
    ];

