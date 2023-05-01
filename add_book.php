<?php
include 'connection.php';
session_start();
?>
<html>
	<head>
	<link rel = "stylesheet" type = "text/css" href = "styles/Manage_inventory.css">
	<link rel = "stylesheet" type = "text/css" href = "styles/side-bar.css">	
	<script src="./js/script.js"></script>
</head>
	<body>
		<?php
		include 'side-bar.php';
		?>
		<div  style="background-image: url('images/cover.jpg')" id = "containerform">
			<div id = "form">
			 <?php

//linking the config.php
?>
<center>
<form method = "POST" enctype="multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<h2> ADD A NEW BOOK </h2>
		<hr>
				<label>Book Name</label><br>
				<input id = "input"	type = "text" name = "name"/><br>
				
				<label>Book Image</label><br>
				<input id = "input1" type = "file"name = "image" />
				<input type  = "reset" value = "reset"><br>	

				<label>Author</label><br>
				<input id = "input" type = "text" name = "author"/><br>
			
				<label>Category</label><br>
				<select id = "input" name = "category">
					<option  disabled selected>All books</option>
					<option value = "fantasy">Fantasy </option>
					<option value = "science fiction">Science Fiction </option>
					<option value = "adventure">Adventure </option>
					<option value = "romance">Romance </option>
					<option value = "detective & mystery">Detective & Mystery </option>
					<option value = "comic">Comic</option>
					<option value = "science & math">Science & math </option>
					<option value = "biographies">Biographies</option>
					<option value = "health and fitness">Health and Fitness </option>
					<option value = "home & garden">Home & Garden </option>
					<option value = "business">Business </option>
					<option value = "cooking">Cooking </option>
					<option value = "horror">Horror</option>
				</select><br>
				
				<label>ISBN</label><br>
				<input id = "input" type = "text" name = "isbn"/><br>
				
				<label>Description</label><br>
				<input id = "input" type = "text" name = "description"/><br>
				
				<label>Quantity</label><br>
				<input id = "input" type = "number" name = "quantity"/><br>
			
				<input id = "inputbtn" type = "submit" value = "ADD BOOK" name = "submitbtn"></button><br>
			<hr>
</form>
</center>	

			
<?php
//if upload btn is clicked
		
if(isset($_POST["submitbtn"])){


$name = $_POST["name"];

//insert image
$bimage = $_FILES["image"]["name"];
$tempbimage = $_FILES["image"]["tmp_name"];
$folder = "C://xampp/htdocs/project/images/books/" .$bimage;	

$author = $_POST["author"];
$category = $_POST["category"];
$isbn = $_POST["isbn"];
$description = $_POST["description"];
$quantity = $_POST["quantity"];

$sql = "insert into books(Name, image, Author, Category, ISBN, Description, Quantity )
values('$name','$bimage','$author','$category','$isbn','$description','$quantity') ";

if(mysqli_query($conn, $sql)){
	echo "new record created successfully";
		if(move_uploaded_file($tempbimage, $folder)) {
			?><script>alert("Image upload Success");</script><?php
			header("location:Manage_inventory.php");
		}
		else{
			echo "Image upload failed";
		}
	}
	else{
	echo "error".$sql."<br>".mysqil_error($conn);
	}
}	
mysqli_close($conn);
?>
</div>
</div>
</body>
	</html>