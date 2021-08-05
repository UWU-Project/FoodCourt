<?php require_once('connect/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script language="JavaScript" src="validation/admin.js"></script>
    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>

</head>
<body>
<div id="page">
    <section id="topic-header">
        <div class="container">
            <div class="row">
                <h1>ACCESS DENIED!</h1>
            </div>
        </div>
    </section>

    <h4 style="text-align:center" class="err">Access Denied!<br />
        You do not have access to this resource.</h4>
    <p style="text-align:center"><a href="login-form.php">Click Here</a> to login first.</p>
    <?php include 'footer.php'; ?>
</div>
</body>
</html>

