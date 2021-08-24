<?php require_once('../connection/config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo APP_NAME ?>: Reservation Success</title>
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>

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
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");

        body {
            background-color: #eee;
            font-family: "Poppins", sans-serif;
            font-weight: 300
        }

        .cart {
            height: 100vh
        }

        .progresses {
            display: flex;
            align-items: center
        }

        .line {
            width: 76px;
            height: 6px;
            background: #63d19e
        }

        .steps {
            display: flex;
            background-color: #63d19e;
            color: #fff;
            font-size: 12px;
            width: 30px;
            height: 30px;
            align-items: center;
            justify-content: center;
            border-radius: 50%
        }

        .check1 {
            display: flex;
            background-color: #63d19e;
            color: #fff;
            font-size: 17px;
            width: 60px;
            height: 60px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-bottom: 10px
        }

        .invoice-link {
            font-size: 15px
        }

        .order-button {
            height: 50px
        }

        .background-muted {
            background-color: #fafafc
        }
    </style>
</head>
<body>

<!-- Header Begins -->
<!-- TOP HEADER Start
================================================== -->

<section id="top" >
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <p class="contact-action"><i class="fa fa-phone-square"></i>CST GROUP 4 [ FOOD COURT ]</p>
            </div>

            <div class="col-md-3 clearfix">
                <ul class="login-cart">
                    <li>
                        <a href="../user/login-user.php"> <i class="fas fa-user"></i>LOGIN</a>
                    </li>
                    <li>
                        <a href="../user/signup-user.php"><i class="fas fa-user-plus"></i>REGISTER</a>
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
                        <ul class="nav navbar-nav nav-main mx-auto" style="display: inline-block;">
                            <li class="nav-item px-3">
                                <a class="nav-link nav-link-icon me-2 active " href="../TableBook/reserve.php" target="_blank">
                                    <i class="fas fa-calendar-plus me-1"></i>
                                    <p class="d-inline text-sm z-index-1 font-weight-bold">RESERVE TABLE</p>
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

<!-- End Navbar -->

<!-- ================================================== -->

<div  id="page" style="padding-top: 50px" >

    <!-- ========================================================================================================================================= -->
    <div class="container">
        <div class="py-5 text-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-2 justify-content-center">
                    <li class="breadcrumb-item active"><a href="#">Table</a></li>
                    <li class="breadcrumb-item active"><a>Select Table</a></li>
                    <li class="breadcrumb-item active"><a>Pick Date</a></li>
                    <li class="breadcrumb-item active"><a>Reserved</a></li>
                </ol>
            </nav>
            <h1 style="padding-top: 20px">RESERVATION SUCCESS</h1>
            <hr>
        </div>
    </div>
    <!-- ========================================================================================================================================= -->

    <div class="container" style="padding-bottom: 1cm">
        <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 p-5">
                    <div class="d-flex justify-content-center flex-column">
                <div class="card d-flex blur justify-content-center p-4 shadow-lg">
                            <div class="text-center order-details">
                                <div class="d-flex justify-content-center mb-5 flex-column align-items-center"> <span class="check1"><i class="fa fa-check"></i></span> <span class="font-weight-bold" >TABLE RESERVED SUCCESSFULLY</span> <h1 class="h2">Our Officer will contact you soon to Confirm the Reservation</h1><small class="mt-3">Feel free to <a href="../contactUs/contact-us.php">Contact Us</a></small></div> <button class="btn bg-gradient-success" ><a href="../user/home.php" class="text-decoration-none">Go to your Profile</a></button><button class="btn bg-gradient-info" ><a href="../user/home.php" class="text-decoration-none">Back to Home</a></button>
                            </div>
                        </div>
                    <div class="col-md-3"></div>

                    <div> </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- FOOTER Start
================================================== -->

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


<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>

<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
<script src="../assets/js/plugins/parallax.min.js"></script>
<!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->

<script src="../assets/js/soft-design-system.min.js?v=1.0.5" type="text/javascript"></script>

</body>

</html>
