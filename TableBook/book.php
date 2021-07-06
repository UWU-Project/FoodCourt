<?php
require_once('../auth.php');
?>

<?php
//checking connection and connecting to a database
require_once('../connection/config.php');
//Connect to mysqli server
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
if(!$conn) {
    die('Failed to connect to server: ' . mysqli_error());
}

//Select database

//get member id from session
$memberId = $_SESSION['SESS_MEMBER_ID'];
?>

<?php
//retrieving all rows from the cart_details table based on flag=0
$flag_0 = 0;
$items=mysqli_query($conn,"SELECT * FROM cart_details WHERE member_id='$memberId' AND flag='$flag_0'")
or die("Something is wrong ... \n" . mysqli_error());
//get the number of rows
$num_items = mysqli_num_rows($items);
?>

<!--php
//retrieving all rows from the messages table
$messages=mysqli_query($conn,"SELECT * FROM messages")
or die("Something is wrong ... \n" . mysqli_error());
//get the number of rows
$num_messages = mysqli_num_rows($messages);
?-->

<?php
//retrieve tables from the tables table
$tables=mysqli_query($conn,"SELECT * FROM tables")
or die("Something is wrong ... \n" . mysqli_error());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME ?>:Tables</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script language="JavaScript" src="../validation/user.js">
    </script>
