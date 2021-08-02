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
    <title>Admin | Orchid Bliss</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="akila/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">


<body>
<div class="sidebar">
    <div class="logo-details">
        <i class=''></i>
        <div class="logo_name">Orchid Bliss</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
        <li class="active">
            <a href="#">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name" id="demo" onclick="myFunction()">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>
        <li>
            <a href="./profile.php">
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
                <i class='bx bx-log-out' id="log_out"></i>
                <span class="links_name">Logout</span>
            </a>
            <span class="tooltip">Logout</span>
        </li>
    </ul>
</div>

<section class="home-section">
   <div id="page">
      <div id="container">
         <h1>Dashboard</h1>
         <p>Welcome to Orchid Bliss</p>
         <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
               <div class="card">
                  <div class="card-content">
                     <div class="card-body">
                        <div class="media d-flex">
                           <div class="align-self-center">
                              <i class="icon-user primary font-large-2 float-left"></i>
                           </div>
                           <div class="media-body text-right">
                              <h3> 
                                 <?php
                                    $members = mysqli_num_rows($members);  echo $members; ?>
                              </h3>
                              <span>Registered Customers</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-3">
               <div class="card">
                  <div class="card-content">
                     <div class="card-body">
                        <div class="media d-flex">
                           <div class="align-self-center">
                              <i class="icon-speech warning font-large-2 float-left"></i>
                           </div>
                           <div class="media-body text-right">
                              <h3>
                                 <?php
                                    $orders_placed = mysqli_num_rows($orders_placed);  echo $orders_placed; ?>
                              </h3>
                              <span>Orders Placed	</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
               <div class="card">
                  <div class="card-content">
                     <div class="card-body">
                        <div class="media d-flex">
                           <div class="align-self-center">
                              <i class="icon-graph success font-large-2 float-left"></i>
                           </div>
                           <div class="media-body text-right">
                              <h3>
                                 <?php
                                    $orders_processed = mysqli_num_rows($orders_processed);  echo $orders_processed; ?>
                              </h3>
                              <span>Processed Orders</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
               <div class="card">
                  <div class="card-content">
                     <div class="card-body">
                        <div class="media d-flex">
                           <div class="align-self-center">
                              <i class="icon-pointer danger font-large-2 float-left"></i>
                           </div>
                           <div class="media-body text-right">
                              <h3>
                                 <?php
                                    $pending_orders = $orders_placed - $orders_processed;  echo $pending_orders; ?>
                              </h3>
                              <span>Pending Orders</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
         <div class="col-xl-3 col-sm-6 col-12">
               <div class="card">
                  <div class="card-content">
                     <div class="card-body">
                        <div class="media d-flex">
                           <div class="align-self-center">
                              <i class="icon-pointer danger font-large-2 float-left"></i>
                           </div>
                           <div class="media-body text-right">
                              <h3>
                                 <?php
                                    $pending_orders = $orders_placed - $orders_processed;  echo $pending_orders; ?>
                              </h3>
                              <span>Pending Orders</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
               <div class="card">
                  <div class="card-content">
                     <div class="card-body">
                        <div class="media d-flex">
                           <div class="align-self-center">
                              <i class="icon-pointer danger font-large-2 float-left"></i>
                           </div>
                           <div class="media-body text-right">
                              <h3>
                                 <?php
                                    $pending_orders = $orders_placed - $orders_processed;  echo $pending_orders; ?>
                              </h3>
                              <span>Pending Orders</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div> <div class="col-xl-3 col-sm-6 col-12">
               <div class="card">
                  <div class="card-content">
                     <div class="card-body">
                        <div class="media d-flex">
                           <div class="align-self-center">
                              <i class="icon-pointer danger font-large-2 float-left"></i>
                           </div>
                           <div class="media-body text-right">
                              <h3>
                                 <?php
                                    $pending_orders = $orders_placed - $orders_processed;  echo $pending_orders; ?>
                              </h3>
                              <span>Pending Orders</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
            <div class="row">
               <div class="card">
                  <div class="card-content">
                     <div class="card-body">
                        <div class="media d-flex">
                           <div class="align-self-center">
                              <i class="icon-pointer danger font-large-2 float-left"></i>
                           </div>
                           <div class="media-body text-right">
                              <h3>
                                 <?php
                                    $pending_orders = $orders_placed - $orders_processed;  echo $pending_orders; ?>
                              </h3>
                              <span>Pending Orders</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


<script src="akila/script.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>