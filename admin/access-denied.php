<?php require_once('connect/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="page">
    <div id="header">
        <h1>Access Denied </h1>
        <p style="text-align:center">&nbsp;</p>
    </div>
    <h4 style="text-align:center" class="err">Access Denied!<br />
        You do not have access to this resource.</h4>
    <p style="text-align:center"><a href="login-form.php">Click Here</a> to login first.</p>
    <?php include 'footer.php'; ?>
</div>
</body>
</html>

