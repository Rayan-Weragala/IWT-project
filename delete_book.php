<?php
include 'connection.php';

?>
<html>
	<head>
	<link rel = "stylesheet" type = "text/css" href = "styles/Manage_inventory.css">
	</head>
	<body>
		<div id = "containerform">
			<div id = "form">
			 <?php
?>

<form method = "POST" enctype="multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<h3>Delete Book</h3>
					<input id = "inputbtns" type="text" name="search">
					<input id = "inputbtns" type="submit" value="Submit" name="submitbtn">
					<input type="reset" value="Reset" name= "resetbtn">
</form>

			
<?php	
//if update btn is clicked
		
if(isset($_POST["submitbtn"])){	 
	
	$SearchID = $_POST["search"];

			$sql = "DELETE FROM books WHERE Book_ID = '$SearchID'";
			if(mysqli_query($conn, $sql)){
				echo "Deleted successfully";
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