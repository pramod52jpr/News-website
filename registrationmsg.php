<?php
session_start();
include 'conn.php';
if(!isset($_POST['email'])){
    Header("Location: $secure://$hostname");
}
$code=$_POST['code'];
$first_name=$_POST['fname'];
$last_name=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];
$verifycode=$_POST['verifycode'];
if($code!==$verifycode){
    echo "<h2 align='center' style='color:red'>Verification Failed! Please Try Again</h2>";
}else{
    $sql="insert into user(`First-Name`,`Last-Name`,`Email`,`Password`) values ('$first_name','$last_name','$email','$password');";
    $result=mysqli_query($conn,$sql);
    Header("Location: $secure://$hostname/login.php");
}
mysqli_close($conn);

?>