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


        //retrive categories from the categories table
        $categories=mysqli_query($conn,"SELECT * FROM categories")
        or die("There are no records to display ... \n" . mysqli_error());

        //retrieve quantities from the quantities table
        $quantities=mysqli_query($conn,"SELECT * FROM quantities")
        or die("Something is wrong ... \n" . mysqli_error());

        //retrieve currencies from the currencies table (deleting)
        $currencies=mysqli_query($conn,"SELECT * FROM currencies")
        or die("Something is wrong ... \n" . mysqli_error());

        //retrieve currencies from the currencies table (updating)
        $currencies_1=mysqli_query($conn,"SELECT * FROM currencies")
        or die("Something is wrong ... \n" . mysqli_error());

        //retrieve polls from the ratings table
        $ratings=mysqli_query($conn,"SELECT * FROM ratings")
        or die("Something is wrong ... \n" . mysqli_error());

        //retrieve timezones from the timezones table (deleting)
        $timezones=mysqli_query($conn,"SELECT * FROM timezones")
        or die("Something is wrong ... \n" . mysqli_error());

        //retrieve timezones from the timezones table (updating)
        $timezones_1=mysqli_query($conn,"SELECT * FROM timezones")
        or die("Something is wrong ... \n" . mysqli_error());

        //retrieve tables from the tables table
        $tables=mysqli_query($conn,"SELECT * FROM tables")
        or die("Something is wrong ... \n" . mysqli_error());



        //retrieve questions from the questions table
        $questions=mysqli_query($conn,"SELECT * FROM questions")
        or die("Something is wrong ... \n" . mysqli_error());
    ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Options</title>
    <link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="validation/admin.js">
    </script>
