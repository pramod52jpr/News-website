<?php
session_start();
include 'conn.php';
if(!isset($_POST['username'])){
    Header("Location: $secure://$hostname");
}
$first_name=$_POST['fname'];
$last_name=$_POST['lname'];
$username=mysqli_real_escape_string($conn,$_POST['username']);
$password=md5($_POST['password']);

$sql2="select * from user where `Username`='$username' and `Password`='$password';";
$result2=mysqli_query($conn,$sql2);
if(mysqli_num_rows($result2)>0){
    echo "<h2 align='center' style='color:red'>Please Go Back and try different Username or Password</h2>";
    die();
}
echo $sql="insert into user(`First-Name`,`Last-Name`,`Username`,`Password`) values ('$first_name','$last_name','$username','$password');";
$result=mysqli_query($conn,$sql);
Header("Location: $secure://$hostname/login.php");
mysqli_close($conn);

?>