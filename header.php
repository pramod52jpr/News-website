<?php
session_start();
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="https://kit.fontawesome.com/f67ad201d3.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="main">News</div>
        <div class="login">
            <?php 
            if(isset($_SESSION['email']) and isset($_SESSION['pass_word'])){
                echo "<b>Hello, ". $_SESSION['first_name']."</b>";?>
            <a class="account" href="mypost.php">My Account</a>
            <a  class="logout" href="logout.php">Logout</a>
            <?php
            }
            else{ ?>
            <a href="registration.php">Registration</a>
            <a href="login.php">Login</a>
            <?php } ?>
        </div>
    </div>