<?php
$nickname = $_POST["nickname"];
$username = $_COOKIE["blog_user"];

if (sha1($username) !== $_COOKIE["blog_hash"]) {
    header("location:../forms/signUp.php?verify_flag=false");
    return;
} else {
    $conn = mysqli_connect("localhost", "root", "", "php_mini_project_blog_website");
    $query = mysqli_query($conn, "select * from user where username='$username' and question='$nickname';");
    $row = mysqli_fetch_row($query);
    if (!$row) {
        header("location:../forms/forgetPassword.php?nicknameFlag=false");
    } else {
        header("location:../forms/resetPassword.php?questionResult=$nickname");
    }
}
