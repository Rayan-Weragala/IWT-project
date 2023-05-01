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
<?php
	if(isset($_SESSION['login_user'])){?>
		<nav>
		<h1 id="logo"><b>LIBRARY<span id="dot">.</span></b></h1>
		<ul>
			<li class="nav-li"><a href="home.php#home-h2">HOME</a></li>
			<li class="nav-li"><a href="home.php#book-hr">BOOKS</a></li>
			<li class="nav-li"><a href="home.php#map">CONTACT US</a></li>
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
			<li class="nav-li"><a href="home.php#home-h2">HOME</a></li>
			<li class="nav-li"><a href="home.php#book-hr">BOOKS</a></li>
			<li class="nav-li"><a href="home.php#map">CONTACT US</a></li>
			<li class="nav-li"><a href="home.php#">ABOUT US</a></li>
		</ul>
		<img src="./images/menu.png" width="60rem" id="menu-icon" onclick="navmenu()">
	</nav><?php
	}
	?>
    <div class="detail-page">
		<?php 
		if(isset($_SESSION['id'])){
			$id = $_SESSION['id'];
			$sql = "SELECT * from books";
			$res = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			echo "<img src ='".$row["image"]."'>";
		 }
		?>
        <div class="details">
            <h1><?php 
		if(isset($_SESSION['id'])){
			$id = $_SESSION['id'];
			$sql = "SELECT * from books";
			$res = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			echo "<img src ='".$row["Name"]."'>";
		 }
		?></h1><br>
            <h3><?php 
		if(isset($_SESSION['id'])){
			$id = $_SESSION['id'];
			$sql = "SELECT * from books";
			$res = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			echo "<img src ='".$row["Author"]."'>";
		 }
		?></h3>
            <p>isbn-<?php 
		if(isset($_SESSION['id'])){
			$id = $_SESSION['id'];
			$sql = "SELECT * from books";
			$res = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			echo "<img src ='".$row["ISBN"]."'>";
		 }
		?></p><br><br>
          
		  <?php 
		if(isset($_SESSION['id'])){
			$id = $_SESSION['id'];
			$sql = "SELECT * from books";
			$res = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			echo "<img src ='".$row["Description"]."'>";
		 }
		?>
             
        </div>
       

    </div>
	<?php
	if(isset($_SESSION['login_user'])){
		echo "<button id='reserve-btn'>reserve</button>";
	}
	
	if(isset($_SESSION['id'])){
		$id = $_SESSION['id'];
		echo "$id";
	 }
	?>
    
</body>
</html>