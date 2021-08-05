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

    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
    <script src="assets/js/plugins/countup.min.js"></script>
    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="assets/js/plugins/parallax.min.js"></script>

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

    .our_qualities {
        background: url(images/our_qualities_bg.png);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .home-section h1
    {
        color: rgb(255, 255, 255);
        white-space: nowrap;
        letter-spacing: 12px;
        font-weight: 400;
        font-size: 50px;
    }

    .home-section h2
    {
        color: rgb(255, 255, 255);
        white-space: nowrap;
        letter-spacing: 12px;
        font-weight: 400;f
    ont-size: 30px;
    }

    .home-section p
    {
        color: rgb(255, 255, 255);
        white-space: nowrap;
        letter-spacing: 2px;
        font-weight: 300;
        font-size: 17px;
    }
    .home-section
    {
        background: url(images/home_bg.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 650px;
        background-attachment: fixed;
    }

    .bttn_style_1
    {
        font-family: "Work Sans",sans-serif;
        letter-spacing: 3px;
        background-color: transparent;
        color: white !important;
        line-height: 45px;
        display: inline-block;
        padding: 0 25px;
        border-radius: 0;
        font-size: 12px;
        text-transform: uppercase;
        font-weight: 600;
        position: relative;
        border: 2px solid white;
        opacity: 1;
    }

    .bttn_style_1:hover
    {
        opacity: 0.6;
    }

    .bttn_style_2
    {
        font-family: "Work Sans",sans-serif;
        letter-spacing: 3px;
        background-color: #ffc851;
        color: rgb(18, 22, 24);
        line-height: 45px;
        display: inline-block;
        padding: 0 25px;
        border-radius: 0;
        font-size: 12px;
        text-transform: uppercase;
        font-weight: 600;
        position: relative;
        border: 2px solid #ffc851;
        overflow: hidden;
        z-index: 1;
        -webkit-transition: color 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        -moz-transition: color 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        -ms-transition: color 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        -o-transition: color 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        transition: color 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .bttn_style_2:before
    {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        background: #222227;
        -webkit-transform-origin: right center;
        -moz-transform-origin: right center;
        -ms-transform-origin: right center;
        transform-origin: right center;
        -webkit-transform: scale(0, 1);
        -moz-transform: scale(0, 1);
        -ms-transform: scale(0, 1);
        -o-transform: scale(0, 1);
        transform: scale(0, 1);
        -webkit-transition: -webkit-transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        -moz-transition: -moz-transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        -ms-transition: -ms-transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        -o-transition: -o-transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: -1;
    }

    .bttn_style_2:hover:before
    {
        -webkit-transform-origin: left center;
        -moz-transform-origin: left center;
        -ms-transform-origin: left center;
        transform-origin: left center;
        -webkit-transform: scale(1, 1);
        -moz-transform: scale(1, 1);
        -ms-transform: scale(1, 1);
        -o-transform: scale(1, 1);
        transform: scale(1, 1);
    }

    .bttn_style_2:hover
    {
        color: #ffc851;
        border-color: #222227;
    }
    .our_qualities_column
    {
        text-align: center;
    }

    .client_details_tab  .form-control
    {
        background-color: #fff;
        border-radius: 0;
        padding: 25px 10px;
        box-shadow: none;
        border: 2px solid #eee;
    }

    .client_details_tab  .form-control:focus
    {
        border-color: #ffc851;
        box-shadow: none;
        outline: none;
    }
    .text_header
    {
        margin-bottom: 5px;
        font-size: 18px;
        font-weight: bold;
        line-height: 1.5;
        margin-top: 22px;
        text-transform: capitalize;
    }
    .layer
    {
        height: 100%;
        background: -moz-linear-gradient(top, rgba(45,45,45,0.4) 0%, rgba(45,45,45,0.9) 100%);
        background: -webkit-linear-gradient(top, rgba(45,45,45,0.4) 0%, rgba(45,45,45,0.9) 100%);
        background: linear-gradient(to bottom, rgba(45,45,45,0.4) 0%, rgba(45,45,45,0.9) 100%);
    }
body{
    background: url(images/our.png);

}
    </style>

</head>
<body>


<!-- TOP HEADER Start
    ================================================== -->

<section id="top">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <p class="contact-action"><i class="fa fa-phone-square"></i>CST GROUP 4 [ FOOD COURT ]</p>
            </div>
            <div class="col-md-5 clearfix">
                <ul class="login-cart">
                    <li>
                        <a href="customer/login.php">LOGIN</a>
                    </li>
                    <li>
                        <a href="customer/create.php">REGISTER</a>
                    </li>
                    <li>
                        <div class="cart dropdown">
                            <a data-toggle="dropdown" href="#"><i class="fa fa-shopping-cart"></i>Cart(1)</a>
                            <div class="dropdown-menu dropup">
                                <span class="caret"></span>
                                <ul class="media-list">
                                    <li class="media">
                                        <img class="pull-left" src="images/b2.jpg" alt="">
                                        <div class="media-body">
                                            <h6 style="color: #1e1717">Sri Lankan Kottu
                                                <span>$250</span>
                                            </h6>
                                        </div>
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-sm">Checkout</button>
                            </div>
                        </div>
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


<!-- Navbar -->
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">

            <nav class="navbar navbar-expand-lg  blur  top-0  z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">

                <div class="container-fluid">
                    <a class="navbar-brand font-weight-bolder ms-sm-3" href="../index.php" rel="tooltip" title="Orchid Bliss" data-placement="bottom" target="_blank">
                        ORCHID BLISS
                    </a>

                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                          </span>
                    </button>



                    <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                        <ul class="nav navbar-nav nav-main mx-auto"
                            <li class="nav-item dropdown dropdown-hover px-2" >
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center "  href="../pastry-shop.php">
                                    PASTRY SHOP
                                </a>
                            </li>

                            <li class="nav-item dropdown dropdown-hover px-2" >
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="../lounge.php" >
                                    THE LOUNGE
                                </a>
                            </li>

                            <li class="nav-item dropdown dropdown-hover px-2" >
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"  href="../TableBook/buffet.php">
                                    BUFFET
                                </a>
                            </li>

                            <li class="nav-item dropdown dropdown-hover px-2" >
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"  aria-selected="true" href="../about-us-old.php">
                                    ABOUT US
                                </a>
                            </li>


                            <li class="nav-item dropdown dropdown-hover px-2" >
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center active"  aria-selected="true" href="../about-us-old.php">
                                    CONTACT US
                                </a>
                            </li>


                            <li class="nav ms-auto" >
                                <a class="nav-link nav-link-icon me-2 " href="../cart/cart.php" target="_blank" >

                                    <i class="fa fa-shopping-cart me-1"></i>
                                    <p class="d-inline text-sm z-index-1 font-weight-bold" >CART</p>
                                </a>
                            </li>



                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>


    <!-- MENU Start
    ================================================== -->


<!-- HOME SECTION -->
<section id="slider-area">
<section class="home-section" id="home">
    <div class="container">
        <div class="row" style="flex-wrap: nowrap;">
            <div class="col-md-6 home-left-section">
                <div style="padding: 100px 0px; color: white;">
                    <h1>
                        VINCENT PIZZA.
                    </h1>
                    <h2>
                        MAKING PEOPLE HAPPY
                    </h2>
                    <hr>
                    <p>
                        Italian Pizza With Cherry Tomatoes and Green Basil
                    </p>
                    <div style="display: flex;">
                        <a href="order_food.php" target="_blank" class="bttn_style_1" style="margin-right: 10px; display: flex;justify-content: center;align-items: center;">
                            Order Now
                            <i class="fas fa-angle-right"></i>
                        </a>
                        <a href="#menus" class="bttn_style_2" style="display: flex;justify-content: center;align-items: center;">
                            VIEW MENU
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
</section>


	<!--Green tile 3
    ================================================== -->
<!-- OUR QUALITIES SECTION -->

<section class="our_qualities" style="padding:100px 0px;">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="our_qualities_column">
                    <img src="images/quality_food_img.png" >
                    <div class="caption">
                        <h3>
                            Quality Foods
                        </h3>
                        <p>
                            Sit amet, consectetur adipiscing elit quisque eget maximus velit,
                            non eleifend libero curabitur dapibus mauris sed leo cursus aliquetcras suscipit.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="our_qualities_column">
                    <img src="images/fast_delivery_img.png" >
                    <div class="caption">
                        <h3>
                            Quality Foods
                        </h3>
                        <p>
                            Sit amet, consectetur adipiscing elit quisque eget maximus velit,
                            non eleifend libero curabitur dapibus mauris sed leo cursus aliquetcras suscipit.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="our_qualities_column">
                    <img src="images/original_taste_img.png" >
                    <div class="caption">
                        <h3>
                            Quality Foods
                        </h3>
                        <p>
                            Sit amet, consectetur adipiscing elit quisque eget maximus velit,
                            non eleifend libero curabitur dapibus mauris sed leo cursus aliquetcras suscipit.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
	<!--PASTRY SHOP
    ================================================== -->
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
<style type="text/css">
    .details_card
    {
        align-items: center;
        margin: 150px 0px;
    }
    .details_card>span
    {
        float: left;
        font-size: 60px;
    }

    .details_card>div
    {
        float: left;
        font-size: 20px;
        margin-left: 20px;
        letter-spacing: 2px
    }
</style>


    <section class="restaurant_details" style="background: url(images/food_pic_2.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: 50% 0%;
    background-size: cover;
    color:white !important;
    min-height: 300px;">
        <div class="layer">
            <div class="container">
                <div class="row">

            <section class="pt-2 pb-6 bg-gray-100" id="count-stats">
                <div class="row justify-content-center text-center">

                    <div class="col-md-4 details_card">
                        <h1 class="text-gradient text-info" id="state1" countTo="5234">0</h1>
                        <h5>CUSTOMERS</h5>
                        <p>Of “high-performing” level are led by a certified project manager</p>
                    </div>
                    <div class="col-md-4 details_card">
                        <h1 class="text-gradient text-info"><span id="state2" countTo="3400">0</span>+</h1>
                        <h5>FOODS</h5>
                        <p>That meets quality standards required by our users</p>
                    </div>
                    <div class="col-md-4 details_card">
                        <h1 class="text-gradient text-info"><span id="state3" countTo="24">0</span>/7</h1>
                        <h5>AVAILABLE</h5>
                        <p>Actively engage team members that finishes on time</p>
                    </div>
                </div>
            </section>
        </div></div></div>
    </section>]

<script>
    // get the element to animate
    var element = document.getElementById('count-stats');
    var elementHeight = element.clientHeight;

    // listen for scroll event and call animate function

    document.addEventListener('scroll', animate);

    // check if element is in view
    function inView() {
        // get window height
        var windowHeight = window.innerHeight;
        // get number of pixels that the document is scrolled
        var scrollY = window.scrollY || window.pageYOffset;
        // get current scroll position (distance from the top of the page to the bottom of the current viewport)
        var scrollPosition = scrollY + windowHeight;
        // get element position (distance from the top of the page to the bottom of the element)
        var elementPosition = element.getBoundingClientRect().top + scrollY + elementHeight;

        // is scroll position greater than element position? (is element in view?)
        if (scrollPosition > elementPosition) {
            return true;
        }

        return false;
    }

    var animateComplete = true;
    // animate element when it is in view
    function animate() {

        // is element in view?
        if (inView()) {
            if (animateComplete) {
                if (document.getElementById('state1')) {
                    const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
                    if (!countUp.error) {
                        countUp.start();
                    } else {
                        console.error(countUp.error);
                    }
                }
                if (document.getElementById('state2')) {
                    const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
                    if (!countUp1.error) {
                        countUp1.start();
                    } else {
                        console.error(countUp1.error);
                    }
                }
                if (document.getElementById('state3')) {
                    const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
                    if (!countUp2.error) {
                        countUp2.start();
                    } else {
                        console.error(countUp2.error);
                    };
                }
                animateComplete = false;
            }
        }
    }

    if (document.getElementById('typed')) {
        var typed = new Typed("#typed", {
            stringsElement: '#typed-strings',
            typeSpeed: 90,
            backSpeed: 90,
            backDelay: 200,
            startDelay: 500,
            loop: true
        });
    }
</script>
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

