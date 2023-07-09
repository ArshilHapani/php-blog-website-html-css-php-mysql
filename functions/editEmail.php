<?php
$email = $_POST["email"];
$username = $_POST["user"];

if (sha1($username) !== $_COOKIE["blog_hash"]) {
    header("location:../forms/signUp.php?verify_flag=false");
    return;
} else {
    $conn = mysqli_connect("localhost", "root", "", "php_mini_project_blog_website");
    $query = mysqli_query($conn, "update user set email = '$email' where username='$username';");

    if ($query) {
        header("location:../containers/user.php?emailUpdateFlag=true");
    }
}
