<?php
include 'connection.php';
?>



<!DOCKTYPE html>
<html>	

<head>
<link rel = "stylesheet" type = "text/css" href = "styles/signup.css">
<title>register</title>


</head>

<body>
<div class="overlay"></div>
     <h2>USER REGISTRATION FORM</h2>

    <form action="" method="post" class="sign-up">
       
        <lable>First Name</lable><br>
        <input type="text" name = "fname" placeholder="first name" class="text" required><br>

        <lable>middle Name (optional)</lable><br>
        <input type="text" name = "mname" placeholder="middle name"class="text" ><br>

        <lable>Last Name</lable><br>
        <input type="text" name = "lname" placeholder="last name"class="text"  required><br>

        <lable>Gender</lable><br>
        <lable>male</lable>
        <input type="radio" name="gender" value="male" checked>
        <lable>female</lable>
        <input type="radio" name="gender" value="female"><br>

        <lable>Mobile Number</lable><br>
        <input type="tel" name ="phone" placeholder="phone"class="text" required ><br>

        <lable>email</lable><br>
        <input type="email" name="email" placeholder="email"class="text" ><br>

        <lable>Userame</lable><br>
        <input type="text"name = "username" placeholder="username"class="text"  required><br>

        <lable>Password</lable><br>
        <input type="password"name = "password" placeholder="enter password"class="text" id="password" onkeyup ='checkpassword()'  required><br>

        <lable>Enter Password again</lable><br><span id="alerttxt" ></span>
        <input type="password"name = "enter password-again" placeholder="last name"class="text" id="password-again" onkeyup = 'checkpassword()' required><br>

        <lable>membership type</lable><br>
        <select name="membership" id="membership">
            <option value="premium">basic</option>
            <option value="basic">premium</option>
           
          </select><br><br>
          <input type="submit" name="submit" value="sign up" id= "submit">
        
    </form>

    <script src="./js/sign-script.js"></script>
    <?php
        if(isset($_POST['submit'])){
                
            $select = mysqli_query($conn, "SELECT * FROM user WHERE username = '".$_POST['username']."'");
            if(mysqli_num_rows($select)>0) {
            die('<script>
            alert("username already taken");
            </script>');
            }

            $sql = "INSERT INTO `user`(`fname`, `mname`, `lname`, `gender`, `phone`, `email`, `username`, `password`, `membership`) VALUES ('$_POST[fname]','$_POST[mname]','$_POST[lname]','$_POST[gender]','$_POST[phone]','$_POST[email]','$_POST[username]','$_POST[password]','$_POST[membership]')";
            mysqli_query($conn, $sql);
        }  
    
    ?>
    
</body>

</html>