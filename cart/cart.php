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
$flag_0 = 0;


//get member_id from session
$member_id = $_SESSION['SESS_MEMBER_ID'];


//selecting particular records from the food_details and cart_details tables. Return an error if there are no records in the tables
$result1 = mysqli_query($conn, "SELECT food_name,food_description,food_price,food_photo,cart_id,quantity_value,total,flag,category_name,lt FROM food_details,cart_details,food_categories,quantities WHERE cart_details.member_id='$member_id' AND cart_details.flag='$flag_0' AND cart_details.food_id=food_details.food_id AND food_details.food_category=food_categories.category_id AND cart_details.quantity_id=quantities.quantity_id AND cart_details.lt ='food'")
or die("A problem has occured 1... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
$result = array();
while ($row = mysqli_fetch_assoc($result1)) {
    $result[] = $row;
}


$result3 = mysqli_query($conn, "SELECT food_name,food_description,food_price,food_photo,cart_id,quantity_value,total,flag,category_name,lt FROM food_details_lounge,cart_details,food_categories_lounge,quantities WHERE cart_details.member_id='$member_id' AND cart_details.flag='$flag_0' AND cart_details.food_id=food_details_lounge.food_id AND food_details_lounge.food_category=food_categories_lounge.category_id AND cart_details.quantity_id=quantities.quantity_id AND cart_details.lt ='food'")
or die("A problem has occured 3... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
$result_lounge = array();
while ($row = mysqli_fetch_assoc($result3)) {
    $result[] = $row;
}


$result2 = mysqli_query($conn, "SELECT * FROM cart_details c inner join specials s on s.special_id = c.food_id inner join quantities q on q.quantity_id = c.quantity_id WHERE c.lt = 'special' and c.member_id ='$member_id' ")
or die("A problem has occured 2... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
while ($row = mysqli_fetch_assoc($result2)) {
    $result[] = $row;
}


//var_dump($result);
// exit;
?>

<?php
//retrieving quantities from the quantities table
$quantities = mysqli_query($conn, "SELECT * FROM quantities")
or die("Something is wrong ... \n" . mysqli_error());
?>

<?php
//retrieving cart ids from the cart_details table
//define a default value for flag_0
$flag_0 = 0;
$items = mysqli_query($conn, "SELECT * FROM cart_details WHERE member_id='$member_id' AND flag='$flag_0'")
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet"/>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet"/>

    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-design-system.css?v=1.0.5" rel="stylesheet"/>

    <link rel="stylesheet" href="../css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script language="JavaScript" src="../validation/user.js"></script>

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
            padding: 24px;
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

</head>
<body>
<!-- Header Begins -->
<!-- TOP HEADER Start
================================================== -->

<section id="top">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <p class="contact-action"><i class="fa fa-phone-square"></i>CST GROUP 4 [ FOOD COURT ]</p>
            </div>

            <div class="col-md-3 clearfix">
                <ul class="login-cart">
                    <li>
                        <a href="../customer/login.php"> <i class="fas fa-user"></i>LOGIN</a>
                    </li>
                    <li>
                        <a href="../customer/create.php"><i class="fas fa-user-plus"></i>REGISTER</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-1">

            </div>

            <div class="col-md-2">
                <div class="search-box">
                    <div class="input-group">
                        <input placeholder="Search Here" type="text" class="form-control">
                        <span class="input-group-btn">
					        	<button type="button">

					      	</span>
                    </div><!-- /.input-group -->
                </div><!-- /.search-box -->
            </div>
        </div> <!-- End Of /.row -->
    </div>    <!-- End Of /.Container -->

</section>  <!-- End of /Section -->

<!-- LOGO Start
================================================== -->

<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="#">
                    <img src="../images/logo2copy.png" alt="logo">
                </a>
            </div>    <!-- End of /.col-md-12 -->
        </div>    <!-- End of /.row -->
    </div>    <!-- End of /.container -->
</header> <!-- End of /Header -->


<!-- Navbar -->
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">

            <nav class="navbar navbar-expand-lg  blur  top-0  z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">

                <div class="container-fluid">
                    <a class="navbar-brand font-weight-bolder ms-sm-3" href="../index.php" rel="tooltip"
                       title="Orchid Bliss" data-placement="bottom" target="_blank">
                        ORCHID BLISS
                    </a>

                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                          </span>
                    </button>


                    <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                        <ul class="nav navbar-nav nav-main">
                            <li class="nav-item dropdown dropdown-hover mx-6 ">

                            </li>


                            <li class="nav-item dropdown dropdown-hover mx-2">
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center "
                                   href="../pastry-shop.php">
                                    PASTRY SHOP
                                </a>
                            </li>

                            <li class="nav-item dropdown dropdown-hover mx-2">
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                                   href="../lounge.php">
                                    THE LOUNGE
                                </a>
                            </li>

                            <li class="nav-item dropdown dropdown-hover mx-2">
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                                   href="../TableBook/buffet.php">
                                    BUFFET
                                </a>
                            </li>

                            <li class="nav-item dropdown dropdown-hover mx-2">
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                                   aria-selected="true" href="../about-us.php">
                                    ABOUT US
                                </a>
                            </li>

                            </li>
                            <li class="nav-item dropdown dropdown-hover mx-2">
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                                   aria-selected="true" href="../about-us.php">
                                    CONTACT US
                                </a>
                            </li>
                            <li class="nav-item dropdown dropdown-hover mx-6">

                            </li>

                            <li class="nav" style="margin-left: 50px">
                                <a class="nav-link nav-link-icon me-2  active" href="../cart/cart.php" target="_blank">

                                    <i class="fa fa-shopping-cart me-1"></i>
                                    <p class="d-inline text-sm z-index-1 font-weight-bold">CART</p>
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>


<div>
    <!-- CART Begins -->
    <form name="quantityForm" id="quantityForm" method="post" action="update-quantity.php"
          onsubmit="return updateQuantity(this)">
        <table width="560" align="center">
            <tr>
                <td>Item ID</td>
                <td><select name="item" id="item">
                        <option value="select">- select -
                            <?php
                            //loop through cart_details table rows
                            while ($row = mysqli_fetch_array($items)) {
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
                            while ($row = mysqli_fetch_assoc($quantities)) {
                                echo "<option value=$row[quantity_id]>$row[quantity_value]";
                            }
                            ?>
                    </select>
                </td>
                <td><input type="submit" name="Submit" value="Change Quantity"/></td>
            </tr>
        </table>
    </form>


    <div style="" class="card-body shadow p-3 mb-5 bg-body rounded">


        <table width="910" height="auto" style="text-align:center;" class="table table-borderless table-hover" w-auto>

            <thead class="table-dark">
            <tr>

                <th>ITEM ID</th>
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
            $cartItem = "";
            //loop through all table rows
            $symbol = mysqli_fetch_assoc($currencies); //gets active currency
            foreach ($result as $row) {
                $lt = $row['lt'];
                $cartItem .= $row['cart_id'] . ",";
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


            //get member_id from session
            $member_id = $_SESSION['SESS_MEMBER_ID'];


            if (mysqli_num_rows($items) > 0){


                //loop through all table rows
                $symbol = mysqli_fetch_assoc($currencies); //gets active currency

                foreach ($result_lounge as $row) {
                    $lt = $row['lt'];
                    $cartItem .= $row['cart_id'] . ",";
                    echo "<tr>";
                    echo "<td>" . $row['cart_id'] . "</td>";
                    echo '<td><a href=../images/' . $row[$lt . '_photo'] . ' alt="click to view full image" target="_blank"><img src=../images/' . $row[$lt . '_photo'] . ' width="80" height="70"></a></td>';
                    echo "<td>" . $row[$lt . '_name'] . "</td>";
                    echo "<td>" . $row[$lt . '_description'] . "</td>";
                    echo "<td>" . $row[$lt . 'category_name'] . "</td>";
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
                $cartItem = rtrim($cartItem, ',');
                echo "<tr>";
                echo '<td colspan="9" class="table-active"><a href="order-exec.php?id=' . $cartItem . '"><i class="btn btn-warning" >Go To Checkout</i></a></td>';
                echo "</tr>";


            }else {
            ?>
        </table>
        <div class="container-fluid mt-100">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body cart">
                            <div class="col-sm-12 empty-cart-cls text-center"><img src="https://i.imgur.com/dCdflKN.png"
                                                                                   width="130" height="130"
                                                                                   class="img-fluid mb-4 mr-3">
                                <h3><strong>Your Cart is Empty</strong></h3>
                                <h4>Add something to make me happy :)</h4> <a href="../pastry-shop.php"
                                                                              class="btn btn-primary cart-btn-transform m-3"
                                                                              data-abc="true">continue shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
        }

        //mysqli_free_result($result_lounge);
        mysqli_close($conn);
        ?>


    </div>
</div>


<!-- -------- FOOTER START ------- -->
<footer class="footer" style="background: #383838; padding-top: 5px">
    <hr class="horizontal dark mb-5">
    <div class="container">
        <div class=" row">
            <div class="col-md-4" style="color: #B6B6B6;">
                <div>
                    <a href="#">
                        <img src="../images/footerlogo5.png" alt="">
                    </a>

                    <p>
                        We stand for best in everything we do, to create an environment where absolute guest
                        satisfaction,which is our highest priority.

                    </p>
                </div>
                <div>
                    <h6 class="mt-3 mb-2 opacity-8" style="color: #fff;">Social</h6>
                    <ul class="d-flex flex-row ms-n3 nav">
                        <li class="nav-item" style="color: #fff;">
                            <a class="nav-link pe-1" href="https://www.facebook.com" target="_blank">
                                <i class="fab fa-facebook text-lg opacity-8" style="color: #fff;"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-1" href="https://twitter.com" target="_blank">
                                <i class="fab fa-twitter text-lg opacity-8" style="color: #fff;"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-1" href="https://dribbble.com" target="_blank">
                                <i class="fab fa-dribbble text-lg opacity-8" style="color: #fff;"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-1" href="https://github.com" target="_blank">
                                <i class="fab fa-github text-lg opacity-8" style="color: #fff;"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-1" href="https://www.youtube.com" target="_blank">
                                <i class="fab fa-youtube text-lg opacity-8" style="color: #fff;"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="col-md-5 col-sm-6 col-6 mb-4" style="color: #B6B6B6;">
                <div class="block">
                    <h4 style="color: #fff;">GET IN TOUCH</h4>
                    <p><i class="fa fa-map-marker"></i> <span style="color: #fff;">&emsp;FOOD COURT:</span> NO:22
                        Mccallum's Drive Nuwara Eliya</p>
                    <p><i class="fa fa-phone"></i> <span style="color: #fff;">&emsp;PHONE:</span> 052 22 22 878 </p>

                    <p><i class="fa fa-mobile"></i> <span style="color: #fff;">&emsp;MOBILE:</span> 070 2 100 600</p>

                    <p class="mail"><i class="fa fa-envelope"></i> <span style="color: #fff;">&emsp;E-MAIL:</span>
                        info@foodcourt.com</p>
                </div>    <!-- End Of /.block -->
            </div>


            <div class="col-md-3">
                <div class="block">
                    <div class="media">
                        <h4 style="color: #fff;">OUR LOCATION</h4>
                        <div id="map"></div>


                    </div>    <!-- End Of /.media -->
                </div>    <!-- End Of /.block -->
            </div> <!-- End Of Col-md-3 -->

            <div class="col-12">
                <div class="text-center">
                    <p class="my-4 text-sm" style="color: #fff;">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        | Food Court <a href="../admin/login-form.php" target="_blank">Administrator</a> All Rights
                        Reserved
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Google Map -->
<script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqqBMyAoQe2LlTe9e3_U5O8NaUwEJ9dDU&callback=initMap&libraries=&v=weekly"
        async
></script>
<script src="../validation/map.js"></script>
<!-- Google Map End -->

</body>
</html>