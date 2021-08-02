<?php
require_once('authenticate/auth.php');
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Admin | Orchid Bliss</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="akila/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

<style>
    .adminProfile{
        border: 2px solid #11101D; 
        margin:0 10px; 
        padding: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .adminProfile:active{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .adminProfile:focus{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .adminProfile:target{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 0px;
    border-radius: 0px;
    -webkit-box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
    box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
}
.panel-green > .panel-heading {
    border-color: #5cb85c;
    color: white;
    background-color: #5cb85c;
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
</style>

<body>
<div class="sidebar">
    <div class="logo-details">
        <i class=''></i>
        <div class="logo_name">Orchid Bliss</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
        <li>
            <a href="./newindex.php">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name" id="demo" onclick="myFunction()">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>
        <li class="active">
            <a href="#">
                <i class='bx bx-user' ></i>
                <span class="links_name">Profile</span>
            </a>
            <span class="tooltip">Profile</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-chat' ></i>
                <span class="links_name">Foods</span>
            </a>
            <span class="tooltip">Foods</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="links_name">Accounts</span>
            </a>
            <span class="tooltip">Accounts</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-folder' ></i>
                <span class="links_name">Orders</span>
            </a>
            <span class="tooltip">Orders</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-cart-alt' ></i>
                <span class="links_name">Reservations</span>
            </a>
            <span class="tooltip">Reservations</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-heart' ></i>
                <span class="links_name">Promotions</span>
            </a>
            <span class="tooltip">Promotions</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="links_name">Staff</span>
            </a>
            <span class="tooltip">Staff</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-folder' ></i>
                <span class="links_name">Options</span>
            </a>
            <span class="tooltip">Options</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-log-out' id="log_out"></i>
                <span class="links_name">Logout</span>
            </a>
            <span class="tooltip">Logout</span>
        </li>
    </ul>
</div>

<section>
<!--     
<div class="container">
        <div class="wrapper">
        <div class="row" style="margin-top: 3rem;">
        <div class="col-md-2">
</div>
            <div class="col-md-4 form adminProfile">
                <form  id="staffForm" name="staffForm" method="post" action="staff-exec.php" onsubmit="return staffValidate(this)">
                    <h2 class="text-center">ADD NEW STAFF</h2>
                    <p class="text-center">Orchid Bliss New Members</p>
                    <div class="form-group">
                        <p>First Name:<p>
                        <input id="fName"  class="form-control" type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                    <p>Last Name:<p>
                        <input id="lName" class="form-control" type="text" name="lname" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                    <p>Street Address:<p>
                        <input id="sAddress" class="form-control" type="text" name="sAddress" placeholder="Street Address" required>
                    </div>
                    <div class="form-group">
                    <p>Mobile Number:<p>
                        <input id="mobile" class="form-control" type="text" name="mobile" placeholder="Mobile Number:" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="Submit" value="Add Member">
                    </div>
                </form>
            </div>
            <div class="col-md-4 form adminProfile">
                
                <form  id="updateForm" name="updateForm" method="post" action="update-exec.php?id=<?php echo $_SESSION['SESS_ADMIN_ID'];?>" onsubmit="return updateValidate(this)">
                    <h2 class="text-center">CHANGE ADMIN PASSWORD</h2>
                    <p class="text-center">------------------</p>
                    <div class="form-group">
                        <p>Current Password<p>
                        <input id="opassword" class="form-control" type="password" name="opassword" placeholder="Current Password" required>
                    </div>
                    <div class="form-group">
                    <p>New Password<p>
                        <input id="npassword" class="form-control" type="password" name="npassword" placeholder="New Password" required>
                    </div>
                    <div class="form-group">
                    <p>Confirm New Password<p>
                        <input id="cpassword" class="form-control" type="password" name="cpassword" placeholder="Confirm New Password" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="Submit" value="Change Password">
                    </div>
                </form>
            </div>
<div class="col-md-2">
    
</div>
        </div>
    </div>
    </div>
</section> -->
<div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="panel panel-green ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-3">
                                    <i class="fa fa-users fa-4x"></i>
                                </div>
                                <div class="col-sm-9 text-right">
                                    <div class="huge"><span><?php echo countItems("client_id","clients")?></span></div>
                                    <div>Total Clients</div>
                                </div>
                            </div>
                        </div>
                        <a href="clients.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
</div>

<script src="akila/script.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>