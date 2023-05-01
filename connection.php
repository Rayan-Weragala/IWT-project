<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'library';

$conn = mysqli_connect($server, $username, $password, $database);
if(!$conn){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


 
?>