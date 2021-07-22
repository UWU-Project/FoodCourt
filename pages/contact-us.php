
<?php
use PHPMailer\PHPMailer\PHPMailer;
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" type="image/png" href="../assets/img/favicon.png">

  <title>
    Orchid Bliss - Contact Us
  </title>


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

</head>

<body class="contact-us">
  <!-- Navbar -->
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <nav class="navbar navbar-expand-lg  blur blur-rounded top-0  z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid px-0">
            <a class="navbar-brand font-weight-bolder ms-sm-3" href="../index.php" rel="tooltip" title="CST GROUP 4" data-placement="bottom" target="_blank">
              Orchid Bliss
            </a>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>

  <!-- -------- START HEADER 8 w/ card over right bg image ------- -->
  <header>
    <div class="page-header min-vh-85" style="margin-top: 1cm">
      <div>
        <img class="position-absolute fixed-top ms-auto w-50 h-100 z-index-0 d-none d-sm-none d-md-block border-radius-section border-top-end-radius-0 border-top-start-radius-0 border-bottom-end-radius-0" src="../assets/img/curved-images/curved8.jpg" alt="image">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-7 d-flex justify-content-center flex-column">
            <div class="card d-flex blur justify-content-center p-4 shadow-lg my-sm-0 my-sm-6 mt-8 mb-5">
              <div class="text-center">
                <h3 class="text-gradient text-primary">Contact us</h3>
                <p class="mb-0">
                  For Any Questions, Orders, please E-Mail us or Contact using our Contact Form.
                </p>
              </div>
              <form method="post" class="row g-3 needs-validation" novalidate>
                <?php
                require("vendor/autoload.php");
                if (isset($_POST['email'])) {

                    $email = $_POST['email'];
                    $subject = $_POST['subject'];
                    $query = $_POST['query'];

                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                $mail->Host = "smtp.gmail.com"; // Enter your host here
                $mail->SMTPAuth = true;
                $mail->Username = "orchidbliss.lk@gmail.com"; // Enter your email here
                $mail->Password = "ccuvdwanikvjbzvd"; //Enter your passwrod here
                $mail->Port = 587;
                $mail->IsHTML(true);
                $mail->From = "support@orchidbliss.lk";
                $mail->FromName = "Orchid Bliss";

                $mail->Subject = $subject;

                $message = file_get_contents('templete.php');
                $message = str_replace('%subject%', $subject, $message);
                $message = str_replace('%message%', $query, $message);
                $mail->msgHTML($message);
                $mail->AddAddress($email);
                $mail->AddAddress('dkhultraone2@gmail.com'); //admin email
                if (!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
                } else {
                header("Location:thanks.php");
                }
                }
                ?>
                <div class="form-group">
                  <label for="validationCustom01" class="form-label ">Full Name</label>
                  <input type="text" name="subject" id="validationCustom01" maxlength="255" class="form-control is-valid" placeholder="Full Name" required>
                </div>

                <div class="form-group">
                  <label for="email">Your email address:</label>
                  <input type="email" name="email" id="email" maxlength="255" class="form-control" placeholder="hello@orchidbliss.lk" required>
                </div>

                <div class="form-group">
                  <label for="query">Your question:</label>
                  <textarea cols="30" rows="8" name="query" id="query" class="form-control" placeholder="Describe your problem in at least 250 characters" required></textarea>
                </div>

                <div class="form-group">
                  <input type="submit" value="Submit" class="btn bg-gradient-warning btn-lg w-100 mt-3 mb-0">
                </div>
              </form>


            </div>
          </div>
        </div>
      </div>
    </div>

  </header>
  <!-- -------- END HEADER 8 w/ card over right bg image ------- -->

  <footer class="footer" style="background: #383838;">
    <hr class="horizontal dark mb-5">
    <div class="container">
      <div class=" row">
        <div class="col-md-4" style="color: #B6B6B6;">
              <div>
                <a href="#">
                  <img src="../images/footerlogo5.png" alt="">
                </a>

                <p>
                  We stand for best in everything we do, to create an environment where absolute guest satisfaction,which is our highest priority.

                </p>
              </div>
              <div>
                <h6 class="mt-3 mb-2 opacity-8" style="color: #fff;">Social</h6>
                <ul class="d-flex flex-row ms-n3 nav" >
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
            <div class="block" >
              <h4 style="color: #fff;">GET IN TOUCH</h4>
              <p ><i class="fa fa-map-marker"></i> <span style="color: #fff;">&emsp;FOOD COURT:</span> NO:22 Mccallum's Drive Nuwara Eliya</p>
              <p> <i class="fa fa-phone"></i> <span style="color: #fff;">&emsp;PHONE:</span> 052 22 22 878 </p>

              <p> <i class="fa fa-mobile"></i> <span style="color: #fff;">&emsp;MOBILE:</span> 070 2 100 600</p>

              <p class="mail"><i class="fa fa-envelope"></i> <span style="color: #fff;">&emsp;E-MAIL:</span> info@foodcourt.com</p>
            </div>	<!-- End Of /.block -->
        </div>



        <div class="col-md-3">
              <div class="block">
                <div class="media">
                  <h4 style="color: #fff;">OUR LOCATION</h4>
                </div>	<!-- End Of /.media -->
              </div>	<!-- End Of /.block -->
        </div> <!-- End Of Col-md-3 -->

        <div class="col-12">
            <div class="text-center" >
              <p class="my-4 text-sm" style="color: #fff;">
                 Copyright © <script>
                  document.write(new Date().getFullYear())
                </script> | Food Court <a href="../admin/login-form.php" target="_blank" >Administrator</a> All Rights Reserved
              </p>
            </div>
        </div>
      </div>
    </div>
  </footer>








  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>

  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="../assets/js/plugins/parallax.min.js"></script>
  <!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="../assets/js/soft-design-system.min.js?v=1.0.5" type="text/javascript"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
          crossorigin="anonymous"></script>
</body>

</html>