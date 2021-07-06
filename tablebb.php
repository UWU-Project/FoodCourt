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

    <!-- Icon -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Css -->
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- jS -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="js/owl.carousel.min.js" type="text/javascript"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/main.js" type="text/javascript"></script>
    <script language="JavaScript" src="validation/user.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
        .view1{

            margin: 15px;
            width: 200px;
            float: left;
        }
        .button  {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }
        .button2{
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }
        .button1 {
            background-color: white;
            color: black;
            border: 2px solid #555555;
        }

        .button:hover {
            background-color: #fcc63c;
            color: white;
        }
        .button2:hover {
            background-color: #4ed1d9;
            color: white;
        }
        .buttonL {width: 100%;}
        .imgcenter{
            display: block;
            margin-left: auto;
            margin-right: auto;
            padding: 10px;

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
</section>

<!-- MODAL Start
    ================================================== -->


<!-- End of /Section -->



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

        <div class="navbar navbar-expand-lg navbar-light bg-light" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav nav-main">
                <li ><a href="index.php">HOME</a></li>
                <li><a href="pastry-shop.php">PASTRY SHOP</a></li>
                <li><a href="lounge.php">THE LOUNGE</a></li>
                <li class="active"><a href="TableBook/buffet.php">BUFFET</a></li>
                <li ><a href="about-us.php">ABOUT US</a></li>
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
                <h2>BUFFET</h2>

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

<!-- BooK Date
================================================== -->

<!--<img id="my-img" src="'images/10.png" onmouseover="hover(this);" onmouseout="unhover(this);" />-->

<!-- Book Table
================================================== -->
<div class="container">
    <div class="row" style="margin-bottom: 50px">
        <div class="col-md-3">
        <a href="#">
            <img id="my-img" src="images/t1.png" class="imgcenter" onmouseover="hover(this);" onmouseout="unhover(this);" />
        </a>
        </div>
        <div class="col-md-6">
        <a href="#">
            <img id="my-img" src="images/t11.png" class="imgcenter" onmouseover="hover11(this);" onmouseout="unhover11(this);" />
        </a>
        </div>
        <div class="col-md-3">
            <a href="#">
                <img id="my-img" src="images/t2.png" class="imgcenter" onmouseover="hover2(this);" onmouseout="unhover2(this);" />
            </a>
        </div>
    </div>
</div>
    <div class="container" >
        <div class="row" style="margin-bottom: 50px">
            <div class="col-9">
                <div class="row" style="margin-bottom: 50px">
                    <div class="col"><a href="#">
                            <img id="my-img" src="images/t3.png" class="imgcenter" onmouseover="hover3(this);" onmouseout="unhover3(this);" />
                        </a></div>
                    <div class="col"><a href="#">
                            <img id="my-img" src="images/t5.png" class="imgcenter" onmouseover="hover5(this);" onmouseout="unhover5(this);" />
                        </a></div>
                    <div class="col"><a href="#">
                            <img id="my-img" src="images/t7.png" class="imgcenter" onmouseover="hover7(this);" onmouseout="unhover7(this);" />
                        </a></div>

                                        </div>
                <div class="row">
                    <div class="col"><a href="#">
                            <img id="my-img" src="images/t4.png" class="imgcenter" onmouseover="hover4(this);" onmouseout="unhover4(this);" />
                        </a></div>
                    <div class="col"><a href="#">
                            <img id="my-img" src="images/t6.png" class="imgcenter" onmouseover="hover6(this);" onmouseout="unhover6(this);" />
                        </a></div>
                    <div class="col"><a href="#">
                            <img id="my-img" src="images/t8.png" class="imgcenter" onmouseover="hover8(this);" onmouseout="unhover8(this);" />
                        </a></div>

                </div>

            </div>

            <div class="col-3"><a href="#">
                    <img id="my-img" src="images/t9.png" class="imgcenter" onmouseover="hover1(this);" onmouseout="unhover1(this);" />
                </a></div>
        </div>

        <!-- hover
        ================================================== -->
        <script>
            function hover1(element) {
                element.setAttribute('src', 'images/t9h.png');
            }

            function unhover1(element) {
                element.setAttribute('src', 'images/t9.png');
            }
            function hover(element) {
                element.setAttribute('src', 'images/t1h.png');
            }

            function unhover(element) {
                element.setAttribute('src', 'images/t1.png');
            }
            function hover2(element) {
                element.setAttribute('src', 'images/t2h.png');
            }

            function unhover2(element) {
                element.setAttribute('src', 'images/t2.png');
            }
            function hover3(element) {
                element.setAttribute('src', 'images/t3h.png');
            }

            function unhover3(element) {
                element.setAttribute('src', 'images/t3.png');
            }
            function hover4(element) {
                element.setAttribute('src', 'images/t4h.png');
            }

            function unhover4(element) {
                element.setAttribute('src', 'images/t4.png');
            }
            function hover5(element) {
                element.setAttribute('src', 'images/t5h.png');
            }

            function unhover5(element) {
                element.setAttribute('src', 'images/t5.png');
            }
            function hover6(element) {
                element.setAttribute('src', 'images/t6h.png');
            }

            function unhover6(element) {
                element.setAttribute('src', 'images/t6.png');
            }
            function hover7(element) {
                element.setAttribute('src', 'images/t7h.png');
            }

            function unhover7(element) {
                element.setAttribute('src', 'images/t7.png');
            }
            function hover8(element) {
                element.setAttribute('src', 'images/t8h.png');
            }

            function unhover8(element) {
                element.setAttribute('src', 'images/t8.png');
            }
            function hover9(element) {
                element.setAttribute('src', 'images/t9h.png');
            }

            function unhover9(element) {
                element.setAttribute('src', 'images/t9.png');
            }
            function hover10(element) {
                element.setAttribute('src', 'images/t10h.png');
            }

            function unhover10(element) {
                element.setAttribute('src', 'images/t10.png');
            }
            function hover11(element) {
                element.setAttribute('src', 'images/t11h.png');
            }

            function unhover11(element) {
                element.setAttribute('src', 'images/t11.png');
            }
        </script>
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