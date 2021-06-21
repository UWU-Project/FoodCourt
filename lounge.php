<?php
//checking connection and connecting to a database
require_once('connection/config.php');
//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
if(!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}


//selecting all records from the food_details table. Return an error if there are no records in the table
$result=mysqli_query($conn,"SELECT * FROM food_details_lounge,food_categories_lounge WHERE food_details_lounge.food_category=food_categories_lounge.category_id ")
or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
?>
<?php
//retrive categories from the categories table
$categories=mysqli_query($conn,"SELECT * FROM food_categories_lounge")
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
        $result=mysqli_query($conn,"SELECT * FROM food_details_lounge,food_categories_lounge WHERE food_category='$id' AND food_details_lounge.food_category=food_categories_lounge.category_id ")
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
    <!-- Icon -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
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
                <p class="contact-action"><i class="fa fa-phone-square"></i>CST GROUP 4 [ FOOD COURT ]</p>
            </div>
            <div class="col-md-3 clearfix">
                <ul class="login-cart">
                    <li>
                        <a href="customer/login.php">LOGIN</a>
                    </li>
                    <li>
                        <a href="customer/create.php">REGISTER</a>
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
                <li class="active"><a href="lounge.php">THE LOUNGE</a></li>
                <li><a href="buffet.php">BUFFET</a></li>
                <li><a href="#">CART</a></li>
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
                <h2>THE LOUNGE</h2>
                <p></p>
            </div>	<!-- End of /.col-md-4 -->

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

                        <form name="categoryForm" id="categoryForm" method="post" action="lounge.php" onsubmit="return categoriesValidate(this)">

                            <h3>Category</h3>
                            <p width="168"><select name="category" id="category" class="form-control form-control-lg">
                                    <option value="select">- select category -
                                        <?php
                                        //loop through categories table rows
                                        while ($row=mysqli_fetch_array($categories)){
                                            echo "<option value='{$row['category_id']}' ".($id == $row['category_id'] ? "selected" : "").">$row[category_name]</option>";
                                        }
                                        ?>
                                    <option value="0" <?php echo isset($id) &&  $id == 0 ? "selected" : "" ?>>Special Deals</option>
                                </select></p>

                            <p><button type="submit" name="Submit" class="btn btn-secondary btn-sm btn-block " >Show Foods</button></p>


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
                        <img src="images/resevation.jpg" alt="">
                    </div>
                    <div class="block">
                        <h4>Reserve Your Day..</h4>
                        <ul class="media-list">

                            <li class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="images/family.jpg" alt="...">
                                </a>
                                <div class="media-body">
                                    <a href="" class="media-heading">FAMILY
                                        <p>Happiness Stories. </p></a>
                                </div>
                            </li>
                            <li class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="images/love.jpg" alt="...">
                                </a>
                                <div class="media-body">
                                    <a href="" class="media-heading">LOVE
                                        <p>Endless Stories.</p></a>
                                </div>
                            </li>
                            <li class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="images/Event.jpg" alt="...">
                                </a>
                                <div class="media-body">
                                    <a href="" class="media-heading">
                                        EVENT
                                        <p>Compassionate Together.</p>

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
                    <br><br>
                    <p>
                        We stand for best in everything we do, to create an environment where absolute guest satisfaction,which is our highest priority.

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
                    <p ><i class="fa  fa-map-marker"></i> <span>Food Court: </span>NO:22 Mccallum's Drive Nuwara Eliya</p>
                    <p> <i class="fa  fa-phone"></i> <span>Phone:</span> 052 22 22 878 </p>

                    <p> <i class="fa  fa-mobile"></i> <span>Mobile:</span> 070 2 100 600</p>

                    <p class="mail"><i class="fa  fa-envelope"></i>Eamil: <span>info@foodcourt.com</span></p>
                </div>	<!-- End Of /.block -->
            </div> <!-- End Of Col-md-3 -->

            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <h4>Our Location</h4>


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

                    <p style="text-align: center;">© 2021 | Food Court <a href="admin/login-form.php">Administrator</a> All Rights Reserved</p>
                </div>	<!-- End Of /.col-md-12 -->
            </div>	<!-- End Of /.row -->
        </div>	<!-- End Of /.container -->
    </div>	<!-- End Of /.footer-bottom -->
</footer> <!-- End Of Footer -->

<a id="back-top" href="#"></a>
</body>
</html>