</head>
<body>
<div id="page">
    <div id="header">
        <h1>Options </h1>
        <a href="index.php">Home</a> | <a href="categories.php">Categories</a> | <a href="foods.php">Foods</a> | <a href="accounts.php">Accounts</a> | <a href="orders.php">Orders</a> | <a href="reservations.php">Reservations</a> | <a href="specials.php">Specials</a> | <a href="allocation.php">Staff</a> | <a href="options.php">Options</a> | <a href="logout.php">Logout</a>
    </div>

    <div id="container">
        <table align="center" width="910">
            <CAPTION><h3>MANAGE CATEGORIES</h3></CAPTION>
            <tr>
                <form name="categoryForm" id="categoryForm" action="categories-exec.php" method="post" onsubmit="return categoriesValidate(this)">
                    <td>
                        <table width="250" border="0" cellpadding="2" cellspacing="0" align="center">
                            <tr>
                                <td>Category</td>
                                <td><input type="text" name="name" class="textfield" /></td>
                                <td><input type="submit" name="Insert" value="Add" /></td>
                            </tr>
                        </table>
                    </td>
                </form>
                <td>
                    <form name="categoryForm" id="categoryForm" action="delete-category.php" method="post" onsubmit="return categoriesValidate(this)">
                        <table width="250" border="0" align="center" cellpadding="2" cellspacing="0">
                            <tr>
                                <td>Category</td>
                                <td><select name="category" id="category">
                                        <option value="select">- select category -
                                            <?php
                                            //loop through categories table rows
                                            while ($row=mysqli_fetch_array($categories)){
                                                echo "<option value=$row[category_id]>$row[category_name]";
                                            }
                                            ?>
                                    </select></td>
                                <td><input type="submit" name="Delete" value="Remove" /></td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
        //Manage Quantities
        <hr>
        <table align="center" width="910">
            <CAPTION><h3>MANAGE QUANTITIES</h3></CAPTION>
            <tr>
                <form name="quantityForm" id="quantityForm" action="quantities-exec.php" method="post" onsubmit="return quantitiesValidate(this)">
                    <td>
                        <table width="250" border="0" cellpadding="2" cellspacing="0" align="center">
                            <tr>
                                <td>Quantity</td>
                                <td><input type="text" name="name" class="textfield" /></td>
                                <td><input type="submit" name="Insert" value="Add" /></td>
                            </tr>
                        </table>
                    </td>
                </form>
                <td>
                    <form name="quantityForm" id="quantityForm" action="delete-quantity.php" method="post" onsubmit="return quantitiesValidate(this)">
                        <table width="250" border="0" align="center" cellpadding="2" cellspacing="0">
                            <tr>
                                <td>Quantity</td>
                                <td><select name="quantity" id="quantity">
                                        <option value="select">- select quantity -
                                            <?php
                                            //loop through quantities table rows
                                            while ($row=mysqli_fetch_array($quantities)){
                                                echo "<option value=$row[quantity_id]>$row[quantity_value]";
                                            }
                                            ?>
                                    </select></td>
                                <td><input type="submit" name="Delete" value="Remove" /></td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
        //Manage Currencies
        <p>&nbsp;</p>
        <hr>
        <table align="center" width="910">
            <CAPTION><h3>MANAGE CURRENCIES</h3></CAPTION>
            <tr>
                <td>
                    <form name="currencyForm" id="currencyForm" action="currencies-exec.php" method="post" onsubmit="return currenciesValidate(this)">
                        <table width="250" border="0" cellpadding="2" cellspacing="0" align="center">
                            <tr>
                                <td>Currency/Symbol</td>
                                <td><input type="text" name="name" class="textfield" /></td>
                                <td><input type="submit" name="Insert" value="Add" /></td>
                            </tr>
                        </table>
                    </form>
                </td>
                <td>
                    <form name="currencyForm" id="currencyForm" action="delete-currency.php" method="post" onsubmit="return currenciesValidate(this)">
                        <table width="250" border="0" align="center" cellpadding="2" cellspacing="0">
                            <tr>
                                <td>Currency/Symbol</td>
                                <td><select name="currency" id="currency">
                                        <option value="select">- select currency -
                                            <?php
                                            //loop through currencies table rows
                                            while ($row=mysqli_fetch_array($currencies)){
                                                echo "<option value=$row[currency_id]>$row[currency_symbol]";
                                            }
                                            ?>
                                    </select></td>
                                <td><input type="submit" name="Delete" value="Remove" /></td>
                            </tr>
                        </table>
                    </form>
                </td>
                <td>
                    <form name="currencyForm" id="currencyForm" action="activate-currency.php" method="post" onsubmit="return currenciesValidate(this)">
                        <table width="250" border="0" align="center" cellpadding="2" cellspacing="0">
                            <tr>
                                <td>Currency/Symbol</td>
                                <td><select name="currency" id="currency">
                                        <option value="select">- select a currency -
                                            <?php
                                            //loop through currencies table rows
                                            while ($row=mysqli_fetch_array($currencies_1)){
                                                echo "<option value=$row[currency_id]>$row[currency_symbol]";
                                            }
                                            ?>
                                    </select></td>
                                <td><input type="submit" name="Update" value="Activate" /></td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
        //endof currency no need delete
        //manage  ratings
        <hr>
        <table align="center" width="910">
            <CAPTION><h3>MANAGE RATINGS</h3></CAPTION>
            <tr>
                <form name="ratingForm" id="ratingForm" action="ratings-exec.php" method="post" onsubmit="return ratingsValidate(this)">
                    <td>
                        <table width="300" border="0" cellpadding="2" cellspacing="0" align="center">
                            <tr>
                                <td>Rate Level</td>
                                <td><input type="text" name="name" id="name" class="textfield" /></td>
                                <td><input type="submit" name="Insert" value="Add" /></td>
                            </tr>
                        </table>
                    </td>
                </form>
                <td>
                    <form name="ratingForm" id="ratingForm" action="delete-rating.php" method="post" onsubmit="return ratingsValidate(this)">
                        <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
                            <tr>
                                <td>Rate Level</td>
                                <td><select name="rating" id="rating">
                                        <option value="select">- select level -
                                            <?php
                                            //loop through ratings table rows
                                            while ($row=mysqli_fetch_array($ratings)){
                                                echo "<option value=$row[rate_id]>$row[rate_name]";
                                            }
                                            ?>
                                    </select></td>
                                <td><input type="submit" name="Delete" value="Remove" /></td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <hr>
        <table align="center" width="910">
            <CAPTION><h3>MANAGE TIMEZONES</h3></CAPTION>
            <tr>
                <td>
                    <form name="timezoneForm" id="timezoneForm" action="timezone-exec.php" method="post" onsubmit="return timezonesValidate(this)">
                        <table width="250" border="0" cellpadding="2" cellspacing="0" align="center">
                            <tr>
                                <td>Timezone</td>
                                <td><input type="text" name="name" class="textfield" /></td>
                                <td><input type="submit" name="Insert" value="Add" /></td>
                            </tr>
                        </table>
                    </form>
                </td>
                <td>
                    <form name="timezoneForm" id="timezoneForm" action="delete-timezone.php" method="post" onsubmit="return timezonesValidate(this)">
                        <table width="250" border="0" align="center" cellpadding="2" cellspacing="0">
                            <tr>
                                <td>Timezone</td>
                                <td><select name="timezone" id="timezone">
                                        <option value="select">- select timezone -
                                            <?php
                                            //loop through timezones table rows
                                            while ($row=mysqli_fetch_array($timezones)){
                                                echo "<option value=$row[timezone_id]>$row[timezone_reference]";
                                            }
                                            ?>
                                    </select></td>
                                <td><input type="submit" name="Delete" value="Remove" /></td>
                            </tr>
                        </table>
                    </form>
                </td>
                <td>
                    <form name="timezoneForm" id="timezoneForm" action="activate-timezone.php" method="post" onsubmit="return timezonesValidate(this)">
                        <table width="250" border="0" align="center" cellpadding="2" cellspacing="0">
                            <tr>
                                <td>Timezone</td>
                                <td><select name="timezone" id="timezone">
                                        <option value="select">- select timezone -
                                            <?php
                                            //loop through timezones table rows
                                            while ($row=mysqli_fetch_array($timezones_1)){
                                                echo "<option value=$row[timezone_id]>$row[timezone_reference]";
                                            }
                                            ?>
                                    </select></td>
                                <td><input type="submit" name="Update" value="Activate" /></td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <hr>
        <table align="center" width="910">
            <CAPTION><h3>MANAGE TABLES</h3></CAPTION>
            <tr>
                <form name="tableForm" id="tableForm" action="tables-exec.php" method="post" onsubmit="return tablesValidate(this)">
                    <td>
                        <table width="350" border="0" cellpadding="2" cellspacing="0" align="center">
                            <tr>
                                <td>Table Name/Number</td>
                                <td><input type="text" name="name" class="textfield" /></td>
                                <td><input type="submit" name="Insert" value="Add" /></td>
                            </tr>
                        </table>
                    </td>
                </form>
                <td>
                    <form name="tableForm" id="tableForm" action="delete-table.php" method="post" onsubmit="return tablesValidate(this)">
                        <table width="350" border="0" align="center" cellpadding="2" cellspacing="0">
                            <tr>
                                <td>Table Name/Number</td>
                                <td><select name="table" id="table">
                                        <option value="select">- select table -
                                            <?php
                                            //loop through tables table rows
                                            while ($row=mysqli_fetch_array($tables)){
                                                echo "<option value=$row[table_id]>$row[table_name]";
                                            }
                                            ?>
                                    </select></td>
                                <td><input type="submit" name="Delete" value="Remove" /></td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>

        <hr>
        <table align="center" width="910">
            <CAPTION><h3>MANAGE QUESTIONS</h3></CAPTION>
            <tr>
                <form name="questionForm" id="questionForm" action="questions-exec.php" method="post" onsubmit="return questionsValidate(this)">
                    <td>
                        <table width="300" border="0" cellpadding="2" cellspacing="0" align="center">
                            <tr>
                                <td>Question</td>
                                <td><input type="text" name="name" class="textfield" /></td>
                                <td><input type="submit" name="Insert" value="Add" /></td>
                            </tr>
                        </table>
                    </td>
                </form>
                <td>
                    <form name="questionForm" id="questionForm" action="delete-question.php" method="post" onsubmit="return questionsValidate(this)">
                        <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
                            <tr>
                                <td>Question</td>
                                <td><select name="question" id="question">
                                        <option value="select">- select question -
                                            <?php
                                            //loop through quantities table rows
                                            while ($row=mysqli_fetch_array($questions)){
                                                echo "<option value=$row[question_id]>$row[question_text]";
                                            }
                                            ?>
                                    </select></td>
                                <td><input type="submit" name="Delete" value="Remove" /></td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <hr>
    </div>
    <?php
    include 'footer.php';
    ?>
</div>
</body>
</html>