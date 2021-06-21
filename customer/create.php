<?php
//checking connection and connecting to a database
require_once('../connection/config.php');
error_reporting(1);
//Connect to mysqli server
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
    if(!$conn) {
        die('Failed to connect to server: ' . mysqli_error());
    }

	//retrieve questions from the questions table
$questions=mysqli_query($conn,"SELECT * FROM questions")
or die("Something is wrong ... \n" . mysqli_error());
?>
<?php
//setting-up a remember me cookie
    if (isset($_POST['Submit'])){
        //setting up a remember me cookie
        if($_POST['remember']) {
            $year = time() + 31536000;
            setcookie('remember_me', $_POST['login'], $year);
        }
        else if(!$_POST['remember']) {
            if(isset($_COOKIE['remember_me'])) {
                $past = time() - 100;
                setcookie(remember_me, gone, $past);
            }
        }
    }

	?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Food Code Proudly Presents By Themexpert</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>

	<!-- Css -->
	<link rel="stylesheet" href="../css/nivo-slider.css" type="text/css" />
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<link rel="stylesheet" href="../css/owl.theme.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/responsive.css">

	<!-- jS -->
	<script src="../js/jquery.min.js" type="text/javascript"></script>
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../js/jquery.nivo.slider.js" type="text/javascript"></script>
	<script src="../js/owl.carousel.min.js" type="text/javascript"></script>
	<script src="../js/jquery.nicescroll.js"></script>
	<script src="../js/jquery.scrollUp.min.js"></script>
	<script src="../js/main.js" type="text/javascript"></script>
	<script language="JavaScript" src="../validation/user.js"></script>

<style>
 .wrapper {
	 margin-top: 80px;
	 margin-bottom: 80px;
}
 .form-signin {
	 max-width: 500px;
	 padding: 15px 35px 45px;
	 margin: 0 auto;
	 background-color: #fff;
	 border: 1px solid rgba(0, 0, 0, 0.1);
}
 .form-signin .form-signin-heading, .form-signin .checkbox {
	 margin-bottom: 30px;
}
 .form-signin .checkbox {
	 font-weight: normal;
}
 .form-signin .form-control {
	 position: relative;
	 font-size: 16px;
	 height: auto;
	 padding: 10px;
}
 .form-signin .form-control:focus {
	 z-index: 2;
}
 .form-signin input[type="text"] {
	 margin-bottom: -1px;
	 border-bottom-left-radius: 0;
	 border-bottom-right-radius: 0;
}
 .form-signin input[type="password"] {
	 margin-bottom: 20px;
	 border-top-left-radius: 0;
	 border-top-right-radius: 0;
}


</style>

</head>

<body>



	<section>

	<!-- MODAL Start
    	================================================== -->

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
		    	<div class="modal-content">
		    		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        		<h4 class="modal-title" id="myModalLabel">Nice to see you here.</h4>
		      		</div>
			      	<div class="modal-body clearfix">


							
			      		<form id="loginForm" name="loginForm" method="post" action="../login-exec.php" onsubmit="return loginValidate(this)" class="std">
							<fieldset>
								<h3>Log into your Account</h3>
								<div class="form_content clearfix">
									<p class="text">
									<label for="email">E-mail address</label>
										<span><input name="login" type="text" class="textfield" id="login" class="account_input" placeholder="E-mail address"/></span>
									</p>
									<p class="text">
									<label for="passwd">Password</label>
										<span><input name="password" type="password" class="textfield" id="password" class="account_input" placeholder="Password"/></span>
									</p>
									
									<label for="remember">remember me</label>
									<input name="remember" type="checkbox" class="" id="remember" value="1" onselect="cookie()" <?php if(isset($_COOKIE['remember_me'])) {
                        echo 'checked="checked"';
                    }
                    else {
                        echo '';
                    }
                    ?>/>
									</p>
									<p class="submit">
										<button class="btn btn-success" type="submit" name="Submit" value="Login" >Log in</button>
									</p>
									<p>
									<p class="lost_password">
										<a href="JavaScript: resetPassword()" class="popab-password-link">Forgot your password?</a>
									</p>
									
								</div>
							</fieldset>
						</form>
			      	</div>
					  <div class="modal-body">
					  <p>
									Not have a account yet?
									<a href="register-login.php" class="btn btn-primary" role="button">Create an Account</a>
									</p>
					  </div>

			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      	</div>
		    	</div>
		  	</div>
		</div>	
	</section>  <!-- End of /Section -->
	
	<!-- TOP HEADER Start
    ================================================== -->

