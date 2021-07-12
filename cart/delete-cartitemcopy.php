<?php
//Start session
session_start();

//checking connection and connecting to a database
require_once('../connection/config.php');
//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
if(!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}


// check if the 'id' variable is set in URL
if (isset($_GET['row']))
{
    // get id value
    $row = $_GET['row'];


    //define default values for flag_0
    $flag_0 = 0;


//get member_id from session
    $member_id = $_SESSION['SESS_MEMBER_ID'];

    //selecting particular records from the food_details and cart_details tables. Return an error if there are no records in the tables
    $result1=mysqli_query($conn,"SELECT food_name,food_description,food_price,food_photo,cart_id,quantity_value,total,flag,category_name,lt FROM food_details,cart_details,food_categories,quantities WHERE cart_details.member_id='$member_id' AND cart_details.flag='$flag_0' AND cart_details.food_id=food_details.food_id AND food_details.food_category=food_categories.category_id AND cart_details.quantity_id=quantities.quantity_id AND cart_details.lt ='food'")
    or die("A problem has occured 1... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
    $result = array();
    while($row = mysqli_fetch_assoc($result1)){
        $result[]=$row;
    }


    $result3=mysqli_query($conn,"SELECT food_name,food_description,food_price,food_photo,cart_id,quantity_value,total,flag,category_name,lt FROM food_details_lounge,cart_details,food_categories_lounge,quantities WHERE cart_details.member_id='$member_id' AND cart_details.flag='$flag_0' AND cart_details.food_id=food_details_lounge.food_id AND food_details_lounge.food_category=food_categories_lounge.category_id AND cart_details.quantity_id=quantities.quantity_id AND cart_details.lt ='food'")
    or die("A problem has occured 3... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
    $result_lounge = array();
    while($row = mysqli_fetch_assoc($result3)){
        $result[]=$row;
    }


    $result2=mysqli_query($conn,"SELECT * FROM cart_details c inner join specials s on s.special_id = c.food_id inner join quantities q on q.quantity_id = c.quantity_id WHERE c.lt = 'special' and c.member_id ='$member_id' ")
    or die("A problem has occured 2... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
    while($row = mysqli_fetch_assoc($result2)){
        $result[]=$row;
    }

    // redirect back to the foods page
    header("Location: test.php");
}
else
    // if id isn't set, redirect back to the foods page
{
    header("Location: test.php");
}

?>
