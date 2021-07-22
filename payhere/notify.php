<?php

$merchant_id         = $_POST['merchant_id'];
$order_id             = $_POST['order_id'];
$payhere_amount     = $_POST['payhere_amount'];
$payhere_currency    = $_POST['payhere_currency'];
$status_code         = $_POST['status_code'];
$md5sig                = $_POST['md5sig'];

$merchant_secret = '8cMb00lsfmn4qC5DTIIlW68Vzs3Agd15K8bRs7NbLd9H'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

$local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
    //TODO: Update your database as payment success
}
?>
<?php
 //public function payhere_notify(Request $request){

    	$merchant_id         = $request->input('merchant_id');
		$order_id             = $request->input('order_id');
		$payhere_amount     = $request->input('payhere_amount');
		$payhere_currency    = $request->input('payhere_currency');
		$status_code         = $request->input('status_code');
		$method				= $request->input('method');
		$status_message		= $request->input('status_message');
		$card_holder_name	= $request->input('card_holder_name');
		$card_no 			= $request->input('card_no');
		$card_expiry		= $request->input('card_expiry');


		$md5sig                = $request->input('md5sig');

		$merchant_secret = '8cMb00lsfmn4qC5DTIIlW68Vzs3Agd15K8bRs7NbLd9H';


		$local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

		if (($local_md5sig === $md5sig) AND ($status_code == 2) ){

			$statu = $status_code;
        	$payment_up = Payhere::payment_st_update($order_id, $statu, $method, $status_message, $card_holder_name, $card_no, $card_expiry);
        	$pay_st = Payhere::pay_st_update($order_id, $statu);


			}

		elseif (($local_md5sig === $md5sig) AND ($status_code == 0) ){

        	$statu = $status_code;
        	$payment_up = Payhere::payment_st_update($order_id, $statu, $method, $status_message, $card_holder_name, $card_no, $card_expiry);
        	$pay_st = Payhere::pay_st_update($order_id, $statu);

			}



		elseif (($local_md5sig === $md5sig) AND ($status_code == -1) ){

        	$statu = $status_code;
        	$payment_up = Payhere::payment_st_update($order_id, $statu, $method, $status_message, $card_holder_name, $card_no, $card_expiry);
        	$pay_st = Payhere::pay_st_update($order_id, $statu);

			}


		elseif (($local_md5sig === $md5sig) AND ($status_code == -2) ){

        	$statu = $status_code;
        	$payment_up = Payhere::payment_st_update($order_id, $statu, $method, $status_message, $card_holder_name, $card_no, $card_expiry);
        	$pay_st = Payhere::pay_st_update($order_id, $statu);

			}


		elseif (($local_md5sig === $md5sig) AND ($status_code == -3) ){

        	$statu = $status_code;
        	$payment_up = Payhere::payment_st_update($order_id, $statu, $method, $status_message, $card_holder_name, $card_no, $card_expiry);
        	$pay_st = Payhere::pay_st_update($order_id, $statu);

			}


		else {

        	$statu = $status_code;
        	$payment_up = Payhere::payment_st_update($order_id, $statu, $method, $status_message, $card_holder_name, $card_no, $card_expiry);
        	$pay_st = Payhere::pay_st_update($order_id, $statu);

			}

    }




?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php echo $_POST['merchant_id']; ?>
<?php echo $_POST['order_id']; ?>




</body>
</html>
