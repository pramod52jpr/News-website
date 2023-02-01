<?php
session_start();
include "conn.php";
if(!isset($_GET['id'])){
    Header("Location: $secure://$hostname");
}
$post_id=$_GET['id'];
$sql2="select * from post where `post_id`=$post_id;";
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);
$img=$row2['post-img'];

echo $sql3="select * from post where `post-img`='$img';";
$result3=mysqli_query($conn,$sql3);
if(mysqli_num_rows($result3)==1){
    unlink("images/".$img);
}

$sql="delete from post where `post_id`=$post_id;";
$result=mysqli_query($conn,$sql);
mysqli_close($conn);
Header("Location: $secure://$hostname/mypost.php");
?>