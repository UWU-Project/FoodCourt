<?php
    require_once('authenticate/auth.php');
?>

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
    <link rel="icon" type="image/png" href="images/logo.png">
    <title>Admin Index</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script language="JavaScript" src="validation/admin.js"></script>
    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>
<body class="g-sidenav-show  bg-gray-100">
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">

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
            <h1>Administrator Control Panel</h1>
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
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
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
</aside>
<div id="page">
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

