        <?php include 'header.php'; ?>
        <?php
        if(isset($_SESSION['email'])){
            Header("Location: $secure://$hostname");
        }
        ?>
        <div class="form">
            <form action="loginmsg.php" method="post">
                <table>
                    <tr>
                        <td><label for="email">Email </label></td><td>: <input type="email" placeholder="Enter Your Email" name="email" id="email" required></td>
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