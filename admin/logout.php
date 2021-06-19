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
        <link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="page">
            <div id="header">
                <h1>Logout </h1>
                <p style="text-align:center">&nbsp;</p>
            </div>
            <h4 style="text-align:center" class="err">You have been logged out.</h4>
            <p style="text-align:center"><a href="login-form.php">Click Here</a> to Login</p>
            <div id="footer">
                <div class="bottom_addr">&copy; <?php echo date('Y'); ?> Tuck Hotel Restaurant. All Rights Reserved</div>
            </div>
        </div>
    </body>
    </html>
