
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Food  Court</title>
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

    <style>
        * {box-sizing: border-box;}

        .mySlides {display: none;}
        img {vertical-align: middle;}

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #ecd92a;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active1 {
            background-color: #d2d0d0;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 5s;
            animation-name: fade;
            animation-duration: 5s;
        }

        @-webkit-keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .text {font-size: 11px}
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

<!-- Navbar  -->
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
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center "  href="pastry-shop.php">
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
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center active"  aria-selected="true" href="about-us.php">
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
<!-- AAA
================================================== -->
<br><br><br><br
<section id="topic-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h3>About Us</h3>
				</div>	<!-- End of /.col-md-4 -->	

			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section>	<!-- End of /#Topic-header -->


	<section id="blog">
		<div class="container">
			<div class="row">
				<div class="col-md-12 clearfix">
					<ul class="blog-zone">
					    <li>
					        <div class="blog-icon">
					        	<i class="fa  fa-pencil"></i>
					        </div>
					        <div class="blog-box">


                                <div class="slideshow-container">

                                    <div class="mySlides fade">
                                        <div class="numbertext">1 / 3</div>
                                        <img src="images/about1.jpg" style="width:100%">
                                        <div class="text">Caption Text</div>
                                    </div>

                                    <div class="mySlides fade">
                                        <div class="numbertext">2 / 3</div>
                                        <img src="images/about2.jpg" style="width:100%">
                                        <div class="text">Caption Two</div>
                                    </div>

                                    <div class="mySlides fade">
                                        <div class="numbertext">3 / 3</div>
                                        <img src="images/about3.jpg" style="width:100%">
                                        <div class="text">Caption Three</div>
                                    </div>

                                </div>
                                <br>

                                <div style="text-align:center">
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                </div>

                                <script>
                                    var slideIndex = 0;
                                    showSlides();

                                    function showSlides() {
                                        var i;
                                        var slides = document.getElementsByClassName("mySlides");
                                        var dots = document.getElementsByClassName("dot");
                                        for (i = 0; i < slides.length; i++) {
                                            slides[i].style.display = "none";
                                        }
                                        slideIndex++;
                                        if (slideIndex > slides.length) {slideIndex = 1}
                                        for (i = 0; i < dots.length; i++) {
                                            dots[i].className = dots[i].className.replace(" active1", "");
                                        }
                                        slides[slideIndex-1].style.display = "block";
                                        dots[slideIndex-1].className += " active1";
                                        setTimeout(showSlides, 5000); // Change image every 2 seconds
                                    }
                                </script>
					            
					            <div class="blog-post-body clearfix">
						            <a href="blog-single.html">
					            		<h2>Orchid Bliss</h2>
						            </a>

						            <p>Orchid Bliss, blessed with captivating natural beauty and showcasing ancient colonial splendour; what more do you need to revive the mind and body? The Blackpool stands at an altitude of 1876m, surrounded by vast tea estates, carefully tended vegetable plantations and beautiful mountainous terrains. Come, discover The Blackpool’s warm hospitality by yourself, and become a member of the ‘Princess of Little England’. Indulge in the delicious, local and international cuisine that the Blackpool has to offer and relax in the luxurious rooms that look out to picturesque views presenting the true beauty of Mother Nature. The aroma of Ceylon tea coupled with the sweet-scented mist surrounding the area, adds to the beauty of the place. It is worth getting out of the comfort of your bed to take a dip to feel the warmth of the ‘Unu Diya Pokuna’, stroll in the hills or cycle alongside the lush green tea plantations. Somehow, the landscape urges you to climb higher, delve deeper and walk further. There are hotels and there are experiences. There are places where you simply stay and places you simply never want to leave. Welcome to BLACKPOOL, where you meet your family in the hills.</p>
						            <a href="blog-single.html" class="btn btn-default btn-transparent pull-right" role="button">
								        <span>Read More</span>
								    </a>
					            </div>
					        </div>	<!-- End of /.blog-box -->
					    </li>
					    <li>
					        <div class="blog-icon">
					        	<i class="fa  fa-video-camera"></i>
					        </div>

					    </li>
					  </ul>
				</div>	<!-- End of /.col-md-9 -->


					</div>	<!-- End of /.blog-sidebar -->
				</div>	<!-- End of /.col-md-3 -->
			</div>	<!-- End of /.row -->
		</div>
	</section>	<!-- End of /#Blog -->

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
                        | Food Court <a href="admin/login-form.php" target="_blank">Administrator</a> All Rights
                        Reserved
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
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

<!-- Google Map -->
<script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqqBMyAoQe2LlTe9e3_U5O8NaUwEJ9dDU&callback=initMap&libraries=&v=weekly"
        async
></script>
<script src="validation/map.js"></script>


<a id="back-top" href="#"></a>
</body>
</html>