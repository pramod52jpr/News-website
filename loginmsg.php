<?php
session_start();
include 'conn.php';
if(!isset($_POST['email'])){
    Header("Location: $secure://$hostname");
}
$email=mysqli_real_escape_string($conn,$_POST['email']);
$password=md5($_POST['password']);

$sql="select * from user where `Email`='$email' and `Password`='$password'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    Header("Location: $secure://$hostname");
    $row=mysqli_fetch_assoc($result);
    $_SESSION['user_id']=$row['User-Id'];
    $_SESSION['first_name']=$row['First-Name'];
    $_SESSION['last_name']=$row['Last-Name'];
    $_SESSION['email']=$row['Email'];
    $_SESSION['pass_word']=$row['Password'];
}
else{
    echo "<h1 align='center' style='color:red'>Wrong Email or Password! Go Back</h1>";
}
mysqli_close($conn);
?>