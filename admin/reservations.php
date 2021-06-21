<?php
    require_once('authenticate/auth.php');
?>
    <?php
        //checking connection and connecting to a database
        require_once('connect/config.php');
        //Connect to mysqli server
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
        if(!$conn) {
            die('Failed to connect to server: ' . mysqli_error());
        }


        //selecting all records from the reservations_details table based on table ids. Return an error if there are no records in the table
        $tables=mysqli_query($conn,"SELECT customers.firstname, customers.lastname, reservations_details.ReservationID, reservations_details.table_id, reservations_details.Reserve_Date, reservations_details.Reserve_Time, tables.table_id, tables.table_name FROM customers, reservations_details, tables WHERE customers.member_id = reservations_details.member_id AND tables.table_id=reservations_details.table_id")
        or die("There are no records to display ... \n" . mysqli_error());


    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations</title>
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
            <h1>Reservations Management</h1>
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
                <li><a href="profile.php">Profile</a></li>
                <li><a href="foods-menu.php">Foods</a></li>
                <li><a href="accounts.php">Accounts</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li class="active"><a href="reservations.php">Reservations</a></li>
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
        <table border="0" width="900" align="center">
            <CAPTION><h3>TABLES RESERVED</h3></CAPTION>
            <tr>
                <th>Reservation ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Table Name</th>
                <th>Reserved Date</th>
                <th>Reserved Time</th>
                <th>Action(s)</th>
            </tr>

            <?php
            //loop through all table rows
            while ($row=mysqli_fetch_array($tables)){
                echo "<tr>";
                echo "<td>" . $row['ReservationID']."</td>";
                echo "<td>" . $row['firstname']."</td>";
                echo "<td>" . $row['lastname']."</td>";
                echo "<td>" . $row['table_name']."</td>";
                echo "<td>" . $row['Reserve_Date']."</td>";
                echo "<td>" . $row['Reserve_Time']."</td>";
                echo '<td><a href="delete-reservation.php?id=' . $row['ReservationID'] . '">Delete Reservation</a></td>';
                echo "</tr>";
            }
            mysqli_free_result($tables);
            mysqli_close($conn);
            ?>

        </table>
        <hr>
    </div>
    <?php
    include 'footer.php';
    ?>
</div>
</body>
</html>