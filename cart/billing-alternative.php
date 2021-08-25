<?php
require_once('../auth.php');

//Include database connection details
require_once('../connection/config.php');

//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}

?>

<?php
//selecting all records from almost all tables. Return an error if there are no records in the tables
$result = mysqli_query($conn, "SELECT * FROM orders_details o inner join cart_details c on c.cart_id = o.cart_id inner join quantities q on q.quantity_id = c.quantity_id inner join customers m on m.member_id = c.member_id inner join billing_details b on b.billing_id = o.billing_id ") or die("There are no records to display ... \n" . mysqli_error());
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo APP_NAME ?>:Alternative Billing</title>

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


            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-2"  style="justify-content: center;">
                    <li class="breadcrumb-item active"><a href="#">Cart</a></li>
                    <li class="breadcrumb-item active"><a href="#">Billing Details</a></li>
                    <li class="breadcrumb-item"><a>Billing Success</a></li>
                    <li class="breadcrumb-item"><a>Checkout</a></li>
                    <li class="breadcrumb-item"><a>Payment</a></li>
                </ol>
            </nav>
<br>
            <h1 style="padding-top: 20px">BILLING ADDRESS</h1>
            <hr>
            <p>We have found out that you don't have a billing address in your account. Please add a billing address in
                the
                form below. It is the same address that will be used to deliver your food orders. Please note that ONLY
                correct street/physical addresses should be used in order to ensure smooth delivery of your food orders.
                For
                more information <a href="contactus.php">Click Here</a> to contact us.</p></div>

    </div>

    <!-- -------- START HEADER 8 w/ card over right bg image ------- -->
    <header>
        <div class="page-header min-vh-85">
            <div>
                <img class="position-absolute fixed-top ms-auto w-50 h-100 z-index-0 d-none d-sm-none d-md-block border-radius-section border-top-end-radius-0 border-top-start-radius-0 border-bottom-end-radius-0"
                     src="../assets/img/curved-images/curved8.jpg" alt="image">
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-7 d-flex justify-content-center flex-column">
                        <div class="card d-flex blur justify-content-center p-4 shadow-lg my-sm-0 my-sm-6 mt-8 mb-5">
                            <div class="text-center">
                                <h4 class="mb-3">Billing address</h4>
                            </div>

                            <form id="billingForm" class="needs-validation" novalidate="" name="billingForm"
                                  method="post"
                                  action="billing-exec.php?id=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>"
                                  onsubmit="return billingValidate(this)">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName">First name</label>
                                        <input type="text" class="form-control" id="firstName" placeholder=""
                                               value="<?php echo $_SESSION['SESS_FIRST_NAME']; ?>" required="" readonly>
                                        <div class="invalid-feedback"> Valid first name is required.</div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="lastName">Last name</label>
                                        <input type="text" class="form-control" id="lastName" placeholder=""
                                               value="<?php echo $_SESSION['SESS_LAST_NAME']; ?>" required="" readonly>
                                        <div class="invalid-feedback"> Valid last name is required.</div>
                                    </div>

                                </div>

                                <!--<div class="mb-3">

                                    <label for="username">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" class="form-control" id="username" placeholder="Username" required="">
                                        <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                                    </div>
                                </div>-->

                                <div class="mb-3">
                                    <label for="address2">P.O. Box No <span class="text-muted">(Optional)</span></label>
                                    <input name="box" type="text" class="form-control" id="address2"
                                           placeholder="Apartment or Suite" id="box">
                                </div>

                                <div class="mb-3">
                                    <label for="address">Street</label>
                                    <input name="sAddress" type="text" class="form-control" id="sAddress"
                                           placeholder="Enter the Address" required="">
                                    <div class="invalid-feedback"> Please enter your shipping address.</div>
                                </div>


                                <div class="mb-3">
                                    <label for="address">City</label>
                                    <input name="city" id="city" type="text" class="form-control"
                                           placeholder="Enter the Address" required="">
                                    <div class="invalid-feedback"> Please enter your shipping address.</div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="mNumber">Mobile No</label>
                                        <input name="mNumber" type="text" class="form-control" id="mNumber"
                                               placeholder=""
                                               required="">
                                        <div class="invalid-feedback"> Mobile Number Required.</div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="lNumber">Landline No<span
                                                    class="text-muted">(Optional)</span></label>
                                        <input name="lNumber" type="text" class="form-control" id="lNumber"
                                               placeholder="Apartment or Suite">

                                    </div>
                                </div>
                                <hr>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="same-address" required="">
                                    <label class="custom-control-label" for="same-address">Shipping address is the same
                                        as my
                                        billing address</label>
                                    <div class="invalid-feedback"> Make Sure to Check</div>
                                </div>
                                <hr>


                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="Submit"
                                        value="Add">
                                    Save The Address
                                </button>
                        </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
</div>

</header>
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


<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'

        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation')

            // Loop over them and prevent submission
            Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        }, false)
    }())
</script>


</body>
</html>
