<?php 
session_start();
require "../connection/config.php";
$email = "";
$fname = "";
$lname = "";
$errors = array();

//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}



//phpmailer
use PHPMailer\PHPMailer\PHPMailer;
error_reporting(0);

require("vendor/autoload.php");

//if user signup button
if(isset($_POST['signup' ])){
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }

    $email_check = "SELECT * FROM customers WHERE email = '$email'";
    $res = mysqli_query($conn, $email_check);

    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }

    if(count($errors) === 0){

        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";

        $insert_data = "INSERT INTO customers (firstname, lastname, email, password, code, status)
                        values('$fname', '$lname', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($conn, $insert_data);

        if($data_check){

            // mail sending code
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Host = "smtp.gmail.com"; // Enter your host here
            $mail->SMTPAuth = true;
            $mail->Username = "orchidbliss.lk@gmail.com"; // Enter your email here
            $mail->Password = "ccuvdwanikvjbzvd"; //Enter your passwrod here
            $mail->Port = 587;
            $mail->IsHTML(true);
            $mail->From = "support@orchidbliss.lk";
            $mail->FromName = "Orchid Bliss";

            $mail->Subject = 'Verify Email Address';

            $email_body   = '<p>Dear ' . $fname . '</p>';
            $email_body  .= '<p>Thank you for signing up. There is one more step.
Click below link to verify your email address in order to activate your account.</p>';
            $email_body  .= '<p>' . $code . '</p>';
            $email_body  .= '<p>Thank You, <br>OrchidBliss.LK</p>';

            $mail->msgHTML($email_body);
            $mail->AddAddress($email);
            $mail->AddAddress('dkhultraone2@gmail.com'); //admin email



            if($mail->Send()){

                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;

                header('location: user-otp.php');
                exit();



            }else{
                echo "Mailer Error: " . $mail->ErrorInfo;
                $errors['otp-error'] = "Failed while sending code!";
            }

        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM customers WHERE code = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE customers SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($conn, $update_otp);
            if($update_res){
                $_SESSION['fname'] = $fname;
                $_SESSION['email'] = $email;
                header('location: home.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $check_email = "SELECT * FROM customers WHERE email = '$email'";
        $res = mysqli_query($conn, $check_email);

        if(mysqli_num_rows($res) > 0){

            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            $fetch_memID = $fetch['member_id'];
            $fetch_fname = $fetch['firstname'];
            $fetch_lname = $fetch['lastname'];

            if(password_verify($password, $fetch_pass)){

                $_SESSION['email'] = $email;
                $status = $fetch['status'];

                if($status == 'verified'){

                  $_SESSION['SESS_MEMBER_ID'] = $fetch_memID;
                  $_SESSION['SESS_FIRST_NAME'] = $fetch_fname;
                  $_SESSION['SESS_LAST_NAME'] = $fetch_lname;
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                    header('location: home.php');

                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $check_email = "SELECT * FROM customers WHERE email='$email'";
        $run_sql = mysqli_query($conn, $check_email);

        if(mysqli_num_rows($run_sql) > 0){

            $code = rand(999999, 111111);
            $insert_code = "UPDATE customers SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($conn, $insert_code);

            if($run_query){

                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: orchidbliss.lk@gmail.com";

                // mail sending code
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->Host = "smtp.gmail.com"; // Enter your host here
                $mail->SMTPAuth = true;
                $mail->Username = "orchidbliss.lk@gmail.com"; // Enter your email here
                $mail->Password = "ccuvdwanikvjbzvd"; //Enter your passwrod here
                $mail->Port = 587;
                $mail->IsHTML(true);
                $mail->From = "support@orchidbliss.lk";
                $mail->FromName = "Orchid Bliss";

                $mail->Subject = 'Verify Email Address';

                $email_body   = '<p>Dear ' .$fname. '</p>';
                $email_body  .= '<p>Your password reset code is</p>';
                $email_body  .= '<p>' . $code . '</p>';
                $email_body  .= '<p>Thank You, <br>BestJobsLK</p>';

                $mail->msgHTML($email_body);
                $mail->AddAddress($email);
                $mail->AddAddress('dkhultraone2@gmail.com'); //admin email



                if($mail->Send()){

                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();

                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM customers WHERE code = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE customers SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($conn, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }
?>