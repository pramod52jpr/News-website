        <?php include 'header.php'; ?>
        <?php
        if(isset($_SESSION['user_name'])){
            Header("Location: $secure://$hostname");
        }
        ?>
        <div class="form">
            <form action="registrationmsg.php" method="post">
                <table>
                    <tr>
                        <td><label for="fname">First Name </label></td><td>: <input type="text" placeholder="Enter First Name" name="fname" id="fname" required></td>
                    </tr>
                    <tr>
                        <td><label for="lname">Last Name </label></td><td>: <input type="text" placeholder="Enter Last Name" name="lname" id="lname" required></td>
                    </tr>
                    <tr>
                        <td><label for="username">Username </label></td><td>: <input type="text" placeholder="e.g. yourname@123" name="username" id="username" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password </label></td><td>: <input type="password" placeholder="Enter Your Password" maxlength="8" name="password" id="password" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input class="submit" type="submit" value="Submit"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><a href="login.php">Click here for Login</a></td>
                    </tr>
                </table>
            </form>
        </div>
        <?php include 'footer.php'; ?>
        <?php mysqli_close($conn); ?>
    </body>
</html>