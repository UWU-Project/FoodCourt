<?php require_once "controllerUserData.php"; ?>

<?php
require_once('../auth.php');
?>

<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM customers WHERE email = '$email'";
    $run_Sql = mysqli_query($conn, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>

<?php
$member_id = $_SESSION['SESS_MEMBER_ID'];

//selecting all records from almost all tables. Return an error if there are no records in the tables
$billing = mysqli_query($conn, "SELECT * FROM billing_details WHERE member_id='$member_id'")
or die("Something is wrong ... \n" . mysqli_error());
$tuck = mysqli_fetch_assoc($billing);
?>

<!DOCTYPE html>
<html lang="en">
<title><?php echo $idm ?> | Home</title>
<head>
    <title>Profile settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>


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


    <style>
        .footers a {color:#696969;}
        .footers p {color:#696969;}
        .footers ul {line-height:30px;}
        #social-fb:hover {
            color: #3B5998;
            transition:all .001s;
        }
        #social-tw:hover {
            color: #4099FF;
            transition:all .001s;
        }
        #social-gp:hover {
            color: #d34836;
            transition:all .001s;
        }
        #social-em:hover {
            color: #f39c12;
            transition:all .001s;
        }


        body{
            margin-top:20px;
            color: #1a202c;
            text-align: left;
            background-color: #f5f6f8;
        }
        .main-body {
            padding: 15px;
        }

        .nav-link {
            color: #4a5568;
        }
        .card {
            box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col, .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }
        .mb-3, .my-3 {
            margin-bottom: 1rem!important;
        }

        .bg-gray-300 {
            background-color: #e1e8f1;
        }
        .h-100 {
            height: 100%!important;
        }
        .shadow-none {
            box-shadow: none!important;
        }

         body{
             background: url(../images/ourback.jpg);

         }
    </style>

</head>

<body>

<!-- TOP HEADER Start
    ================================================== -->
<section id="top" >
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <p class="contact-action"><i class="fa fa-phone-square"></i>CST GROUP 4 [ FOOD COURT ]</p>
            </div>

            <div class="col-md-3 clearfix">
                <ul class="login-cart">
                    <li>
                        <a href="../cart/cart.php"> <i class="fas fa-shopping-cart"></i>CART</a>
                    </li>
                    <li>
                        <a href="../TableBook/TBB.php"><i class="fas fa-calendar-plus"></i>RESERVATION</a>
                    </li>
                </ul>
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
            </div>	<!-- End of /.col-md-12 -->
        </div>	<!-- End of /.row -->
    </div>	<!-- End of /.container -->
</header> <!-- End of /Header -->


<!--
================================================== -->
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
                        <ul class="nav navbar-nav nav-main mx-auto">

                            <li class="nav">
                                <a class="nav-link nav-link-icon active " href="home.php">
                                    <i class="fas fa-user me-1"></i>
                                    <p class="d-inline text-sm z-index-1 font-weight-bold">USER PROFILE</p>
                                </a>
                            </li>


                        </ul>
                        <ul class="navbar-nav ms-auto">
                            <button class="btn bg-gradient-warning mb-0"><a href="logout-user.php">LOGOUT</a></button>
                        </ul>
                    </div>

                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>


<div class="container" style="margin-top: 3cm">

    <!-- ========================================================================================================================================= -->

    <!-- ========================================================================================================================================= -->

