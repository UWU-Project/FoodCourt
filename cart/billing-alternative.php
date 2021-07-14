<?php
require_once('../auth.php');

//Include database connection details
require_once('../connection/config.php');

//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}

?>

<?php
//selecting all records from almost all tables. Return an error if there are no records in the tables
$result = mysqli_query($conn, "SELECT * FROM orders_details o inner join cart_details c on c.cart_id = o.cart_id inner join quantities q on q.quantity_id = c.quantity_id inner join customers m on m.member_id = c.member_id inner join billing_details b on b.billing_id = o.billing_id ") or die("There are no records to display ... \n" . mysqli_error());
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo APP_NAME ?>:Alternative Billing</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

    <script language="JavaScript" src="../validation/user.js">
    </script>
    <style>
        .container {
            max-width: 960px;
        }

        .lh-condensed {
            line-height: 1.25;
        }
    </style>
</head>
<body>
<div id="page">

    <div id="header">
        <div id="logo"><a href="index.php" class="blockLink"></a></div>


    </div>


    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="../images/logo2copy.png" alt="">
            <h1>Billing Address</h1>
            <hr>
            <p>We have found out that you don't have a billing address in your account. Please add a billing address in
                the
                form below. It is the same address that will be used to deliver your food orders. Please note that ONLY
                correct street/physical addresses should be used in order to ensure smooth delivery of your food orders.
                For
                more information <a href="contactus.php">Click Here</a> to contact us.</p></div>


        <div class="row">
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>


                <form id="billingForm" class="needs-validation" novalidate="" name="billingForm" method="post"
                      action="billing-exec.php?id=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>"
                      onsubmit="return billingValidate(this)">
                    <div class="row">
                        <!--<div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                            <div class="invalid-feedback"> Valid first name is required. </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                            <div class="invalid-feedback"> Valid last name is required. </div>
                        </div>

                    </div>

                    <div class="mb-3">

                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="text" class="form-control" id="username" placeholder="Username" required="">
                            <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                        </div>
                    </div>-->
                        <div class="mb-3">
                            <label for="address2">P.O. Box No <span class="text-muted">(Optional)</span></label>
                            <input name="box" type="text" class="form-control" id="address2"
                                   placeholder="Apartment or Suite" id="box">
                        </div>

                        <div class="mb-3">
                            <label for="address">Street</label>
                            <input name="sAddress" type="text" class="form-control" id="sAddress"
                                   placeholder="Enter the Address" required="">
                            <div class="invalid-feedback"> Please enter your shipping address.</div>
                        </div>



                        <div class="mb-3">
                            <label for="address">City</label>
                            <input name="city" id="city" type="text" class="form-control"
                                   placeholder="Enter the Address" required="">
                            <div class="invalid-feedback"> Please enter your shipping address.</div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label for="mNumber">Mobile No</label>
                                <input name="mNumber" type="text" class="form-control" id="mNumber" placeholder=""
                                       required="">
                                <div class="invalid-feedback"> Mobile Number Required.</div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="lNumber">Landline No<span class="text-muted">(Optional)</span></label>
                                <input name="lNumber" type="text" class="form-control" id="lNumber"
                                       placeholder="Apartment or Suite" >

                            </div>
                        </div>
                        <hr>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address" required="">
                            <label class="custom-control-label" for="same-address" >Shipping address is the same as my
                                billing address</label>
                            <div class="invalid-feedback"> Make Sure to Check</div>
                        </div>
                        <hr>


                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="Submit" value="Add">
                            Save The Address
                        </button>
                    </div>

                </form>
            </div>
        </div>
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <div id="company_name"><?php echo APP_NAME ?> Restaurant</div>

            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation')

                // Loop over them and prevent submission
                Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
            }, false)
        }())
    </script>
</body>
</html>
