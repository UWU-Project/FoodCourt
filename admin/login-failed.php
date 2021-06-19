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
</head>
<body>
<div id="page">
<div id="header">
<h1>Login Failed </h1>
<p style="text-align:center">&nbsp;</p>
</div>
<h4 style="text-align:center" class="err">Login Failed!</h4>
<p style="text-align:center">Please check your username and password and <a href="login-form.php">try again</a></p>
<?php include 'footer.php'; ?>
</div>
</body>
</html>