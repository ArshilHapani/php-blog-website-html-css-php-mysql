<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Login & Registration Form</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="container">
    <input type="checkbox" id="check" />
    <div class="login form">
      <header>Login</header>
      <form action="../functions/signInFunc.php" method="post">
        <input type="text" placeholder="Enter your username" name="username" />
        <input type="password" placeholder="Enter your password" name="password" />
        <a href="./forgetPassword.php">Forgot password?</a>
        <input type="submit" class="button" value="Login" />
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
          <label for="check">Signup</label>
        </span>
      </div>
    </div>
    <div class="registration form">
      <header>Signup</header>
      <form action="../functions/signUpFunc.php" method="post">
        <small style="font-size: 10px; color: #ff2f2f; margin-left: 3px">(you can't change it further)</small>
        <input name="username" type="text" placeholder="Enter your username" minlength="5" required />
        <input type="email" name="email" placeholder="Enter your email" />
        <input type="password" name="password" required minlength="8" placeholder="Create a password" />
        <small style="font-size: 10px; color: #ff2f2f; margin-left: 3px">(It is used to reset your password if you forget it )</small>
        <input type="text" required minlength="5" name="question" placeholder="Enter your childhood nickname" />
        <input type="submit" class="button" value="Signup" />
      </form>
      <div class="signup">
        <span class="signup">Already have an account?
          <label for="check">Login</label>
        </span>
      </div>
    </div>
  </div>
</body>

</html>
<?php
// Verifying flags
if (isset($_GET["verify_flag"])) {
  echo "<script>alert('failed to verify user')</script>";
  return;
}
if (isset($_GET['usernameAndEmailFlag'])) {
  echo "<script>alert('Email or username already exist')</script>";
  return;
}
if (isset($_GET['invalidUsernameFlag'])) {
  echo "<script>alert('Please enter the valid username')</script>";
  return;
}
if (isset($_GET['credentialsFlag'])) {
  echo "<script>alert('Invalid username or password')</script>";
  return;
}
?>