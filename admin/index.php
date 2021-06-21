<?php
//checking connection and connecting to a database
require_once('connect/config.php');

//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}


//define default value for flag
$flag_1 = 1;

//count the number of records in the members, orders_details, and reservations_details tables
$members = mysqli_query($conn, "SELECT * FROM customers")
or die("There are no records to count ... \n" . mysqli_error());

$orders_placed = mysqli_query($conn, "SELECT * FROM orders_details")
or die("There are no records to count ... \n" . mysqli_error());

$orders_processed = mysqli_query($conn, "SELECT * FROM orders_details WHERE flag='$flag_1'")
or die("There are no records to count ... \n" . mysqli_error());

$tables_reserved = mysqli_query($conn, "SELECT * FROM reservations_details WHERE table_flag='$flag_1'")
or die("There are no records to count ... \n" . mysqli_error());


$tables_allocated = mysqli_query($conn, "SELECT * FROM reservations_details WHERE flag='$flag_1' AND table_flag='$flag_1'")
or die("There are no records to count ... \n" . mysqli_error());

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Index</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script language="JavaScript" src="validation/admin.js"></script>
    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>

</head>
<body>
<section id="topic-header">
    <div class="container">
        <div class="row">
            <h1>Administrator Control Panel</h1>
        </div>
    </div>
</section>

<div id="page">
    <div class="container">
        <div class="row">
            <div>
                <a href="profile.php">Profile</a> | <a href="foods-menu.php">Foods</a> | <a
                        href="accounts.php">Accounts</a> |
                <a href="orders.php">Orders</a> | <a href="reservations.php">Reservations</a> | <a href="specials.php">Promotions</a>
                | <a href="allocation.php">Staff</a> | <a href="options.php">Options</a> | <a
                        href="logout.php">Logout</a>
            </div>
        </div>
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
            <?php
            $result1 = mysqli_num_rows($members);
            $result2 = mysqli_num_rows($orders_placed);
            $result3 = mysqli_num_rows($orders_processed);
            $result4 = $result2 - $result3; //gets pending order(s)
            $result5 = mysqli_num_rows($tables_reserved);
            $result6 = mysqli_num_rows($tables_allocated);
            $result7 = $result5 - $result6; //gets pending table(s)

            echo "<tr align=>";
            echo "<td>" . $result1 . "</td>";
            echo "<td>" . $result2 . "</td>";
            echo "<td>" . $result3 . "</td>";
            echo "<td>" . $result4 . "</td>";
            echo "<td>" . $result5 . "</td>";
            echo "<td>" . $result6 . "</td>";
            echo "<td>" . $result7 . "</td>";

            echo "</tr>";
            ?>
        </table>
        <hr>
        <form name="foodStatusForm" id="foodStatusForm" method="post" action="index.php"
              onsubmit="return statusValidate(this)">
            <table width="360" align="center">
                <CAPTION><h3>CUSTOMERS' RATINGS (100%)</h3></CAPTION>
                <tr>
                    <td>Food</td>
                    <td width="168"><select name="food" id="food">
                            <option value="select">- select food -

                        </select></td>
                    <td><input type="submit" name="Submit" value="Show Ratings"/></td>
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

