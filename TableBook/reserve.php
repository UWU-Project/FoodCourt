<?php
require_once('../auth.php');
?>

<?php
//checking connection and connecting to a database
require_once('../connection/config.php');
//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
if(!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}

//Select database

//get member id from session
$memberId = $_SESSION['SESS_MEMBER_ID'];
?>

<?php
//retrieving all rows from the cart_details table based on flag=0
$flag_0 = 0;
$items=mysqli_query($conn,"SELECT * FROM cart_details WHERE member_id='$memberId' AND flag='$flag_0'")
or die("Something is wrong ... \n" . mysqli_error());
//get the number of rows
$num_items = mysqli_num_rows($items);
?>

<!--php
//retrieving all rows from the messages table
$messages=mysqli_query($conn,"SELECT * FROM messages")
or die("Something is wrong ... \n" . mysqli_error());
//get the number of rows
$num_messages = mysqli_num_rows($messages);
?-->

<?php
//retrieve tables from the tables table
$tables=mysqli_query($conn,"SELECT * FROM tables")
or die("Something is wrong ... \n" . mysqli_error());
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Food  Court</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>
    <!-- Icon -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Css -->
    <link rel="stylesheet" href="../css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="../css/owl.carousel.css">
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
    <script src="https://code.jquery.com/jquery-latest.js"</script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

    <script>
        $(function() {
            $('body').confirmation({
                selector: '[data-toggle="confirmation"]'
            });

            $('.confirmation-callback').confirmation({
                onConfirm: function(event, element) { alert('confirm') },
                onCancel: function(event, element) { alert('cancel') }
            });
        });
    </script>
    <style>
        .imgcenter {
            display: block;
            margin-left: auto;
            margin-right: auto;
            padding: 10px;
            width: 150px;
            height: auto;
        }
        .imgcenter2{
            display: block;
            margin-left: auto;
            margin-right: auto;
            padding: 10px;
            width: 200px;
            height: auto;

        }
        .imgcenter3{
            display: block;
            margin-left: auto;
            margin-right: auto;
            padding: 10px;
            width: 400px;
            height: auto;

        }
    </style>


</head>
<body>


<!-- Header Begins -->
<!-- TOP HEADER Start
================================================== -->

<section id="top">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <p class="contact-action"><i class="fa fa-phone-square"></i>CST GROUP 4 [ FOOD COURT ]</p>
            </div>

            <div class="col-md-3 clearfix">
                <ul class="login-cart">
                    <li>
                        <a href="../customer/login.php"> <i class="fas fa-user"></i>LOGIN</a>
                    </li>
                    <li>
                        <a href="../customer/create.php"><i class="fas fa-user-plus"></i>REGISTER</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-1">

            </div>

            <div class="col-md-2">
                <div class="search-box">
                    <div class="input-group">
                        <input placeholder="Search Here" type="text" class="form-control">
                        <span class="input-group-btn">
					        	<button type="button">

					      	</span>
                    </div><!-- /.input-group -->
                </div><!-- /.search-box -->
            </div>
        </div> <!-- End Of /.row -->
    </div>    <!-- End Of /.Container -->

</section>  <!-- End of /Section -->

<!-- LOGO Start
================================================== -->

<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="#">
                    <img src="../images/logo2copy.png" alt="logo">
                </a>
            </div>    <!-- End of /.col-md-12 -->
        </div>    <!-- End of /.row -->
    </div>    <!-- End of /.container -->
</header> <!-- End of /Header -->



<!-- Navbar -->
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">

            <nav class="navbar navbar-expand-lg  blur  top-0  z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">

                <div class="container-fluid">
                    <a class="navbar-brand font-weight-bolder ms-sm-3" href="../index.php" rel="tooltip"
                       title="Orchid Bliss" data-placement="bottom" target="_blank">
                        ORCHID BLISS
                    </a>

                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                          </span>
                    </button>


                    <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                        <ul class="nav navbar-nav nav-main " style="display: inline-block;">
                            <li class="nav-item dropdown dropdown-hover mx-10">
                            </li>
                            <li class="nav" style="margin-left: 50px">
                                <a class="nav-link nav-link-icon me-2 active " href="../cart/cart.php" target="_blank">

                                    <i class="fa fa-shopping-cart me-1"></i>
                                    <p class="d-inline text-sm z-index-1 font-weight-bold">RESERVE TABLE</p>
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


