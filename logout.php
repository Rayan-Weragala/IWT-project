<?php
session_start();
if(isset($_SESSION['login_user'])){
    unset($_SESSION['login_user']);
    header("location:home.php");
}
if(isset($_SESSION['login_staff'])){
    unset($_SESSION['login_staff']);
    header("location:home.php");}
if(isset($_SESSION['user'] )){
    unset($_SESSION['user'] );
    header("location:home.php");}
    
?>