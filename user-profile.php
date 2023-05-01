<?php
include "connection.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./styles/user-profile.css">
	<script src="./js/script.js"></script> 
	<title>profile</title>
</head>
<body>
    <nav>
		<h1 id="logo"><b>LIBRARY<span id="dot">.</span></b></h1>
		<ul>
			<li class="nav-li"><a href="user-dashboard.php">DASHBOARD</a></li>
			<li class="nav-li"><a href="#book-hr">PROFILE</a></li>
			<li class="nav-li"><a href="home.php#book-hr">AVAILABLE BOOKS</a></li>
		</ul>
		<a id="log-out" href="logout.php">LOG OUT</a>
	</nav>
<img src="./images/profile.png" width="100rem"><br>

	</div>
    <form method = "post">
    <label>First Name</label><br>
    <input type="text" name="fname" class="text"value ="<?php
    $username = $_SESSION['login_user'];
    $sql = "SELECT fname from user where username = '$username'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    echo "$row[fname]";
    ?>" ><br>
    <label>Middle Name</label><br>
    <input type="text" name="mname" class="text" value ="<?php
    $username = $_SESSION['login_user'];
    $sql = "SELECT mname from user where username = '$username'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    echo "$row[mname]";
    ?>"><br>
    <label>Last Name</label><br>
    <input type="text" name="lname" class="text"value ="<?php
    $username = $_SESSION['login_user'];
    $sql = "SELECT lname from user where username = '$username'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    echo "$row[lname]";
    ?>"><br>
    <label>Phone</label><br>
    <input type="tel" name="phone" class="text"value ="<?php
    $username = $_SESSION['login_user'];
    $sql = "SELECT phone from user where username = '$username'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    echo "$row[phone]";
    ?>"><br>
    <label>Email</label><br>
    <input type="text" name="email" class="text"value ="<?php
    $username = $_SESSION['login_user'];
    $sql = "SELECT email from user where username = '$username'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    echo "$row[email]";
    ?>"><br>
    <label>username</label><br>
    <label id="username"><?php 
    $username = $_SESSION['login_user'];
    echo $username;
    ?></label><br>
    <label>membership type</label><br>
    <label id="membership"><?php
    $username = $_SESSION['login_user'];
    $sql = "SELECT membership from user where username = '$username'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    echo "$row[membership]";
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
        $username = $_SESSION['login_user'];
        $sql = "UPDATE `user`
        SET fname='$_POST[fname]',
        mname='$_POST[mname]',
        lname='$_POST[lname]',
        phone='$_POST[phone]',
        email='$_POST[email]' 
        where username = '$username'"; 
        mysqli_query($conn, $sql); 
        header("location:user-dashboard.php");
    }
    if(isset($_POST['change-pw'])){
        $username = $_SESSION['login_user'];
        $password = $_POST['current'];
        
        $sql= "SELECT password from user where username = '$username' and password = '$password'";

        $res = mysqli_query($conn, $sql);
            if(mysqli_num_rows($res)>0){
                $newpw = $_POST['new-pw'];
                $changepwsql = "UPDATE `user` SET password = $newpw where username = '$username'";
                mysqli_query($conn, $changepwsql); 
                header("location:user-dashboard.php");
            }
            else{
                echo "<script>
                alert('enter current password correctly');
                </script>";
            }
        }
    


    ?>

</body>
</html>