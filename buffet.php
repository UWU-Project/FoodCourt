<?php
//checking connection and connecting to a database
require_once('connection/config.php');
//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
if(!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}


//selecting all records from the food_details table. Return an error if there are no records in the table
$result=mysqli_query($conn,"SELECT * FROM food_details,food_categories WHERE food_details.food_category=food_categories.category_id ")
or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
?>
<?php
//retrive categories from the categories table
$categories=mysqli_query($conn,"SELECT * FROM food_categories")
or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
?>
<?php
//retrive a currency from the currencies table
//define a default value for flag_1
$flag_1 = 1;
$currencies=mysqli_query($conn,"SELECT * FROM currencies WHERE flag='$flag_1'")
or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
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

    //selecting all records from the food_details and categories tables based on category id. Return an error if there are no records in the table
    if($id > 0){
        $result=mysqli_query($conn,"SELECT * FROM food_details,food_categories WHERE food_category='$id' AND food_details.food_category=food_categories.category_id ")
        or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
    }elseif($id == 0){
        $result=mysqli_query($conn,"SELECT * FROM specials WHERE '".date('Y-m-d')."' BETWEEN date(special_start_date) and date(special_end_date) ")
        or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Food  Court</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>

    <!-- Css -->
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- jS -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="js/owl.carousel.min.js" type="text/javascript"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/main.js" type="text/javascript"></script>
    <script language="JavaScript" src="validation/user.js"></script>
    <style>
        .view1{

            margin: 15px;
            width: 200px;
            float: left;
        }
    </style>


</head>
<body>


<!-- TOP HEADER Start
    ================================================== -->

<section id="top">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <p class="contact-action"><i class="fa fa-phone-square"></i>IN CASE OF ANY QUESTIONS, CALL THIS NUMBER: <strong>+565 975 658</strong></p>
            </div>
            <div class="col-md-3 clearfix">
                <ul class="login-cart">
                    <li>
                        <a data-toggle="modal" data-target="#myModal" href="#">
                            <i class="fa fa-user"></i>
                            Login
                        </a>
                    </li>
                    <li>
                        <div class="cart dropdown">
                            <a data-toggle="dropdown" href="#"><i class="fa fa-shopping-cart"></i>Cart(1)</a>
                            <div class="dropdown-menu dropup">
                                <span class="caret"></span>
                                <ul class="media-list">
                                    <li class="media">
                                        <img class="pull-left" src="images/product-item.jpg" alt="">
                                        <div class="media-body">
                                            <h6>Italian Sauce
                                                <span>$250</span>
                                            </h6>
                                        </div>
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-sm">Checkout</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-2">
                <div class="search-box">
                    <div class="input-group">
                        <input placeholder="Search Here" type="text" class="form-control">
                        <span class="input-group-btn">
					        	<button class="btn btn-default" type="button"></button>
					      	</span>
                    </div><!-- /.input-group -->
                </div><!-- /.search-box -->
            </div>
        </div> <!-- End Of /.row -->
    </div>	<!-- End Of /.Container -->


    <!-- MODAL Start
        ================================================== -->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Introduce Yourself</h4>
                </div>
                <div class="modal-body clearfix">

                    <form action="#" method="post" id="create-account_form" class="std">
                        <fieldset>
                            <h3>Create your account</h3>
                            <div class="form_content clearfix">
                                <h4>Enter your e-mail address to create an account.</h4>
                                <p class="text">
                                    <label for="email_create">E-mail address</label>
                                    <span>
											<input placeholder="E-mail address"  type="text" id="email_create" name="email_create" value="" class="account_input">
					                    </span>
                                </p>
                                <p class="submit">
                                    <button class="btn btn-primary">Create Your Account</button>
                                </p>
                            </div>
                        </fieldset>
                    </form>
                    <form action="" method="post" id="login_form" class="std">
                        <fieldset>
                            <h3>Already registered?</h3>
                            <div class="form_content clearfix">
                                <p class="text">
                                    <label for="email">E-mail address</label>
                                    <span><input placeholder="E-mail address" type="text" id="email" name="email" value="" class="account_input"></span>
                                </p>
                                <p class="text">
                                    <label for="passwd">Password</label>
                                    <span><input placeholder="Password" type="password" id="passwd" name="passwd" value="" class="account_input"></span>
                                </p>
                                <p class="lost_password">
                                    <a href="#popab-password-reset" class="popab-password-link">Forgot your password?</a>
                                </p>
                                <p class="submit">
                                    <button class="btn btn-success">Log in</button>
                                </p>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>  <!-- End of /Section -->



<!-- LOGO Start
================================================== -->

<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="#">
                    <img src="images/logo2copy.png" alt="logo">
                </a>
            </div>	<!-- End of /.col-md-12 -->
        </div>	<!-- End of /.row -->
    </div>	<!-- End of /.container -->
</header> <!-- End of /Header -->




<!-- MENU Start
================================================== -->

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div> <!-- End of /.navbar-header -->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav nav-main">
                <li ><a href="index.php">HOME</a></li>
                <li><a href="pastry-shop.php">PASTRY SHOP</a></li>
                <li><a href="lounge.php">THE lOUNGE</a></li>
                <li class="active"><a href="buffet.php">BUFFET</a></li>
                <li><a href="blog-single.html">CART</a></li>
            </ul>
            </li> <!-- End of /.dropdown -->


            </ul> <!-- End of /.nav-main -->
        </div>	<!-- /.navbar-collapse -->
    </div>	<!-- /.container-fluid -->
</nav>	<!-- End of /.nav -->




<section id="topic-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1>BUFFET</h1>
                <p>A Bunch Of Products</p>
            </div>	<!-- End of /.col-md-4 -->
            <div class="col-md-8 hidden-xs">
                <ol class="breadcrumb pull-right">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shop</li>
                </ol>
            </div>	<!-- End of /.col-md-8 -->
        </div>	<!-- End of /.row -->
    </div>	<!-- End of /.container -->
</section>	<!-- End of /#Topic-header -->



<!-- PRODUCTS Start
================================================== -->

<section id="shop">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="blog-sidebar">
                    <div class="block">

                        <form name="categoryForm" id="categoryForm" method="post" action="pastry-shop.php" onsubmit="return categoriesValidate(this)">

                            <h3>Category</h3>
                            <p width="168"><select name="category" id="category">
                                    <option value="select">- select category -
                                        <?php
                                        //loop through categories table rows
                                        while ($row=mysqli_fetch_array($categories)){
                                            echo "<option value='{$row['category_id']}' ".($id == $row['category_id'] ? "selected" : "").">$row[category_name]</option>";
                                        }
                                        ?>
                                    <option value="0" <?php echo isset($id) &&  $id == 0 ? "selected" : "" ?>>Special Deals</option>
                                </select></p>
                            <p><input type="submit" name="Submit" value="Show Foods" /></p>


                        </form>
                        <div class="list-group">
                            <a href="#" class="list-group-item">
                                <i class="fa  fa-dot-circle-o"></i>
                                Local Food
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="fa  fa-dot-circle-o"></i>
                                Foreign Food
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="fa  fa-dot-circle-o"></i>
                                Indian Food
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="fa  fa-dot-circle-o"></i>
                                Spanish Food
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="fa  fa-dot-circle-o"></i>
                                Thai Food
                            </a>
                        </div>
                    </div>
                    <div class="block">
                        <img src="images/food-ad.png" alt="">
                    </div>
                    <div class="block">
                        <h4>Latest Food Items</h4>
                        <ul class="media-list">
                            <li class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="images/post-img.png" alt="...">
                                </a>
                                <div class="media-body">
                                    <a href="" class="media-heading">Lamb leg roast
                                        <p>Lorem ipsum dolor sit amet.</p></a>
                                </div>
                            </li>
                            <li class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="images/post-img-2.png" alt="...">
                                </a>
                                <div class="media-body">
                                    <a href="" class="media-heading"> Lamingtons
                                        <p>Lorem ipsum dolor.</p></a>
                                </div>
                            </li>
                            <li class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="images/post-img-3.png" alt="...">
                                </a>
                                <div class="media-body">
                                    <a href="" class="media-heading">
                                        Anzac Salad
                                        <p>Lorem ipsum dolor sit.</p>

                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="block">
                        <h4>Food Tag</h4>
                        <div class="tag-link">
                            <a href="">BALLET</a>
                            <a href="">CHRISTMAS</a>
                            <a href="">ELEGANCE</a>
                            <a href="">ELEGANT</a>
                            <a href="">SHOPPING</a>
                            <a href="">SHOP</a>
                        </div>
                    </div>
                </div>	<!-- End of /.col-md-3 -->

            </div>	<!-- End of /.row -->
            <div class="col-md-9">
                <div class="products-heading">
                    <h2>NEW PRODUCTS</h2>
                </div>	<!-- End of /.Products-heading -->
                <div class="product-grid">


                    <?php
                    $count = mysqli_num_rows($result);
                    if(isset($_POST['Submit']) && $count < 1){
                        echo "<html><script language='JavaScript'>alert('There are no foods under the selected category at the moment. Please check back later.')</script></html>";
                    }
                    else{
                        //loop through all table rows
                        //$counter = 3;
                        $symbol=mysqli_fetch_assoc($currencies); //gets active currency
                        if(isset($id) && $id == 0)
                            $lt = "special";
                        else
                            $lt = "food";
                        while ($row=mysqli_fetch_assoc($result)){
                            ?>


                            <div class="products view1" style="width: 200px; float: left;" >
                                <a href="#">
                                    <?php echo '<a href=images/'. $row[$lt.'_photo']. ' alt="click to view full image" target="_blank"><img src=images/'. $row[$lt.'_photo']. ' width="auto" height="100%"></a>'?>
                                </a>
                                <a href="#">
                                    <h4><?php echo $row[$lt.'_name']?></h4>
                                </a>
                                <p class="price"><?php echo $symbol['currency_symbol']. "" . $row[$lt.'_price']?></p>
                                <div >
                                    <a class="view-link shutter" href="#">
                                        <i class="fa fa-plus-circle"></i>Add To Cart</a>
                                </div>
                            </div>

                        <?php  }} ?>
                    <?php
                    mysqli_free_result($result);
                    mysqli_close($conn);
                    ?>

                </div>	<!-- End of /.products -->


            </div>	<!-- End of /.products-grid -->

            <!-- Pagination -->

            <div class="pagination-bottom">
                <ul class="pagination">
                    <li class="disabled"><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#">1 <span class="sr-only"></span></a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">»</a></li>
                </ul>	<!-- End of /.pagination -->
            </div>
        </div>	<!-- End of /.col-md-9 -->
    </div>	<!-- End of /.container -->
</section>	<!-- End of Section -->











<!-- FOOTER Start
================================================== -->

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="block clearfix">
                    <a href="#">
                        <img src="images/footerlogo5.png" alt="">
                    </a>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                    </p>
                    <h4 class="connect-heading">CONNECT WITH US</h4>
                    <ul class="social-icon">
                        <li>
                            <a class="facebook-icon" href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a class="plus-icon" href="#">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </li>
                        <li>
                            <a class="twitter-icon" href="#">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a class="pinterest-icon" href="#">
                                <i class="fa fa-pinterest"></i>
                            </a>
                        </li>
                        <li>
                            <a class="linkedin-icon" href="#">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>	<!-- End Of /.social-icon -->
                </div>	<!-- End Of /.block -->
            </div> <!-- End Of /.Col-md-4 -->
            <div class="col-md-4">
                <div class="block">
                    <h4>GET IN TOUCH</h4>
                    <p ><i class="fa  fa-map-marker"></i> <span>Food Court: </span>77-L3/22 Lady Mccallum's Drive Nuwara Eliya</p>
                    <p> <i class="fa  fa-phone"></i> <span>Phone:</span> 052 22 22 878 </p>

                    <p> <i class="fa  fa-mobile"></i> <span>Mobile:</span> 070 2 100 600</p>

                    <p class="mail"><i class="fa  fa-envelope"></i>Eamil: <span>info@foodcourt.com</span></p>
                </div>	<!-- End Of /.block -->
            </div> <!-- End Of Col-md-3 -->
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <h4>Our Location</h4>

                        <div id="googleMap" style="width:100%;height:200px;"></div>

                        <script>
                            function myMap() {
                                var mapProp= {
                                    center:new google.maps.LatLng(51.508742,-0.120850),
                                    zoom:5,
                                };
                                var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                            }
                        </script>

                        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
                    </div>	<!-- End Of /.media -->
                </div>	<!-- End Of /.block -->
            </div> <!-- End Of Col-md-3 -->
        </div> <!-- End Of /.row -->
    </div> <!-- End Of /.Container -->



    <!-- FOOTER-BOTTOM Start
    ================================================== -->

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <p style="text-align: center;">© 2021 | Food Court <a href="">Group 4</a> All Rights Reserved</p>
                </div>	<!-- End Of /.col-md-12 -->
            </div>	<!-- End Of /.row -->
        </div>	<!-- End Of /.container -->
    </div>	<!-- End Of /.footer-bottom -->
</footer> <!-- End Of Footer -->

<a id="back-top" href="#"></a>
</body>
</html>