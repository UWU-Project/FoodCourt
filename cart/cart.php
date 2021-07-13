<?php
require_once('../auth.php');
?>

<?php
//checking connection and connecting to a database
require_once('../connection/config.php');


//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
if(!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}


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


//var_dump($result);
// exit;
?>

<?php
//retrieving quantities from the quantities table
$quantities=mysqli_query($conn,"SELECT * FROM quantities")
or die("Something is wrong ... \n" . mysqli_error());
?>

<?php
//retrieving cart ids from the cart_details table
//define a default value for flag_0
$flag_0 = 0;
$items=mysqli_query($conn,"SELECT * FROM cart_details WHERE member_id='$member_id' AND flag='$flag_0'")
or die("Something is wrong ... \n" . mysqli_error());
?>

<?php
//retrive a currency from the currencies table
//define a default value for flag_1
$flag_1 = 1;
$currencies=mysqli_query($conn,"SELECT * FROM currencies WHERE flag='$flag_1'")
or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script language="JavaScript" src="../validation/user.js"></script>
    <script src="https://use.fontawesome.com/c560c025cf.js"></script>

</head>
<body>

<form name="quantityForm" id="quantityForm" method="post" action="update-quantity.php" onsubmit="return updateQuantity(this)">
    <table width="560" align="center">
        <tr>
            <td>Item ID</td>
            <td><select name="item" id="item">
                    <option value="select">- select -
                        <?php
                        //loop through cart_details table rows
                        while ($row=mysqli_fetch_array($items)){
                            echo "<option value=$row[cart_id]>$row[cart_id]";
                        }
                        ?>
                </select>
            </td>
            <td>Quantity</td>
            <td><select name="quantity" id="quantity">
                    <option value="select">- select -
                        <?php
                        //loop through quantities table rows
                        while ($row=mysqli_fetch_assoc($quantities)){
                            echo "<option value=$row[quantity_id]>$row[quantity_value]";
                        }
                        ?>
                </select>
            </td>
            <td><input type="submit" name="Submit" value="Change Quantity" /></td>
        </tr>
    </table>
</form>


<div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px" class="card-body">


    <table width="910" height="auto" style="text-align:center;" class="table table-borderless table-hover" w-auto>

        <thead class="table-dark">
        <tr>

            <th>Item ID</th>
            <th>Food Photo</th>
            <th>Food Name</th>
            <th>Food Description</th>
            <th>Food Category</th>
            <th>Food Price</th>
            <th>Quantity</th>
            <th>Total Cost</th>
            <th>Action(s)</th>

        </tr>
        </thead>
        <?php

        ?>


        <?php
        $cartItem= array();
        //loop through all table rows
        $symbol=mysqli_fetch_assoc($currencies); //gets active currency
        foreach ($result as $row) {
            $lt = $row['lt'];
            array_push($cartItem,$row['cart_id']);
            echo "<tr>";
            echo "<td>" . $row['cart_id'] . "</td>";
            echo '<td><a href=../images/' . $row[$lt . '_photo'] . ' alt="click to view full image" target="_blank"><img src=../images/' . $row[$lt . '_photo'] . ' width="80" height="70"></a></td>';
            echo "<td>" . $row[$lt . '_name'] . "</td>";
            echo "<td>" . $row[$lt . '_description'] . "</td>";
            echo "<td>" . ($lt == 'food' ? $row['category_name'] : 'SPECIAL DEALS') . "</td>";
            echo "<td>" . $symbol['currency_symbol'] . "" . $row[$lt . '_price'] . "</td>";

            echo "<td>" . $row['quantity_value'] . "</td>";
            echo "<td>" . $symbol['currency_symbol'] . "" . $row['total'] . "</td>";
            echo '<td><a class="btn btn-outline-danger btn-xs" href="delete-cartitem.php?id=' . $row['cart_id'] . '"><i class="fa fa-trash" aria-hidden="true"></i></a></td>';


        }
        ?>

        <!--?php
        echo '<td><a href="order-exec.php?id=' . $row['cart_id'] . '">Place Order</a></td>';
        echo "</tr>";



        //mysqli_free_result($result);
        //mysqli_close($conn);
        ?-->

        <?php
        //loop through all table rows
        $symbol=mysqli_fetch_assoc($currencies); //gets active currency
        foreach ($result_lounge as $row) {
            $lt = $row['lt'];
            array_push($cartItem,$row['cart_id']);
            echo "<tr>";
            echo "<td>" . $row['cart_id'] . "</td>";
            echo '<td><a href=../images/' . $row[$lt . '_photo'] . ' alt="click to view full image" target="_blank"><img src=../images/' . $row[$lt . '_photo'] . ' width="80" height="70"></a></td>';
            echo "<td>" . $row[$lt . '_name'] . "</td>";
            echo "<td>" . $row[$lt . '_description'] . "</td>";
            echo "<td>" . $row[$lt.'category_name'] . "</td>";
            echo "<td>" . $symbol['currency_symbol'] . "" . $row[$lt . '_price'] . "</td>";
            echo "<td>" . $row['quantity_value'] . "</td>";
            echo "<td>" . $symbol['currency_symbol'] . "" . $row['total'] . "</td>";
            echo '<td><a class="btn btn-outline-danger btn-xs" href="delete-cartitem.php?id=' . $row['food_id'] . '"><i class="fa fa-trash" aria-hidden="true"></i></a></td>';
            echo "</tr>";
            ?>
            <?php

        }
        ?>

        <?php
        $send="";
        foreach ($cartItem as $row) {
            $send.=$row.=",";
        }

        echo "<tr>";
        echo '<td colspan="9" class="table-active"><a href="order-exec.php?id=' .$send . '"><i class="btn btn-warning" >Place Order</i></a></td>';
        echo "</tr>";



        //mysqli_free_result($result_lounge);
        mysqli_close($conn);
        ?>

    </table>

</div>






</body>
</html>