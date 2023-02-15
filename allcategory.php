        <?php include 'header.php'; ?>
        <?php
        if(!isset($_SESSION['email'])){
            Header("Location: $secure://$hostname");
        }else{
            $sql6="select `admin` from user where `User-Id`=$_SESSION[user_id]";
            $result6=mysqli_query($conn,$sql6);
            $row6=mysqli_fetch_assoc($result6);
            if(!($row6['admin']==1)){
                Header("Location: $secure://$hostname");
            }
        }
        ?>
        <?php include 'accnav.php'; ?>
        <?php
        $sql="select count(`post_id`) as 'number',`category` from post left join category on post.`category-id`=category.`c-id` group by `category`";
        $result=mysqli_query($conn,$sql);
        ?>
        <div class="all-post">Categories<a href="newpost.php">Add Post</a></div>
        <div class="posts">
            <table border="1px" cellspacing="0" bordercolor="black">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>No. of Posts</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php 
                    $sr=1;
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){ ?>
                        <tr class="main-post">
                            <td><?php echo $row['category'] ?></td>
                            <td><?php echo $row['number'] ?></td>
                        </tr>
                    <?php  }
                    } ?>
                </tbody>
            </table>
        </div>
        <?php mysqli_close($conn); ?>
    </body>
</html>