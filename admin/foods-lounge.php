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

    //Select database

    //retrive promotions from the specials table
    $result=mysqli_query($conn,"SELECT * FROM food_details_lounge,food_categories_lounge WHERE food_details_lounge.food_category=food_categories_lounge.category_id")
    or die("There are no records to display ... \n" . mysqli_error());
    ?>

<?php
//retrive categories from the categories table
$categories=mysqli_query($conn,"SELECT * FROM food_categories_lounge")
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
    <title>Foods</title>
    <link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="validation/admin.js">
    </script>
</head>
<body>
<div id="page">
    <div id="header">
        <h1>Foods Management </h1>
        <a href="index.php">Home</a> | <a href="foods-menu.php">Foods</a> | <a href="accounts.php">Accounts</a> | <a href="orders.php">Orders</a> | <a href="reservations.php">Reservations</a> | <a href="specials.php">Promotions</a> | <a href="allocation.php">Staff</a> | <a href="options.php">Options</a> | <a href="logout.php">Logout</a>
    </div>
    <div id="container">
        <table width="760" align="center">
            <CAPTION><h3>ADD A NEW FOOD</h3></CAPTION>
            <form name="foodsForm" id="foodsForm" action="foods-lounge-exec.php" method="post" enctype="multipart/form-data" onsubmit="return foodsValidate(this)">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Photo</th>
                    <th>Action(s)</th>
                </tr>
                <tr>
                    <td><input type="text" name="name" id="name" class="textfield" /></td>
                    <td><textarea name="description" id="description" class="textfield" rows="2" cols="15"></textarea></td>
                    <td><input type="text" name="price" id="price" class="textfield" /></td>
                    <td width="168"><select name="category" id="category">
                            <option value="select">- select one option -
                                <?php
                                //loop through categories table rows
                                while ($row=mysqli_fetch_array($categories)){
                                    echo "<option value=$row[category_id]>$row[category_name]";
                                }
                                ?>
                        </select></td>
                    <td><input type="file" name="photo" id="photo"/></td>
                    <td><input type="submit" name="Submit" value="Add" /></td>
                </tr>
            </form>
        </table>
        <hr>
        <table width="950" align="center">
            <CAPTION><h3>AVAILABLE FOODS</h3></CAPTION>
            <tr>
                <th>Food Photo</th>
                <th>Food Name</th>
                <th>Food Description</th>
                <th>Food Price</th>
                <th>Food Category</th>
                <th>Action(s)</th>
            </tr>


            <?php
            //loop through all table rows
            $symbol=mysqli_fetch_assoc($currencies); //gets active currency
            while ($row=mysqli_fetch_array($result)){
                echo "<tr>";
                echo '<td><img src=images/'. $row['food_photo']. ' width="80" height="70"></td>';
                echo "<td>" . $row['food_name']."</td>";
                echo "<td>" . $row['food_description']."</td>";
                echo "<td>" . $symbol['currency_symbol']. "" . $row['food_price']."</td>";
                echo "<td>" . $row['category_name']."</td>";
                echo '<td><a href="delete-food-lounge.php?id=' . $row['food_id'] . '">Remove Food</a></td>';
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

