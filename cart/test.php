<?php
require_once('../auth.php');
?>

<?php
//checking connection and connecting to a database
require_once('../connection/config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script language="JavaScript" src="../validation/user.js"></script>
    <script src="https://use.fontawesome.com/c560c025cf.js"></script>

    <style>

        @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

        body {
            background-color: #eee;
            font-family: 'Calibri', sans-serif !important
        }

        .mt-100 {
            margin-top: 100px
        }

        .card {
            margin-bottom: 30px;
            border: 0;
            -webkit-transition: all .3s ease;
            transition: all .3s ease;
            letter-spacing: .5px;
            border-radius: 8px;
            -webkit-box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, .05);
            box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, .05)
        }

        .card .card-header {
            background-color: #fff;
            border-bottom: none;
            padding: 24px;
            border-bottom: 1px solid #f6f7fb;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px
        }

        .card-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
        }

        .card .card-body {
            padding: 30px;
            background-color: transparent
        }

        .btn-primary,
        .btn-primary.disabled,
        .btn-primary:disabled {
            background-color: #4466f2 !important;
            border-color: #4466f2 !important
        }
    </style>

</head>
<body>

<div class="container-fluid mt-100">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Cart</h5>
                </div>
                <div class="card-body cart">
                    <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                        <h3><strong>Your Cart is Empty</strong></h3>
                        <h4>Add something to make me happy :)</h4> <a href="../pastry-shop.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>