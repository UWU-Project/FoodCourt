<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="style.css">


	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/responsive.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


	<script src="../js/jquery.min.js" type="text/javascript"></script>
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../js/jquery.nicescroll.js"></script>
	<script src="../js/jquery.scrollUp.min.js"></script>
	<script src="../js/main.js" type="text/javascript"></script>
</head>

<body>
<section id="top">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <p class="contact-action"><i class="fa fa-phone-square"></i>CST GROUP 4 [ FOOD COURT ]</p>
            </div>
            <div class="col-md-3 clearfix">
                <ul class="login-cart">

                    <li>
                        <a href="login.php">LOGIN</a>
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
                <li ><a href="../index.php">HOME</a></li>
                <li><a href="../pastry-shop.php">PASTRY SHOP</a></li>
                <li><a href="../lounge.php">THE LOUNGE</a></li>
                <li><a href="../buffet.php">BUFFET</a></li>
                <li><a href="#">CART</a></li>
            </ul>
            </li> <!-- End of /.dropdown -->
            </ul> <!-- End of /.nav-main -->
        </div>	<!-- /.navbar-collapse -->
    </div>	<!-- /.container-fluid -->
</nav>	<!-- End of /.nav -->

    <div class="container">
        <div class="wrapper">
        <div class="row">
        <div class="col-md-4">
</div>
            <div class="col-md-4 form">
                <form action="signup-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Signup Form</h2>
                    <p class="text-center">It's quick and easy.</p>
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Full Name" required value="<?php echo $name ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Signup">
                    </div>
                    <div class="link login-link text-center">Already a member? <a href="login-user.php">Login here</a></div>
                </form>
            </div>
            
<div class="col-md-4">
</div>
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
                            <img src="../images/footerlogo5.png" alt="">
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

                        <p style="text-align: center;">© 2021 | Food Court <a href="../admin/login-form.php">Administrator</a> All Rights Reserved</p>
                    </div>	<!-- End Of /.col-md-12 -->
                </div>	<!-- End Of /.row -->
            </div>	<!-- End Of /.container -->
        </div>	<!-- End Of /.footer-bottom -->
    </footer> <!-- End Of Footer -->

    <a id="back-top" href="#"></a>
    
</body>
</html>