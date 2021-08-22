<?php
    //checking connection and connecting to a database
    require_once('connect/config.php');

    //Connect to mysqli server
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
    if(!$conn) {
        die('Failed to connect to server: ' . mysqli_error());
    }

    //Function to sanitize values received from the form. Prevents SQL injection
    function clean($str) {
        global $conn;
        $str = @trim($str);
        $str = stripslashes($str);

        return mysqli_real_escape_string($conn,$str);
    }

    //define default value for flag
    $flag_1 = 1;

    //Sanitize the POST values
    $OrderID = clean($_POST['orderid']);
    $StaffID = clean($_POST['staffid']);


    // update the entry
    $result = mysqli_query($conn,"UPDATE orders_paid SET StaffID='$StaffID', flag='$flag_1' WHERE ID='$OrderID'")
    or die("The order or staff does not exist ... \n" . mysqli_error());

    //check if query executed
    if($result) {
        // redirect back to the allocation page
        header("Location: allocation.php?m=1");
        exit();
    }
    else
        // Gives an error
    {
        die("order allocation failed ..." . mysqli_error());
    }

?>
