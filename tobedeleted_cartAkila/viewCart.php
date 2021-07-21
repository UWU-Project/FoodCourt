<?php
require_once('../auth.php');
// Initialize shopping cart class
include_once 'Cart.class.php';
$cart = new Cart;

// Include the database config file

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
    <title>View Cart - PHP Shopping Cart</title>
    <meta charset="utf-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://use.fontawesome.com/c560c025cf.js"></script>

    <script>
        function updateCartItem(obj,id){
            $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
                if(data == 'ok'){
                    location.reload();
                }else{
                    alert('Cart update failed, please try again.');
                }
            });
        }
    </script>
</head>
<body>
<div class="container">
    <h1>SHOPPING CART</h1>
    <div class="row">
        <div class="cart">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th width="45%">Product</th>
                            <th width="10%">Price</th>
                            <th width="15%">Quantity</th>
                            <th class="text-right" width="20%">Total</th>
                            <th width="10%"> </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($cart->total_items() > 0){
                            // Get cart items from session
                            $cartItems = $cart->contents();
                            foreach($cartItems as $item){
                                ?>
                                <tr>
                                    <td><?php echo $item["name"]; ?></td>
                                    <td><?php echo '$'.$item["price"].' USD'; ?></td>
                                    <td><input class="form-control" type="number" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"/></td>
                                    <td class="text-right"><?php echo '$'.$item["subtotal"].' USD'; ?></td>
                                    <td class="text-right"><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')?window.location.href='cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>':false;"><i class="itrash"></i> </button> </td>
                                </tr>
                            <?php } }else{ ?>
                        <tr><td colspan="5"><p>Your cart is empty.....</p></td>
                            <?php } ?>
                            <?php if($cart->total_items() > 0){ ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><strong>Cart Total</strong></td>
                                <td class="text-right"><strong><?php echo '$'.$cart->total().' USD'; ?></strong></td>
                                <td></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a href="index.php" class="btn btn-block btn-light">Continue Shopping</a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <?php if($cart->total_items() > 0){ ?>
                            <a href="checkout.php" class="btn btn-lg btn-block btn-primary">Checkout</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>