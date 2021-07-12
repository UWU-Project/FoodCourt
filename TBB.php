
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- jS -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="js/owl.carousel.min.js" type="text/javascript"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/main.js" type="text/javascript"></script>
    <script language="JavaScript" src="validation/user.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style>
        .photo1{
            height: 50px;
            width: auto;
        }
        .bfont{

            font-size: 24px
         }
        .imgcenter {
            display: block;
            margin-left: auto;
            margin-right: auto;

            width: auto;
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
                <li><a href="lounge.php">THE LOUNGE</a></li>
                <li class="active"><a href="TableBook/buffet.php">BUFFET</a></li>
                <li><a href="about-us.php">ABOUT US</a></li>
                <li ><a href="#">CART</a></li>
            </ul>
        </div>	<!-- /.navbar-collapse -->

    </div>	<!-- /.container-fluid -->
</nav>	<!-- End of /.nav -->

<!-- AAA
================================================== -->

<div>
    <div class="row imgcenter" >
        <div class="col-md-12 ">
            <img src="images/tableres.png" alt="">
        </div>
    </div>

    <div class="row imgcenter bfont" >
       <div class="col-md-6">

           <img src="images/tse22.png" alt="">
           <button class="w3-button w3-block w3-black" href="buffttest1.php"><a href="buffttest1.php">Book Your Table</a></button>
        </div>


        <div class="col-md-6 new">

            <img src="images/rtw.PNG" alt="">

        </div>
    </div>

</div>

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