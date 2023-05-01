<?php
include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html>	

<head>
<div>
<link rel = "stylesheet" type = "text/css" href = "styles/Manage_library.css">
<link rel = "stylesheet" type = "text/css" href = "styles/side-bar.css">
<script src="./js/script.js"></script>
<title>Return book</title>
</head>

<body>
<?php
include 'side-bar.php';
?>
	<!-- container-->
	
<div class = "container">
	<div id = "Top">
	<form method="post" >
		<h3>ENTER Return Book</h3>
		<label>Book_ID</label>
		<input type = "text" name = "bookname"/><br>

		<label>User_ID</label>
		<input type = "text" name = "userid"/><br>

		<label>Date</label>
		<input type = "text" name = "name"/><br>

		<input type = "submit" value = "submit" name = "submitbtn"></button><br>
	</form>
<?php
	//delete from issue Book
	if(isset($_POST['submitbtn'])) {
			
			$userID = $_POST["userid"];
			$bookID = $_POST["bookid"];

			$sql = "delete FROM issuedbooks WHERE Book_ID = '$userID'";
			$sql1 = "SELECT Quantity FROM books WHERE Book_ID = '$bookID'";


			if($result = $conn->query($sql)){
				echo "Deleted Success";
				}
				else {
					Echo "error";
				}
				if($result = $conn->query($sql1)){
					echo " Added Success";
					}
					else {
						Echo "error";
					}
			}
			?>
				
	</div>
	<div id = "Bottom">
		<div id = "table">
			<h3>Books to be Returned</h3>
		<?php
		 //read_books
			$sql = " SELECT * FROM issuedbooks";

			if($result = $conn->query($sql)){

				if($result->num_rows > 0){
					?>
					<table border = '1px solid black' width = 90%;>

					<th>Book_ID</th>
					<th>User_ID</th>
					<th>IssueDate</th>
					<th>ReturnDate</th>
					<th>returnedDate</th>
				</tr>	

					<?php

					while($row = $result->fetch_assoc()){
					?>
						<tr>
						<td><?php echo $row["Book_ID"]?></td>
						<td><?php echo $row["User_ID"]?></td>
						<td><?php echo $row["IssueDate"]?></td>
						<td><?php echo $row["returnDate"]?></td>
						<td><?php echo $row["returnedDate"]?></td>
						
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
			?>
		</div>

	</div>
</div>

</body>

</html>

