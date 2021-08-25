<?php
//checking connection and connecting to a database
require_once('connection/config.php');
//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
if(!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}


//selecting all records from the food_details table. Return an error if there are no records in the table
$result=mysqli_query($conn,"SELECT * FROM food_details,food_categories WHERE food_details.food_category=food_categories.category_id ")
or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
?>
<?php
//retrive categories from the categories table
$categories=mysqli_query($conn,"SELECT * FROM food_categories")
or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
?>
<?php
//retrive a currency from the currencies table
//define a default value for flag_1
$flag_1 = 1;
$currencies=mysqli_query($conn,"SELECT * FROM currencies WHERE flag='$flag_1'")
or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
?>

<?php
if(isset($_POST['Submit'])){
    //Function to sanitize values received from the form. Prevents SQL injection
    function clean($str) {
        global $conn;
        $str = @trim($str);
        $str = stripslashes($str);

        return mysqli_real_escape_string($conn,$str);
    }
    //get category id
    $id = clean($_POST['category']);

    //selecting all records from the food_details and categories tables based on category id. Return an error if there are no records in the table
    if($id > 0){
        $result=mysqli_query($conn,"SELECT * FROM food_details,food_categories WHERE food_category='$id' AND food_details.food_category=food_categories.category_id ")
        or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
    }elseif($id == 0){
        $result=mysqli_query($conn,"SELECT * FROM specials WHERE '".date('Y-m-d')."' BETWEEN date(special_start_date) and date(special_end_date) ")
        or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
    }
}
?>


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
	.view1{
		
   		margin: 15px;
		width: 200px; 
		float: left;   
	}
    body{
        background: url(images/ourback.jpg);

    }
    /*.product-grid{*/
    /*   display:flex;*/
    /*}*/
    .product-grid{
        display:flex;
        flex-direction: row;
        flex-wrap: wrap;
    }
    .product-grid>div{
        width:100px;
        height: 200px;
        margin-bottom: 130px;
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
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center active"  href="pastry-shop.php">
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

<br><br><br><br>
<section>
		<div class="container">
            <div class="col-md-4">
					<h3>PASTRY SHOP</h3>
				</div>	<!-- End of /.col-md-4 -->
            </div>	<!-- End of /.row -->
	</section>	<!-- End of /#Topic-header -->



	<!-- PRODUCTS Start
    ================================================== -->

	<section id="shop">
		<div class="container">
			<sec class="row">
				<div class="col-md-3">
					<div class="blog-sidebar">
						<div class="block">
							
							<form name="categoryForm" id="categoryForm" method="post" action="pastry-shop.php" onsubmit="return categoriesValidate(this)">
							
        <h3>Category</h3>
        <p width="168"><select name="category" id="category" class="form-control form-control-lg">
        <option value="select">- select category -
        <?php 
        //loop through categories table rows
        while ($row=mysqli_fetch_array($categories)){
        echo "<option value='{$row['category_id']}' ".($id == $row['category_id'] ? "selected" : "").">$row[category_name]</option>";
        }
        ?>

        <option value="0" <?php echo isset($id) &&  $id == 0 ? "selected" : "" ?>>Special Deals</option>
        </select></p>
        <p><button type="submit" name="Submit" class="btn btn-secondary btn-sm btn-block " >Show Foods</button></p>

							</form>
							<div class="list-group">
								<a href="#" class="list-group-item">
									<i class="fa  fa-dot-circle-o"></i>
									Local Food
								</a>
								<a href="#" class="list-group-item">
									<i class="fa  fa-dot-circle-o"></i>
									Foreign Food
								</a>
								<a href="#" class="list-group-item">
									<i class="fa  fa-dot-circle-o"></i>
									Indian Food
								</a>
								<a href="#" class="list-group-item">
									<i class="fa  fa-dot-circle-o"></i>
									Spanish Food
								</a>
								<a href="#" class="list-group-item">
									<i class="fa  fa-dot-circle-o"></i>
									Thai Food
								</a>
							</div>
						</div>
						<div class="block">
							<img src="images/resevation.jpg" alt="">
						</div>
						<div class="block">
							<h4>Reserve Your Day..</h4>
							<ul class="media-list">

							  	<li class="media">
							    	<a class="pull-left" href="#">
							      		<img class="media-object" src="images/family.jpg" alt="...">
							    	</a>
							    	<div class="media-body">
							      		<a href="" class="media-heading">FAMILY
							      		<p>Happiness Stories. </p></a>
							    	</div>
							  	</li>
                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="images/love.jpg" alt="...">
                                    </a>
                                    <div class="media-body">
                                        <a href="" class="media-heading">LOVE
                                            <p>Endless Stories.</p></a>
                                    </div>
                                </li>
							  	<li class="media">
							    	<a class="pull-left" href="#">
							      		<img class="media-object" src="images/Event.jpg" alt="...">
							    	</a>
							    	<div class="media-body">
							      		<a href="" class="media-heading">
							      		EVENT
							      		<p>Compassionate Together.</p>

							      		</a>
							    	</div>
							  	</li>
							  </ul>
						</div>

						<div class="block">
							<h4>Food Tag</h4>
							<div class="tag-link">
								<a href="">BALLET</a>
								<a href="">CHRISTMAS</a>
								<a href="">ELEGANCE</a>
								<a href="">ELEGANT</a>
								<a href="">SHOPPING</a>
								<a href="">SHOP</a>
							</div>	
						</div>
				</div>	<!-- End of /.col-md-3 -->
			
			</div>	<!-- End of /.row -->
			<div class="col-md-9">
				<div class="products-heading">
					<h2>NEW PRODUCTS</h2>
				</div>	<!-- End of /.Products-heading -->
				<div class="product-grid">
				
					
				        <?php
                                    $count = mysqli_num_rows($result);
                                    if(isset($_POST['Submit']) && $count < 1){
                                        echo "<html><script language='JavaScript'>alert('There are no foods under the selected category at the moment. Please check back later.')</script></html>";
                                    }
                                    else{
                                        //loop through all table rows
                                        //$counter = 3;
                                        $symbol=mysqli_fetch_assoc($currencies); //gets active currency
                                        if(isset($id) && $id == 0)
                                            $lt = "special";
                                        else
                                            $lt = "food";
                                        while ($row=mysqli_fetch_assoc($result)){
                        ?>

                                            <?php
                                            $deliver_data = "deliver_order".$row[$lt.'_id'];
                                            ?>

                                            <div class="products view1" style="width: 200px; float: left;" >
                                    <a href="#">

                                    <?php echo '<a href=images/'. $row[$lt.'_photo']. ' data-bs-toggle="modal" data-bs-target="#' .$deliver_data.'"><img src=images/'. $row[$lt.'_photo']. ' width="auto" height="100%"></a>'?>


                                        <!-- Modal -->
                                        <div class="modal fade" id="<?php echo $deliver_data; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><p class="h2"><?php echo $row[$lt.'_name']?></p></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo '<a href=images/'. $row[$lt.'_photo']. '><img src=images/'. $row[$lt.'_photo']. '></a>'?>
                                                        <hr>
                                                        <?php echo  $row[$lt . '_description']?>
                                                        <hr>
                                                        <p><strong><?php echo $symbol['currency_symbol']. "" . $row[$lt.'_price']?></strong></p>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </a>
                                    <a href="#">
                                    <h4><?php echo $row[$lt.'_name']?></h4>
                                    </a>
                                    <p class="price"><?php echo $symbol['currency_symbol']. "" . $row[$lt.'_price']?></p>
                                    <div>

                                        <?php echo '<a class="view-link shutter" href="cart/cart-exec.php?id=' . $row[$lt.'_id'] . '&lt='.$lt.'"><i class="fa fa-plus-circle"></i>Add To Cart</a>'; ?>

								    </div>
							    </div>
                                           
                        <?php  }} ?>
                        <?php
                             mysqli_free_result($result);
                             mysqli_close($conn);
                        ?>

                </div>	<!-- End of /.products -->
						

				</div>	<!-- End of /.products-grid -->

				<!-- Pagination -->


</section>


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
</body>
</html>