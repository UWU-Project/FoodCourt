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

        //retrive categories from the categories table
        $result=mysqli_query($conn,"SELECT * FROM food_categories")
        or die("There are no records to display ... \n" . mysqli_error());
    ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Categories</title>
        <link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
        <script language="JavaScript" src="validation/admin.js">
        </script>
    </head>
    <body>
    <div id="page">
        <div id="header">
            <h1>Categories Management</h1>
            <a href="index.php">Home</a> | <a href="categories.php">Categories</a> | <a href="foods.php">Foods</a> | <a href="accounts.php">Accounts</a> | <a href="orders.php">Orders</a> | <a href="reservations.php">Reservations</a> | <a href="specials.php">Promotions</a> | <a href="allocation.php">Staff</a> | <a href="options.php">Options</a> | <a href="logout.php">Logout</a>
        </div>
        <div id="container">
            <table width="320" align="center">
                <CAPTION><h3>ADD A NEW CATEGORY</h3></CAPTION>
                <form name="categoryForm" id="categoryForm" action="categories-exec.php" method="post" onsubmit="return categoriesValidate(this)">
                    <tr>
                        <th>Name</th>
                        <th>Action(s)</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="name" class="textfield" /></td>
                        <td><input type="submit" name="Submit" value="Add" /></td>
                    </tr>
                </form>
            </table>
            <hr>
            <table width="320" align="center">
                <CAPTION><h3>AVAILABLE CATEGORIES</h3></CAPTION>
                <tr>
                    <th>Category Name</th>
                    <th>Action(s)</th>
                </tr>
                <?php
                //loop through all table rows
                while ($row=mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row['category_name']."</td>";
                    echo '<td><a href="delete-category.php?id=' . $row['category_id'] . '">Remove Category</a></td>';
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

