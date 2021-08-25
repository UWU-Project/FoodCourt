<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link id="pagestyle" href="../../assets/css/soft-design-system.css?v=1.0.5" rel="stylesheet" />
    <link rel="stylesheet" href="../../css/style.css">
    <style>
        body{
            background: url(../../images/ourback.jpg);

        }
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
                    <img src="../../images/logo2copy.png" alt="logo">
                </a>
            </div>	<!-- End of /.col-md-12 -->
        </div>	<!-- End of /.row -->
    </div>	<!-- End of /.container -->
</header> <!-- End of /Header -->


<!-- Navbar -->
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">

            <nav class="navbar navbar-expand-lg  blur  top-0  z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">

                <div class="container-fluid">
                    <a class="navbar-brand font-weight-bolder ms-sm-3" href="../../index.php" rel="tooltip" title="Orchid Bliss" data-placement="bottom" target="_blank">
                        ORCHID BLISS
                    </a>

                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                          </span>
                    </button>



                    <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                        <ul class="nav navbar-nav nav-main">
                            <li class="nav-item dropdown dropdown-hover mx-10">
                            </li>
                            <li class="nav" style="margin-left: 50px">
                                <a class="nav-link nav-link-icon me-2 active " href="../../user/login-user.php" target="_blank">
                                    <i class="fas fa-user me-1"></i>
                                    <p class="d-inline text-sm z-index-1 font-weight-bold">LOGIN</p>
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

<div class="page-header min-vh-50" style="margin-top: 1cm">
    <div class="container">
            <div class="row">
                <div class="card d-flex blur justify-content-center p-4 shadow-lg my-sm-0 my-sm-6 mt-8 mb-5 col-md-4 offset-md-4 form">
                    <form action="user-otp.php" method="POST" autocomplete="off">
                        <h2 class="text-center">Code Verification</h2>
                        <?php
                        if(isset($_SESSION['info'])){
                            ?>
                            <div class="alert alert-success text-center">
                                <?php echo $_SESSION['info']; ?>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                foreach($errors as $showerror){
                                    echo $showerror;
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <input class="form-control" type="number" name="otp" placeholder="Enter verification code" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control button bg-warning btn-lg w-100 mt-3 mb-0" type="submit" name="check" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

    <!--   Core JS Files   -->
    <script src="../../assets/js/core/popper.min.js" type="text/javascript"></script>

    <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="../../assets/js/plugins/parallax.min.js"></script>
    <!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->

    <script src="../../assets/js/soft-design-system.min.js?v=1.0.5" type="text/javascript"></script>

</body>
</html>