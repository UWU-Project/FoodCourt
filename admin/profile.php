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
    <link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="validation/admin.js">
    </script>
</head>
<body>
<div id="page">
    <div id="header">
        <h1>Profile </h1>
        <a href="index.php">Home</a> | <a href="categories.php">Categories</a> | <a href="foods.php">Foods</a> | <a href="accounts.php">Accounts</a> | <a href="orders.php">Orders</a> | <a href="reservations.php">Reservations</a> | <a href="specials.php">Specials</a> | <a href="allocation.php">Staff</a> | <a href="messages.php">Messages</a> | <a href="options.php">Options</a> | <a href="logout.php">Logout</a>
    </div>
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
