<?php require_once('../connection/config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo APP_NAME ?>: Reservation Success</title>

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");

        body {
            background-color: #eee;
            font-family: "Poppins", sans-serif;
            font-weight: 300
        }

        .cart {
            height: 100vh
        }

        .progresses {
            display: flex;
            align-items: center
        }

        .line {
            width: 76px;
            height: 6px;
            background: #63d19e
        }

        .steps {
            display: flex;
            background-color: #63d19e;
            color: #fff;
            font-size: 12px;
            width: 30px;
            height: 30px;
            align-items: center;
            justify-content: center;
            border-radius: 50%
        }

        .check1 {
            display: flex;
            background-color: #63d19e;
            color: #fff;
            font-size: 17px;
            width: 60px;
            height: 60px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-bottom: 10px
        }

        .invoice-link {
            font-size: 15px
        }

        .order-button {
            height: 50px
        }

        .background-muted {
            background-color: #fafafc
        }
    </style>
</head>
<body>
<div id="page">

    <!-- ========================================================================================================================================= -->

    <div id="header">
        <div id="logo"> <a href="../index.php" class="blockLink"></a></div>
        <div id="company_name"><?php echo APP_NAME ?> Restaurant</div>
    </div>
</div>

<div>

</div>


<div class="container mt-4 mb-4">
    <div class="row d-flex cart align-items-center justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="d-flex justify-content-center border-bottom">
                    <div class="p-3">
                        <div class="progresses">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="#">
                                <img src="../images/logo2copy.png" alt="logo">
                            </a>
                        </div>	<!-- End of /.col-md-12 -->
                    </div>

                </div>

                <div class="d-flex justify-content-center border-bottom">
                    <div class="p-3">
                        <div class="progresses">
                            <div class="steps"> <span><i class="fa fa-check"></i></span> </div> <span class="line"></span>
                            <div class="steps"> <span><i class="fa fa-check"></i></span> </div> <span class="line"></span>
                            <div class="steps"> <span class="font-weight-bold">3</span> </div>
                        </div>
                    </div>
                </div>

                <div class="row g-0">
                    <div class="col-md-6 border-right p-5">
                        <div class="text-center order-details">
                            <div class="d-flex justify-content-center mb-5 flex-column align-items-center"> <span class="check1"><i class="fa fa-check"></i></span> <span class="font-weight-bold">Table Reserved Succesfully</span> <small class="mt-2">Your illustraion will go to you soon</small> <a href="#" class="text-decoration-none invoice-link">View Invoice</a> </div> <button class="btn btn-danger btn-block order-button">Go to your Order</button>
                        </div>
                    </div>
                    <div class="col-md-6 background-muted">
                        <div class="p-3 border-bottom">
                            <div class="d-flex justify-content-between align-items-center"> <span><i class="fa fa-clock-o text-muted"></i> 3 days delivery</span> <span><i class="fa fa-refresh text-muted"></i> 2 Max Revisions</span> </div>
                            <div class="mt-3">
                                <h6 class="mb-0">Illustraion in Sketch or AI</h6> <span class="d-block mb-0">Includes: Sketch, PSD, PNG, SVG, AI </span> <small>Min: 1 illustraion</small>
                                <div class="d-flex flex-column mt-3"> <small><i class="fa fa-check text-muted"></i> Vector file</small> <small><i class="fa fa-check text-muted"></i> Sources files</small> </div>
                            </div>
                        </div>
                        <div class="row g-0 border-bottom">
                            <div class="col-md-6 border-right">
                                <div class="p-3 d-flex justify-content-center align-items-center"> <span>x3</span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 d-flex justify-content-center align-items-center"> <span>$20 per unit</span> </div>
                            </div>
                        </div>
                        <div class="row g-0 border-bottom">
                            <div class="col-md-6">
                                <div class="p-3 d-flex justify-content-center align-items-center"> <span>Subtotal</span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 d-flex justify-content-center align-items-center"> <span>$60</span> </div>
                            </div>
                        </div>
                        <div class="row g-0 border-bottom">
                            <div class="col-md-6">
                                <div class="p-3 d-flex justify-content-center align-items-center"> <span>Processing fees</span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 d-flex justify-content-center align-items-center"> <span>$1.80</span> </div>
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="col-md-6">
                                <div class="p-3 d-flex justify-content-center align-items-center"> <span class="font-weight-bold">Total</span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 d-flex justify-content-center align-items-center"> <span class="font-weight-bold">$61.80</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div> </div>
            </div>
        </div>
    </div>
</div>

<div id="center">
    <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
        <p><a href="member-index.php">Click Here</a> to go back to your account.</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>


</body>

</html>
