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

</style>

</head>
<body>


<!-- TOP HEADER Start
    ================================================== -->
	
	<section>
		
	<!-- MODAL Start
    	================================================== -->

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
		    	<div class="modal-content">
		    		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        		<h4 class="modal-title" id="myModalLabel">Introduce Yourself</h4>
		      		</div>
			      	<div class="modal-body clearfix">

						<form action="#" method="post" id="create-account_form" class="std">
							<fieldset>
								<h3>Create your account</h3>
								<div class="form_content clearfix">
									<h4>Enter your e-mail address to create an account.</h4>
									<p class="text">
										<label for="email_create">E-mail address</label>
										<span>
											<input placeholder="E-mail address"  type="text" id="email_create" name="email_create" value="" class="account_input">
					                    </span>
									</p>
									<p class="submit">
										<button class="btn btn-primary">Create Your Account</button>
									</p>
								</div>
							</fieldset>
						</form>
			      		<form action="" method="post" id="login_form" class="std">
							<fieldset>
								<h3>Already registered?</h3>
								<div class="form_content clearfix">
									<p class="text">
									<label for="email">E-mail address</label>
										<span><input placeholder="E-mail address" type="text" id="email" name="email" value="" class="account_input"></span>
									</p>
									<p class="text">
									<label for="passwd">Password</label>
										<span><input placeholder="Password" type="password" id="passwd" name="passwd" value="" class="account_input"></span>
									</p>
									<p class="lost_password">
										<a href="#popab-password-reset" class="popab-password-link">Forgot your password?</a>
									</p>
									<p class="submit">
										<button class="btn btn-success">Log in</button>
									</p>
								</div>
							</fieldset>
						</form>
			      	</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      	</div>
		    	</div>
		  	</div>
		</div>	
	</section>  <!-- End of /Section -->
	

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
		        	<li class="active"><a href="#">HOME</a></li>
					<li><a href="products.php">PASTRY SHOP</a></li>
					<li><a href="blog.html">THE lOUNGE</a></li>
					<li><a href="blog-single.html">BUFFET</a></li>
					
					<li>
							<a data-toggle="modal" data-target="#myModal" href="#">
							<i class="fa fa-user"></i>
								LOGIN
							</a>
						</li>
						<li><a href="blog-single.html">CART</a></li>
					</ul>
					
		        </ul> <!-- End of /.nav-main -->
		    </div>	<!-- /.navbar-collapse -->
		</div>	<!-- /.container-fluid -->
	</nav>	<!-- End of /.nav -->


	<!-- SLIDER Start
    ================================================== -->


	<section id="slider-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div id="slider" class="nivoSlider">
				    	<img src="images/slider.jpg" alt="" />
				    	<img src="images/slider1.jpg" alt=""/>
				    	<img src="images/slider2.jpg" alt="" />
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
					
					  <img src="images/img1.png" alt="...">
					
				  
				</div>
				

			</div>
			<div class="col-md-4 txtpadding" style="text-align: center;">
				<div class="heading ">
					<h2>PASTRY SHOP</h2>
				</div>
				
				<p>Wide range of Delicious Pastries,Sandwiches,Cake, etc...</p>
				<p>Handmade Chocolates,Sweets,Fresh Juices...</p>
				<p>
					<a href="blog-single.html" class="btn btn-default btn-transparent" role="button">
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
				
					<a href="blog-single.html" class="btn btn-default btn-transparent" role="button">
						<span>ORDER NOW</span>
					</a>
				</p>
			</div>
			<div class="col-md-8">
				
				<img src="images/img1.png" alt="...">
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

	<section id="catagorie">
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
							    	<a class="catagotie-head" href="blog-single.html">
										<img src="images/category-image-1.jpg" alt="...">
										<h3>Beef Steak</h3>
									</a>
							      	<div class="caption">
							        	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, aut, esse, laborum placeat id illo a expedita aperiam...</p>
							        	<p>
							        		<a href="blog-single.html" class="btn btn-default btn-transparent" role="button">
							        			<span>Check Items</span>
							        		</a>
							        	</p>
							      	</div>	<!-- End of /.caption -->
							    </div>	<!-- End of /.thumbnail -->
						  	</div>	<!-- End of /.col-sm-6 col-md-4 -->
						  	<div class="col-sm-6 col-md-4">
							    <div class="thumbnail">
							    	<a class="catagotie-head" href="blog-single.html">
										<img src="images/category-image-2.jpg" alt="...">
										<h3>Miscellaneous</h3>
									</a>
							      	<div class="caption">
							        	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, aut, esse, laborum placeat id illo a expedita aperiam...</p>
							        	<p>
							        		<a href="blog-single.html" class="btn btn-default btn-transparent" role="button">
							        			<span>Check Items</span>
							        		</a>
							        	</p>
							      	</div>	<!-- End of /.caption -->
							    </div>	<!-- End of /.thumbnail -->
						  	</div>	<!-- End of /.col-sm-6 col-md-4 -->
						  	<div class="col-sm-6 col-md-4">
							    <div class="thumbnail">
							    	<a class="catagotie-head" href="blog-single.html">
										<img src="images/category-image-3.jpg" alt="...">
										<h3>Elegant Apparel</h3>
									</a>
							      	<div class="caption">
								        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, aut, esse, laborum placeat id illo a expedita aperiam...</p>
								        <p>
								        	<a href="blog-single.html" class="btn btn-default btn-transparent" role="button">
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
	
	<!-- FEATURES Start
    ================================================== -->

	<section id="features">
		<div class="container">
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



	<!-- CATAGORIE Start
    ================================================== -->

	





	
	
		<!-- CALL TO ACTION Start
    ================================================== -->

	<section id="call-to-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<div class="block-heading">
							<h2>Our Partners</h2>
						</div>
					</div>	<!-- End of /.block -->
					<div id="owl-example" class="owl-carousel">
						<div> <img src="images/company-1.png" alt=""></div>
						<div> <img src="images/company-2.png" alt=""></div>
						<div> <img src="images/company-3.png" alt=""></div>
						<div> <img src="images/company-4.png" alt=""></div>
						<div> <img src="images/company-5.png" alt=""></div>
						<div> <img src="images/company-6.png" alt=""></div>
						<div> <img src="images/company-8.png" alt=""></div>
						<div> <img src="images/company-9.png" alt=""></div>
					</div>	<!-- End of /.Owl-Slider -->
				</div>	<!-- End of /.col-md-12 -->
			</div> <!-- End Of /.Row -->
		</div> <!-- End Of /.Container -->
	</section>	<!-- End of Section -->
	
	

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
						<p ><i class="fa  fa-map-marker"></i> <span>Food Court: </span>77-L3/22 Lady Mccallum's Drive Nuwara Eliya</p>
						<p> <i class="fa  fa-phone"></i> <span>Phone:</span> 052 22 22 878 </p>

						<p> <i class="fa  fa-mobile"></i> <span>Mobile:</span> 070 2 100 600</p>
 
						<p class="mail"><i class="fa  fa-envelope"></i>Eamil: <span>info@foodcourt.com</span></p>
					</div>	<!-- End Of /.block -->
				</div> <!-- End Of Col-md-3 -->
				<div class="col-md-4">
					<div class="block">
						<div class="media">
						<h4>Our Location</h4>

<div id="googleMap" style="width:100%;height:200px;"></div>

<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
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
						
						<p style="text-align: center;">© 2021 | Food Court <a href="">Group 4</a> All Rights Reserved</p>
					</div>	<!-- End Of /.col-md-12 -->	
				</div>	<!-- End Of /.row -->	
			</div>	<!-- End Of /.container -->	
		</div>	<!-- End Of /.footer-bottom -->
	</footer> <!-- End Of Footer -->
	
	<a id="back-top" href="#"></a>
</body>
</html>