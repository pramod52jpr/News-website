        <?php include 'header.php'; ?>
        <?php
        if(!isset($_SESSION['email'])){
            if(!isset($_GET['id'])){
                Header("Location: $secure://$hostname");
            }
            Header("Location: $secure://$hostname");
        }
        $post_id=$_GET['id'];
        $sql="select * from category";
        $result=mysqli_query($conn,$sql);
        $sql2="select * from post where `post_id`=$post_id";
        $result2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);
        ?>
        <div class="form">
            <form action="updatemsg.php" method="post" enctype="multipart/form-data">
                <table cellpadding="10">
                    <input type="hidden" name="post_id" value="<?php echo $row2['post_id'] ?>">
                    <tr>
                        <td><label for="title">Title : </label></td><td><input type="text" placeholder="Enter Title" name="title" id="title" maxlength="30" value="<?php echo $row2['post-title'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label class="desc" for="desc">Description : </label></td><td><textarea name="desc" placeholder="Write Description" id="desc" cols="30" rows="10" required><?php echo $row2['post-desc'] ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="image">Image : </label></td><td><input style="border:none" type="file" name="image" id="image" required></td>
                    </tr>
                    <tr>
                        <td><label for="category">Category : </label></td><td><select name="category" id="category" required>
                            <option value="" disabled>Select Category</option>
                            <?php if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_assoc($result)){
                                    if($row['c-id']==$row2['category-id']){
                                        $select=" selected";
                                    }else{
                                        $select="";
                                    } ?>
                                    <option value="<?php echo $row['c-id']; ?>"<?php echo $select; ?>><?php echo $row['category'] ?></option>
                            <?php }
                            } ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input class="submit" type="submit" value="Update"></td>
                    </tr>
                </table>
            </form>
        </div>
        <?php include 'footer.php'; ?>
        <?php mysqli_close($conn); ?>
    </body>
</html>