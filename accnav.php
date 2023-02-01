<nav class="navbar">
    <a style="margin-left:2px" href="/">Home</a>
    <a href="mypost.php">My Post</a>
    <?php
    $sql7="select `admin` from user where `User-Id`=$_SESSION[user_id]";
    $result7=mysqli_query($conn,$sql7);
    $row7=mysqli_fetch_assoc($result7);
    if($row7['admin']==1){ ?>
        <a href="allpost.php">All Posts</a>
        <a href="allcategory.php">Category</a>
        <a href="users.php">Users</a>
    <?php } ?>
</nav>