<?php if (isset($_COOKIE["blog_user"]) && isset($_COOKIE["blog_hash"])) {
    if (sha1($_COOKIE['blog_user']) !== $_COOKIE["blog_hash"]) {
        header("location:./forms/signUp.php?verify_flag=false");
    } else {
    }
} else {
    header("location:./forms/signUp.php?verify_flag=false");
}
