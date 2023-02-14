        <?php include 'header.php'; ?>
        <?php
        if(!isset($_GET['cid'])){
            Header("Location: $secure://$hostname");
        }
        ?>
        <?php include 'navbar.php'; ?>
        <div class="news-container">
            <div class="news">
                <?php 
                $sql6="select * from category where `c-id`=$cid";
                $result6=mysqli_query($conn,$sql6);
                $row6=mysqli_fetch_assoc($result6); ?>
                <h1><?php echo $row6['category'] ?></h1>
                <div class="news-item-container">
                    <?php if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){ 
                            $date=join("/",array_reverse(explode("-",$row['post-date'])));
                            ?>
                        <div class="news-item">
                            <a href="post.php?id=<?php echo $row['post_id'] ?>" class="image"><img src="<?php echo 'images/'.$row['post-img']; ?>" alt="<?php echo $row['post-img']; ?>"></a>
                            <div>
                                <a href="post.php?id=<?php echo $row['post_id'] ?>" class="title"><h4><?php echo $row['post-title']; ?></h4></a>
                                <a href="<?php echo 'category.php?cid='.$row['c-id']; ?>" class="features" style="margin-top:5px;display:inline-block"><i class='fa-solid fa-tag'></i><?php echo $row['category']; ?></a>
                                <a href="<?php echo 'author.php?aid='.$row['User-Id']; ?>" class="features"><i class='fa-solid fa-user'></i><?php echo $row['First-Name'].' '.$row['Last-Name']; ?></a>
                                <span><i class='fa-solid fa-calendar-days'></i><?php echo $date ; ?></span>
                                <p style="text-indent:0.5cm;margin-top:5px"><?php echo substr($row['post-desc'],0,150).'...'; ?><a href="post.php?id=<?php echo $row['post_id'] ?>">read more</a></p>
                            </div>
                        </div>
                    <?php  }
                    } else{ ?>
                        <h2 style="text-align:center;color:red">No Result Found</h2>
                    <?php } ?>
                </div>
                <div class="pagination">
                    <?php if($page_index>1){ ?>
                        <a style="border-radius:8px 0px 0px 8px" href="<?php echo $_SERVER['PHP_SELF'].'?page='.($page_index-1).'&cid='.$cid; ?>">Prev</a>
                    <?php } ?>
                    <?php for($i=1;$i<=$page;$i++){ 
                            if($page_index==$i){
                                $active=" style='background-color:greenyellow'";
                            }else{
                                $active="";
                            }
                        echo "<a$active href='$_SERVER[PHP_SELF]?page=$i&cid=$cid'>$i</a>";
                    } ?>
                    <?php if($page_index<$page){ ?>
                        <a style="border-radius:0px 8px 8px 0px" href="<?php echo $_SERVER['PHP_SELF'].'?page='.($page_index+1).'&cid='.$cid; ?>">Next</a>
                    <?php } ?>
                </div>
            </div>
            <div class="sidebar">
                <div class="searchbar">
                    <form action="search.php" method="get">
                        <input class="search" type="search" name="search">
                        <input class="btn" type="submit" value="Search">
                    </form>
                    <?php 
                    if(isset($_SESSION['user_name']) and isset($_SESSION['pass_word'])){
                    ?>
                    <a href="newpost.php">Add Post</a>
                    <?php } ?>
                </div>
                <div class="recentbar">
                    <div class="heading">
                        <h1>Recent news</h1>
                        <hr size="5px" width="95%">
                    </div>
                    <marquee behavior="scroll" direction="up" height="520px" scrollamount="5" onmouseover="this.stop()" onmouseout="this.start()">
                        <div class="recent-news-container">
                            <?php 
                            $sql4="select * from post left join category on post.`category-id`=category.`c-id` left join 
                                    user on post.`Author-id`=user.`User-Id` order by `post_id` desc limit 5";
                            $result4=mysqli_query($conn,$sql4);
                            if(mysqli_num_rows($result4)>0){
                                while($row4=mysqli_fetch_assoc($result4)){ ?>
                                    <div class="recent-news">
                                        <a href="ReadPost.php?id=<?php echo $row4['post_id'] ?>" class="image"><img src="<?php echo 'images/'.$row4['post-img'] ?>" alt="<?php echo $row4['post-img'] ?>"></a>
                                        <div>
                                            <a href="ReadPost.php?id=<?php echo $row4['post_id'] ?>" class="title"><h5><?php echo $row4['post-title'] ?></h5></a>
                                            <a href="category.php?cid=<?php echo $row4['c-id'] ?>" class="category"><i class='fa-solid fa-tag'></i><?php echo $row4['category'] ?></a>
                                            <span><i class="fa-solid fa-calendar-days"></i><?php echo join("/",array_reverse(explode("-",$row4['post-date']))); ?></span><br>
                                            <a href="ReadPost.php?id=<?php echo $row4['post_id'] ?>" class="read">Read Post</a>
                                        </div>
                                    </div>
                                    <hr size="1px" width="90%">
                            <?php  }
                            }   ?>
                        </div>
                    </marquee>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
        <?php mysqli_close($conn); ?>
    </body>
</html>