        <?php include 'header.php'; ?>
        <?php
        if(!isset($_POST['email'])){
            Header("Location: $secure://$hostname");
        }
        
        $first_name=$_POST['fname'];
        $last_name=$_POST['lname'];
        $email=$_POST['email'];
        $password=md5($_POST['password']);

        $sql2="select * from user where `Email`='$email'";
        $result2=mysqli_query($conn,$sql2);
        if(mysqli_num_rows($result2)>0){
            echo "<h2 align='center' style='color:red'>Email Already Registered! Try Different One</h2>";
        }else{
            $code=mt_rand(111111,999999);
            $sub="verification Email From mereprabhu";
            $msg="Hey! Your verification Code is $code";
            $from="From: pramod52jpr@gmail.com";
            mail($email,$sub,$msg,$from);
        ?>
        <div class="form">
            <form action="registrationmsg.php" method="post">
                <table>
                    <input type="hidden" name="code" value="<?php echo $code; ?>">
                    <input type="hidden" name="fname" value="<?php echo $first_name; ?>">
                    <input type="hidden" name="lname" value="<?php echo $last_name; ?>">
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <input type="hidden" name="password" value="<?php echo $password; ?>">
                    <tr>
                        <td><label for="verifycode">Enter Verification Code </label></td><td>: <input type="number" placeholder="Enter Code" name="verifycode" id="verifycode" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input class="submit" type="submit" value="Verify"></td>
                    </tr>
                </table>
            </form>
        </div>
        <?php include 'footer.php'; ?>
        <?php } ?>
        <?php mysqli_close($conn); ?>
    </body>
</html>