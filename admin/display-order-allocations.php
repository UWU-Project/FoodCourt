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

        //selecting all records from the staff table. Return an error if there are no records in the tables
        $staff=mysqli_query($conn,"SELECT * FROM staff")
        or die("There are no records to display ... \n" . mysqli_error());
    ?>

    <?php
        //get order ids from the orders_details table based on flag=0
        $flag_0 = 0;
        $orders=mysqli_query($conn,"SELECT * FROM orders_details WHERE flag='$flag_0'")
        or die("There are no records to display ... \n" . mysqli_error());
    ?>

    <?php
        //get reservation ids from the reservations_details table based on flag=0
        $flag_0 = 0;
        $reservations=mysqli_query($conn,"SELECT * FROM reservations_details WHERE flag='$flag_0'")
        or die("There are no records to display ... \n" . mysqli_error());
    ?>

    <?php
        //selecting all records from the staff table. Return an error if there are no records in the tables
        $staff_1=mysqli_query($conn,"SELECT * FROM staff")
        or die("There are no records to display ... \n" . mysqli_error());
    ?>

    <?php
        //selecting all records from the staff table. Return an error if there are no records in the tables
        $staff_2=mysqli_query($conn,"SELECT * FROM staff")
        or die("There are no records to display ... \n" . mysqli_error());
    ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Admin | Orchid Bliss
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">


  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h5 class="font-weight-bolder mb-0">Order Allocation Details</h5>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">

        <div class="row mt-4">
          

        <div class="col-12 mt-4">
          <div class="card mb-4">
            <div class="card-body p-3">
              
            
            </div>
          </div>
        </div>
        </div>


      <?php require_once('components/footer.inc.php'); ?>
    </div>
  </main>
  
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example contactUs etc -->
  <script src="./assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>