<section id="top">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <p class="contact-action"><i class="fa fa-phone-square"></i>CST GROUP 4 [ FOOD COURT ]</p>
            </div>
            <div class="col-md-3 clearfix">
                <ul class="login-cart">

                    <li>
                        <a href="login.php">LOGIN</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-2">
                <div class="search-box">
                    <div class="input-group">
                        <input placeholder="Search Here" type="text" class="form-control">
                        <span class="input-group-btn">
					        	<button class="btn btn-default" type="button"></button>
					      	</span>
                    </div><!-- /.input-group -->
                </div><!-- /.search-box -->
            </div>
        </div> <!-- End Of /.row -->
    </div>	<!-- End Of /.Container -->

</section>

<!-- LOGO Start
    ================================================== -->

<header>
    <div class="container">
        <div class="row">
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

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div> <!-- End of /.navbar-header -->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav nav-main">
                <li ><a href="index.php">HOME</a></li>
                <li class="active"><a href="pastry-shop.php">PASTRY SHOP</a></li>
                <li><a href="lounge.php">THE lOUNGE</a></li>
                <li><a href="buffet.php">BUFFET</a></li>
                <li><a href="#">CART</a></li>
            </ul>
            </li> <!-- End of /.dropdown -->
            </ul> <!-- End of /.nav-main -->
        </div>	<!-- /.navbar-collapse -->
    </div>	<!-- /.container-fluid -->
</nav>	<!-- End of /.nav -->


