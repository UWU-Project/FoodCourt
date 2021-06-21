<?php
require_once('authenticate/auth.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foods</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script language="JavaScript" src="validation/admin.js"></script>
    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>

</head>
<body>
<section id="topic-header">
    <div class="container">
        <div class="row">
            <h1>Foods Management </h1>
        </div>
    </div>
</section>

<div id="page">
    <div class="container">
        <div class="row">
            <div>
                <a href="index.php">Home</a> | <a href="foods-menu.php">Foods</a> | <a href="accounts.php">Accounts</a> | <a href="orders.php">Orders</a> | <a href="reservations.php">Reservations</a> | <a href="specials.php">Promotions</a> | <a href="allocation.php">Staff</a> | <a href="options.php">Options</a> | <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>

    <div id="container">

        <table width="760" align="center">

            <CAPTION><h3>SELECT RESTAURANT</h3></CAPTION>
        </table>
        <hr>

        <table width="950" align="center">

            <tr>
                <th><h3>PASTRY SHOP</h3>
                    <h3><a href="categories.php"><button type="button" class="btn btn-primary btn-lg btn-block">ADD CATEGORY</button></a></h3>
                    <h3><a href="foods.php"><button type="button" class="btn btn-primary btn-lg btn-block">ADD FOODS</button></a></h3></th>

                <th><h3>THE LOUNGE</h3>
                    <h3><a href="categories-lounge.php"><button type="button" class="btn btn-primary btn-lg btn-block">ADD CATEGORY</button></a></h3>
                    <h3><a href="foods-lounge.php"><button type="button" class="btn btn-primary btn-lg btn-block">ADD FOODS</button></a></h3></th>
            </tr>


        </table>
        <hr>
    </div>
    <?php
    include 'footer.php';
    ?>
</div>
</body>
</html>