<!-- dbs
================================================== -->
<div id="page" style="padding-top: 50px">



        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="reserve-exec.php" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">table</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="table" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="date" class="form-control" name="date" id="exampleInputPassword1" placeholder="Password" required>
                            </div>
                            <div class="form-check">

                                <input type="text" name="id" hidden value="<?php echo $_SESSION['SESS_MEMBER_ID'];?>">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Example multiple select</label>
                                <select name="time" multiple class="form-control" id="exampleFormControlSelect2">
                                    <option>BreakFast</option>
                                    <option>Lunch</option>
                                    <option>Dinner</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" data-toggle="confirmation" style="padding-left: 30px;">Submit</button>

                            </div>

                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

        <script>

            function tableChange(table){
                document.getElementById('exampleInputEmail1').value = table;
            }
        </script>

        <!--<form name="tableForm" id="tableForm" method="post" action="reserve-exec.php?id=<?php echo $_SESSION['SESS_MEMBER_ID'];?>" onsubmit="return tableValidate(this)">
                <table align="center" width="300">
                    <CAPTION><h2>RESERVE A TABLE</h2></CAPTION>
                    <tr>
                        <td><b>Table Name/Number:</b></td>
                        <td><select name="table" id="table">
                                <option value="select">- select table -</option>
                                <?php
        //loop through tables table rows
        while ($row=mysqli_fetch_array($tables)){
            echo "<option value=$row[table_id]>$row[table_name]</option>";
        }
        ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Date:</b></td><td><input type="date" name="date" id="date" /></td></tr>
                    <tr>
                        <td><b>Time:</b></td><td><input type="time" name="time" id="time" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" value="Reserve"></td>
                    </tr>
                </table>
            </form>-->

</div>

<!-- Book Table Pictures
================================================== -->

<div class="container">
    <div class="row" style="margin-bottom: 50px">
        <div class="col-md-3">
            <a  data-toggle="modal" data-target="#exampleModal" onclick="tableChange('1')">
                <img id="my-img" src="../images/t1.png" class="imgcenter" onmouseover="hover(this);" onmouseout="unhover(this);" />
            </a>
        </div>
        <div class="col-md-6">
            <a data-toggle="modal" data-target="#exampleModal" onclick="tableChange('11')">
                <img id="my-img" src="../images/t11.png" class="imgcenter3" onmouseover="hover11(this);" onmouseout="unhover11(this);" />
            </a>
        </div>

        <div class="col-md-3">
            <a data-toggle="modal" data-target="#exampleModal" onclick="tableChange('2')">
                <img id="my-img" src="../images/t2.png" class="imgcenter" onmouseover="hover2(this);" onmouseout="unhover2(this);" />
            </a>
        </div>
    </div>