<div class="wrapper">
    
    <form id="loginForm" class="form-signin" name="loginForm" method="post" action="register-exec.php" onsubmit="return registerValidate(this)">       

      <h2 class="form-signin-heading">Create a New Account</h2>
      
      <p>First Name</p>
      <input id="fname" type="text" class="form-control" name="fname" placeholder="Enter Your First Name" required="" autofocus="" />
      <br/>
     
      <p>Last Name</p>
      <input id="lname" type="text" class="form-control" name="lname" placeholder="Enter Your Last Name" required="" autofocus="" />
      <br/>

      <p>Your Email</p>
      <input id="login" type="text" class="form-control" name="login" placeholder="Enter Your Email Address" required="" autofocus="" />
      <br/>

      <p>Enter New Password</p>
      <input  id="password" type="password" class="form-control" name="password" placeholder="Password" required=""/>  
     
      <p>Confirm Password</p>

      <input  id="cpassword" type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required=""/>   

      <p>Select Security Question</p>
      <select class="form-control" aria-label="Default select example" name="question" id="question">
        <option value="select" >Select question
        <?php 
                    //loop through quantities table rows
                    while ($row=mysqli_fetch_array($questions)){
                    echo "<option value=$row[question_id]>$row[question_text]"; 
                    }
                    ?>
    </select>

    <br/>
    <p>Enter Security Answer</p>
      <input id="answer" type="text" class="form-control" name="answer" placeholder="Enter Security Answer" required="" autofocus="" />
      <br/>
      <!-- login btn -->

      <button class="btn btn-lg btn-primary btn-block" type="submit"  name="Submit" value="Login">Create Account</button>   
      <br/>


      <div class="text-center">
                    <hr/>
    <div class="text-center">

    <h6>Already have an account?</h6>
    </div>
     <div class="text-center"> 
         <a class="small" href="./login.php">Login here</a></div>

    </div>
    </form>
    
  </div>

	<!-- FOOTER Start
    ================================================== -->


	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="block clearfix">
						<a href="#">
							<img src="images/footer-logo.png" alt="">
						</a>
						<p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
						</p>
						<h4 class="connect-heading">CONNECT WITH US</h4>
						<ul class="social-icon">
							<li>
								<a class="facebook-icon" href="#">
									<i class="fa fa-facebook"></i>
								</a>
							</li>
							<li>
								<a class="plus-icon" href="#">
									<i class="fa fa-google-plus"></i>
								</a>
							</li>
							<li>
								<a class="twitter-icon" href="#">
									<i class="fa fa-twitter"></i>
								</a>
							</li>
							<li>
								<a class="pinterest-icon" href="#">
									<i class="fa fa-pinterest"></i>
								</a>
							</li>
							<li>
								<a class="linkedin-icon" href="#">
									<i class="fa fa-linkedin"></i>
								</a>
							</li>
						</ul>	<!-- End Of /.social-icon -->
					</div>	<!-- End Of /.block -->
				</div> <!-- End Of /.Col-md-4 -->
				<div class="col-md-4">
					<div class="block">
						<h4>GET IN TOUCH</h4>
						<p ><i class="fa  fa-map-marker"></i> <span>Food Code d.o.o.,</span>1000 Ljubljana Celovska cesta 135, Slovenia</p>
						<p> <i class="fa  fa-phone"></i> <span>Phone:</span> (+386) 40 123 456 </p>

						<p> <i class="fa  fa-mobile"></i> <span>Mobile:</span> (+386) 40 654 123 651</p>
 
						<p class="mail"><i class="fa  fa-envelope"></i>Eamil: <span>info@sitename.com</span></p>
					</div>	<!-- End Of /.block -->
				</div> <!-- End Of Col-md-3 -->
				<div class="col-md-4">
					<div class="block">
						<h4>UPCOMING ITEMS</h4>
						<div class="media">
						  	<a class="pull-left" href="#">
						    	<img class="media-object" src="images/product-item.jpg" alt="...">
						  	</a>
						  	<a class="pull-left" href="#">
						    	<img class="media-object" src="images/product-item.jpg" alt="...">
						  	</a>
						  	<a class="pull-left" href="#">
						    	<img class="media-object" src="images/product-item.jpg" alt="...">
						  	</a>
						  	<a class="pull-left" href="#">
						    	<img class="media-object" src="images/product-item.jpg" alt="...">
						  	</a>
						  	<a class="pull-left" href="#">
						    	<img class="media-object" src="images/product-item.jpg" alt="...">
						  	</a>
						  	<a class="pull-left" href="#">
						    	<img class="media-object" src="images/product-item.jpg" alt="...">
						  	</a>
						</div>	<!-- End Of /.media -->
					</div>	<!-- End Of /.block -->
				</div> <!-- End Of Col-md-3 -->
			</div> <!-- End Of /.row -->
		</div> <!-- End Of /.Container -->
		


	<!-- FOOTER-BOTTOM Start
    ================================================== -->

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="cash-out pull-left">
							<li>
								<a href="#">
									<img src="images/American-Express.png" alt="">	
								</a>
							</li>
							<li>
								<a href="#">
									<img src="images/PayPal.png" alt="">	
								</a>
							</li>
							<li>
								<a href="#">
									<img src="images/Maestro.png" alt="">	
								</a>
							</li>
							<li>
								<a href="#">
									<img src="images/Visa.png" alt="">	
								</a>
							</li>
							<li>
								<a href="#">
									<img src="images/Visa-Electron.png" alt="">	
								</a>
							</li>
						</ul>
						<p class="copyright-text pull-right">Food Code @2013 Designed by <a href="http://www.themexpert.com">Themexpert</a> All Rights Reserved</p>
					</div>	<!-- End Of /.col-md-12 -->	
				</div>	<!-- End Of /.row -->	
			</div>	<!-- End Of /.container -->	
		</div>	<!-- End Of /.footer-bottom -->
	</footer> <!-- End Of Footer -->
	
	<a id="back-top" href="#"></a>

    <script>
      
    </script>

</body>
</html>