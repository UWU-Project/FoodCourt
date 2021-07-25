<?php
require_once('../auth.php');

?>

<?php
//checking connection and connecting to a database
require_once('../connection/config.php');


//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}


//define default values for flag_0
$flag_1 = 1;


//get member_id from session
$member_id = $_SESSION['SESS_MEMBER_ID'];

//get cart item id's from order exec
$idCart = $_GET['id'];
//echo ($idCart);

//echo $_SESSION['SESS_MEMBER_ID'];

//retrieving cart ids from the cart_details table

$ids = explode(",", $_GET['id']);

$string = "";
foreach ($ids as $row) {
    $string .= "cart_id = " . $row . " OR ";
}

$string = rtrim($string, ' OR ');


//selecting particular records from the food_details and cart_details tables. Return an error if there are no records in the tables
//selecting all from pastry shop
$result = mysqli_query($conn, "SELECT food_details.food_name,cart_details.food_id,cart_details.quantity_id, cart_details.total, cart_details.lt FROM cart_details inner join food_details WHERE cart_details.member_id='$member_id' AND cart_details.food_id=food_details.food_id AND cart_details.lt ='food' AND ($string)
                                        UNION
                                        SELECT food_details_lounge.food_name,cart_details.food_id,cart_details.quantity_id, cart_details.total, cart_details.lt FROM cart_details inner join food_details_lounge WHERE cart_details.member_id='$member_id' AND cart_details.food_id=food_details_lounge.food_id AND cart_details.lt ='food' AND ($string)
                                        UNION
                                        SELECT specials.special_name AS food_name,cart_details.food_id,cart_details.quantity_id, cart_details.total, cart_details.lt FROM cart_details inner join specials on specials.special_id = cart_details.food_id WHERE cart_details.lt = 'special' and cart_details.member_id ='$member_id' AND ($string)");

//var_dump($result);
// exit;
?>

<?php
//retrieving quantities from the quantities table
$quantities = mysqli_query($conn, "SELECT * FROM quantities")
or die("Something is wrong ... \n" . mysqli_error());
?>



<?php
//retrive a currency from the currencies table
//define a default value for flag_1
$flag_1 = 1;
$currencies = mysqli_query($conn, "SELECT * FROM currencies WHERE flag='$flag_1'")
or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script language="JavaScript" src="../validation/user.js"></script>
    <script src="https://use.fontawesome.com/c560c025cf.js"></script>

    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-design-system.css?v=1.0.5" rel="stylesheet" />


    <style>

        @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

        body {
            background-color: #eee;
            font-family: 'Calibri', sans-serif !important
        }

        .mt-100 {
            margin-top: 100px
        }

        .card {
            margin-bottom: 30px;
            border: 0;
            -webkit-transition: all .3s ease;
            transition: all .3s ease;
            letter-spacing: .5px;
            border-radius: 8px;
            -webkit-box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, .05);
            box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, .05)
        }

        .card .card-header {
            background-color: #fff;
            border-bottom: none;

            border-bottom: 1px solid #f6f7fb;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px
        }

        .card-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
        }

        .card .card-body {
            padding: 30px;
            background-color: transparent
        }

        .btn-primary,
        .btn-primary.disabled,
        .btn-primary:disabled {
            background-color: #4466f2 !important;
            border-color: #4466f2 !important
        }


    </style>
    <style>
        .gradient-custom {
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        }

        .card-custom {
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
            background-color: #f8f9fa;
        }


        .input-custom {
            background-color: white;
        }

        .white-text {
            color: hsl(52, 0%, 98%);
            font-weight: 100;
            font-size: 14px;
        }

        .back-button {
            background-color: hsl(52, 0%, 98%);
            font-weight: 700;
            color: black;
            margin-top: 50px;
        }
    </style>

</head>
<body>
<?php

//retrieving cart ids from the cart_details table
//define a default value for flag_0

//retrieving cart ids from the cart_details table
//define a default value for flag_0

$orders = mysqli_query($conn, "SELECT * FROM cart_details WHERE member_id='$member_id' AND " . $string)
or die("Something is wrong ... \n" . mysqli_error());


//while ($row=mysqli_fetch_array($orders)){
//echo $row['cart_id']."<br>";
//echo $row['food_id']."<br>";

//}

?>




