<?php
session_start();
if (isset($_SESSION['id'])) {
  header("Location:details.php");
  die();
}

$conn = mysqli_connect("localhost", "root", "", "project");

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM `login` WHERE `Email`='$email' AND `Password`='$password'";
  $query = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($query);
  if ($count > 0) {
    $row = mysqli_fetch_assoc($query);
    $_SESSION['id'] = $row['Id'];
    $_SESSION['username'] = $row['Username'];
    $_SESSION['email'] = $row['Email'];
    $_SESSION['phone'] = $row['Phone'];
    $_SESSION['password'] = $row['Password'];
    $_SESSION['conf_password'] = $row['Conf_Password'];
    $_SESSION['image'] = $row['Image'];
    header("Location:details.php");
  } else {
    header("Location:index.php?error=1");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

<body>


  <!------ Include the above in your HEAD tag ---------->

  <div class="wrapper fadeInDown">
    <div id="formContent">
      <?php
      if (isset($_GET['error'])) {
        echo '	<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <span><strong>oops!</strong>Your Email or Password is wrong   <a href="index.php" class="alert-link">retry!</a></span>
</div>';
      }
      ?>
      <?php
      if (isset($_GET['success'])) {
        echo '	<div class="alert alert-success alert-dismissible fade show" role="alert">
  <span><strong>oops!</strong>password changed successfully   <a href="index.php" class="alert-link">re-login!</a></span>
</div>';
      }
      ?>

      <!-- Tabs Titles -->

      <!-- Icon -->
      <div class="fadeIn first">
        <img src="images/—Pngtree—gradient lightning logo_6488282 (1).png" style="height: 70px; width: 70px;" id="icon" alt="User Icon" />
      </div>

      <!-- Login Form -->
      <form method="post">
        <input type="email" id="login" class="fadeIn second" name="email" placeholder="login">
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
        <input type="submit" class="fadeIn fourth" name="login" value="Log In">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="forgot.php">Forgot Password?</a>
      </div>
      <div id="formFooter">
        <a class="underlineHover" href="register.php">Haven't Registered Yet?</a>
      </div>

    </div>
  </div>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>