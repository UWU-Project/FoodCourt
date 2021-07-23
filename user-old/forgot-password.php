<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="style.css">

	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/responsive.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


	<script src="../js/jquery.min.js" type="text/javascript"></script>
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../js/jquery.nicescroll.js"></script>
	<script src="../js/jquery.scrollUp.min.js"></script>
	<script src="../js/main.js" type="text/javascript"></script>

</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="../">
                <img src="../images/logo2copy.png" alt="logo">
                </a>
            </div>	<!-- End of /.col-md-12 -->
        </div>	<!-- End of /.row -->
    </div>	<!-- End of /.container -->
</header> <!-- End of /Header -->

    <div class="container">
        
        <div class="row">
        <div class="col-md-4">
</div>
            <div class="col-md-4 form">
                <form action="forgot-password.php" method="POST" autocomplete="">
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-email" value="Continue">
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                    </div>
        </div>
    </div>

    
</body>
</html>