</div>
<div class="container" >
    <div class="row" style="margin-bottom: 50px">
        <div class="col-md-9">
            <div class="row" style="margin-bottom: 50px">
                <div class="col-md-4"><a data-toggle="modal" data-target="#exampleModal" onclick="tableChange('3')">
                        <img id="my-img" src="../images/t3.png" class="imgcenter" onmouseover="hover3(this);" onmouseout="unhover3(this);" />
                    </a></div>
                <div class="col-md-4"><a data-toggle="modal" data-target="#exampleModal" onclick="tableChange('5')">
                        <img id="my-img" src="../images/t5.png" class="imgcenter" onmouseover="hover5(this);" onmouseout="unhover5(this);" />
                    </a></div>
                <div class="col-md-4"><a data-toggle="modal" data-target="#exampleModal" onclick="tableChange('7')">
                        <img id="my-img" src="../images/t7.png" class="imgcenter" onmouseover="hover7(this);" onmouseout="unhover7(this);" />
                    </a></div>

            </div>
            <div class="row">
                <div class="col-md-4"><a data-toggle="modal" data-target="#exampleModal" onclick="tableChange('4')">
                        <img id="my-img" src="../images/t4.png" class="imgcenter" onmouseover="hover4(this);" onmouseout="unhover4(this);" />
                    </a></div>
                <div class="col-md-4"><a data-toggle="modal" data-target="#exampleModal" onclick="tableChange('6')">
                        <img id="my-img" src="../images/t6.png" class="imgcenter" onmouseover="hover6(this);" onmouseout="unhover6(this);" />
                    </a></div>
                <div class="col-md-4"><a data-toggle="modal" data-target="#exampleModal" onclick="tableChange('8')">
                        <img id="my-img" src="../images/t8.png" class="imgcenter" onmouseover="hover8(this);" onmouseout="unhover8(this);" />
                    </a></div>

            </div>

        </div>

        <div class="col-3"><a data-toggle="modal" data-target="#exampleModal" onclick="tableChange('9')">
                <img id="my-img" src="../images/t9.png" class="imgcenter2" onmouseover="hover1(this);" onmouseout="unhover1(this);" />
            </a></div>
    </div>

    <!-- hover
    ================================================== -->
    <script>
        function hover1(element) {
            element.setAttribute('src', '../images/t9h.png');
        }

        function unhover1(element) {
            element.setAttribute('src', '../images/t9.png');
        }
        function hover(element) {
            element.setAttribute('src', '../images/t1h.png');
        }

        function unhover(element) {
            element.setAttribute('src', '../images/t1.png');
        }
        function hover2(element) {
            element.setAttribute('src', '../images/t2h.png');
        }

        function unhover2(element) {
            element.setAttribute('src', '../images/t2.png');
        }
        function hover3(element) {
            element.setAttribute('src', '../images/t3h.png');
        }

        function unhover3(element) {
            element.setAttribute('src', '../images/t3.png');
        }
        function hover4(element) {
            element.setAttribute('src', '../images/t4h.png');
        }

        function unhover4(element) {
            element.setAttribute('src', '../images/t4.png');
        }
        function hover5(element) {
            element.setAttribute('src', '../images/t5h.png');
        }

        function unhover5(element) {
            element.setAttribute('src', '../images/t5.png');
        }
        function hover6(element) {
            element.setAttribute('src', '../images/t6h.png');
        }

        function unhover6(element) {
            element.setAttribute('src', '../images/t6.png');
        }
        function hover7(element) {
            element.setAttribute('src', '../images/t7h.png');
        }

        function unhover7(element) {
            element.setAttribute('src', '../images/t7.png');
        }
        function hover8(element) {
            element.setAttribute('src', '../images/t8h.png');
        }

        function unhover8(element) {
            element.setAttribute('src', '../images/t8.png');
        }
        function hover9(element) {
            element.setAttribute('src', '../images/t9h.png');
        }

        function unhover9(element) {
            element.setAttribute('src', '../images/t9.png');
        }
        function hover10(element) {
            element.setAttribute('src', '../images/t10h.png');
        }

        function unhover10(element) {
            element.setAttribute('src', '../images/t10.png');
        }
        function hover11(element) {
            element.setAttribute('src', '../images/t11h.png');
        }

        function unhover11(element) {
            element.setAttribute('src', '../images/t11.png');
        }
    </script>
</div>

<div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">

<p style="alignment: center">Here you can ... For more information <a href="contact-us.php">Click Here</a> to contact us.

</p>

</div>

<div id="Mydiv" style="display: none; border-style: solid ">
    <h1>Hide and show div tag</h1>
    <button id="DivHide">Hide Div</button>
</div>
    <button id="DivShow">Hide Div</button>


    <!-- FOOTER Start
    ================================================== -->

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="block clearfix">
                    <a href="#">
                        <img src="../images/footerlogo5.png" alt="">
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

                    <p style="text-align: center;">© 2021 | Food Court <a href="../admin/login-form.php">Administrator</a> All Rights Reserved</p>
                </div>	<!-- End Of /.col-md-12 -->
            </div>	<!-- End Of /.row -->
        </div>	<!-- End Of /.container -->
    </div>	<!-- End Of /.footer-bottom -->
</footer> <!-- End Of Footer -->


<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>

<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
<script src="../assets/js/plugins/parallax.min.js"></script>
<!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->

<script src="../assets/js/soft-design-system.min.js?v=1.0.5" type="text/javascript"></script>

</body>
</html>