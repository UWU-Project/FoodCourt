<?php


$merchant_id         = $_POST['merchant_id'];
$order_id             = $_POST['order_id'];
$member_id             = $_POST['custom_1'];
$payhere_amount     = $_POST['payhere_amount'];
$payhere_quantity     = $_POST['custom_2'];
$payhere_currency    = $_POST['payhere_currency'];
$status_code         = $_POST['status_code'];
$md5sig                = $_POST['md5sig'];

$merchant_secret = '8RhEPfTuSy84eVYqAMuSIv4vTGhaKIB8g4eWqm3RzWor'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

$local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

if (($local_md5sig === $md5sig) AND ($status_code == 2) ){


//checking connection and connecting to a database
    require_once('../connection/config.php');
    error_reporting(1);
//Connect to mysqli server
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    if (!$conn) {
        die('Failed to connect to server: ' . mysqli_error());
    }

    //Create INSERT query
    $qry_create = "INSERT INTO orders_paid(member_id,total,food_id,quantity) VALUES('$member_id','$payhere_amount','$order_id','$payhere_quantity')";
    mysqli_query($conn,$qry_create);


    //$ids = explode(",", $order_id);
    //$qty = explode(",", $payhere_quantity);
    //foreach ($ids as $row) {
    //}

}

?>