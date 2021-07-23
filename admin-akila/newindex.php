<?php
require_once('authenticate/auth.php');
?>

<?php
//checking connection and connecting to a database
require_once('connect/config.php');

//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}


//define default value for flag
$flag_1 = 1;

//count the number of records in the members, orders_details, and reservations_details tables
$members = mysqli_query($conn, "SELECT * FROM customers")
or die("There are no records to count ... \n" . mysqli_error());

$orders_placed = mysqli_query($conn, "SELECT * FROM orders_details")
or die("There are no records to count ... \n" . mysqli_error());

$orders_processed = mysqli_query($conn, "SELECT * FROM orders_details WHERE flag='$flag_1'")
or die("There are no records to count ... \n" . mysqli_error());

$tables_reserved = mysqli_query($conn, "SELECT * FROM reservations_details WHERE table_flag='$flag_1'")
or die("There are no records to count ... \n" . mysqli_error());


$tables_allocated = mysqli_query($conn, "SELECT * FROM reservations_details WHERE flag='$flag_1' AND table_flag='$flag_1'")
or die("There are no records to count ... \n" . mysqli_error());

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Responsive Sidebar Menu  | CodingLab </title>
    <link rel="stylesheet" href="akila/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<body>
<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">Administrator Control Panel</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
        <li class="active">
            <i class='bx bx-search' ></i>
            <input type="text" placeholder="Search...">
            <span class="tooltip">Search</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name" id="demo" onclick="myFunction()">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-user' ></i>
                <span class="links_name">Profile</span>
            </a>
            <span class="tooltip">Profile</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-chat' ></i>
                <span class="links_name">Foods</span>
            </a>
            <span class="tooltip">Foods</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="links_name">Accounts</span>
            </a>
            <span class="tooltip">Accounts</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-folder' ></i>
                <span class="links_name">Orders</span>
            </a>
            <span class="tooltip">Orders</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-cart-alt' ></i>
                <span class="links_name">Reservations</span>
            </a>
            <span class="tooltip">Reservations</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-heart' ></i>
                <span class="links_name">Promotions</span>
            </a>
            <span class="tooltip">Promotions</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="links_name">Staff</span>
            </a>
            <span class="tooltip">Staff</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-folder' ></i>
                <span class="links_name">Options</span>
            </a>
            <span class="tooltip">Options</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-cog' ></i>
                <span class="links_name">Logout</span>
            </a>
            <span class="tooltip">Logout</span>
        </li>
        <li class="profile">
            <div class="profile-details">
                <img src="profile.jpg" alt="profileImg">
                <div class="name_job">
                    <div class="name">Prem Shahi</div>
                    <div class="job">Web designer</div>
                </div>
            </div>
            <i class='bx bx-log-out' id="log_out" ></i>
        </li>
    </ul>
</div>
<section class="home-section">
    <div >

        <div id="page">
            <div id="container">
                <table width="1000" align="center" style="text-align:center">
                    <CAPTION><h3>CURRENT STATUS</h3></CAPTION>
                    <tr>
                        <th>Members Registered</th>
                        <th>Orders Placed</th>
                        <th>Orders Processed</th>
                        <th>Orders Pending</th>
                        <th>Table(s) Reserved</th>
                        <th>Table(s) Allocated</th>
                        <th>Table(s) Pending</th>
                    </tr>
                    <?php
                    $result1 = mysqli_num_rows($members);
                    $result2 = mysqli_num_rows($orders_placed);
                    $result3 = mysqli_num_rows($orders_processed);
                    $result4 = $result2 - $result3; //gets pending order(s)
                    $result5 = mysqli_num_rows($tables_reserved);
                    $result6 = mysqli_num_rows($tables_allocated);
                    $result7 = $result5 - $result6; //gets pending table(s)

                    echo "<tr align=>";
                    echo "<td>" . $result1 . "</td>";
                    echo "<td>" . $result2 . "</td>";
                    echo "<td>" . $result3 . "</td>";
                    echo "<td>" . $result4 . "</td>";
                    echo "<td>" . $result5 . "</td>";
                    echo "<td>" . $result6 . "</td>";
                    echo "<td>" . $result7 . "</td>";

                    echo "</tr>";
                    ?>
                </table>
                <hr>
                <form name="foodStatusForm" id="foodStatusForm" method="post" action="index.php"
                      onsubmit="return statusValidate(this)">
                    <table width="360" align="center">
                        <CAPTION><h3>CUSTOMERS' RATINGS (100%)</h3></CAPTION>
                        <tr>
                            <td>Food</td>
                            <td width="168"><select name="food" id="food">
                                    <option value="select">- select food -

                                </select></td>
                            <td><input type="submit" name="Submit" value="Show Ratings"/></td>
                        </tr>
                    </table>
                </form>
                <table width="900" align="center">
                    <tr>
                        <th></th>
                        <th>Excellent</th>
                        <th>Good</th>
                        <th>Average</th>
                        <th>Bad</th>
                        <th>Worse</th>
                    </tr>


                </table>
                <hr>
            </div>
            <?php include 'footer.php'; ?>
        </div>
        Dashboard</div>
</section>

<script src="akila/script.js"></script>


</body>
</html>