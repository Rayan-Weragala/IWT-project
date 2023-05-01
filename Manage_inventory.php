<?php
include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html>	

<head>
<div>
<link rel = "stylesheet" type = "text/css"  href = "styles/Manage_inventory.css">
<link rel = "stylesheet" type = "text/css"  href = "styles/side-bar.css">
<script src="./js/script.js"></script>

<title>Manage Inventory</title>
</head>

<body>
	<?php
	include 'side-bar.php';
	?>

	
	<!--container-->
<div class = "container">
	<div id = "top">
			<div id = "searchbar">

				<form method="post" >
					<h3>Search Book</h3>
					<input id = "inputbtns" type="text" name="search">
					<input id = "inputbtns" type="submit" value="Submit" name="submitbtn">
					<input type="reset" value="Reset" name= "resetbtn">
					</form>
				
			</div>
			<div id = "filter">
				<form method = "post" action = "search_book.php">
					<label>Category</label>
				<select name = "category">
					<option value = "" disabled selected> Sort by</option>
					<option value = "1">A-Z</option>
				</select>
				<input type="submit" value="Submit" name="submitbtn1">
				<input type="reset" value="Reset"><br>
				</form>

		
			</div>
			<div id = "add">	

				<button><a href = "add_book.php">ADD NEW</a></button>

				
			</div>
			
				
			
	</div>

	<div id="middle">

		<?php
		 //read_books

		 
			//linking the configure file


		if(isset($_POST['submitbtn']) ==NULL){

			$sql = " SELECT * FROM books";

			if($result = $conn->query($sql)){

				if($result->num_rows > 0){
					?>
					<table border = '1px solid black' width = 90%;>

					<th>Book_ID</th>
					<th>Book Name</th>
					<th>Book Image</th>
					<th>Author</th>
					<th>Category</th>
					<th>ISBN</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Actions</th>
				</tr>	

					<?php

					while($row = $result->fetch_assoc()){
					?>
						<tr>
						<td><?php echo $row["Book_ID"]?></td>
						<td><?php echo $row["Name"]?></td>
						<td><img id = "covers" width= 25% alt ="image"src="./images/coverimages/<?php echo $row['image']; ?>"</td>
						<td><?php echo $row["Author"]?></td>
						<td><?php echo $row["Category"]?></td>
						<td><?php echo $row["ISBN"]?></td>
						<td><?php echo $row["Description"]?></td>
						<td><?php echo $row["Quantity"]?></td>
						<td><button> <a href ="update_book.php" target="_blank"> UPDATE </a></button><br>
						<button><a href ="delete_book.php" target="_blank"> DELETE </a></td>
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

		//A- Z display
		 //read_books


		if(isset($_POST['submitbtn1']) and $_POST['1']){

			$sql = " SELECT * FROM books ORDER BY Name ASC; ";

			if($result = $conn->query($sql)){

				if($result->num_rows > 0){
					?>
					<table border = '1px solid black' width = 90%;>

					<th>Book_ID</th>
					<th>Book Name</th>
					<th>Book Image</th>
					<th>Author</th>
					<th>Category</th>
					<th>ISBN</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Actions</th>
				</tr>	

					<?php

					while($row = $result->fetch_assoc()){
					?>
						<tr>
						<td><?php echo $row["Book_ID"]?></td>
						<td><?php echo $row["Name"]?></td>
						<td><img id = "covers" width= 25% alt ="image"src="./images/coverimages/<?php echo $row['image']; ?>"</td>
						<td><?php echo $row["Author"]?></td>
						<td><?php echo $row["Category"]?></td>
						<td><?php echo $row["ISBN"]?></td>
						<td><?php echo $row["Description"]?></td>
						<td><?php echo $row["Quantity"]?></td>
						<td><button> <a href ="update_book.php" target="_blank"> UPDATE </a></button><br>
						<button><a href ="delete_book.php" target="_blank"> DELETE </a></td>
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
		
		//search_books

		//reset

		if(isset($_POST['submitbtn'])) {
			
			$SearchID = $_POST["search"];

			$sql = "SELECT * FROM books WHERE Name LIKE '%$SearchID%'";

			if($result = $conn->query($sql)){
					if($result->num_rows>0){
						?>
						
						<table border = '1px inset black' width = 90%;>

						<th>Book_ID</th>
						<th>Book Name</th>
						<th>Book Image</th>
						<th>Author</th>
						<th>Category</th>
						<th>ISBN</th>
						<th>Description</th>
						<th>Quantity</th>
						<th>Actions</th>
						
						<?php

						while($row = $result->fetch_assoc()){
							?>
						<tr>
						<td><?php echo $row["Book_ID"]?></td>
						<td><?php echo $row["Name"]?></td>
						<td><img id = "covers" width= 25% alt ="image"src="./images/coverimages/<?php echo $row['image']; ?>"</td>
						<td><?php echo $row["Author"]?></td>
						<td><?php echo $row["Category"]?></td>
						<td><?php echo $row["ISBN"]?></td>
						<td><?php echo $row["Description"]?></td>
						<td><?php echo $row["Quantity"]?></td>
						<td><button> <a href ="update_book.php" target="_blank"> UPDATE </a></button><br>
						<button><a href ="delete_book.php" target="_blank"> DELETE </a></td>
						</tr>
						
					<?php
						}
						?>  
					</table><?php
					}
				}
				//refreshing and alert
				if($result = !$conn->query($sql)){ 
					header("refresh:0");
							?>
							
							<script>alert ("No search results")</script>
							<?php	
				}
			}

				$conn->close();

			?>

		</div>
	</div>

</div>
</body>

</html>

