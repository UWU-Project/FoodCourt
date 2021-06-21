<?php
//checking connection and connecting to a database
require_once('connection/config.php');
error_reporting(1);
//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
if(!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}
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
	<title><?php echo APP_NAME; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>

    <!-- Icon -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- Css -->
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" />
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">

	<!-- jS -->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
	<script src="js/owl.carousel.min.js" type="text/javascript"></script>
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/main.js" type="text/javascript"></script>


    <style>
	.txtpadding{
		
padding-top: 15rem ;

	}
	.buffetback{
    background-image: url(http://jellydemos.com/html/elixir/03/images/parallax/opening_hours.jpg
);
    padding-top: 30px;
    padding-bottom: 40px;
    min-height: 528px;
	background-position: 50% 50% !important;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
	text-align: center;
	font-size: 8rem;
}
.imgmargin{
	margin-top: 10rem;
	margin-bottom: 10rem;
}
    .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
	}
</style>

</head>
<body>


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
                        <a href="customer/login.php">LOGIN</a>
                    </li>
                    <li>
                        <a href="customer/create.php">REGISTER</a>
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
                        <img src="images/logo2copy.png" alt="logo">
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
		        	<li class="active"><a href="index.php">HOME</a></li>
					<li><a href="pastry-shop.php">PASTRY SHOP</a></li>
					<li><a href="lounge.php">THE LOUNGE</a></li>
					<li><a href="buffet.php">BUFFET</a></li>
                    <li><a href="#">CART</a></li>
					</ul>
					
		        </ul> <!-- End of /.nav-main -->
		    </div>	<!-- /.navbar-collapse -->
		</div>	<!-- /.container-fluid -->
	</nav>	<!-- End of /.nav -->


	<!-- SLIDER Start
    ================================================== -->


	<section id="slider-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="slider" class="nivoSlider">
                        <div >
                            <img src="images/PASTRYSHOP.jpg" alt="" />

                       </div>
				    	<img src="images/BUFFET2.jpg" alt=""/>
				    	<img src="images/LOUNGE.jpg" alt="" />
					</div>	<!-- End of /.nivoslider -->
				</div>	<!-- End of /.col-md-12 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section> <!-- End of Section -->
	<hr>
	
	<!--Green tile 3
    ================================================== -->


	<section id="features">
		<div class="container imgmargin">
			<div class="row">
				<div class="col-md-4">
					<div class="block">
						<div class="media">
							<div class="pull-left" href="#">
						    	<i class="fa fa-ambulance"></i>
						  	</div>
						  	<div class="media-body">
						    	<h4 class="media-heading">Free Shipping</h4>
						    	<p>Lorem ipsum dolor sit amet, consectetur.</p>
						  </div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="block">
						<div class="media">
							<div class="pull-left" href="#">
								<i class=" fa fa-foursquare"></i>
						  	</div>
						  	<div class="media-body">
						    	<h4 class="media-heading">Media heading</h4>
						    	<p>Lorem ipsum dolor sit amet, consectetur.</p>
						  </div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="block">
						<div class="media">
							<div class="pull-left" href="#">
						    	<i class=" fa fa-phone"></i>
						  	</div>
						  	<div class="media-body">
						    	<h4 class="media-heading">Call Us</h4>
						    	<p>Lorem ipsum dolor sit amet, consectetur.</p>
						  </div>	<!-- End of /.media-body -->
						</div>	<!-- End of /.media -->
					</div>	<!-- End of /.block -->
				</div> <!-- End of /.col-md-4 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section>	<!-- End of section -->
<hr>


	<!--PASTRY SHOP
    ================================================== -->

<hr>
<section class="imgmargin">
	<div class="container">
		<div class="row">
			<div class="col-md-8 " >
				
				<div>
					
					  <img src="images/pasrtyhome.jpg" alt="...">

				</div>

			</div>
			<div class="col-md-4 txtpadding" style="text-align: center;">
				<div class="heading ">
					<h2>PASTRY SHOP</h2>
				</div>
				
				<p>Wide range of Delicious Pastries,Sandwiches,Cake, etc...</p>
				<p>Handmade Chocolates,Sweets,Fresh Juices...</p>
				<p>
					<a href="pastry-shop.php" class="btn btn-default btn-transparent" role="button">
						<span>ORDER NOW</span>
					</a>
				</p>
			</div>
		</div>
	</div>
</section>
<hr>

	<!--  1st photo tile
    ================================================== -->

	<section class="buffetback">
<div class="container">
			
		</div>	<!-- End of /.container -->


</section>	
<hr>

	<!--THE LOUNGE Start
    ================================================== -->

<section class="imgmargin">
	<div class="container">
		<div class="row">
			
			<div class="col-md-4 txtpadding" style="text-align: center;">
				<div class="heading">
				
					<h2>THE LOUNGE</h2>
				</div>
				
				
				<p>Explanation of why you are going to love it and the benefit!</p>
				
					<a href="lounge.php" class="btn btn-default btn-transparent" role="button">
						<span>ORDER NOW</span>
					</a>
				</p>
			</div>
			<div class="col-md-8">
				
				<img src="images/homelonge.png" alt="...">
			</div>
		</div>
	</div>
