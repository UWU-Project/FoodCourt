<?php

require_once('../auth.php');

//Include database connection details
require_once('../connection/config.php');

//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
if(!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}

//selecting all records from almost all tables. Return an error if there are no records in the tables
$result=mysqli_query($conn,"SELECT * FROM orders_details o inner join cart_details c on c.cart_id = o.cart_id inner join quantities q on q.quantity_id = c.quantity_id inner join customers m on m.member_id = c.member_id inner join billing_details b on b.billing_id = o.billing_id ") or die("There are no records to display ... \n" . mysqli_error());


//get member_id from session
$member_id = $_SESSION['SESS_MEMBER_ID'];
//retrieving cart ids from the cart_details table
//define a default value for flag_0


$idCart = $_GET['id'];
echo ($idCart);
echo $_SESSION['SESS_MEMBER_ID'];

//retrieving cart ids from the cart_details table


$ids = explode(",",$_GET['id']);

$string = "";
foreach ($ids as $row) {
    $string .= "cart_id = ".$row." OR ";
}


$string = rtrim($string,' OR ');



echo $string;

//selecting particular records from the food_details and cart_details tables. Return an error if there are no records in the tables
//selecting all from pastry shop
$result = mysqli_query($conn, "SELECT food_details.food_name,cart_details.food_id,cart_details.quantity_id, cart_details.total, cart_details.lt FROM cart_details inner join food_details WHERE cart_details.member_id='$member_id' AND cart_details.food_id=food_details.food_id AND cart_details.lt ='food' AND ($string)
                                        UNION
                                        SELECT food_details_lounge.food_name,cart_details.food_id,cart_details.quantity_id, cart_details.total, cart_details.lt FROM cart_details inner join food_details_lounge WHERE cart_details.member_id='$member_id' AND cart_details.food_id=food_details_lounge.food_id AND cart_details.lt ='food' AND ($string)
                                        UNION
                                        SELECT specials.special_name AS food_name,cart_details.food_id,cart_details.quantity_id, cart_details.total, cart_details.lt FROM cart_details inner join specials on specials.special_id = cart_details.food_id WHERE cart_details.lt = 'special' and cart_details.member_id ='$member_id' AND ($string)");








//retrive a currency from the currencies table
//define a default value for flag_1
$flag_1 = 1;
$currencies = mysqli_query($conn, "SELECT * FROM currencies WHERE flag='$flag_1'")
or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");




?>



<ul class="list-group list-group-numbered">
    <?php
    $MAX = 0;
    //loop through all table rows
    $symbol = mysqli_fetch_assoc($currencies); //gets active currency
    foreach ($result as $row) {
        $lt = $row['lt'];
        $MAX += $row['total'] ;
        ?>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <?php echo '<div class="fw-bold">' . $row[$lt . '_name'] . '</div>'; ?>
                <?php echo '<div class="">' . ($lt == 'food' ? $row['category_name'] : 'SPECIAL DEALS') . '</div>'; ?>
                <?php echo '<div class="fw-bold">' . $row['food_id'] . '</div>'; ?>
                <?php echo '<div class="fw-bold">' . $row['member_id'] . '</div>'; ?>
            </div>
            <?php echo '<span class="badge bg-info text-dark">X ' . $row['quantity_value'] . ' </span>'; ?>
            <?php echo '<span class="badge bg-info text-dark">' . $symbol['currency_symbol'] . "" . $row['total'] . ' </span>'; ?>
        </li>
    <?php } echo $MAX?>

<ul>
    <li class="list-group-item d-flex justify-content-between">
        <?php echo '<span class="">Total ( ' . $symbol['currency_symbol'] . ' )</span>'; ?>

        <strong><?php echo $MAX ?></strong>
    </li>
</ul>