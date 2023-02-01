        <?php include 'header.php'; ?>
        <?php
        if(isset($_GET['id'])){
            $post_id=$_GET['id'];
        }else{
            $post_id=1;
            Header("Location: $secure://$hostname");
        }
        $sql="select * from post left join category on post.`category-id`=category.`c-id` left join user on post.`Author-id`=user.`User-Id` where `post_id`=$post_id";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $date=implode("/",array_reverse(explode("-",$row['post-date'])));
        ?>
        <div class="postTitle">
            <?php echo $row['post-title'] ?>
        </div>
        <div class="content">
            <div class="about">
                <div class="author">Author : <?php echo $row['First-Name']." ".$row['Last-Name'] ?></div>
                <div class="date">Publish Date : <?php echo $date ?></div>
            </div>
            <div class="image">
                <img src="<?php echo 'images/'.$row['post-img'] ?>" alt="<?php echo $row['post-img'] ?>">
            </div>
            <p><?php echo $row['post-desc'] ?></p>
        </div>
        <?php include 'footer.php'; ?>
        <?php mysqli_close($conn); ?>
    </body>
</html>