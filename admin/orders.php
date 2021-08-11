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



    ?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
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
                <h1>Orders Management</h1>
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
                    <li class="active"><a href="orders.php">Orders</a></li>
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
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Food ID</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Delivered</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $result2 = mysqli_query($conn, "SELECT * FROM orders_paid")
                or die("A problem has occured 2... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
                while ($row = mysqli_fetch_assoc($result2)) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['ID']?></th>
                        <td><?php echo $row['date']?></td>
                        <td><?php echo $row['member_id']?></td>

                        <td><?php
                                   $idss = explode(",", $row['food_id']);
                                   foreach ($idss as $row2) {
                                       echo $row2."<br>";
                                   }
                            ?></td>

                        <td><?php
                             $idss2 = explode(",", $row['quantity']);
                                   foreach ($idss2 as $row3) {
                                       echo $row3."<br>";
                                   }
                            ?></td>

                        <td><?php echo $row['total']?></td>

                        <td>
                            <?php
                            if ($row['delivered'] !== '0') {
                                echo '<span class="badge bg-gradient-success">'.'confirmed'.'</span>';
                            }else{
                                echo '<span class="badge bg-gradient-warning">'.'processing'.'</span>';
                            }
                            ?>
                        </td>

                    </tr>


                <?php } ?>
                </tbody>
            </table>
            <hr>
            </div>

            <?php
                include 'footer.php';
            ?>
            </div>
        </body>
</html>