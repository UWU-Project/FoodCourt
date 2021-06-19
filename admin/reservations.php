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
        $tables=mysqli_query($conn,"SELECT customer.firstname, customer.lastname, reservations_details.ReservationID, reservations_details.table_id, reservations_details.Reserve_Date, reservations_details.Reserve_Time, tables.table_id, tables.table_name FROM customer, reservations_details, tables WHERE customer.customer_id = reservations_details.customer_id AND tables.table_id=reservations_details.table_id")
        or die("There are no records to display ... \n" . mysqli_error());
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reservations</title>
        <link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div id="page">
            <div id="header">
                <h1>Reservations Management </h1>
                <a href="index.php">Home</a> | <a href="categories.php">Categories</a> | <a href="foods.php">Foods</a> | <a href="accounts.php">Accounts</a> | <a href="orders.php">Orders</a> | <a href="reservations.php">Reservations</a> | <a href="specials.php">Specials</a> | <a href="allocation.php">Staff</a> | <a href="options.php">Options</a> | <a href="logout.php">Logout</a>
            </div>
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
