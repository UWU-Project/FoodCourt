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


        //selecting all records from almost all tables. Return an error if there are no records in the tables
        $result=mysqli_query($conn,"SELECT * FROM orders_details o inner join cart_details c on c.cart_id = o.cart_id inner join quantities q on q.quantity_id = c.quantity_id inner join customers m on m.member_id = c.member_id inner join billing_details b on b.billing_id = o.billing_id ") or die("There are no records to display ... \n" . mysqli_error());
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
            <table border="0" width="970" align="center">
            <CAPTION><h3>ORDERS LIST</h3></CAPTION>
            <tr>
            <th>Order ID</th>
            <th>Customer Names</th>
            <th>Food Name</th>
            <th>Food Price</th>
            <th>Quantity</th>
            <th>Total Cost</th>
            <th>Delivery Date</th>
            <th>Delivery Address</th>
            <th>Mobile No</th>
            <th>Actions(s)</th>
            </tr>

            <?php
            //loop through all tables rows
            while ($row=mysqli_fetch_assoc($result)){
                $lt = $row['lt'];
              if($lt =='food'){
                $qry = "SELECT * FROM food_details f inner join categories c on c.category_id = f.food_category where food_id = {$row['food_id']}";
              }else{
                $qry = "SELECT * FROM specials where special_id = {$row['food_id']}";
              }
              // echo $qry.'\n';
              $res = mysqli_fetch_array(mysqli_query($conn,$qry));
            echo "<tr>";
            echo "<td>" . $row['order_id']."</td>";
            echo "<td>" . $row['firstname']."\t".$row['lastname']."</td>";
            echo "<td>" . $res[$lt.'_name']."</td>";
            echo "<td>" . $res[$lt.'_price']."</td>";
            echo "<td>" . $row['quantity_value']."</td>";
            echo "<td>" . $row['total']."</td>";
            echo "<td>" . $row['delivery_date']."</td>";
            echo "<td>" . $row['Street_Address']."</td>";
            echo "<td>" . $row['Mobile_No']."</td>";
            echo '<td><a href="delete-order.php?id=' . $row['order_id'] . '">Remove Order</a></td>';
            echo "</tr>";
            }
            mysqli_free_result($result);
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