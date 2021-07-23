<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include '../connection/config.php'; ?>
    <title><?php echo APP_NAME ?>: Billing Success</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>

    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet"/>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet"/>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-design-system.css?v=1.0.5" rel="stylesheet"/>
    <link rel="stylesheet" href="../css/style.css">
    <script language="JavaScript" src="../validation/user.js"></script>


    <style>

        body {
            background: #f2f2f2;
        }

        .payment {
            border: 1px solid #f2f2f2;
            height: 280px;
            border-radius: 20px;
            background: #fff;
        }

        .payment_header {
            background: rgb(246, 176, 0);
            padding: 20px;
            border-radius: 20px 20px 0px 0px;

        }

        .check {
            margin: 0px auto;
            width: 50px;
            height: 50px;
            border-radius: 100%;
            background: #fff;
            text-align: center;
        }

        .check i {
            vertical-align: middle;
            line-height: 50px;
            font-size: 30px;
        }

        .content {
            text-align: center;
        }

        .content h1 {
            font-size: 25px;
            padding-top: 25px;
        }

        .content a {
            width: 200px;
            height: 35px;
            color: #fff;
            border-radius: 30px;
            padding: 5px 10px;
            background: rgb(246, 176, 0);
            transition: all ease-in-out 0.3s;
        }

        .content a:hover {
            text-decoration: none;
            background: #000;
        }

    </style
    </style>
</head>
<body>

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
                        <ul class="nav navbar-nav nav-main " style="display: inline-block;">
                            <li class="nav-item dropdown dropdown-hover mx-10">
                            </li>
                            <li class="nav" style="margin-left: 50px">
                                <a class="nav-link nav-link-icon me-2 active " href="../cart/cart.php" target="_blank">

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

<!-- Billing Begins -->

<div id="page" style="padding-top: 50px">

    <div class="container">
        <div class="py-5 text-center">

            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;); "
                 aria-label="breadcrumb">
                <ol class="breadcrumb" style="padding-bottom: 10px;">
                    <li class="breadcrumb-item"><a href="../cart/cart.php">Cart</a></li>
                    <li class="breadcrumb-item"><a href="">Billing Details</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Billing Success</li>
                </ol>
            </nav>


            </div>

    </div>

    <!-- -------- START HEADER 8 w/ card over right bg image ------- -->

        <div class="page-header min-vh-85">
            <div>
                <img class="position-absolute fixed-top ms-auto w-50 h-100 z-index-0 d-none d-sm-none d-md-block border-radius-section border-top-end-radius-0 border-top-start-radius-0 border-bottom-end-radius-0"
                     src="../assets/img/curved-images/curved8.jpg" alt="image">
            </div>

            <div class="container" >
                <div class="row">
                    <div class="col-lg-7 d-flex justify-content-center flex-column">
                        <div class="payment card d-flex blur justify-content-center p-4 shadow-lg my-sm-0 my-sm-6 mt-8 mb-5">
                            <div class="payment_header">
                                <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                            <div class="content">
                                <h1>Address Added Succesfully</h1>
                                <p>Billing and Shipping Details Added Succesfully. <br>
                                    Let's Continue the Payment</p>
                                <a href="cart.php">Go to Cart</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    <!-- -------- END HEADER 8 w/ card over right bg image ------- -->


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

                        <p><i class="fa fa-mobile"></i> <span style="color: #fff;">&emsp;MOBILE:</span> 070 2 100 600
                        </p>

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

