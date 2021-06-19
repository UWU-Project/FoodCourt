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
    <link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="validation/admin.js">
    </script>
</head>
<body>
<div id="page">
    <div id="header">
        <h1>Administrator Login </h1>
        <p style="text-align:center">&nbsp;</p>
    </div>
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

