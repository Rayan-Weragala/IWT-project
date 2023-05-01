<?php
    include 'connection.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./styles/style.css">
	<script src="./js/home-script.js"></script> 
	<title>Home Page</title>
</head>
<body>
	<div class="overlay"></div>
	<div class="log-in">
		<h2>Log In</h2>
		<img src="./images/close.png" id="close-icon" onclick="closeForm()">
		<form action="" method = "post">
			<label>Username</label><br>
			<input type="text" name= "username" placeholder = "username"><br>
			<label>password</label><br>
			<input type="password" name = "password" placeholder = "password"><br>
			<input type="submit" name= "submit" value="log in" id="log-in-submit"><br>
			not a member? <a href="sign-up.php" id="not-a-member">sign up here</a>
			<center><hr></center>
			<a href="login-staff.php"> login as a staff</a>
		</form>
	</div>
	<?php
	if(isset($_SESSION['login_user'])){?>
		<nav>
		<h1 id="logo"><b>LIBRARY<span id="dot">.</span></b></h1>
		<ul>
			<li class="nav-li"><a href="#home-h2">HOME</a></li>
			<li class="nav-li"><a href="#book-hr">BOOKS</a></li>
			<li class="nav-li"><a href="#map">CONTACT US</a></li>
			<li class="nav-li"><a href="./user-dashboard.php">DASHBOARD</a></li>
		</ul>
		<a id="sign" href="logout.php">log out</a>
		<img src="./images/menu.png" width="60rem" id="menu-icon" onclick="navmenu()">
	</nav><?php
	}
	else{?>
	<nav>
		<h1 id="logo"><b>LIBRARY<span id="dot">.</span></b></h1>
		<ul>
			<li class="nav-li"><a href="#home-h2">HOME</a></li>
			<li class="nav-li"><a href="#book-hr">BOOKS</a></li>
			<li class="nav-li"><a href="#map">CONTACT US</a></li>
			<li class="nav-li"><a href="#">ABOUT US</a></li>
		</ul>
		<a id="sign" href=# onclick="sign()">sign in</a>
		<img src="./images/menu.png" width="60rem" id="menu-icon" onclick="navmenu()">
	</nav><?php
	}
	?>
	
	<h2 id="home-h2">SPECIAL NOTICE</h2>
	<div id="notice">
	<?php
	
	$noticesql = "SELECT `description` FROM `notice`";
	$noticeresult = mysqli_query($conn, $noticesql);

   if(mysqli_num_rows($noticeresult)>0){
	   while($row = mysqli_fetch_assoc($noticeresult)){
		   echo $row["description"];
	   }
   }
   else{
	   echo "notice will publish here";
   }
  ?>
	</div>
	
	<div class="hero">

		<img src="./images/revelation.jpeg" width="24%">
		<img src="./images/thehum.jpeg"  width="24%">
		<img src="./images/theboss.jpeg"  width="24%">
		<img src="./images/war.jpg" width="24%">
	</div>
	<br><br><center><hr id="book-hr"></center><br><br><br><br>
	<div id="books">
		<div id="available-search">
		<h3 id="available">Available</h3></div>
		<div class="form">
		<form method = "post" >
			<input type="text" name="search-book" id="search" placeholder="search..">
			<button type="submit" name = "search-bk"><img src="./images/search.png" width="15rem"></button>
		</form></div>
		<div class="clear"></div><br>

		<div class="container">
			<div class="category">
				<div class="cat-list">
				<button class="category-btn">all books</button><br>
				
				<?php
				
				$categorysql = "SELECT category FROM books GROUP BY Category ";
				$catres = mysqli_query($conn,$categorysql);
				while($row = mysqli_fetch_assoc($catres)){?>
				<form action="" method = "post">
					<?php
					echo "<button type='submit' name = 'cat-".$row["category"]."' class='category-btn' >".$row["category"]."</button><br>";
					?></form><?php
				}
				?>
				
				
				</div>
			
			</div>
			<div class="book-container">
			<form method = "get"> 
				<?php
				$catbtns ='"cat-".$row["category"]'; 
				if(isset($_POST['$catbtns'])){
					$sql = "SELECT image from books where category = '$catbtns' ";
					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_assoc($res)){			
						echo"<a href = './book-details.php'><img class = 'container-books' src ='".$row["image"]."'></a>";
					}
				}
				else if(isset($_POST['search-bk'])){
					$book = $_POST['search-book'];
					$sql = "SELECT * FROM books WHERE Name LIKE '%$book%'";
					$res = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_assoc($res)){
						echo"<a href = './book-details.php'><img class = 'container-books' src ='".$row["image"]."'></a>";
						
					}
				}
				else{
				$sql = "SELECT * from books";
				$res = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_assoc($res)){	
					?>
					
				<a href = './book-details.php?id=<?php echo $row["Book_ID"]?>' name =' <?php echo $row["Book_ID"]?>'><img class = 'container-books'<?php echo"src ='".$row["image"]."'></a>";
				}
			}
			
				?>
				</from>
				
			</div>
		</div>
	</div>
	<center><hr></center>
	<div id="contact-us">

		<div class="location">
			<div id="map"></div>
			<div id="address">sliit malabe campus<br>new kandy road<br>malabe</div>
		</div>
		<div class="contact">ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna</div>
		<div class="enquire">
			<form action = "" method = "post">
				<input type="text" name="name" placeholder="name" size="40"><br><br>
				<input type="email" name="email" placeholder="email" size="40"><br><br>
				<textarea cols="42" rows="7" name = "descrption"></textarea><br>
				<input type="submit" name="send" value="send" id="send-enquire">
			</form>
		</div>
	</div>

	<?php
	 if(isset($_POST['submit'])){
		$sql = "SELECT * FROM `user` WHERE username = '$_POST[username]' AND  password = '$_POST[password]';";
		$res = mysqli_query($conn, $sql);

		if(mysqli_num_rows($res) == 0){
			echo "<script>
			 alert('username or password is incorrect');
			 </script>";
		}
		else{
			$_SESSION['login_user'] = $_POST['username'];
			echo"<script>
			window.location = './user-dashboard.php'
			</script>";
		}
	 }

	 if(isset($_POST['send'])){
		$enquireSql= "INSERT INTO `enquire`VALUES ('','$_POST[name]','$_POST[email]','$_POST[descrption]')";
		mysqli_query($conn,$enquireSql );
	 }

	 if(isset($GET['id'])){
		$_SESSION['id']= $_GET['id'];
		$id = $_SESSION['id'];
		echo "$id";
	 }
	
	 


	 ?>
</body>
</html>