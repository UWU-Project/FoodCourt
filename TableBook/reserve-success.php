<?php require_once('../connection/config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo APP_NAME ?>: Reservation Success</title>

</head>
<body>
<div id="page">

    <!-- ========================================================================================================================================= -->

    <div id="header">
        <div id="logo"> <a href="../index.php" class="blockLink"></a></div>
        <div id="company_name"><?php echo APP_NAME ?> Restaurant</div>
    </div>
    <div id="center">
        <h1>Reservation Successful</h1>
        <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
            <p>&nbsp;</p>
            <div class="error">Table/PartyHall Reserved Successfully</div>
            <p><a href="member-index.php">Click Here</a> to go back to your account.</p>
        </div>
    </div>

</div>
</body>

</html>
