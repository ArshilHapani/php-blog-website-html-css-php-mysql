<?php
$blog_title = urlencode($_POST["blog_title"]);
$blog_description = urlencode($_POST["blog_description"]);
$username = $_COOKIE["blog_user"];
$raw_image = $_FILES["blog_image"]["tmp_name"];
$blob_image = addslashes(file_get_contents($raw_image));

if (sha1($username) !== $_COOKIE["blog_hash"]) {
    header("location:../forms/signUp.php?verify_flag=false");
    return;
} else {

    $conn = mysqli_connect("localhost", "root", "", "php_mini_project_blog_website");
    $query = mysqli_query($conn, "insert into blogs values ('$username','$blog_title','$blog_description', CURRENT_TIMESTAMP,'$blob_image') ");

    header("location:../containers/user.php/user.php?blogFlag=true");
}
