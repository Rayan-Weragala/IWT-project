<?php
    include 'connection.php';
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./styles/user-dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <nav>
		<h1 id="logo"><b>LIBRARY<span id="dot">.</span></b></h1>
		<ul>
			<li class="nav-li"><a href="user-dashboard.php">DASHBOARD</a></li>
			<li class="nav-li"><a href="user-profile.php">PROFILE</a></li>
			<li class="nav-li"><a href="home.php#book-hr">AVAILABLE BOOKS</a></li>
		</ul>
		<a id="log-out" href="logout.php">LOG OUT</a>
	</nav>
    <h2 id="dashboard-h2">NOTICE</h2>
    <div id="notice">
		ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	

	</div>

	<div class="book-details">
		<table border = '1px'>
			<tr>
				<th>BookID</th>
				<th>BookName</th>
				<th>Image</th>
				<th>ISBN</th>
				<th>Category</th>
				<th>Author</th>
				<th>IssudDate</th>
				<th>ReturnDate</th>
				<th>ReturnedDate</th>
				<th>fine</th>
			</tr>
		
		</table>
	</div>

</body>
</html>