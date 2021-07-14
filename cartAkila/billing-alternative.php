<?php
require_once('../auth.php');

//Include database connection details
require_once('../connection/config.php');

//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
if(!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <title><?php echo APP_NAME ?>:Alternative Billing</title>
    <link href="stylesheets/user_styles.css" rel="stylesheet" type="text/css"/>
    <script language="JavaScript" src="../validation/user.js">
    </script>
</head>
<body>
<div id="page">
    <div id="menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="foodzone.php">Food Zone</a></li>
            <li><a href="specialdeals.php">Special Deals</a></li>
            <li><a href="member-index.php">My Account</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
        </ul>
    </div>
    <div id="header">
        <div id="logo"><a href="index.php" class="blockLink"></a></div>
        <div id="company_name"><?php echo APP_NAME ?> Restaurant</div>
    </div>
    <div id="center">
        <h1>Billing Address</h1>
        <hr>
        <p>We have found out that you don't have a billing address in your account. Please add a billing address in the
            form below. It is the same address that will be used to deliver your food orders. Please note that ONLY
            correct street/physical addresses should be used in order to ensure smooth delivery of your food orders. For
            more information <a href="contactus.php">Click Here</a> to contact us.</p>
        <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
            <form id="billingForm" name="billingForm" method="post"
                  action="billing-exec.php?id=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>"
                  onsubmit="return billingValidate(this)">
                <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
                    <CAPTION><h3>ADD DELIVERY/BILLING ADDRESS</h3></CAPTION>
                    <tr>
                        <td colspan="2" style="text-align:center;"> Required fields</td>
                    </tr>
                    <tr>
                        <th>Street Address</th>
                        <td> <input name="sAddress" type="text" class="textfield"
                                    id="sAddress"/></td>
                    </tr>
                    <tr>
                        <th>P.O. Box No</th>
                        <td> <input name="box" type="text" class="textfield" id="box"/>
                        </td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td> <input name="city" type="text" class="textfield" id="city"/>
                        </td>
                    </tr>
                    <tr>
                        <th width="124">Mobile No</th>
                        <td width="168"><input name="mNumber" type="text" class="textfield" id="mNumber"/></td>
                    </tr>
                    <tr>
                        <th>Landline No</th>
                        <td>&nbsp;&nbsp;&nbsp;<input name="lNumber" type="text" class="textfield" id="lNumber"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="Submit" value="Add"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</div>
</body>
</html>
