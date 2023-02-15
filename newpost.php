        <?php include 'header.php'; ?>
        <?php
        if(!isset($_SESSION['email'])){
                Header("Location: $secure://$hostname");
        }
        ?>
        <div class="form">
            <form action="newpostmsg.php" method="post" enctype="multipart/form-data" onsubmit="error()">
                <table>
                    <tr>
                        <td><label for="title">Title</label></td><td><input type="text" placeholder="Enter Title" name="title" id="title" maxlength="30" required></td>
                    </tr>
                    <tr>
                        <td><label class="desc" for="desc">Description</label></td><td><textarea name="desc" placeholder="Write Description" id="desc" cols="30" rows="10" resize="false" required></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="image">Image</label></td><td><input style="border:none;padding:0px;border-radius:0px;" type="file" name="image" id="image" required></td>
                    </tr>
                    <tr>
                        <td><label for="category">Category</label></td><td><select name="category" id="category" required>
                            <option value="" selected disabled>Select Category</option>
                            <?php 
                            $sql="select * from category";
                            $result=mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_assoc($result)){ ?>
                                    <option value="<?php echo $row['c-id'] ?>"><?php echo $row['category'] ?></option>
                            <?php }
                            } ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input class="submit" type="submit" value="Post"></td>
                    </tr>
                </table>
            </form>
        </div>
        <?php include 'footer.php'; ?>
        <?php mysqli_close($conn); ?>
    </body>
</html>