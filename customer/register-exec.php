<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('../connection/config.php');

use PHPMailer\PHPMailer\PHPMailer;
error_reporting(0);

require("vendor/autoload.php");
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
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
	$fname = clean($_POST['fname']);
	$lname = clean($_POST['lname']);
	$login = clean($_POST['login']);
	$password = clean($_POST['password']);
	$cpassword = clean($_POST['cpassword']);
    $question_id = clean($_POST['question']);
    $answer = clean($_POST['answer']);
    
    //check whether an account with a given email exists
    $qry_select="SELECT * FROM customers WHERE login='$login'";
    $result_select=mysqli_query($conn,$qry_select);

    if(mysqli_num_rows($result_select)>0){
        header("location: register-failed.php");
        exit();
    }
    else{

        $verification_code = sha1($login . time());
        $verfication_URL  = 'http://localhost/FoodCourt/customer/verify.php?code=' . $verification_code;


	    //Create INSERT query
	    $qry = "INSERT INTO customers(firstname, lastname, login, passwd, question_id, answer, verification_code, is_active) VALUES('$fname','$lname','$login','".md5($_POST['password'])."','$question_id','".md5($_POST['answer'])."', '{$verification_code}', false)";
	    $result = @mysqli_query($conn,$qry);

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

        $email_body   = '<p>Dear ' . $fname.$lname. '</p>';
        $email_body  .= '<p>Thank you for signing up. There is one more step.
Click below link to verify your email address in order to activate your account.</p>';
        $email_body  .= '<p>' . $verfication_URL . '</p>';
        $email_body  .= '<p>Thank You, <br>BestJobsLK</p>';

        $mail->msgHTML($email_body);
        $mail->AddAddress($login);
        $mail->AddAddress('dkhultraone2@gmail.com'); //admin email


        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo 'Please check your email.';
        }

	    //Check whether the query was successful or not
	    if($result) {
		    header("location: beforeVerify.php");
		    exit();
	    }else {
		    die("Something went wrong.\n Our team is working on it at the  moment.\n Please try again after some few minutes.");
	    }
    }
?>