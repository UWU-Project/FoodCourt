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


    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-design-system.css?v=1.0.5" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style.css">

    <script language="JavaScript" src="../validation/user.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/bread.css">



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
        .modal-open .container-fluid, .modal-open  .container {
            -webkit-filter: blur(5px) grayscale(90%);
        }
        body{
            background: url(../images/ourback.jpg);

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
                        <a href="../user/login-user.php"> <i class="fas fa-user"></i>LOGIN</a>
                    </li>
                    <li>
                        <a href="../user/signup-user.php"><i class="fas fa-user-plus"></i>REGISTER</a>
                    </li>
                </ul>
            </div>
        </div> <!-- End Of /.row -->
    </div>	<!-- End Of /.Container -->
</section>  <!-- End of /Section -->

<!-- LOGO Start
================================================== -->
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
                        <ul class="nav navbar-nav nav-main mx-auto" style="display: inline-block;">
                            <li class="nav-item px-3">
                                <a class="nav-link nav-link-icon me-2 active " href="../TableBook/reserve.php" target="_blank">
                                    <i class="fas fa-calendar-plus me-1"></i>
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

<!-- End Navbar -->

<!-- ================================================== -->

<div  id="page" style="padding-top: 50px" >
    <div class="container">
        <div class="py-5 text-center">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-2 justify-content-center">
                    <li class="breadcrumb-item active"><a href="#">Table</a></li>
                    <li class="breadcrumb-item active"><a>Select Table</a></li>
                    <li class="breadcrumb-item"><a>Pick Date</a></li>
                    <li class="breadcrumb-item"><a>Reserved</a></li>
                    <li class="breadcrumb-item"><a>Payment</a></li>
                </ol>
            </nav>

            <h1 style="padding-top: 20px">TABLE RESERVATION</h1>
            <hr>
        </div>

    </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content d-flex blur justify-content-center p-4 shadow-lg my-sm-0 my-sm-6 mt-8 mb-5 ">
                    <div class="modal-header" style="padding-bottom: 2px">
                        <h5 class="modal-title font-weight-bolder text-primary text-gradient" id="exampleModalLabel">Reserve A Table</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body" style="padding-top: 2px; padding-bottom: 2px;">
                        <form action="reserve-exec.php" method="post" id="reserve">
                            <div class="form-check">
                                <input type="text" name="id" hidden value="<?php echo $_SESSION['SESS_MEMBER_ID'];?>">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb my-2 justify-content-center">
                                        <li class="breadcrumb-item active"><a style="text-align: center">Table</a></li>
                                        <li class="breadcrumb-item active"><a style="text-align: center">Select Table</a></li>
                                        <li class="breadcrumb-item active"><a style="text-align: center">Pick Date</a></li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="form-group" style="padding-top: 20px">
                                <label for="exampleInputEmail1">Picked Table</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="table" value="" readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Pick A Date</label>
                                <input type="date" class="form-control" name="date" id="exampleInputPassword1" placeholder="Password" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Example multiple select</label>
                                <select name="time" multiple class="form-control" id="exampleFormControlSelect2">
                                    <option>BreakFast</option>
                                    <option>Lunch</option>
                                    <option>Dinner</option>
                                </select>
                            </div>


                            <div class="modal-footer justify-content-between" style="padding-bottom: 1px">
                                <button type="button" class="btn bg-gradient-secondary "  data-dismiss="modal">Close</button>
                                <button type="submit" class="btn bg-gradient-primary del-btn">Submit</button>
                            </div>
                            </div>

                </div>

                </div>
            </div>
        </div>


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

    <!-- hover ================================================== -->

</div>





    <!-- FOOTER Start
    ================================================== -->

<!-- -------- FOOTER START ------- -->
<footer class="footer" style="background: #383838; padding-top: 5px">
    <hr class="horizontal dark mb-5">
    <div class="container">
        <div class=" row">
            <div class="col-md-4" style="color: #B6B6B6;">
                <div>
                    <a href="#">
                        <img src="../images/footerlogo5.png" alt="">
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
                        | Food Court <a href="../admin-copy/user/login-user.php" target="_blank">Administrator</a> All Rights
                        Reserved
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

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

<script>

    function tableChange(table){
        document.getElementById('exampleInputEmail1').value = table;
    }
</script>

<!-- Google Map -->
<script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqqBMyAoQe2LlTe9e3_U5O8NaUwEJ9dDU&callback=initMap&libraries=&v=weekly"
        async
></script>
<script src="../validation/map.js"></script>
<!-- Google Map End -->


<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>

<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
<script src="../assets/js/plugins/parallax.min.js"></script>
<!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->

<script src="../assets/js/soft-design-system.min.js?v=1.0.5" type="text/javascript"></script>


<script>
    $('.del-btn').on('click',function(e){
        e.preventDefault();
        // const href = $(this).attr('href')
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("reserve").submit();
            }
        })
    })
</script>

</body>
</html>