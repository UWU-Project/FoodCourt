<?php
	require_once('connect/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Failed</title>
<link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
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
                <h1>LOGING FAILED</h1>
            </div>
        </div>
    </section>

<h4 style="text-align:center" class="err">Login Failed!</h4>
<p style="text-align:center">Please check your username and password and <a href="login-form.php">try again</a></p>
<?php include 'footer.php'; ?>
</div>
</body>
</html>