<?php
session_start();
include "conn.php";
if(!isset($_SESSION['user_name'])){
    if(!isset($_POST['post_id'])){
        Header("Location: $secure://$hostname");
    }
    Header("Location: $secure://$hostname");
}
$post_id=$_POST['post_id'];
$post_title=$_POST['title'];
$post_desc=$_POST['desc'];
$post_category=$_POST['category'];
$errors=array();
if(str_word_count($post_desc)<100){
    $errors[]="Description should be minimum 100 words";
}
$file_name=$_FILES['image']['name'];
$file_type=$_FILES['image']['type'];
$file_tmp=$_FILES['image']['tmp_name'];
$file_size=$_FILES['image']['size'];
$extension=strtolower(explode('.',$file_name)[(count(explode('.',$file_name)))-1]);
$ext_array=array('jpg','jpeg','png');
if(in_array($extension,$ext_array) === false and $file_size > 2097152){
    $errors[]="File must be in jpg,jpeg or png";
    $errors[]="File size must be less than or equal to 2MB";
}
elseif(in_array($extension,$ext_array) === false){
    $errors[]="File must be in jpg,jpeg or png";
}
elseif($file_size > 2097152){
    $errors[]="File size must be less than or equal to 2MB";
}
else{
    move_uploaded_file($file_tmp,'images/'.$file_name);
}
if(empty($errors)==false){
    foreach($errors as $value){
        echo "<h1 align='center' style='color:red'>$value</h1><br>";
    }
    die("<h1 align='center'>Go Back!</h1>");
}

$sql="update post set `post-title`='$post_title',`post-desc`='$post_desc',`post-img`='$file_name',`category-id`=$post_category where `post_id`=$post_id;";
$result=mysqli_query($conn,$sql);
mysqli_close($conn);
Header("Location: $secure://$hostname/mypost.php");
?>