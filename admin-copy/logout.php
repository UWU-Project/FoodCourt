<?php
//Start session
session_start();

//Unset the variables stored in session
unset($_SESSION['SESS_ADMIN_ID']);
unset($_SESSION['SESS_ADMIN_NAME']);
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Logged Out</title>


        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script language="JavaScript" src="validation/admin.js"></script>
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>

    </head>
    <body>
        <div id="page">
            <!-- LOGO Start
================================================== -->

            <header>
                <div class="container">
                    <div class="row text-center">
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
            <section id="topic-header">
                <div class="container">
                    <div class="row text-center">
                        <h1>LOGOUT</h1>
                    </div>
                </div>
            </section>

            <h4 style="text-align:center" class="err">You have been logged out.</h4>
            <p style="text-align:center"><a href="./user/login-user.php">Click Here</a> to Login</p>
            <div id="footer">
                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <p style="text-align: center;">&copy; <?php echo date('Y'); ?> | ORCHID BLISS <a href="../index.php">| Home |</a> All Rights Reserved</p>
                            </div>	<!-- End Of /.col-md-12 -->
                        </div>	<!-- End Of /.row -->
                    </div>	<!-- End Of /.container -->
                </div>	<!-- End Of /.footer-bottom -->
            </div>

        </div>
    </body>
    </html>
