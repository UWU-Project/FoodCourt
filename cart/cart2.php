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
$result2=mysqli_query($conn,"SELECT * FROM cart_details c inner join specials s on s.special_id = c.food_id inner join quantities q on q.quantity_id = c.quantity_id WHERE c.lt = 'special' and c.member_id ='$member_id' ")
or die("A problem has occured 2... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
while($row = mysqli_fetch_assoc($result2)){
    $result[]=$row;
}
// var_dump($result);
// exit;
?>
<?php
if(isset($_POST['Submit'])){
    //Function to sanitize values received from the form. Prevents SQL injection
    function clean($str) {
        global $conn;
        $str = @trim($str);

        $str = stripslashes($str);

        return mysqli_real_escape_string($conn,$str);
    }
    //get category id
    $id = clean($_POST['category']);

    //selecting all records from the food_details table based on category id. Return an error if there are no records in the table
    $result=mysqli_query($conn,"SELECT * FROM food_details WHERE food_category='$id'")
    or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
}
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


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script language="JavaScript" src="../validation/user.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://use.fontawesome.com/c560c025cf.js"></script>
    <!------ style ---------->
    <style>


        .quantity {
            float: left;
            margin-right: 15px;
            background-color: #eee;
            position: relative;
            width: 80px;
            overflow: hidden
        }

        .quantity input {
            margin: 0;
            text-align: center;
            width: 15px;
            height: 15px;
            padding: 0;
            float: right;
            color: #000;
            font-size: 20px;
            border: 0;
            outline: 0;
            background-color: #F6F6F6
        }

        .quantity input.qty {
            position: relative;
            border: 0;
            width: 100%;
            height: 40px;
            padding: 10px 25px 10px 10px;
            text-align: center;
            font-weight: 400;
            font-size: 15px;
            border-radius: 0;
            background-clip: padding-box
        }

        .quantity .minus, .quantity .plus {
            line-height: 0;
            background-clip: padding-box;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            -webkit-background-size: 6px 30px;
            -moz-background-size: 6px 30px;
            color: #bbb;
            font-size: 20px;
            position: absolute;
            height: 50%;
            border: 0;
            right: 0;
            padding: 0;
            width: 25px;
            z-index: 3
        }

        .quantity .minus:hover, .quantity .plus:hover {
            background-color: #dad8da
        }

        .quantity .minus {
            bottom: 0
        }
        .shopping-cart {
            margin-top: 20px;
        }

    </style>

    <!------ end style ---------->
</head>
<body>


<div class="container">
    <div class="card shopping-cart">
        <div class="card-header bg-dark text-light">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Shipping cart
            <a href="" class="btn btn-outline-info btn-sm pull-right">Continue shopping</a>
            <div class="clearfix"></div>
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
        </div>

        <div class="card-body">
            <!-- PRODUCT -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-2 text-center">
                    <img class="img-responsive" src="http://placehold.it/120x80" alt="prewiew" width="120" height="80">
                </div>
                <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                    <h4 class="product-name"><strong>Product Name</strong></h4>
                    <h4>
                        <small>Product description</small>
                    </h4>
                </div>

                <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                    <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                        <h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
                    </div>
                    <div class="col-4 col-sm-4 col-md-4">
                        <div class="quantity">
                            <input type="button" value="+" class="plus">
                            <input type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                                   size="4">
                            <input type="button" value="-" class="minus">
                        </div>
                    </div>
                    <div class="col-2 col-sm-2 col-md-2 text-right">
                        <button type="button" class="btn btn-outline-danger btn-xs">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>

            <hr>
            <!-- END PRODUCT -->
            <table width="910" height="auto" style="text-align:center;">
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

                <?php
                //loop through all table rows
                $symbol=mysqli_fetch_assoc($currencies); //gets active currency
                foreach ($result as $row) {
                    $lt = $row['lt'];
                    echo  '<div class="card-body">';
                    echo '<div class="row">';
                    echo "<td>" . $row['cart_id'] . "</td>";
                    echo '<div class="col-12 col-sm-12 col-md-2 text-center">';
                    echo '<a href=../images/' . $row[$lt . '_photo'] . ' alt="click to view full image" target="_blank"><img src=../images/' . $row[$lt . '_photo'] . ' width="120" height="120"></a>';
                    echo'</div>';

                    echo'<div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">';
                    echo'<h4 class="product-name"><strong>'. $row[$lt . '_name'] .'</strong></h4>';
                    echo'<h4>';
                    echo '<small>'. $row[$lt . '_description'] . '</small>';
                    echo'</h4>';
                    echo'</div>';

                    echo'<div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">';

                    echo'<h4>';
                    echo '<strong>' . ($lt == 'food' ? $row['category_name'] : 'SPECIAL DEALS') .  '</strong>';
                    echo'</h4>';
                    echo'</div>';

                    echo'<div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">';
                    echo'<div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">';
                    echo'<h6><strong>25.00 <span class="text-muted">x</span></strong></h6>';
                    echo'</div>';

                    echo'<div class="col-4 col-sm-4 col-md-4">';
                    echo   '<div class="quantity">';
                    echo     '<input type="button" value="+" class="plus">';
                    echo   '<input type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty";
                                   size="4">';
                    echo       '<input type="button" value="-" class="minus">';
                    echo   '</div>';


                    echo'</div>';
                    echo'<div class="col-2 col-sm-2 col-md-2 text-right">';
                    echo    '<button type="button" class="btn btn-outline-danger btn-xs">';
                    echo'<i class="fa fa-trash" aria-hidden="true"></i>';
                    echo   '</button>';
                    echo'</div>';
                    echo'</div>';
                    echo'</div>';




                    echo "<td>" . $symbol['currency_symbol'] . "" . $row[$lt . '_price'] . "</td>";

                    echo "<td>" . $row['quantity_value'] . "</td>";
                    echo "<td>" . $symbol['currency_symbol'] . "" . $row['total'] . "</td>";
                }
                ?>

                <?php
                echo '<td><a href="order-exec.php?id=' . $row['cart_id'] . '">Place Order</a></td>';
                echo "</tr>";

                mysqli_free_result($result);
                mysqli_close($conn);
                ?>
                </div>
            </table>

            <!-- PRODUCT -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-2 text-center">
                    <img class="img-responsive" src="http://placehold.it/120x80" alt="prewiew" width="120" height="80">
                </div>
                <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                    <h4 class="product-name"><strong>Product Name</strong></h4>
                    <h4>
                        <small>Product description</small>
                    </h4>
                </div>
                <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                    <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                        <h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
                    </div>
                    <div class="col-4 col-sm-4 col-md-4">
                        <div class="quantity">
                            <input type="button" value="+" class="plus">
                            <input type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                                   size="4">
                            <input type="button" value="-" class="minus">
                        </div>
                    </div>
                    <div class="col-2 col-sm-2 col-md-2 text-right">
                        <button type="button" class="btn btn-outline-danger btn-xs">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
            <hr>
            <!-- END PRODUCT -->

            <div class="pull-right">
                <a href="" class="btn btn-outline-secondary pull-right">
                    Update shopping cart
                </a>
            </div>
        </div>
        <div class="card-footer">
            <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="cupone code">
                    </div>
                    <div class="col-6">
                        <input type="submit" class="btn btn-default" value="Use cupone">
                    </div>
                </div>
            </div>
            <div class="pull-right" style="margin: 10px">
                <a href="" class="btn btn-success pull-right">Checkout</a>
                <div class="pull-right" style="margin: 5px">
                    Total price: <b>50.00€</b>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>