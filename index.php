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

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/soft-design-system.css?v=1.0.5" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">


    <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
    <script src="assets/js/plugins/countup.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

    <!-- Required Core stylesheet -->
    <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.core.min.css">

    <!-- Optional Theme stylesheet -->
    <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.theme.min.css">

    <!-- Vendor CSS Files -->
    <link href="./Akila/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="./Akila/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./Akila/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="./Akila/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="./Akila/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="./Akila/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="./Akila/assets/css/style.css" rel="stylesheet">



    <style>
	.txtpadding{
		
padding-top: 10rem;
 padding-bottom: 10rem;

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
        font-weight: 400;
        font-size: 30px;
    }

    .home-section p
    {
        color: rgb(255, 255, 255);
        white-space: nowrap;
        letter-spacing: 2px;
        font-weight: 300;
        font-size: 17px;
    }

    .specials
    {
        background: url(images/wall3.png);
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
    .padding{
        padding-top: 50px;
        padding-right: 30px;
        padding-bottom: 50px;
        padding-left: 80px;

    }
    a:link {
        text-decoration: none;
    }

    body{
    background: url(images/ourback.jpg);

}
    </style>

</head>
<body>


<!-- TOP HEADER Start
================================================== -->

<section id="top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <p class="contact-action"><i class="fa fa-phone-square"></i>CST GROUP 4 [ FOOD COURT ]</p>
            </div>
            <div class="col-md-3 clearfix" >
                <ul class="login-cart" style="text-align: right">
                    <li>
                        <a href="user/login-user.php"> <i class="fas fa-user"></i>LOGIN</a>
                    </li>
                    <li>
                        <a href="user/signup-user.php"><i class="fas fa-user-plus"></i>REGISTER</a>
                    </li>
                </ul>
            </div>
        </div> <!-- End Of /.row -->
    </div>	<!-- End Of /.Container -->
</section>  <!-- End of /Section -->

<!-- LOGO Start
================================================== -->

<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="#">
                    <img src="images/logo2copy.png"  class="img-fluid" alt="logo">
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
                    <a class="navbar-brand font-weight-bolder ms-sm-3" href="index.php" rel="tooltip" title="Orchid Bliss" data-placement="bottom" target="_blank">
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
                        <ul class="nav navbar-nav nav-main mx-auto">



                            <li class="nav-item dropdown dropdown-hover px-2" >
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"  href="pastry-shop.php">
                                    PASTRY SHOP
                                </a>
                            </li>

                            <li class="nav-item dropdown dropdown-hover px-2" >
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="lounge.php" >
                                    THE LOUNGE
                                </a>
                            </li>

                            <li class="nav-item dropdown dropdown-hover px-2" >
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"  href="TableBook/TBB.php">
                                    BUFFET
                                </a>
                            </li>

                            <li class="nav-item dropdown dropdown-hover px-2" >
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"  aria-selected="true" href="about-us.php">
                                    ABOUT US
                                </a>
                            </li>

                            <li class="nav-item dropdown dropdown-hover px-2" >
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center "  aria-selected="true" href="contactUs/contact-us.php">
                                    CONTACT US
                                </a>
                            </li>
                        </ul>

                        <ul class="navbar-nav ms-auto">
                            <a class="nav-link nav-link-icon me-2 " href="cart/cart.php" target="_blank" >

                                <i class="fa fa-shopping-cart me-1"></i>
                                <p class="d-inline text-sm z-index-1 font-weight-bold" >CART</p>
                            </a>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar -->

<!-- HOME SECTION -->
< <section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" style="background: url(./Akila/assets/img/slide/slide-1.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown"><span>PASTRY</span> SHOP</h2>
                            <p class="animate__animated animate__fadeInUp">Hello to You!
                                Sandwiches Are Wonderful. You Don’t Need A Spoon Or A Plate
                            </p>
                            <div>
                                <a href="pastry-shop.php" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                                <a  href="TableBook/reserve.php" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item" style="background: url(./Akila/assets/img/slide/slide-2.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">THE LOUNGE</h2>
                            <p class="animate__animated animate__fadeInUp">  Order To Your Doorstep
                                We welcome your appetite. Let our food satisfy your stomach.
                            </p>
                            <div>
                                <a href="lounge.php" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                                <a  href="TableBook/reserve.php" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" style="background: url(./Akila/assets/img/slide/slide-3.jpg);">
                    <div class="carousel-background"><img src="./Akila/assets/img/slide-3.jpg" alt=""></div>
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">THE BUFFET </h2>
                            <p class="animate__animated animate__fadeInUp"> Let’s Eat Together!
                                Need food and a good place to eat? Welcome to our humble place where you can eat good food peacefully.
                            </p>
                            <div>
                                <a href="TableBook/TBB.php" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                                <a href="TableBook/reserve.php" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </div>
</section><!-- End Hero -->

<!-- OUR QUALITIES SECTION -->

<section class="our_qualities" style="padding:100px 0px;">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="our_qualities_column">
                    <img src="images/quality_food_img.png" >
                    <div class="caption">
                        <h3>
                            Healthy food
                        </h3>
                        <p>
                            “IT IS HEALTH THAT IS REAL WEALTH AND NOT PIECES OF GOLD AND SILVER.”
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="our_qualities_column">
                    <img src="images/fast_delivery_img.png" >
                    <div class="caption">
                        <h3>
                            Fast delivery
                        </h3>
                        <p>
                            Give your clients the earliest delivery consistent with quality, Delivering to doorstep.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="our_qualities_column">
                    <img src="images/original_taste_img.png" >
                    <div class="caption">
                        <h3>
                            Tasty Food
                        </h3>
                        <p>
                            I like people who love to eat. They’re the best kind of people in the world.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
	<!--PASTRY SHOP
    ==================================================-->

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
					<a href="pastry-shop.php" class="btn bg-gradient-warning" role="button">
						<span>ORDER NOW</span>
					</a>
			</div>
		</div>
	</div>
</section>



	<!--  1st photo tile
    ================================================== -->
<style type="text/css">
    .details_card
    {
        align-items: center;

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

    <div class="restaurant_details" style="background: url(images/food_pic_2.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: 50% 0%;
    background-size: cover;
    color:white !important;
    min-height: 50px;">

        <div class="layer">
            <div class="container">
                <div class="row">

            <section class="padding" id="count-stats">
                <div class="row justify-content-center text-center ">

                    <div class="col-md-4 details_card ">
                        <br><br>
                        <h1 class="text-gradient text-info" id="state1" countTo="1500">0</h1>
                        <h5 style="color: #ffd002">CUSTOMERS</h5>
                        <p>Providing great customer service does not always mean doing things by the book.</p>
                    </div>

                    <div class="col-md-4 details_card ">
                        <br><br>
                        <h1 class="text-gradient text-info"><span id="state2" countTo="3000">0</span>+</h1>
                        <h5 style="color: #ffd002">FOODS</h5>
                        <p>That meets quality standards required by our users</p>
                    </div>

                    <div class="col-md-4 details_card ">
                        <br><br>
                        <h1 class="text-gradient text-info"><span id="state3" countTo="24">0</span>/7</h1>
                        <h5 style="color: #ffd002">AVAILABLE</h5>
                        <p>Actively engage team members that finishes on time</p>
                    </div>
                </div>
            </section>
        </div></div></div>
    </div>

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

<!-- ======= Specials Section ======= -->
<section id="specials" class="specials">
    <div class="container">

        <div class="section-title">
            <h2>Check our Specials <span> For Children</span></h2>
            <p>If you talk about food just as much as you eat it, you're in good company. We've got famous chefs and stars—Julia Child</p>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <ul class="nav nav-tabs flex-column">
                    <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">PIPPAS SALAD WITH RICE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-2">KIKI'S HUMMUS WRAP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-3">KARL'S NOODLE SOUP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-4">PIPPAS SPELLED PATTIES WITH HERB QUARK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-5">MOMOS QUINOA FRUIT SALAD</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9 mt-4 mt-lg-0">
                <div class="tab-content">
                    <div class="tab-pane active show" id="tab-1">
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h4>LUNCH FOR CHILDREN</h4>
                                <p class="fst-italic">Your cheeky sweet tooth love pasta, noodles and noodles?</p>
                                <p>With Pippa's pasta salad with paprika, you can also add cheeky, colorful vegetables. Whether for the next children's birthday party or as a delicious lunch after daycare or school, Pippa manages to put a smile on every child's face!</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="./Akila/assets/img/specials-1.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-2">
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h4>SNACKS FOR CHILDREN</h4>
                                <p class="fst-italic">Karl carrot and Kiki chickpea go under the wrappers! </p>
                                <p>With this hummus wrap recipe, the cheeky vegetable duo shows their fresh talent .. or it shows you how you can prepare a fresh snack with an extra portion of vegetables for your hungry gang in no time at all! Tucked away in the wrap, the vegetable duo is not so easily noticed by even the biggest vegetable grouch. Pretty clever, right?</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="./Akila/assets/img/specials-2.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-3">
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h4>LUNCH FOR CHILDREN</h4>
                                <p class="fst-italic">With cheeky soup spoons, the “bigger little ones” can use the letters to fish out their own names.</p>
                                <p>The soup should of course not get cold. But that doesn't happen with this recipe, because this noodle soup is wonderfully vegetable-tasty and certainly quickly and cheekily plastered.</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="./Akila/assets/img/specials-3.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-4">
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h4>LUNCH FOR CHILDREN , SNACKS FOR CHILDREN</h4>
                                <p class="fst-italic">The next excursion with a big family picnic is just around the corner and you are still looking for ideas for spill-free snacks?</p>
                                <p>Then try Pippa's delicious spelled patties with herb quark! In addition to a large portion of spelled, Pippa and Patrick Paprika have hidden here and provide the necessary (vegetable) kick! Add a portion of Gundula's cheeky herbal quark and the delicious snack for children is perfect! Simply prepare and then put it in the lunch box and picnic basket.</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="./Akila/assets/img/specials-4.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-5">
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h4>SNACKS FOR CHILDREN</h4>
                                <p class="fst-italic">Quinoa, which many call a superfood, is very trendy!</p>
                                <p>This quinoa fruit salad freshly refreshes this year's buffet at the children's birthday party - Bibi thinks blueberry was pasta salad last year! Quinoa fruit salad is also great as a filling snack for hungry mouths after exercise, or as a less sweet breakfast alternative for your kids.</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="./Akila/assets/img/specials-5.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section><!-- End Specials Section -->

<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">
    <div class="container-fluid">

        <div class="section-title">
            <h2>Some photos from <span>Our Restaurant</span></h2>
            <p>“Need food and a good place to eat? Welcome to our humble place where you can eat good food peacefully.” </p>
        </div>

        <div class="row no-gutters">

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                    <a href="./Akila/assets/img/gallery/gallery-1.jpg" class="gallery-lightbox">
                        <img src="./Akila/assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                    <a href="./Akila/assets/img/gallery/gallery-2.jpg" class="gallery-lightbox">
                        <img src="./Akila/assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                    <a href="./Akila/assets/img/gallery/gallery-3.jpg" class="gallery-lightbox">
                        <img src="./Akila/assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                    <a href="./Akila/assets/img/gallery/gallery-4.jpg" class="gallery-lightbox">
                        <img src="./Akila/assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                    <a href="./Akila/assets/img/gallery/gallery-5.jpg" class="gallery-lightbox">
                        <img src="./Akila/assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                    <a href="./Akila/assets/img/gallery/gallery-6.jpg" class="gallery-lightbox">
                        <img src="./Akila/assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                    <a href="./Akila/assets/img/gallery/gallery-7.jpg" class="gallery-lightbox">
                        <img src="./Akila/assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                    <a href="./Akila/assets/img/gallery/gallery-8.jpg" class="gallery-lightbox">
                        <img src="./Akila/assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Gallery Section -->

<!-- ======= Testimonials Section ======= -->

<section id="testimonials" class="testimonials">
    <div class="container position-relative">

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="images/cus1.jpg" class="testimonial-img" alt="">
                        <h3>Dileesha Weliwaththe</h3>
                        <h4>5 Star Rating</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Had dinner here recently. My Girlfriend ordered the Italian calzone. It came out as a 10” size dinner portion. He claimed it was delicious. The service was excellent.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="images/cus5.jpg" class="testimonial-img" alt="">
                        <h3>Akila Gunasekara</h3>
                        <h4>5 Star Rating</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            The food was fresh, properly prepared and a great value for the price. We highly recommend it. The breakfast buffet on Sunday was equally as good.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End testimonial item -->
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="images/cus2.jpg" class="testimonial-img" alt="">
                        <h3>Dulana Senavirathna</h3>
                        <h4>5 Star Rating</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            We like to go to The Fairway every time we come to the Cape. The food is always delicious! This is the first year we could make reservations (probably due to spacing because of the virus). Our waitress, Casey, was great!
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="images/cus4.jpg" class="testimonial-img" alt="">
                        <h3>Amal Wishwajith</h3>
                        <h4>5 Star Rating</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Although we didn't go into the onsite restaurant, we ordered some food at the bar a few times and it was delicious. The bar area and lobby were nice and open, good place to relax and meet friends.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="images/cus3.jpg" class="testimonial-img" alt="">
                        <h3>Ravindu Dherarathne</h3>
                        <h4>5 Star Rating</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            It’s a great experience. The ambiance is very welcoming and charming. Amazing drinks, food and service. Staff are extremely knowledgeable and make great recommendations.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="images/cus6.jpg" class="testimonial-img" alt="">
                        <h3>Prasangi Bandara</h3>
                        <h4>5 Star Rating</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            This Orchid Bliss restaurant has left the best impressions! Hospitable hosts, delicious dishes, beautiful presentation, wide wine list and wonderful dessert. I recommend to everyone! I would like to come back here again and again.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section><!-- End Testimonials Section -->

<!-- -------- FOOTER START ------- -->
<footer class="footer" style="background: #383838; padding-top: 5px">
    <hr class="horizontal dark mb-5">
    <div class="container">
        <div class=" row">
            <div class="col-md-4" style="color: #B6B6B6;">
                <div>
                    <a href="#">
                        <img src="images/footerlogo5.png"  class="img-fluid" alt="">
                    </a>

                    <p>
                        We stand for best in everything we do, to create an environment where absolute guest
                        satisfaction,which is our highest priority.

                    </p>
                </div>
                <div>
                    <h6 class="mt-3 mb-2 opacity-8" style="color: #fff;">Social</h6>
                    <ul class="d-flex flex-row ms-n3 nav">
                        <li class="nav-item" style="color: #fff;">
                            <a class="nav-link pe-1" href="https://www.facebook.com" target="_blank">
                                <i class="fab fa-facebook text-lg opacity-8" style="color: #fff;"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-1" href="https://twitter.com" target="_blank">
                                <i class="fab fa-twitter text-lg opacity-8" style="color: #fff;"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-1" href="https://dribbble.com" target="_blank">
                                <i class="fab fa-dribbble text-lg opacity-8" style="color: #fff;"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-1" href="https://github.com" target="_blank">
                                <i class="fab fa-github text-lg opacity-8" style="color: #fff;"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-1" href="https://www.youtube.com" target="_blank">
                                <i class="fab fa-youtube text-lg opacity-8" style="color: #fff;"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="col-md-5 col-sm-6 col-6 mb-4" style="color: #B6B6B6;">
                <div class="block">
                    <h4 style="color: #fff;">GET IN TOUCH</h4>
                    <p><i class="fa fa-map-marker"></i> <span style="color: #fff;">&emsp;FOOD COURT:</span> NO:22
                        Mccallum's Drive Nuwara Eliya</p>
                    <p><i class="fa fa-phone"></i> <span style="color: #fff;">&emsp;PHONE:</span> 052 22 22 878 </p>

                    <p><i class="fa fa-mobile"></i> <span style="color: #fff;">&emsp;MOBILE:</span> 070 2 100 600</p>

                    <p class="mail"><i class="fa fa-envelope"></i> <span style="color: #fff;">&emsp;E-MAIL:</span>
                        info@foodcourt.com</p>
                </div>    <!-- End Of /.block -->
            </div>


            <div class="col-md-3">
                <div class="block">
                    <div class="media">
                        <h4 style="color: #fff;">OUR LOCATION</h4>
                        <div id="map"></div>


                    </div>    <!-- End Of /.media -->
                </div>    <!-- End Of /.block -->
            </div> <!-- End Of Col-md-3 -->

            <div class="col-12">
                <div class="text-center">
                    <p class="my-4 text-sm" style="color: #fff;">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        | Food Court <a href="admin-copy/user/login-user.php" target="_blank">Administrator</a> All Rights
                        Reserved
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Google Map -->
<script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqqBMyAoQe2LlTe9e3_U5O8NaUwEJ9dDU&callback=initMap&libraries=&v=weekly"
        async
></script>
<script src="validation/map.js"></script>
<!-- Google Map End -->

<!-- Vendor JS Files -->
<script src="./Akila/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./Akila/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="./Akila/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="./Akila/assets/vendor/php-email-form/validate.js"></script>
<script src="./Akila/assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="./Akila/assets/js/main.js"></script>

<script src="assets/js/core/popper.min.js" type="text/javascript"></script>

<script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
<!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
<script src="assets/js/plugins/parallax.min.js"></script>
<!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->

<script src="assets/js/soft-design-system.min.js?v=1.0.5" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>
</html>

