




<?php
//checking connection and connecting to a database
require_once('connect/config.php');

//Connect to mysqli server
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
	if(!$conn) {
		die('Failed to connect to server: ' . mysqli_error());
	}
?>




        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Index</title>
        <link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />

        <script language="JavaScript" src="validation/admin.js">
        </script>
        </head>
        <body>
        <div id="page">
        <div id="header">
        <h1>Administrator Control Panel</h1>
        <a href="profile.php">Profile</a> | <a href="categories.php">Categories</a> | <a href="foods.php">Foods</a> | <a href="accounts.php">Accounts</a> | <a href="orders.php">Orders</a> | <a href="reservations.php">Reservations</a> | <a href="specials.php">Specials</a> | <a href="allocation.php">Staff</a> | <a href="options.php">Options</a> | <a href="logout.php">Logout</a>
        </div>
        <div id="container">
        <table width="1000" align="center" style="text-align:center">
        <CAPTION><h3>CURRENT STATUS</h3></CAPTION>
        <tr>
            <th>Members Registered</th>
            <th>Orders Placed</th>
            <th>Orders Processed</th>
            <th>Orders Pending</th>
            <th>Table(s) Reserved</th>
            <th>Table(s) Allocated</th>
            <th>Table(s) Pending</th>
        </tr>




        </table>
            <hr>
            <form name="foodStatusForm" id="foodStatusForm" method="post" action="index.php" onsubmit="return statusValidate(this)">
                <table width="360" align="center">
                    <CAPTION><h3>CUSTOMERS' RATINGS (100%)</h3></CAPTION>
                    <tr>
                        <td>Food</td>
                        <td width="168"><select name="food" id="food">
                                <option value="select">- select food -




                            </select></td>
                        <td><input type="submit" name="Submit" value="Show Ratings" /></td>
                    </tr>
                </table>
            </form>
            <table width="900" align="center">
                <tr>
                    <th></th>
                    <th>Excellent</th>
                    <th>Good</th>
                    <th>Average</th>
                    <th>Bad</th>
                    <th>Worse</th>
                </tr>


            </table>
            <hr>
        </div>
            <?php include 'footer.php'; ?>
        </div>
        </body>
</html>

