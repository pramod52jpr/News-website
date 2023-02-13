        <?php include 'header.php'; ?>
        <?php
        if(!isset($_SESSION['user_name'])){
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
        $sql2="select * from user";
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
        $sql="select count(`post_id`) as 'number',`User-Id`,`First-Name`,`Last-Name`,`Username`,`Password` from user left join post on post.`Author-id`=user.`User-Id` group by `User-Id` limit $offset,$limit";
        $result=mysqli_query($conn,$sql);
        ?>
        <div class="all-post">Users<a href="newpost.php">Add Post</a></div>
        <div class="posts">
            <table border="1px" cellspacing="0" bordercolor="black">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>User_Id</th>
                        <th>Authors</th>
                        <th>No. of Posts</th>
                        <th>Username</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php 
                    $sr=1;
                    if(mysqli_num_rows($result)>0){
                        $sr=1;
                        while($row=mysqli_fetch_assoc($result)){ ?>
                        <tr class="main-post">
                            <td><?php echo $sr ?></td>
                            <td><?php echo $row['User-Id'] ?></td>
                            <td><?php echo $row['First-Name'].' '.$row['Last-Name'] ?></td>
                            <td><?php echo $row['number'] ?></td>
                            <td><?php echo $row['Username'] ?></td>
                            <td><?php echo $row['Password'] ?></td>
                        </tr>
                    <?php $sr++; }
                    } else{ ?>
                        <tr>
                            <td colspan="6">No User Exist</td>
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