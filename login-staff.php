<?php
    include 'connection.php';
    session_start();

?>
<!DOCTYPE html>
<html>	

<head>
<link rel = "stylesheet" type = "text/css" href = "styles/staff-login-styles.css">
<title>staff login</title>

</head>

<body>
    <div class="container">
        <h1>staff login</h1>
        <form action= "" method = "post">
            <label>Username</label><br>
            <input type="text" placeholder="Enter username" id="username" name = "username"><br>
            <label>password</label><br>
            <input type="password" placeholder="Enter password" id="password" name = "password"><br>
            <input type="submit" value="log in" id="submit"  name = "submit"><br>
            <a href ="./home.php">back to homepage</a>
        </form>
    </div>
<?php
    if(isset($_POST['submit'])){
        $sql = "SELECT * FROM `staff` WHERE username = '$_POST[username]' AND  password = '$_POST[password]';";
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res)>0){
            header("location:staff-dashboard.php");

            $_SESSION['login_staff'] = $_POST['username'];

        }
        else{
            echo "<script>
			 alert('username or password is incorrect');
			 </script>";
        }
    }

?>
</body>

</html>

