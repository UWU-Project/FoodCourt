<?php
//checking connection and connecting to a database
require_once('../connection/config.php');
error_reporting(1);
//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}

//retrieve questions from the questions table
$questions = mysqli_query($conn, "SELECT * FROM questions")
or die("Something is wrong ... \n" . mysqli_error());
?>
<?php
//setting-up a remember me cookie
if (isset($_POST['Submit'])) {
    //setting up a remember me cookie
    if ($_POST['remember']) {
        $year = time() + 31536000;
        setcookie('remember_me', $_POST['login'], $year);
    } else if (!$_POST['remember']) {
        if (isset($_COOKIE['remember_me'])) {
            $past = time() - 100;
            setcookie(remember_me, gone, $past);
        }
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Food Code Proudly Presents By Themexpert</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>

    <!-- Css -->
    <link rel="stylesheet" href="../css/nivo-slider.css" type="text/css"/>
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="custom.css">


    <!-- jS -->
    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="../js/owl.carousel.min.js" type="text/javascript"></script>
    <script src="../js/jquery.nicescroll.js"></script>
    <script src="../js/jquery.scrollUp.min.js"></script>
    <script src="../js/main.js" type="text/javascript"></script>
    <script language="JavaScript" src="../validation/user.js"></script>


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
                        <a href="create.php">REGISTER</a>
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

</section>

<!-- LOGO Start
    ================================================== -->

<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="#">
                    <img src="../images/logo2copy.png" alt="logo">
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
                <li class="active"><a href="pastry-shop.php">PASTRY SHOP</a></li>
                <li><a href="lounge.php">THE lOUNGE</a></li>
                <li><a href="buffet.php">BUFFET</a></li>
                <li><a href="#">CART</a></li>
            </ul>
            </li> <!-- End of /.dropdown -->
            </ul> <!-- End of /.nav-main -->
        </div>	<!-- /.navbar-collapse -->
    </div>	<!-- /.container-fluid -->
</nav>	<!-- End of /.nav -->



    <div class="wrapper">
    <form id="loginForm" class="form-signin" name="loginForm" method="post" action="login-exec.php"
          onsubmit="return loginValidate(this)">
        <h2 class="form-signin-heading">Please login</h2>
        <p>Enter Your Email</p>

        <input id="login" type="text" class="form-control" name="login" placeholder="Email Address" required=""
               autofocus=""/>
        <br/>

        <p>Enter Your Password</p>
        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required=""/>

        <label class="checkbox" for="remember">

            <input id="remember" name="remember" type="checkbox" value="1"
                   onselect="cookie()" <?php if (isset($_COOKIE['remember_me'])) {
                echo 'checked="checked"';
            } else {
                echo '';
            }
            ?> />
            Remember me
        </label>



        <!-- login btn -->

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="Submit" value="Login">Login</button>
        <br/>


        <div class="text-center">
            <a class="small popab-password-link" href="JavaScript: resetPassword()">Forgot password?</a></div>
        <hr/>
        <div class="text-center">

            <h6>Don't have an account yet?</h6>
        </div>
        <div class="text-center">
            <a class="small" href="./create.php">Create a new account</a></div>

</div>
</form>

</div>

<!-- FOOTER Start
================================================== -->

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="block clearfix">
                    <a href="#">
                        <img src="images/footer-logo.png" alt="">
                    </a>
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
                    </ul>    <!-- End Of /.social-icon -->
                </div>    <!-- End Of /.block -->
            </div> <!-- End Of /.Col-md-4 -->
            <div class="col-md-4">
                <div class="block">
                    <h4>GET IN TOUCH</h4>
                    <p><i class="fa  fa-map-marker"></i> <span>Food Code d.o.o.,</span>1000 Ljubljana Celovska cesta
                        135, Slovenia</p>
                    <p><i class="fa  fa-phone"></i> <span>Phone:</span> (+386) 40 123 456 </p>

                    <p><i class="fa  fa-mobile"></i> <span>Mobile:</span> (+386) 40 654 123 651</p>

                    <p class="mail"><i class="fa  fa-envelope"></i>Eamil: <span>info@sitename.com</span></p>
                </div>    <!-- End Of /.block -->
            </div> <!-- End Of Col-md-3 -->
            <div class="col-md-4">
                <div class="block">
                    <h4>UPCOMING ITEMS</h4>
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/product-item.jpg" alt="...">
                        </a>
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/product-item.jpg" alt="...">
                        </a>
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/product-item.jpg" alt="...">
                        </a>
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/product-item.jpg" alt="...">
                        </a>
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/product-item.jpg" alt="...">
                        </a>
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/product-item.jpg" alt="...">
                        </a>
                    </div>    <!-- End Of /.media -->
                </div>    <!-- End Of /.block -->
            </div> <!-- End Of Col-md-3 -->
        </div> <!-- End Of /.row -->
    </div> <!-- End Of /.Container -->


    <!-- FOOTER-BOTTOM Start
    ================================================== -->

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="cash-out pull-left">
                        <li>
                            <a href="#">
                                <img src="images/American-Express.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/PayPal.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/Maestro.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/Visa.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/Visa-Electron.png" alt="">
                            </a>
                        </li>
                    </ul>
                    <p class="copyright-text pull-right">Food Code @2013 Designed by <a
                                href="http://www.themexpert.com">Themexpert</a> All Rights Reserved</p>
                </div>    <!-- End Of /.col-md-12 -->
            </div>    <!-- End Of /.row -->
        </div>    <!-- End Of /.container -->
    </div>    <!-- End Of /.footer-bottom -->
</footer> <!-- End Of Footer -->

<a id="back-top" href="#"></a>

<script>

</script>

</body>
</html>