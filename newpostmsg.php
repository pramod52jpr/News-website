<?php
session_start();
include "conn.php";
if(!isset($_POST['title']) and !isset($_POST['desc'])){
    Header("Location: $secure://$hostname");
}
$title=$_POST['title'];
$desc=$_POST['desc'];
$category=$_POST['category'];
$author=$_SESSION['user_id'];
$errors=array();
if(str_word_count($desc)<100){
    $errors[]="Description should be minimum 100 words";
}
$img_name=$_FILES['image']['name'];
$img_type=$_FILES['image']['type'];
$img_tmp=$_FILES['image']['tmp_name'];
$img_size=$_FILES['image']['size'];
$extention=strtolower((explode('.',$img_name)[(count(explode('.',$img_name)))-1]));
$ext_array=array("jpg","jpeg","png");
if(in_array($extention,$ext_array) === false and $img_size > 2097152){
    $errors[]="File must be in jpg,jpeg or png";
    $errors[]="File size must be less than or equal to 2MB";
}
elseif(in_array($extention,$ext_array) === false){
    $errors[]="File must be in jpg,jpeg or png";
}
elseif($img_size > 2097152){
    $errors[]="File size must be less than or equal to 2MB";
}
else{
    move_uploaded_file($img_tmp,"images/".$img_name);
}
if(empty($errors)==false){
    foreach ($errors as $value) {
        echo "<h1 align='center' style='color:red'>$value</h1><br>";
    }
    die("<h1 align='center'>Go Back!</h1>");
}

$sql="insert into post (`post-title`,`post-desc`,`post-img`,`category-id`,`Author-id`) values('$title','$desc','$img_name',$category,$author)";
$result=mysqli_query($conn,$sql);
mysqli_close($conn);
Header("Location: $secure://$hostname/mypost.php");
?>