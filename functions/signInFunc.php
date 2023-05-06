<?php

$username = $_POST['username'];
$password = sha1($_POST['password']);
$conn = mysqli_connect("localhost", "root", "", "php_mini_project_blog_website");

$result = mysqli_query($conn, "select username from user where username='$username' AND password='$password'; ");
$row = mysqli_fetch_array($result);
if (!$row) {
    header("location:../forms/signUp.php?credentialsFlag=false");
    return;
} else {
    setcookie("blog_user", $username, time() + (3 * 24 * 60 * 60), "/");
    setcookie("blog_hash", sha1($username), time() + (3 * 24 * 60 * 60), "/");
    echo sha1($_COOKIE['blog_user']) . "<br>";
    echo $_COOKIE["blog_hash"];
    header("location:../index.php");
}
