<?php
require_once('../auth.php');

include_once ('Cart.class.php');

$cart = new Cart;
?>



<?php
//checking connection and connecting to a database
require_once('../connection/config.php');


//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
if(!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Shopping Cart</title>
    <meta charset="utf-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script language="JavaScript" src="../validation/user.js"></script>
    <script src="https://use.fontawesome.com/c560c025cf.js"></script>

</head>

<body>
<div class="container">
    <h1>PRODUCTS</h1>

    <!-- Cart basket -->
    <div class="cart-view">
        <a href="viewCart.php" title="View Cart"><i class="icart"></i> (<?php echo ($cart->total_items() > 0)?$cart->total_items().' Items':'Empty'; ?>)</a>
    </div>

    <!-- Product list -->
    <div class="row col-lg-12">
        <?php
        // Get products from database
        $result = $conn->query("SELECT * FROM food_details ORDER BY food_category DESC LIMIT 10");
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                ?>
                <div class="card col-lg-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["food_name"]; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Price: <?php echo '$'.$row["food_price"].' USD'; ?></h6>
                        <p class="card-text"><?php echo $row["food_description"]; ?></p>
                        <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            <?php } }else{ ?>
            <p>Product(s) not found.....</p>
        <?php } ?>
    </div>





</div>
</body>
</html>