<div class="container">
    <div class="row">
        <div class="col-md-12" style="text-align : center; margin: 1.5rem 0 ">
        <h4 class="ms-2 me-auto">
            <strong>CHECKOUT SUMMARY</strong>
        </h4>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4 card border-light mb-3 shadow p-3 mb-5 bg-body rounded" style="max-width: 18rem; margin-right: 2rem;">

            <div class="card-header" style="padding-bottom: 1rem" >
            <h4>
                <button type="button" class="btn btn-secondary" disabled>
                    Cart Summary <span class="badge rounded-pill bg-light text-dark"><?php echo mysqli_num_rows($orders); ?></span>
                </button>
            </h4>
            </div>

            <ul class="list-group list-group-numbered">
                <?php
                $MAX = 0;
                //loop through all table rows
                $symbol = mysqli_fetch_assoc($currencies); //gets active currency
                foreach ($result as $row) {
                    $lt = $row['lt'];
                    $MAX += $row['total'];
                    ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <?php echo '<div class="fw-bold">' . $row[$lt . '_name'] . '</div>'; ?>
                            <?php echo '<div class="">' . ($lt == 'food' ? $row['category_name'] : 'SPECIAL DEALS') . '</div>'; ?>
                            <?php echo '<div class="fw-bold">' . $row['food_id'] . '</div>'; ?>
                            <?php echo '<div class="fw-bold">' . $row['member_id'] . '</div>'; ?>
                        </div>
                        <?php echo '<span class="badge bg-info text-dark">X ' . $row['quantity_id'] . ' </span>'; ?>
                        <?php echo '<span class="badge bg-info text-dark">' . $symbol['currency_symbol'] . "" . $row['total'] . ' </span>'; ?>
                    </li>
                <?php } ?>

                <div class="input-group mb-3">
                    <span class="input-group-text"><strong>Total</strong></span>
                    <?php echo '<span class="input-group-text"><strong>' . $symbol['currency_symbol'] . ' </strong></span>'; ?>
                    <input type="text" class="form-control text-end fw-bold" aria-label="Amount (to the nearest dollar)"
                           value="<?php echo $MAX ?>" disabled>
                    <span class="input-group-text"><strong>.00</strong></span>
                </div>

                <!--?php
                echo '<td><a href="order-exec.php?id=' . $row['cart_id'] . '">Place Order</a></td>';
                echo "</tr>";



                //mysqli_free_result($result);
                //mysqli_close($conn);
                ?-->

                <?php
                //get member_id from session
                $member_id = $_SESSION['SESS_MEMBER_ID'];
                ?>

                <?php

                echo "<tr>";


                echo "</tr>";
                ?>


        </div>
        <?php
        //selecting all records from almost all tables. Return an error if there are no records in the tables
        $billing = mysqli_query($conn, "SELECT * FROM billing_details WHERE member_id='$member_id'")
        or die("Something is wrong ... \n" . mysqli_error());
        $tuck = mysqli_fetch_assoc($billing);

        ?>

        <div class="col-md-6 card border-light mb-3 shadow p-3 mb-5 bg-body rounded" >
            <div class="card-header">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <button type="button" class="btn btn-secondary" disabled>
                    Delivery Details
                </button>
            </h4>
            </div>
            <form method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="disabledTextInput">First Name</label>
                        <input type="text" id="disabledTextInput" class="form-control"
                               value="<?php echo $_SESSION['SESS_FIRST_NAME']; ?>" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name"
                               value="<?php echo $_SESSION['SESS_LAST_NAME']; ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="last_name">Address</label>
                        <input type="text" class="form-control" name="address"
                               value="<?php echo $tuck['P_O_Box_No']; ?> " disabled>
                        <input type="text" class="form-control" name="address"
                               value="<?php echo $tuck['Street_Address']; ?> " disabled>
                        <input type="text" class="form-control" name="address"
                               value="<?php echo $tuck['City']; ?> " disabled>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="first_name">Mobile Number</label>
                            <input type="text" class="form-control" name="first_name"
                                   value="<?php echo $tuck['Landline_No']; ?>" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_name" disabled>Landline Number</label>
                            <input type="text" class="form-control" name="last_name"
                                   value="<?php echo $tuck['Mobile_No']; ?>" disabled>
                        </div>
                    </div>

                    <input type="button" id="secondaryButton" onclick="document.getElementById('primaryButton').click()" value="Buy Now" class="btn btn-warning" />

            </form>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>


<?php
$email = mysqli_query($conn, "SELECT * FROM customers WHERE member_id='$member_id'")
or die("Something is wrong ... \n" . mysqli_error());
$email = mysqli_fetch_assoc($email);

//mysqli_free_result($result_lounge);
mysqli_close($conn);
?>

<!--payhere-->

<script>
    function Payment(btn){
        document.getElementById("billing_id").value = btn.value;
        document.getElementById("amount").value = btn.name;
        document.getElementById("order_id");
    }
</script>

<form method="post" action="https://sandbox.payhere.lk/pay/checkout">
    <input type="hidden" name="merchant_id" value="1217810">    <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="http://localhost/FoodCourt/index.php">
    <input type="hidden" name="cancel_url" value="http://localhost/FoodCourt/lounge.php">
    <input type="hidden" name="notify_url" value="http://localhost/FoodCourt/cart/notify.php">
    <!--<br><br>Item Details<br>-->
    <input type="text"id="order_id" name="order_id" value="<?php echo $idCart ?>" hidden>
    <input type="text"id="items" name="items" value="Total" hidden><br>
    <input type="text" name="currency" value="LKR" hidden>
    <input type="text"id="amount" name="amount" value="<?php echo $MAX ?>" hidden>
    <!--<br><br>Customer Details<br>-->
    <input type="text" name="first_name" value="<?php echo $_SESSION['SESS_FIRST_NAME']; ?>" hidden>
    <input type="text" name="last_name" value="<?php echo $_SESSION['SESS_LAST_NAME']; ?>" hidden><br>
    <input type="text" name="email" value="<?php echo $email['login']; ?>" hidden>
    <input type="text" name="phone" value="<?php echo $tuck['Mobile_No']; ?>" hidden><br>
    <input type="text" name="address" value="<?php echo $tuck['P_O_Box_No'] . $tuck['Street_Address']; ?>" hidden>
    <input type="text" name="city" value="<?php echo $tuck['City']; ?>" hidden>
    <input type="hidden" name="country" value="Sri Lanka"><br><br>
    <input type="submit" value="Buy Now" id="primaryButton"  hidden/>
</form>

</body>
</html>