<?php 

 $secretkey = '3183-1053214963';

 // print_r($_GET);

$hashed_string = md5($secretkey.urldecode($_GET['status_id']).urldecode($_GET['order_id']).urldecode($_GET['transaction_id']).urldecode($_GET['msg']));
 
    if($hashed_string == urldecode($_GET['hash']))
    {
    	 if(urldecode($_GET['status_id']) == '1'){
    	 	 echo 'Payment was successful with message: '.urldecode($_GET['msg']);
    	 }
    	 else
    	 {
    	 	 echo 'Payment failed with message: '.urldecode($_GET['msg']);
    	 }
    }

    else{
    	echo 'Hashed value is not correct';
    }

   
   echo '<br><br><br><br>';

   echo '<pre>';
   print_r($_GET);

 ?>