</head>
<body>
<div id="page">
    <div id="menu"><!--<ul>
            <li><a href="member-index.php">Home</a></li>
            <li><a href="foodzone.php">Food Zone</a></li>
            <li><a href="specialdeals.php">Special Deals</a></li>
            <li><a href="member-index.php">My Account</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
        </ul>-->
    </div>
    <div id="header">
        <div id="logo"> <a href="../index.php" class="blockLink"></a></div>
        <div id="company_name"><?php echo APP_NAME ?> Restaurant</div>
    </div>


    <div id="center">

        <h1>RESERVE TABLE(S)</h1>
        <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">

            <p>&nbsp;</p>


            <p>Here you can ... For more information <a href="../contact-us.php">Click Here</a> to contact us.

            <hr>
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="reserve-exec.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">table</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="table" value="" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="date" class="form-control" name="date" id="exampleInputPassword1" placeholder="Password" required>
                                </div>
                                <div class="form-check">
                                    <input type="time" class="form-check-input" name="time" id="exampleCheck1" required>
                                    <input type="text" name="id" hidden value="<?php echo $_SESSION['SESS_MEMBER_ID'];?>">
                                </div>
                                <button type="submit" class="btn btn-primary" style="padding-left: 30px;">Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>

                function tableChange(table){
                    document.getElementById('exampleInputEmail1').value = table;
                }
            </script>

            <!--<form name="tableForm" id="tableForm" method="post" action="reserve-exec.php?id=<?php echo $_SESSION['SESS_MEMBER_ID'];?>" onsubmit="return tableValidate(this)">
                <table align="center" width="300">
                    <CAPTION><h2>RESERVE A TABLE</h2></CAPTION>
                    <tr>
                        <td><b>Table Name/Number:</b></td>
                        <td><select name="table" id="table">
                                <option value="select">- select table -</option>
                                <?php
                                //loop through tables table rows
                                while ($row=mysqli_fetch_array($tables)){
                                    echo "<option value=$row[table_id]>$row[table_name]</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>


                    <tr>
                        <td><b>Date:</b></td><td><input type="date" name="date" id="date" /></td></tr>
                    <tr>
                        <td><b>Time:</b></td><td><input type="time" name="time" id="time" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" value="Reserve"></td>
                    </tr>
                </table>
            </form>-->
        </div>
    </div>

</div>


<div class="container">
    <div class="row" style="margin-bottom: 50px">
        <div class="col-md-3">
            <a  data-toggle="modal" data-target="#exampleModal" onclick="tableChange('1')">
                <img id="my-img" src="../images/t1.png" class="imgcenter" onmouseover="hover(this);" onmouseout="unhover(this);" />
            </a>
        </div>
        <div class="col-md-6">
            <a data-toggle="modal" data-target="#exampleModal" onclick="tableChange('11')">
                <img id="my-img" src="../images/t11.png" class="imgcenter" onmouseover="hover11(this);" onmouseout="unhover11(this);" />
            </a>
        </div>

        <div class="col-md-3">
            <a data-toggle="modal" data-target="#exampleModal" onclick="tableChange('2')">
                <img id="my-img" src="../images/t2.png" class="imgcenter" onmouseover="hover2(this);" onmouseout="unhover2(this);" />
            </a>
        </div>
    </div>
</div>
<div class="container" >
    <div class="row" style="margin-bottom: 50px">
        <div class="col-9">
            <div class="row" style="margin-bottom: 50px">
                <div class="col"><a data-toggle="modal" data-target="#exampleModal" onclick="tableChange('3')">
                        <img id="my-img" src="../images/t3.png" class="imgcenter" onmouseover="hover3(this);" onmouseout="unhover3(this);" />
                    </a></div>
                <div class="col"><a data-toggle="modal" data-target="#exampleModal" onclick="tableChange('5')">
                        <img id="my-img" src="../images/t5.png" class="imgcenter" onmouseover="hover5(this);" onmouseout="unhover5(this);" />
                    </a></div>
                <div class="col"><a data-toggle="modal" data-target="#exampleModal" onclick="tableChange('7')">
                        <img id="my-img" src="../images/t7.png" class="imgcenter" onmouseover="hover7(this);" onmouseout="unhover7(this);" />
                    </a></div>

            </div>
            <div class="row">
                <div class="col"><a data-toggle="modal" data-target="#exampleModal" onclick="tableChange('4')">
                        <img id="my-img" src="../images/t4.png" class="imgcenter" onmouseover="hover4(this);" onmouseout="unhover4(this);" />
                    </a></div>
                <div class="col"><a data-toggle="modal" data-target="#exampleModal" onclick="tableChange('6')">
                        <img id="my-img" src="../images/t6.png" class="imgcenter" onmouseover="hover6(this);" onmouseout="unhover6(this);" />
                    </a></div>
                <div class="col"><a data-toggle="modal" data-target="#exampleModal" onclick="tableChange('8')">
                        <img id="my-img" src="../images/t8.png" class="imgcenter" onmouseover="hover8(this);" onmouseout="unhover8(this);" />
                    </a></div>

            </div>

        </div>

        <div class="col-3"><a data-toggle="modal" data-target="#exampleModal" onclick="tableChange('9')">
                <img id="my-img" src="../images/t9.png" class="imgcenter" onmouseover="hover1(this);" onmouseout="unhover1(this);" />
            </a></div>
    </div>

    <!-- hover
    ================================================== -->
    <script>
        function hover1(element) {
            element.setAttribute('src', '../images/t9h.png');
        }

        function unhover1(element) {
            element.setAttribute('src', '../images/t9.png');
        }
        function hover(element) {
            element.setAttribute('src', '../images/t1h.png');
        }

        function unhover(element) {
            element.setAttribute('src', '../images/t1.png');
        }
        function hover2(element) {
            element.setAttribute('src', '../images/t2h.png');
        }

        function unhover2(element) {
            element.setAttribute('src', '../images/t2.png');
        }
        function hover3(element) {
            element.setAttribute('src', '../images/t3h.png');
        }

        function unhover3(element) {
            element.setAttribute('src', '../images/t3.png');
        }
        function hover4(element) {
            element.setAttribute('src', '../images/t4h.png');
        }

        function unhover4(element) {
            element.setAttribute('src', '../images/t4.png');
        }
        function hover5(element) {
            element.setAttribute('src', '../images/t5h.png');
        }

        function unhover5(element) {
            element.setAttribute('src', '../images/t5.png');
        }
        function hover6(element) {
            element.setAttribute('src', '../images/t6h.png');
        }

        function unhover6(element) {
            element.setAttribute('src', '../images/t6.png');
        }
        function hover7(element) {
            element.setAttribute('src', '../images/t7h.png');
        }

        function unhover7(element) {
            element.setAttribute('src', '../images/t7.png');
        }
        function hover8(element) {
            element.setAttribute('src', '../images/t8h.png');
        }

        function unhover8(element) {
            element.setAttribute('src', '../images/t8.png');
        }
        function hover9(element) {
            element.setAttribute('src', '../images/t9h.png');
        }

        function unhover9(element) {
            element.setAttribute('src', '../images/t9.png');
        }
        function hover10(element) {
            element.setAttribute('src', '../images/t10h.png');
        }

        function unhover10(element) {
            element.setAttribute('src', '../images/t10.png');
        }
        function hover11(element) {
            element.setAttribute('src', '../images/t11h.png');
        }

        function unhover11(element) {
            element.setAttribute('src', '../images/t11.png');
        }
    </script>
</div>
<!-- FOOTER Start
================================================== -->



</body>
</html>