        <?php include 'header.php'; ?>
        <?php
        if(isset($_SESSION['user_name'])){
            Header("Location: $secure://$hostname");
        }
        ?>
        <div class="form">
            <form action="loginmsg.php" method="post">
                <table>
                    <tr>
                        <td><label for="username">Username </label></td><td>: <input type="text" placeholder="e.g. yourname@123" name="username" id="username" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password </label></td><td>: <input type="password" maxlength="8" placeholder="Enter Your Password" name="password" id="password" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input class="submit" type="submit" value="Log In"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><a href="registration.php">Click here for Registration</a></td>
                    </tr>
                </table>
            </form>
        </div>
        <?php include 'footer.php'; ?>
        <?php mysqli_close($conn); ?>
    </body>
</html>