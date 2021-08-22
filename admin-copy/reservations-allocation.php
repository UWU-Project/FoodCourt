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

//Sanitize the POST values
$ReservationID = clean($_POST['reservationid']);
$StaffID = clean($_POST['staffid']);

//define a default value for flag
$flag_1 = 1;

// update the entry
$result = mysqli_query($conn,"UPDATE reservations_details SET StaffID='$StaffID', allocat='$flag_1' WHERE ReservationID='$ReservationID'")
or die("The reservation or staff does not exist ... \n" . mysqli_error());

//check if query executed
if($result) {
    // redirect back to the allocation page
    header("Location: allocation.php?x=1");
    exit();
}
else
    // Gives an error
{
    die("reservation allocation failed ..." . mysqli_error());
}

?>