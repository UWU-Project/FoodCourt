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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // check if the 'id' variable is set in URL
        if (isset($_POST['id']) && isset($_POST['delete']))
        {
            // get id value
            $id = $_POST['id'];

            mysqli_query($conn,"UPDATE reservations_details SET flag=2,reason='".$_POST['reason']."' WHERE ReservationID='$id'")
            or die("The reservation does not exist 2... \n");

            // redirect back to the reservations
            header('Location: reservations.php?m=1');

        }
    }





    if(isset($_GET['delivery']) && isset($_GET['id'])) {
        $id = $_GET['id'];
        mysqli_query($conn,"UPDATE reservations_details SET flag=1 WHERE ReservationID='$id'")
        or die("The reservation does not exist 2... \n");
        echo("Error description: " . mysqli_error($conn));

        // redirect back to the reservations
        header("Location: reservations.php");
    }

?>