</section>

<hr>
<!-- 2nd photo tile
    ================================================== -->

<section class="buffetback">
  <div class="container">
			
<p class="display-1" style="color: white;">When you’re here, you’re family.

<br>Eat Fresh.

<br>Have it your way.</p>

		</div>	<!-- End of /.container -->


</section>

	<!-- CATAGORIE Start
    ================================================== -->

	<section id="catagorie" style="padding-bottom: 30px">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<div class="block-heading">
							<h2>OUR fAVOURITE FOOD CATEGORIES</h2>
						</div>	
						<div class="row">
						  	<div class="col-sm-6 col-md-4">
							    <div class="thumbnail">
							    	<a class="catagotie-head" href="lounge.php">
										<img src="images/fav1.jpg" alt="...">
										<h3>Chicken Biriyani</h3>
									</a>
							      	<div class="caption">
							        	<p>Companiments in the biriyani take-away pack include: Chicken (whole leg), boiled egg, onion raita and malay pickle.

                                            These accompaniments may vary depending on availability of ingredients.</p>
							        	<p>
							        		<a href="lounge.php" class="btn btn-default btn-transparent" role="button">
							        			<span>Check Items</span>
							        		</a>
							        	</p>
							      	</div>	<!-- End of /.caption -->
							    </div>	<!-- End of /.thumbnail -->
						  	</div>	<!-- End of /.col-sm-6 col-md-4 -->
						  	<div class="col-sm-6 col-md-4">
							    <div class="thumbnail">
							    	<a class="catagotie-head" href="lounge.php">
										<img src="images/fav2.jpg" alt="...">
										<h3>Vegetable Biriyani</h3>
									</a>
							      	<div class="caption">
							        	<p>Accompaniments in the biriyani take-away pack include: Vegetable cutlets, brinjal moju, onion raita, mango chutney and malay pickle.</p>
							        	<p>
							        		<a href="lounge.php" class="btn btn-default btn-transparent" role="button">
							        			<span>Check Items</span>
							        		</a>
							        	</p>
							      	</div>	<!-- End of /.caption -->
							    </div>	<!-- End of /.thumbnail -->
						  	</div>	<!-- End of /.col-sm-6 col-md-4 -->
						  	<div class="col-sm-6 col-md-4">
							    <div class="thumbnail">
							    	<a class="catagotie-head" href="pastry-shop.php">
										<img src="images/fav3.jpg" alt="...">
										<h3>Fathers Day Cake</h3>
									</a>
							      	<div class="caption">
								        <p>A delicious Chocolate and Vanilla Marble Cake finished with fondant icing and elegantly decorated with a Father’s Day greeting on top.</p>
								        <p>
								        	<a href="pastry-shop.php" class="btn btn-default btn-transparent" role="button">
								        		<span>Check Items</span>
								        	</a>
								        </p>
								    </div>	<!-- End of /.caption -->
							    </div>	<!-- End of /.thumbnail -->
						  	</div>	<!-- End of /.col-sm-6 col-md-4 -->
						</div>	<!-- End of /.row -->
					</div>	<!-- End of /.block --> 
				</div>	<!-- End of /.col-md-12 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section>	<!-- End of Section -->
	

	<!-- FOOTER Start
    ================================================== -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="block clearfix">
						<a href="#">
							<img src="images/footerlogo5.png" alt="">
						</a>
                        <br><br>
						<p>
                            We stand for best in everything we do, to create an environment where absolute guest satisfaction,which is our highest priority.

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
						<p ><i class="fa  fa-map-marker"></i> <span>Food Court: </span>NO:22 Mccallum's Drive Nuwara Eliya</p>
						<p> <i class="fa  fa-phone"></i> <span>Phone:</span> 052 22 22 878 </p>

						<p> <i class="fa  fa-mobile"></i> <span>Mobile:</span> 070 2 100 600</p>
 
						<p class="mail"><i class="fa  fa-envelope"></i>Eamil: <span>info@foodcourt.com</span></p>
					</div>	<!-- End Of /.block -->
				</div> <!-- End Of Col-md-3 -->

				<div class="col-md-4">
					<div class="block">
						<div class="media">
						<h4>Our Location</h4>


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
						
						<p style="text-align: center;">© 2021 | Food Court <a href="admin/login-form.php">Administrator</a> All Rights Reserved</p>
					</div>	<!-- End Of /.col-md-12 -->	
				</div>	<!-- End Of /.row -->	
			</div>	<!-- End Of /.container -->	
		</div>	<!-- End Of /.footer-bottom -->
	</footer> <!-- End Of Footer -->
	
	<a id="back-top" href="#"></a>
</body>
</html>