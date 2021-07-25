<?php
require_once('../connection/config.php');
//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
if(!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}

if (isset($_GET['code'])) {
    $verification_code = mysqli_real_escape_string($conn, $_GET['code']);

    $query = "SELECT * FROM customers WHERE verification_code = '{$verification_code}'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {

        $query = "UPDATE customers SET is_active = true, verification_code = NULL WHERE verification_code = '{$verification_code}' LIMIT 1";

        $result = mysqli_query($conn, $query);

        if (mysqli_affected_rows($conn) == 1) {
            echo 'Email address verified successfully.';
        } else {
            echo 'Invalid verification code.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form">
            <h2 class="text-center">EMail Verified Successfully <br> Please Login </h2>
            <form action="login.php.php" method="POST" autocomplete="off">
                <div class="form-group">
                    <input class="form-control button" type="submit" name="check" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>