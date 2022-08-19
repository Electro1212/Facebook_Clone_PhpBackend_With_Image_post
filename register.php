<?php
$conn = mysqli_connect("localhost", "root", "", "project");

if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $conf_password = $_POST['conf_password'];
  if ($username == "" || $email == "" || $phone == "" || $password == "" || $conf_password == "") {
    header("Location:register.php?empty=1");
  }
  if ($password == $conf_password) {
    $sql = "INSERT INTO `login`(`Username`, `Email`, `Phone`, `Password`, `Conf_Password`) VALUES ('$username','$email','$phone','$password','$conf_password')";
    mysqli_query($conn, $sql);
    header("Location:index.php");
    die();
  } else {
    header("Location:register.php?error=1");
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ElectroHub</title>
  <link rel="stylesheet" href="style.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

<body>


  <!------ Include the above in your HEAD tag ---------->

  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <?php
      if (isset($_GET['empty'])) {
        echo '	<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <span><strong>oops!</strong>Fields are empty <a href="index.php" class="alert-link">retry!</a></span>
</div>';
      }
      ?>
      <?php
      if (isset($_GET['error'])) {
        echo '	<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <span><strong>oops!</strong>Passwords are not same<a href="index.php" class="alert-link">retry!</a></span>
</div>';
      }
      ?>

      <!-- Icon -->
      <div class="fadeIn first">
        <img src="images/—Pngtree—gradient lightning logo_6488282 (1).png" style="height: 70px; width: 70px;" id="icon" alt="User Icon" />
      </div>

      <!-- Login Form -->
      <form method="post">
        <input type="text" id="login" class="fadeIn second" name="username" placeholder="Enter username" required>
        <input type="email" id="password" class="fadeIn third" name="email" placeholder="Enter Email" required>
        <input type="number" id="login" class="fadeIn second" name="phone" placeholder="Enter Contact Number" required>
        <input type="text" id="password" class="fadeIn third" name="password" placeholder="Enter Password" required>
        <input type="text" id="password" class="fadeIn second" name="conf_password" placeholder="Confirm Password" required>
        <input type="submit" class="fadeIn fourth" name="register" value="Register">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="index.php">Login</a>
      </div>

    </div>
  </div>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>