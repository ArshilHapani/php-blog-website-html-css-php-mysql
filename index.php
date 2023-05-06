<div style="margin-top: 80px">
    <?php
    if (isset($_COOKIE["blog_user"]) && isset($_COOKIE["blog_hash"])) {
        if (sha1($_COOKIE['blog_user']) !== $_COOKIE["blog_hash"]) {
            header("location:./forms/signUp.php?verify_flag=false");
        } else {
            include "./components/navbar.php";
            include "./containers/home.php";
        }
    } else {
        header("location:./forms/signUp.php?verify_flag=false");
    }
    ?>
</div>