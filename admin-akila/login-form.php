<?php
require_once('connect/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
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
                <h1>ADMINISTRATOR LOGIN</h1>
            </div>
        </div>
    </section>

    <form id="loginForm" name="loginForm" method="post" action="login-exec.php" onsubmit="return loginValidate(this)">
        <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
                <td width="112"><b>Username</b></td>
                <td width="188"><input name="login" type="text" class="textfield" id="login" /></td>
            </tr>
            <tr>
                <td><b>Password</b></td>
                <td><input name="password" type="password" class="textfield" id="password" /></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="Submit" value="Login" /></td>
            </tr>
        </table>
    </form>
    <?php include 'footer.php'; ?>
</div>
</body>
</html>

