<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Failed<title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <?php include '../connection/config.php'; ?>
<title><?php echo APP_NAME ?>:Registration Failed</title>
<link href="stylesheets/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="../validation/user.js">
</script>
</head>
<body>
<div id="page">
  <div id="menu"><ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="foodzone.php">Food Zone</a></li>
  <li><a href="specialdeals.php">Special Deals</a></li>
  <li><a href="member-index.php">My Account</a></li>
  <li><a href="contactus.php">Contact Us</a></li>
  </ul>
  </div>
<div id="header">
  <div id="logo"> <a href="index.php" class="blockLink"></a></div>
  <div id="company_name"><?php echo APP_NAME ?> Restaurant</div>
</div>
<div id="center">
<h1>Registration Failed</h1>
  <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
<p>&nbsp;</p>
<div class="error">Registration Failed!</div>
<p>You are seeing this page because your attempt to create a new account has failed. You have used an email address that is already in use. <a href="login-register.php">Click Here</a> to try again. Or <a href="JavaScript: resetPassword()">Click Here</a> to reset your password.</p>
</div>
</div>

</div>

</body>
</html>