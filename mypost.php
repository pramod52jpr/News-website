        <?php include 'header.php'; ?>
        <?php
        if(!isset($_SESSION['email'])){
                Header("Location: $secure://$hostname");
        }
        ?>
        <?php include 'accnav.php'; ?>
        <?php
        
        $sql3="select * from post where `Author-id`=$_SESSION[user_id]";
        $result3=mysqli_query($conn,$sql3);
        $total_post=mysqli_num_rows($result3);
        $limit=6;
        $page=ceil($total_post/$limit);
        if(isset($_GET['page'])){
                $page_index=$_GET['page'];
        }else{
                $page_index=1;
        }
        $offset=($limit*$page_index)-$limit;
        $sql="select * from post left join category on post.`category-id`=category.`c-id` left join user on post.`Author-id`=user.`User-Id` where `Author-id`=$_SESSION[user_id] limit $offset,$limit";
        $result=mysqli_query($conn,$sql);
        ?>
        <div class="all-post">My Posts<a href="newpost.php">Add Post</a></div>
        <div class="posts">
                <table border="1px" cellspacing="0" bordercolor="black">
                        <thead>
                                <tr>
                                        <th>Sr.No.</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                </tr>
                        </thead>
                        <tbody align="center">
                                <?php 
                                $sr=$offset+1;
                                if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_assoc($result)){ 
                                        $date=implode("/",array_reverse(explode("-",$row['post-date'])));
                                        ?>
                                <tr class="main-post">
                                        <td><?php echo $sr ?></td>
                                        <td><?php echo $row['post-title'] ?></td>
                                        <td><img src="<?php echo 'images/'.$row['post-img'] ?>" alt="<?php echo $row['post-img'] ?>"></td>
                                        <td><?php echo $row['category'] ?></td>
                                        <td><?php echo $row['First-Name'].' '.$row['Last-Name'] ?></td>
                                        <td><?php echo $date ?></td>
                                        <td><a href="post.php?id=<?php echo $row['post_id'] ?>">Read</a><a href="update.php?id=<?php echo $row['post_id'] ?>">Edit</a><a href="delete.php?id=<?php echo $row['post_id'] ?>">Delete</a></td>
                                </tr>
                                <?php  $sr++;  }
                                } else{ ?>
                                <tr class="no-post">
                                        <td colspan="7"><span>No Post Yet!</span><a href="newpost.php">Add Post</a></td>
                                </tr>
                                <?php } ?>
                        </tbody>
                </table>
        </div>
        <div class="pagination">
                <?php if($page_index>1){ ?>
                <a style="border-radius:8px 0px 0px 8px" href="<?php echo $_SERVER['PHP_SELF'].'?page='.($page_index-1); ?>">Prev</a>
                <?php } ?>
                <?php for($i=1;$i<=$page;$i++){ 
                        if($page_index==$i){
                        $active=" style='background-color:greenyellow'";
                        }else{
                        $active="";
                        }
                echo "<a$active href='$_SERVER[PHP_SELF]?page=$i'>$i</a>";
                } ?>
                <?php if($page_index<$page){ ?>
                <a style="border-radius:0px 8px 8px 0px" href="<?php echo $_SERVER['PHP_SELF'].'?page='.($page_index+1); ?>">Next</a>
                <?php } ?>
        </div>
        <?php mysqli_close($conn); ?>
    </body>
</html>