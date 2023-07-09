<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Login & Registration Form</title>
  <link rel="stylesheet" href="style.css" />
</head>
<?php
if (isset($_GET["nicknameFlag"])) {
  echo "<script>alert('Invalid answer please provide an valid nickname and try again!')</script>";
}
?>

<body>
  <div class="container">
    <div class="login form">
      <header>Forget Password</header>
      <form action="../functions/checkNicknameAndRedirect.php" method="post">
        <input type="text" name="nickname" placeholder="Enter your childhood nick name" />
        <a href="./signUp.php">Go back</a>
        <input type="submit" class="button" value="submit answer" />
      </form>
    </div>
  </div>
</body>

</html>