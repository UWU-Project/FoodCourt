<?php
require_once('authenticate/auth.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>


    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script language="JavaScript" src="validation/admin.js"></script>
    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>

</head>
<body>
<!-- LOGO Start
================================================== -->

<header>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <a href="#">
                    <img src="../images/logo2copy.png" alt="logo">
                </a>
            </div>	<!-- End of /.col-md-12 -->
        </div>	<!-- End of /.row -->
    </div>	<!-- End of /.container -->
</header> <!-- End of /Header -->

<!-- MENU Start
================================================== -->
<section id="topic-header">
    <div class="container">
        <div class="row text-center">
            <h1>Administrator Profile</h1>
        </div>
    </div>
</section>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>

            </button>
        </div> <!-- End of /.navbar-header -->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav nav-main">
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="profile.php">Profile</a></li>
                <li><a href="foods-menu.php">Foods</a></li>
                <li><a href="accounts.php">Accounts</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="reservations.php">Reservations</a></li>
                <li><a href="specials.php">Promotions</a></li>
                <li><a href="allocation.php">Staff</a></li>
                <li><a href="options.php">Options</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>	<!-- /.navbar-collapse -->
    </div>	<!-- /.container-fluid -->
</nav>	<!-- End of /.nav -->

<div id="page">

    <div id="container">
        <table align="center">
            <tr>
                <form id="updateForm" name="updateForm" method="post" action="update-exec.php?id=<?php echo $_SESSION['SESS_ADMIN_ID'];?>" onsubmit="return updateValidate(this)">
                    <td>
                        <table width="350" border="0" cellpadding="2" cellspacing="0">
                            <CAPTION><h3>CHANGE ADMIN PASSWORD</h3></CAPTION>
                            <tr>
                                <td colspan="2" style="text-align:center;"><span style="color: #FF0000; ">* </span>Required fields</td>
                            </tr>
                            <tr>
                                <th width="124">Current Password</th>
                                <td width="168"><span style="color: #FF0000; ">* </span><input name="opassword" type="password" class="textfield" id="opassword" /></td>
                            </tr>
                            <tr>
                                <th>New Password</th>
                                <td><span style="color: #FF0000; ">* </span><input name="npassword" type="password" class="textfield" id="npassword" /></td>
                            </tr>
                            <tr>
                                <th>Confirm New Password </th>
                                <td><span style="color: #FF0000; ">* </span><input name="cpassword" type="password" class="textfield" id="cpassword" /></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><input type="submit" name="Submit" value="Change" /></td>
                            </tr>
                        </table>
                    </td>
                </form>
                <td>
                    <form id="staffForm" name="staffForm" method="post" action="staff-exec.php" onsubmit="return staffValidate(this)">
                        <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
                            <CAPTION><h3>ADD NEW STAFF</h3></CAPTION>
                            <tr>
                                <td colspan="2" style="text-align:center;"><span style="color: #FF0000; ">* </span>Required fields</td>
                            </tr>
                            <tr>
                                <th>First Name </th>
                                <td><span style="color: #FF0000; ">* </span><input name="fName" type="text" class="textfield" id="fName" /></td>
                            </tr>
                            <tr>
                                <th>Last Name </th>
                                <td><span style="color: #FF0000; ">* </span><input name="lName" type="text" class="textfield" id="lName" /></td>
                            </tr>
                            <tr>
                                <th>Street Address </th>
                                <td><span style="color: #FF0000; ">* </span><input name="sAddress" type="text" class="textfield" id="sAddress" /></td>
                            </tr>
                            <tr>
                                <th>Mobile/Tel </th>
                                <td><span style="color: #FF0000; ">* </span><input name="mobile" type="text" class="textfield" id="mobile" /></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><input type="submit" name="Submit" value="Add" /></td>
                            </tr>
                        </table>
                </td>
                </form>
            </tr>
        </table>
        <p>&nbsp;</p>
        <hr>
    </div>
    <?php
    include 'footer.php';
    ?>
</div>
</body>
</html>
