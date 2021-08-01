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

    <style>
        body{
            margin-top:20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
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
            background-color: #e2e8f0;
        }
        .h-100 {
            height: 100%!important;
        }
        .shadow-none {
            box-shadow: none!important;
        }
    </style>
</head>

<body>
<!-- TOP HEADER Start
================================================== -->


<section id="top">
    <nav class="navbar">
    <a class="navbar-brand" href="#">Brand name</a>
    <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button>
    </nav>
</section>

<h1>Welcome <?php echo $fetch_info['firstname'] ?></h1>

<div class="container">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <div class="row gutters-sm">
        <div class="col-md-4 d-none d-md-block">
            <div class="card">
                <div class="card-body">
                    <nav class="nav flex-column nav-pills nav-gap-y-1">
                        <a href="#profile" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded active">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user mr-2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>Profile Information
                        </a>

                        <a href="#account" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings mr-2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>Account Settings
                        </a>

                        <a href="#security" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield mr-2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>Security
                        </a>

                        <a href="#billing" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card mr-2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>Billing
                        </a>
                    </nav>
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

                        </form>
                    </div>

                    <div class="tab-pane" id="account">
                        <h6>ORDER HISTORY</h6>
                        <hr>
                        <table class="table table-hover">
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
                            <td><?php echo $row['food_id']?></td>
                            <td><?php echo $row['quantity']?></td>
                            <td><?php echo $row['total']?></td>
                            <td><?php echo $row['delivered']?></td>
                        </tr>
                        <?php } ?>
                            </tbody>
                        </table>
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

                        </form>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


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