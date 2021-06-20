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


//selecting all records from the members table. Return an error if there are no records in the tables
$result=mysqli_query($conn,"SELECT * FROM customers")
or die("There are no records to display ... \n" . mysqli_error());
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
    <link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="page">
    <div id="header">
        <h1>Members Management </h1>
        <a href="index.php">Home</a> | <a href="categories.php">Categories</a> | <a href="foods.php">Foods</a> | <a href="accounts.php">Accounts</a> | <a href="orders.php">Orders</a> | <a href="reservations.php">Reservations</a> | <a href="specials.php">Promotions</a> | <a href="allocation.php">Staff</a> | <a href="options.php">Options</a> | <a href="logout.php">Logout</a>
    </div>
    <div id="container">
        <table border="0" width="620" align="center">
            <CAPTION><h3>CUSTOMERS LIST</h3></CAPTION>
            <tr>
                <th>CUSTOMER ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>

            <?php
            //loop through all table rows
            while ($row=mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['customer_id']."</td>";
                echo "<td>" . $row['firstname']."</td>";
                echo "<td>" . $row['lastname']."</td>";
                echo "<td>" . $row['login']."</td>";
                echo '<td><a href="delete-member.php?id=' . $row['customer_id'] . '">Remove Member</a></td>';
                echo "</tr>";
            }
            mysqli_free_result($result);
            mysqli_close($conn);
            ?>
        </table>
        <hr>
    </div>
    <?php include 'footer.php'; ?>
</div>
</body>
</html>
