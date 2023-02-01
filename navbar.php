<?php
if(isset($_GET['cid'])){
    $cid=$_GET['cid'];
    $sql2="select * from post where `category-id`=$cid";
    $result2=mysqli_query($conn,$sql2);
    $total_post=mysqli_num_rows($result2);
    $limit=6;
    $page=ceil($total_post/$limit);
    if(isset($_GET['page'])){
        $page_index=$_GET['page'];
    }else{
        $page_index=1;
    }
    $offset=($limit*$page_index)-$limit;
    $sql="select * from post left join category on post.`category-id`=category.`c-id` left join 
        user on post.`Author-id`=user.`User-Id` where `category-id`=$cid limit $offset,$limit";
    $result=mysqli_query($conn,$sql);
}elseif(isset($_GET['aid'])){
    $cid='';
    $aid=$_GET['aid'];
    $sql2="select * from post where `Author-id`=$aid";
    $result2=mysqli_query($conn,$sql2);
    $total_post=mysqli_num_rows($result2);
    $limit=6;
    $page=ceil($total_post/$limit);
    if(isset($_GET['page'])){
        $page_index=$_GET['page'];
    }else{
        $page_index=1;
    }
    $offset=($limit*$page_index)-$limit;
    $sql="select * from post left join category on post.`category-id`=category.`c-id` left join 
        user on post.`Author-id`=user.`User-Id` where `Author-id`=$aid limit $offset,$limit";
    $result=mysqli_query($conn,$sql);
}elseif(isset($_GET['search'])){
    $cid='';
    $search=$_GET['search'];
    $sql2="select * from post where `post-title` like'%$search%' or `post-desc` like'%$search%'";
    $result2=mysqli_query($conn,$sql2);
    $total_post=mysqli_num_rows($result2);
    $limit=6;
    $page=ceil($total_post/$limit);
    if(isset($_GET['page'])){
        $page_index=$_GET['page'];
    }else{
        $page_index=1;
    }
    $offset=($limit*$page_index)-$limit;
    $sql="select * from post left join category on post.`category-id`=category.`c-id` left join 
        user on post.`Author-id`=user.`User-Id` where `post-title` like'%$search%' or `post-desc` like'%$search%' limit $offset,$limit";
    $result=mysqli_query($conn,$sql);
}else{
    $cid='';
    $sql2="select * from post";
    $result2=mysqli_query($conn,$sql2);
    $total_post=mysqli_num_rows($result2);
    $limit=6;
    $page=ceil($total_post/$limit);
    if(isset($_GET['page'])){
        $page_index=$_GET['page'];
    }else{
        $page_index=1;
    }
    $offset=($limit*$page_index)-$limit;
    $sql="select * from post left join category on post.`category-id`=category.`c-id` left join 
        user on post.`Author-id`=user.`User-Id` limit $offset,$limit";
    $result=mysqli_query($conn,$sql);
}
?>
<nav class="navbar">
    <a style="margin-left:5px" href="/">Home</a>
    <?php 
    $sql3="select * from category where `c-id` in(1,2,3,4)";
    $result3=mysqli_query($conn,$sql3);
    if(mysqli_num_rows($result3)>0){
        while($row3=mysqli_fetch_assoc($result3)){
            if($cid==$row3['c-id']){
                $active2=' style="background:rgb(75, 29, 227)"';
            }else{
                $active2='';
            }
            echo "<a{$active2} href='category.php?cid={$row3['c-id']}'>{$row3['category']}</a>";
        } }   ?>
</nav>