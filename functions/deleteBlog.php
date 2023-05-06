<?php
$blogTitle = $_POST['blogTitle'];
$blogDescription = $_POST['blogDescription'];
$username = $_POST['username'];


$conn = mysqli_connect("localhost", "root", "", "php_mini_project_blog_website");
$query = mysqli_query($conn, "delete from blogs where _username='$username' AND blogTitle='$blogTitle' AND blogDescription='$blogDescription';  ");

if ($query) {
    header("Location:../containers/myBlogs.php?deleteBlogFlag=true");
} else {
    echo "Failed to delete blog";
}
