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
        $tables=mysqli_query($conn,"SELECT customers.member_id, customers.firstname, customers.email, customers.lastname, reservations_details.ReservationID,reservations_details.table_id, reservations_details.Reserve_Date, reservations_details.Reserve_Time, billing_details.Mobile_No, billing_details.Landline_No  FROM (( reservations_details INNER JOIN customers ON reservations_details.member_id=customers.member_id)INNER JOIN billing_details ON reservations_details.member_id=billing_details.member_id)")
        or die("There are no records to display ... \n" . mysqli_error());
    echo("Error description: " . mysqli_error($conn));

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
                <th>Customer's ID</th>
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
                ?>
                <td>
                    <button class="btn btn-info btn-sm rounded-0" type="button" data-toggle="modal" data-target="#<?php echo $row['member_id']; ?>" data-placement="top">
                        <?php echo $row['member_id']; ?>
                    </button>

                    <!-- Client Modal -->

                    <div class="modal fade" id="<?php echo $row['member_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Client Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        <li><span style="font-weight: bold;">Full name: </span> <?php echo $row['firstname']; ?></li>
                                        <li><span style="font-weight: bold;">Phone number: </span><?php echo $row['lastname']; ?></li>
                                        <li><span style="font-weight: bold;">E-mail: </span><?php echo $row['email']; ?></li>
                                    </ul>
                                    <ul>
                                        <li><span style="font-weight: bold;">Mobile Number: </span> <?php echo $row['Mobile_No']; ?></li>
                                        <li><span style="font-weight: bold;">Landline number: </span><?php echo $row['Landline_No']; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <?php
                echo "<td>" . $row['table_id']."</td>";
                echo "<td>" . $row['Reserve_Date']."</td>";
                echo "<td>" . $row['Reserve_Time']."</td>";
                echo '<td><a href="delete-reservation.php?id=' . $row['ReservationID'] . '">Delete Reservation</a></td>';
                ?>
            <?php
            echo "</td>";

            echo "<td>";

            $cancel_data = "cancel_order".$row["ReservationID"];
            $deliver_data = "deliver_order".$row["ReservationID"];
            ?>
            <ul class="list-inline m-0">

                <!-- Deliver Order BUTTON -->

                <li class="list-inline-item" data-toggle="tooltip" title="Deliver Order">
                    <button class="btn btn-info btn-sm rounded-0" type="button" data-toggle="modal" data-target="#<?php echo $deliver_data; ?>" data-placement="top">
                        <i class="fas fa-truck"></i>
                    </button>

                    <!-- DELIVER MODAL -->
                    <div class="modal fade" id="<?php echo $deliver_data; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $deliver_data; ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Deliver Order</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Mark order as delivered?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" data-id = "<?php echo $row["ReservationID"]; ?>" class="btn btn-info deliver_order_button">
                                        Yes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </li>

                <!-- CANCEL BUTTON -->

                <li class="list-inline-item" data-toggle="tooltip" title="Cancel Order">
                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="modal" data-target="#<?php echo $cancel_data; ?>" data-placement="top">
                        <i class="fas fa-calendar-times"></i>
                    </button>

                    <!-- CANCEL MODAL -->
                    <div class="modal fade" id="<?php echo $cancel_data; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $cancel_data; ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Cancel Order</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Cancellation Reason</label>
                                        <textarea class="form-control" id="cancellation_reason_order_<?php echo $row["ReservationID"] ?>" required="required"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    <button type="button" data-id = "<?php echo $row["ReservationID"]; ?>" class="btn btn-danger cancel_order_button">
                                        Cancel Order
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </li>
            </ul>
            <?php
            echo "</td>";

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