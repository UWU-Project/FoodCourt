<?php
//Start session
session_start();

//checking connection and connecting to a database
require_once('connect/config.php');
//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
if(!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}


if(isset($_GET['delivery']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn,"UPDATE orders_paid SET delivered=1 WHERE ID='$id'")
    or die("The reservation does not exist 2... \n");
    echo("Error description: " . mysqli_error($conn));

    // redirect back to the reservations
    header("Location: orders.php?x=1");
}

if(isset($_GET['cancel']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn,"UPDATE orders_paid SET delivered=2 WHERE ID='$id'")
    or die("The reservation does not exist 2... \n");
    echo("Error description: " . mysqli_error($conn));

    // redirect back to the reservations
    header("Location: orders.php?n=1");
}

if(isset($_GET['done']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn,"UPDATE orders_paid SET delivered=5 WHERE ID='$id'")
    or die("The reservation does not exist 2... \n");
    echo("Error description: " . mysqli_error($conn));

    // redirect back to the reservations
    header("Location: orders.php?d=1");
}
?>

