<?php require_once('../connection/config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title><?php echo APP_NAME ?>:Registration Failed</title>

    <script language="JavaScript" src="../validation/user.js" type=""></script>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-design-system.css?v=1.0.5" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style.css">

    <script language="JavaScript" src="../validation/user.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/bread.css">
    <style>
        body{
            background: url(../images/ourback.jpg);

        }
    </style>


</head>

<body>

<!-- TOP HEADER Start
================================================== -->

<section id="top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <p class="contact-action"><i class="fa fa-phone-square"></i>CST GROUP 4 [ FOOD COURT ]</p>
            </div>
            <div class="col-md-3 clearfix" >
                <ul class="login-cart" style="text-align: right">
                    <li>
                        <a href="../user/login-user.php"> <i class="fas fa-user"></i>LOGIN</a>
                    </li>
                    <li>
                        <a href="../user/signup-user.php"><i class="fas fa-user-plus"></i>REGISTER</a>
                    </li>
                </ul>
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
                    <img src="../images/logo2copy.png" alt="logo">
                </a>
            </div>    <!-- End of /.col-md-12 -->
        </div>    <!-- End of /.row -->
    </div>    <!-- End of /.container -->
</header> <!-- End of /Header -->




<div id="page">
    <div id="menu"><!--<ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="foodzone.php">Food Zone</a></li>
            <li><a href="specialdeals.php">Special Deals</a></li>
            <li><a href="member-index.php">My Account</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
        </ul>-->
    </div>
    <div id="header">
        <div id="logo"> <a href="../index.php" class="blockLink"></a></div>

    </div>
    <div class="container">
        <h1 style="text-align: center">Reservation Failed!</h1>
        <br><br>
        <div style="border:#ecbd74 solid 3px;padding:40px 60px 20px 60px">

            <div class="error">
            <h5 style="text-align: center">You are seeing this page because partyhall has been booked already. <a style="color: #f30803" href="reserve.php">Click Here</a> to try again.</h5>
        </div></div>
    </div>


</div>
</body>
</html>
