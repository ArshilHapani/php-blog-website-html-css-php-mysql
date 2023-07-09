<?php

try {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $question = $_POST['question'];
    $password = sha1($_POST['password']);

    echo $username;
    if (!validate_username($username)) {
        header("location:../forms/signUp.php?invalidUsernameFlag=true");
        return;
    } else {
        $conn = mysqli_connect("localhost", "root", "", "php_mini_project_blog_website");
        $query = mysqli_query($conn, "select * from user where username = '$username' OR email = '$email';");
        $row = mysqli_fetch_array($query);
        if ($row) {
            header("location:../forms/signUp.php?usernameAndEmailFlag=true");
            return;
        } else {
            $query = mysqli_query($conn, "insert into user values ('$username','$email','$password','$question');");
            if ($query) {
                echo "<script>alert('welcome to blog express');</script>";
                setcookie("blog_user", $username, time() + (3 * 24 * 60 * 60), "/");
                setcookie("blog_hash", sha1($username), time() + (3 * 24 * 60 * 60), "/");
                header("location:../index.php");
            }
        }
    }
} catch (Exception $th) {
    echo $th;
}
function validate_username($username)
{
    if (empty($username)) {
        return false;
    }
    if (!preg_match('/^[a-zA-Z0-9_-]+$/', $username)) {
        return false;
    }
    if (strlen($username) < 4 || strlen($username) > 20) {
        return false;
    }
    return true;
}