<div class="container">

    <div class="text-center">

        <h1>Welcome <?php echo $fetch_info['firstname'] ?> !</h1>
        <hr>
    </div>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <div class="row gutters-sm">
        <div class="col-md-4 d-none d-md-block">
            <div class="card">
                <div class="card-body">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill flex-column p-1" role="tablist">
                            <li class="nav-item">
                                <a href="#profile" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded active" role="tab" aria-controls="preview" aria-selected="true">
                                    <i class="ni ni-badge text-sm me-2"></i>My Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#account" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded" role="tab" aria-controls="code" aria-selected="false">
                                    <i class="ni ni-basket text-sm me-2"></i>Orders
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#account2" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded" role="tab" aria-controls="code" aria-selected="false">
                                    <i class="ni ni-calendar-grid-58 text-sm me-2"></i>Reservations
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#security" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded" role="tab" aria-controls="code" aria-selected="false">
                                    <i class="ni ni-settings text-sm me-2"></i>Security
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#billing" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded" role="tab" aria-controls="code" aria-selected="false">
                                    <i class="ni ni-map-big text-sm me-2"></i>Billing
                                </a>
                            </li>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header border-bottom mb-3 d-flex d-md-none">
                    <ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">
                        <li class="nav-item">
                            <a href="#profile" data-toggle="tab" class="nav-link has-icon active"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></a>
                        </li>

                        <li class="nav-item">
                            <a href="#account" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></a>
                        </li>

                        <li class="nav-item">
                            <a href="#account2" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></a>
                        </li>

                        <li class="nav-item">
                            <a href="#security" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></a>
                        </li>

                        <li class="nav-item">
                            <a href="#billing" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></a>
                        </li>
                    </ul>
                </div>
                <div class="card-body tab-content">
                    <div class="tab-pane active" id="profile">
                        <h6>YOUR PROFILE INFORMATION</h6>
                        <hr>
                        <form>
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input type="text" class="form-control" id="fullName" aria-describedby="fullNameHelp" placeholder="Enter your fullname" value="<?php echo $fetch_info['firstname'] ?> <?php echo $fetch_info['lastname'] ?>" disabled>
                               </div>

                            <div class="form-group">
                                <label for="url">E-Mail</label>
                                <input type="text" class="form-control" id="url" placeholder="Enter your website address" value="<?php echo $fetch_info['email'] ?>" disabled>
                            </div>
                            <hr>
                        </form>
                    </div>

                    <div class="tab-pane" id="account">
                        <!-- cart history -->
                        <h6>ORDER HISTORY</h6>
                        <hr>
                        <div class="table-responsive">
                        <table class="table table-hover" width="100%" align="center">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Date</th>
                                <th scope="col">Food ID</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Delivered</th>
                            </tr>
                            </thead>
                            <tbody>
                        <?php
                        $result2 = mysqli_query($conn, "SELECT * FROM orders_paid WHERE member_id ='$member_id'")
                        or die("A problem has occured 2... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
                        while ($row = mysqli_fetch_assoc($result2)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['ID']?></th>
                            <td><?php echo $row['date']?></td>
                            <td><?php
                                $idss = explode(",", $row['food_id']);
                                foreach ($idss as $row2) {
                                    echo $row2."<br>";
                                }
                                ?></td>
                            <td><?php
                                $idss2 = explode(",", $row['quantity']);
                                foreach ($idss2 as $row3) {
                                    echo $row3."<br>";
                                }
                                ?></td>
                            <td><?php echo $row['total']?></td>
                            <td>
                                <?php
                                if ($row['delivered'] !== '0') {
                                echo '<span class="badge bg-gradient-success">'.'confirmed'.'</span>';
                                }else{
                                echo '<span class="badge bg-gradient-warning">'.'processing'.'</span>';
                                }
                                ?>
                            </td>
                        </tr>
                        <?php } ?>
                            </tbody>
                        </table>
                        </div>
                        <!-- cart history end-->
                    </div>
                    <div class="tab-pane" id="account2">
                        <!-- reservation history -->
                        <h6>RESERVATION HISTORY </h6>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-hover" width="100%" align="center">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>

                                <th scope="col">Table No</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time Slot</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $resultR = mysqli_query($conn, "SELECT * FROM reservations_details WHERE member_id ='$member_id'")
                            or die("A problem has occured 2... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
                            while ($rowR = mysqli_fetch_assoc($resultR)) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $rowR['ReservationID']?></th>

                                    <td><?php echo $rowR['table_id']?></td>
                                    <td><?php echo $rowR['Reserve_Date']?></td>
                                    <td><?php echo $rowR['Reserve_Time']?></td>
                                    <td><?php
                                        if ($rowR['flag'] == '1') {
                                            echo '<span class="badge bg-gradient-success">'.'confirmed'.'</span>';
                                        }else{

                                            if($rowR['flag'] == '0'){
                                                echo '<span class="badge bg-gradient-dark">'.'processing'.'</span>';
                                            }
                                            else{
                                                echo '<span class="badge bg-gradient-danger">'.'cancelled'.'</span>';
                                            }

                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        </div>
                        <!-- reservation history end -->
                    </div>

                    <div class="tab-pane" id="security">
                        <h6>SECURITY SETTINGS</h6>
                        <hr>

                            <div class="form-group">
                                <label>Change Password</label>
                                <div class="small text-muted mb-3">You can change your Password at Anytime</div>
                                <a href="forgot-password.php"><button class="btn btn-primary">Change Password</button></a>
                                <p class="small text-muted mt-2">Two-factor authentication adds an additional layer of security to your account by requiring more than just a password to log in.</p>
                            </div>

                        <hr>
                    </div>


                    <div class="tab-pane" id="billing">
                        <h6>BILLING DETAILS</h6>
                        <hr>

                            <div class="form-group mb-0">

                                <?php
                                $member_id = $_SESSION['SESS_MEMBER_ID'];

                                //selecting all records from almost all tables. Return an error if there are no records in the tables
                                $billing2 = mysqli_query($conn, "SELECT * FROM billing_details WHERE member_id='$member_id'")
                                or die("Something is wrong ... \n" . mysqli_error());


                                if(mysqli_num_rows($billing2)>0){
                                        $check='hidden="true"';
                                        echo "Billing Details Already Added";

                                        while ($billS = mysqli_fetch_assoc($billing2)) {
                                            ?>
                                            <div class="card bg-gradient-default">
                                              <div class="card-body">

                                                <blockquote class="blockquote text-white mb-0">
                                                    <p class="text-dark text-gradient text-info text-sm ms-3">Post Box No : <?php echo $billS['P_O_Box_No']; ?> </br> Street Address : <?php echo $billS['Street_Address']; ?> </br> City : <?php echo $billS['City']; ?> </br> </br>  Mobile Number : <?php echo $billS['Mobile_No']; ?> </br>  Landline Number : <?php echo $billS['Landline_No']; ?> </p>
                                                </blockquote>
                                              </div>
                                            </div>
                                            <?php
                                        }

                                }else{
                                    $check="";
                                }

                                ?>

                                <form id="billingForm" class="needs-validation" novalidate="" name="billingForm"
                                      method="post"
                                      action="billing-exec.php?id=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>"
                                      onsubmit="return billingValidate(this)" <?php echo $check?>>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="firstName">First name</label>
                                            <input type="text" class="form-control" id="firstName" placeholder=""
                                                   value="<?php echo $_SESSION['SESS_FIRST_NAME']; ?>" required="" readonly>
                                            <div class="invalid-feedback"> Valid first name is required.</div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="lastName">Last name</label>
                                            <input type="text" class="form-control" id="lastName" placeholder=""
                                                   value="<?php echo $_SESSION['SESS_LAST_NAME']; ?>" required="" readonly>
                                            <div class="invalid-feedback"> Valid last name is required.</div>
                                        </div>

                                    </div>

                                    <!--<div class="mb-3">

                                        <label for="username">Username</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">@</span>
                                            </div>
                                            <input type="text" class="form-control" id="username" placeholder="Username" required="">
                                            <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                                        </div>
                                    </div>-->

                                    <div class="mb-3">
                                        <label for="address2">P.O. Box No <span class="text-muted">(Optional)</span></label>
                                        <input name="box" type="text" class="form-control" id="address2"
                                               placeholder="Apartment or Suite" id="box">
                                    </div>

                                    <div class="mb-3">
                                        <label for="address">Street</label>
                                        <input name="sAddress" type="text" class="form-control" id="sAddress"
                                               placeholder="Enter the Address" required="">
                                        <div class="invalid-feedback"> Please enter your shipping address.</div>
                                    </div>


                                    <div class="mb-3">
                                        <label for="address">City</label>
                                        <input name="city" id="city" type="text" class="form-control"
                                               placeholder="Enter the Address" required="">
                                        <div class="invalid-feedback"> Please enter your shipping address.</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="mNumber">Mobile No</label>
                                            <input name="mNumber" type="text" class="form-control" id="mNumber"
                                                   placeholder=""
                                                   required="">
                                            <div class="invalid-feedback"> Mobile Number Required.</div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="lNumber">Landline No<span
                                                        class="text-muted">(Optional)</span></label>
                                            <input name="lNumber" type="text" class="form-control" id="lNumber"
                                                   placeholder="Apartment or Suite">

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="same-address" required="">
                                        <label class="custom-control-label" for="same-address">Shipping address is the same
                                            as my
                                            billing address</label>
                                        <div class="invalid-feedback"> Make Sure to Check</div>
                                    </div>
                                    <hr>


                                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="Submit"
                                            value="Add">
                                        Save The Address
                                    </button>
                            </div>


                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br><br>
<!-- -------- FOOTER START ------- -->
<footer class="footers bg-gradient-faded-light">
    <hr class="horizontal dark ">
    <div class="container">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-12 py-2">
                            <small>
                                Disclaimer: Element Limited is only an intermediary offering its platform to facilitate the transactions between Seller and Customer/Buyer/User and is not and cannot be a party to or control in any manner any transactions between the Seller and the Customer/Buyer/User. All the offers and discounts on this Website have been extended by various Builder(s)/Developer(s) who have advertised their products. Element is only communicating the offers and not selling or rendering any of those products or services. It neither warrants nor is it making any representations with respect to offer(s) made on the site. Element Limited shall neither be responsible nor liable to mediate or resolve any disputes or disagreements between the Customer/Buyer/User and the Seller and both Seller and Customer/Buyer/User shall settle all such disputes without involving Element Limited in any manner.
                            </small>
                        </div>
                    </div>
                </div>

            <div class="col-12">
                <div class="text-center">
                    <p class="my-4 text-sm" style="color: #fff;">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        | Food Court All Rights Reserved
                    </p>
                </div>
            </div>
    </div>
</footer>


<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>

<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
<script src="../assets/js/plugins/parallax.min.js"></script>
<!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->

<script src="../assets/js/soft-design-system.min.js?v=1.0.5" type="text/javascript"></script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'

        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation')

            // Loop over them and prevent submission
            Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        }, false)
    }())
</script>

</body>

</html>