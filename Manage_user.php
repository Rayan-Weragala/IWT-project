<?php
include 'connection.php';
session_start();
?>
<html>	

<head>
<div>
<link rel = "stylesheet" type = "text/css" href = "styles/Manage_user.css">
<link rel = "stylesheet" type = "text/css" href = "styles/side-bar.css">
<script src="./js/script.js"></script>
<title>Manage Inventory</title>
</head>

<body>
<?php
	include 'side-bar.php';
?>
<!-- BODY -->
<div class = "container">
	<div id = "top">
					<h3>ADD USER</h3>

					<form>
						<label>First Name :</label>
						<input id = "input" type = "text" name = "fname"><br>

						<label>Middle Name :</label>
						<input id = "input" type = "text" name = "mname"><br>

						<label>Last Name :</label>
						<input id = "input" type = "text" name = "lname"><br>

						<label>Email :</label>
						<input  id = "input" type = "email" name = "email"><br>

						<label>Contact Number :</label>
						<input id = "input" type = "tel" name = "phone"><br>

						<label>Address :</label>
						<input id = "input" type = "text" name = "address"><br>

						<label>Username :</label>
						<input id = "input" type = "text" name = "username"><br>

						<label>Password :</label>
						<input id = "input" type = "password" name = "password"><br>
						
						<label>Re-Enter password :</label>
						<input id = "input" type = "password"><br>

						<label>Select Role :</label>
						<select id = "input" name = "role">
							<option selected disabled>Role</option>
							<option>Admin</option>
							<option>Staff</option>		
						</select><br>


						<button  id = "inputbtn" type = "submit" name = "submitbtn1">ADD USER</button>
						<button type = "reset" value = "reset">reset</button>
						
					</form>

			<?php	
			//connecting config.file

			

			if(isset($_POST['submitbtn1'])){

			$fname = $_POST["fname"];
			$mname = $_POST["mname"];
			$lname = $_POST["lname"];
			$email = $_POST["email"];
			$phone = $_POST["phone"];
			$address = $_POST["address"];
			$username = $_POST["username"];
			$password = $_POST["password"];
			$role = $_POST["role"];

			$sql = "insert into staff(fName,mName,lName,email,phone,address,username,password,role)
			values('$fname'$mname','$lname','$email','$phone','$address','$username','$password','$role') ";

			if(mysqli_query($conn, $sql)){
				echo "new record created successfully";
				}
				else{
				echo "error".$sql."<br>".mysqil_error($conn);
				}
			}	
			
			?>

		</div>

	<div id = "middle">
		<div id = "top1">
			<div id = "searchbar">

							<form method="post" action="">
								<h3>Search </h3>
								<input type="text" name="search">
								<input type="submit" value="Submit" name="searchbtn">
								<input type="reset" value="Reset">
								</form>
							
						</div>
						<div id = "filter">
							<form method = "post" action = "">
								<label>Category</label>
							<select name = "category">
								<option value = "" disabled selected> Sort by</option>
								<option value = "Admin"></option>
								<option value = "Staff"></option>
							</select><br>
							<input type="submit" value="Submit" name="searchbtn">
							</form>

					
						</div>
	</div>
		</div>

	<div id = "bottom">

			<?php
			//Read Users



				if(isset($_POST['searchbtn']) ==NULL) {
				$sql = " SELECT * FROM staff";

				if($result = $conn->query($sql)){

					if($result->num_rows > 0){
						?>
						<table border = '1px solid black' width = 90%;>

						<th>First Name</th>
						<th>Middle name</th>
						<th>Last name</th>
						<th>Email</th>
						<th>Contact Number</th>
						<th>Address</th>
						<th>UserName</th>
						<th>Password</th>
						<th>Role</th>

					</tr>	

						<?php

						while($row = $result->fetch_assoc()){
						?>
							<tr>
							<td><?php echo $row["fName"]?></td>
							<td><?php echo $row["mName"]?></td>
							<td><?php echo $row["lName"]?></td>
							<td><?php echo $row["email"]?></td>
							<td><?php echo $row["phone"]?></td>
							<td><?php echo $row["address"]?></td>	
							<td><?php echo $row["username"]?></td>
							<td><?php echo $row["password"]?></td>
							<td><?php echo $row["role"]?></td>
							
							</tr>
						<?php
						}
						?>  
						</table><?php
						
					}
				}	
				else {

					echo "no result";
				}
			}
				if(isset($_POST['searchtbtn'])){

					$SearchID = $_POST['search'];

				$sql = " SELECT * FROM staff WHERE username LIKE '%$SearchID%'";

				if($result = $conn->query($sql)){

					if($result->num_rows > 0){
						?>
						<table border = '1px solid black' width = 90%;>

						<th>First Name</th>
						<th>Middle name</th>
						<th>Last name</th>
						<th>Email</th>
						<th>Contact Number</th>
						<th>Address</th>
						<th>UserName</th>
						<th>Password</th>
						<th>Role</th>

					</tr>	

						<?php

						while($row = $result->fetch_assoc()){
						?>
							<tr>
							<td><?php echo $row["fName"]?></td>
							<td><?php echo $row["mName"]?></td>
							<td><?php echo $row["lName"]?></td>
							<td><?php echo $row["email"]?></td>
							<td><?php echo $row["phone"]?></td>
							<td><?php echo $row["address"]?></td>	
							<td><?php echo $row["username"]?></td>
							<td><?php echo $row["password"]?></td>
							<td><?php echo $row["role"]?></td>
							
							</tr>
						<?php
						}
						?>  
						</table><?php
						
					}
				}	
				else {
						
					echo "no result";
				}
			}
				?>

			</div>
		</div>

	</div>
</div>
</body>

</html>

