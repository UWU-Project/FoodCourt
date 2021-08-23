<?php
//Start session
echo $_POST['table'];
echo $_POST['date'];
echo $_POST['time'];
session_start();

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

//Sanitize the POST values
$partyhall_id = 0;
$table_id = 0;
$partyhall_flag = 0;
$table_flag = 0;

if(isset($_POST['table'])){
    echo $_POST['table'];
    echo $_POST['date'];
    echo $_POST['time'];
    $table_id = clean($_POST['table']);
    $table_flag = 1;
    $phd = $_POST['table'];

    $q = "SELECT * FROM reservations_details WHERE table_id = '$phd' and date(Reserve_Date) = '".$_POST['date']."'  ";

    $res = mysqli_query($conn,$q);

    if(mysqli_num_rows($res) > 0){
//===============================================

    $row=mysqli_fetch_array($res);

            $teptime = clean($_POST['time']);
            switch ($teptime) {
                case 'BreakFast':
                    $time = "08:00:00";
                    if($row['Reserve_Time'] == $time){
                        header("location: booked.php");
                    }
                    break;
                case 'Lunch':
                    $time = "12:00:00";
                    if($row['Reserve_Time'] == $time){
                        header("location: booked.php");
                    }
                    break;
                case 'Dinner':
                    $time = "17:00:00";
                    if($row['Reserve_Time'] == $time){
                        header("location: booked.php");
                    }
                    break;
            }
        //==================================
    }else{
        $date = clean($_POST['date']);
        $teptime = clean($_POST['time']);
        switch ($teptime) {
            case 'BreakFast':
                $time = "08:00:00";
            break;
            case 'Lunch':
                $time = "12:00:00";
            break;
            case 'Dinner':
                $time = "17:00:00";
            break;
        }
        $staff = 5;
        $flag = 0;




        //check if the id is set at the link
        if (isset($_POST['id'])){


            //get user id
            $id = $_POST['id'];

            //Create INSERT query
            $qry = "INSERT INTO reservations_details(member_id,table_id,Reserve_Date,Reserve_Time,StaffID,table_flag,flag) VALUES('$id','$table_id','$date','$time','$staff','$table_flag','$flag')";
            mysqli_query($conn,$qry);

            //redirect to the reserve success page
            header("location: reserve-success.php");

        }else {
            die("Reservation failed!1 Please try again after a few minutes.");
            echo mysqli_error($conn);
        }

    }



}else if(isset($_POST['partyhall'])){
    die("Reservation failed!party failed PARTYHALL SELECTED Please try again after a few minutes.");

    /*$partyhall_id = clean($_POST['partyhall']);
    $partyhall_flag = 1;

    $phd = $_POST['partyhall'];

    $q = "SELECT * FROM reservations_details WHERE partyhall_id = '$phd' ";
    $res = mysqli_query($conn,$q);


    if(mysqli_num_rows($res) == 1){

        header("location: booked.php");

    }else{

        $date = clean($_POST['date']);
        $time = clean($_POST['time']);
        $staff = 5;
        $flag = 0;



        //check if the id is set at the link
        if (isset($_GET['id'])){


            //get user id
            $id = $_GET['id'];

            //Create INSERT query
            $qry = "INSERT INTO reservations_details(member_id,table_id,partyhall_id,Reserve_Date,Reserve_Time,staffID,table_flag,partyhall_flag,flag) VALUES('$id','$table_id','$partyhall_id','$date','$time','$staff','$table_flag','$partyhall_flag','$flag')";
            mysqli_query($conn,$qry);

            //redirect to the reserve success page
            header("location: reserve-success.php");

        }else {
            die("Reservation failed! Please try again after a few minutes.");
        }

    }*/

}





?>