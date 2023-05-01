<?php
include "connection.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="./styles/staff-profile.css">
    <link rel="stylesheet" type="text/css" href="./styles/side-bar.css">
    
	<script src="./js/script.js"></script> 
	<title>profile</title>
</head>
<body>
    <?php
    include "side-bar.php";
    ?>
<div class="container">
    <form method = "post">
    <label>First Name</label><br>
    <input type="text" name="fname" class="text"value ="<?php
    $username = $_SESSION['login_staff'];
    $sql = "SELECT fname from staff where username = '$username'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    echo "$row[fname]";
    ?>" ><br>
    <label>Middle Name</label><br>
    <input type="text" name="mname" class="text" value ="<?php
    $username = $_SESSION['login_staff'];
    $sql = "SELECT mname from staff where username = '$username'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    echo "$row[mname]";
    ?>"><br>
    <label>Last Name</label><br>
    <input type="text" name="lname" class="text"value ="<?php
    $username = $_SESSION['login_staff'];
    $sql = "SELECT lname from staff where username = '$username'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    echo "$row[lname]";
    ?>"><br>
    <label>Phone</label><br>
    <input type="tel" name="phone" class="text"value ="<?php
    $username = $_SESSION['login_staff'];
    $sql = "SELECT phone from staff where username = '$username'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    echo "$row[phone]";
    ?>"><br>
    <label>Email</label><br>
    <input type="text" name="email" class="text"value ="<?php
    $username = $_SESSION['login_staff'];
    $sql = "SELECT email from staff where username = '$username'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    echo "$row[email]";
    ?>"><br>
    <label>username</label><br>
    <label id="username"><?php 
    $username = $_SESSION['login_staff'];
    echo $username;
    ?></label><br>
	
    <input type="submit" name = "save" value="save" id="save"> <br>

	</form>
	<form method ="post" action ="">
	<h2>change password</h2>
	<label>current password</label><br>
    <input type="password" name="current" class="text" re><br>
	<label>new password</label><br>
    <input type="password" name="new-pw" class="hide" id="new-pw" onkeyup ='checkpassword()' required><br>
	<label>enter password again</label><br><span id="alerttxt" ></span>
    <input type="password" name="again-pw" class="hide" id="again-pw" onkeyup ='checkpassword()' required><br>
	<input type="submit" name ="change-pw" value="change password" id="change-pw">


    </form>
    <?php

    if(isset($_POST["save"])){
        $username = $_SESSION['login_staff'];
        $sql = "UPDATE `staff`
        SET fname='$_POST[fname]',
        mname='$_POST[mname]',
        lname='$_POST[lname]',
        phone='$_POST[phone]',
        email='$_POST[email]' 
        where username = '$username'"; 
        mysqli_query($conn, $sql); 
        header("location:staff-dashboard.php");
    }
    if(isset($_POST['change-pw'])){
        $username = $_SESSION['login_staff'];
        $password = $_POST['current'];
        
        $sql= "SELECT password from staff where username = '$username' and password = '$password'";

        $res = mysqli_query($conn, $sql);
            if(mysqli_num_rows($res)>0){
                $newpw = $_POST['new-pw'];
                $changepwsql = "UPDATE `staff` SET password = $newpw where username = '$username'";
                mysqli_query($conn, $changepwsql); 
                header("location:staff-dashboard.php");
            }
            else{
                echo "<script>
                alert('enter current password correctly');
                </script>";
            }
        }
    


    ?>
    </div>
    </div>

</body>
</html>