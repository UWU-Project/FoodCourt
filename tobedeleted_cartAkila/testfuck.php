<?php
//Start session
//session_start();

require_once('../auth.php');

//Include database connection details
require_once('../connection/config.php');

//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
if(!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}




//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
    global $conn;
    $str = @trim($str);

    $str = stripslashes($str);

    return mysqli_real_escape_string($conn,$str);
}

//get member_id from session
$member_id = $_SESSION['SESS_MEMBER_ID'];


    $id = $_GET['id'];


    $ids = explode(",",$_GET['id']);
var_dump($ids);

    foreach ($ids as $row) {

        //selecting all records from almost all tables. Return an error if there are no records in the tables
        $orders=mysqli_query($conn,"SELECT * FROM orders_details o inner join cart_details c on c.cart_id = o.cart_id inner join quantities q on q.quantity_id = c.quantity_id inner join customers m on m.member_id = c.member_id inner join billing_details b on b.billing_id = o.billing_id ")
        or die("There are no records to display ... \n" . mysqli_error());

        $row=mysqli_fetch_assoc($orders);
        echo "<td>" . $row['cart_id'] . "</td>";


    }
?>

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

        $ids = explode(",",$_GET['id']);


        while ($row=mysqli_fetch_assoc($orders)){

            $lt = $row['lt'];
            if($lt =='food'){
                $qry = "SELECT * FROM food_details f inner join food_categories c on c.category_id = f.food_category where food_id = {$row['food_id']}";

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

        while ($row=mysqli_fetch_assoc($orders)){
            $lt = $row['lt'];
            if($lt =='food'){
                $qry = "SELECT * FROM food_details_lounge f inner join food_categories_lounge c on c.category_id = f.food_category where food_id = {$row['food_id']}";

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
        mysqli_free_result($orders);
        mysqli_close($conn);
        ?>

    </table>
    <hr>
</div>
