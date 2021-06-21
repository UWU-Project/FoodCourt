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


        //retrive promotions from the specials table
        $result=mysqli_query($conn,"SELECT * FROM specials")
        or die("There are no records to display ... \n" . mysqli_error());
        ?>

        <?php
        //retrive a currency from the currencies table
        //define a default value for flag_1
        $flag_1 = 1;
        $currencies=mysqli_query($conn,"SELECT * FROM currencies WHERE flag='$flag_1'")
        or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
    ?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotions</title>
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
                <h1>Promotions Management</h1>
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
                    <li><a href="reservations.php">Reservations</a></li>
                    <li class="active"><a href="specials.php">Promotions</a></li>
                    <li><a href="allocation.php">Staff</a></li>
                    <li><a href="options.php">Options</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>	<!-- /.navbar-collapse -->
        </div>	<!-- /.container-fluid -->
    </nav>	<!-- End of /.nav -->



    <div id="page">

        <div id="container">
        <table width="850" align="center">
        <CAPTION><h3>MANAGE PROMOTIONS</h3></CAPTION>
        <form name="specialsForm" id="specialsForm" action="specials-exec.php" method="post" enctype="multipart/form-data" onsubmit="return specialsValidate(this)">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>
        <tr>
            <td><input type="text" name="name" id="name" class="textfield" /></td>
            <td><textarea name="description" id="description" class="textfield" rows="2" cols="15"></textarea></td>
            <td><input type="text" name="price" id="price" class="textfield" /></td>
            <td><input type="date" name="start_date" id="start_date" class="textfield" /></td>
            <td><input type="date" name="end_date" id="end_date" class="textfield" /></td>
            <td><input type="file" name="photo" id="photo"/></td>
            <td><input type="submit" name="Submit" value="Add" /></td>
        </tr>
        </form>
        </table>
        <hr>
        <table width="950" align="center">
        <CAPTION><h3>PROMOTIONS LIST</h3></CAPTION>
        <tr>
        <th>Promo Photo</th>
        <th>Promo Name</th>
        <th>Promo Description</th>
        <th>Promo Price</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Action(s)</th>
        </tr>

        <?php
        //loop through all table rows
        $symbol=mysqli_fetch_assoc($currencies); //gets active currency
        while ($row=mysqli_fetch_array($result)){
        echo "<tr>";
        echo '<td><img src=images/'. $row['special_photo']. ' width="80" height="70"></td>';
        echo "<td>" . $row['special_name']."</td>";
        echo "<td width='180' align='left'>" . $row['special_description']."</td>";
        echo "<td>" . $symbol['currency_symbol']. "" . $row['special_price']."</td>";
        echo "<td>" . $row['special_start_date']."</td>";
        echo "<td>" . $row['special_end_date']."</td>";
        echo '<td><a href="delete-special.php?id=' . $row['special_id'] . '">Remove Promo</a></td>';
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