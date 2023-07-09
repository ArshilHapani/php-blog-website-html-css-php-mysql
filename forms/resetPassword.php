<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Update password</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container">
        <div class="login form">
            <header>Reset password</header>
            <form action="./resetPassword.php" method="post">
                <input type="password" name="pwd" placeholder="Create a new password" />
                <input type="password" name="cpwd" placeholder="Confirm a new password" />
                <a href="./signUp.php">Go back</a>
                <input type="submit" class="button" name="btn" value="submit answer" />
            </form>
        </div>
    </div>

    <?php

    if (isset($_POST["btn"])) {

        $password = sha1($_POST["pwd"]);
        $confirmPassword =  sha1($_POST["cpwd"]);
        $username = $_COOKIE["blog_user"];
        if ($password != $confirmPassword) {
            echo "<script>alert('Confirm password does\'nt match');</script>";
        } else if (sha1($username) !== $_COOKIE["blog_hash"]) {
            header("location:./signUp.php?verify_flag=false");
        } else {
            $conn = mysqli_connect("localhost", "root", "", "php_mini_project_blog_website");
            $query = mysqli_query($conn, "update user set password='$confirmPassword' where  username='$username'; ");
            if ($query) {
                echo "<script>alert('Password updated');</script>";
            } else {
                echo "<script>alert('Failed to reset password. Please try again!');</script>";
            }
        }
    }
    ?>
</body>

</html>