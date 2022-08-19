<?php
$conn = mysqli_connect("localhost", "root", "", "project");

if (isset($_POST['verify'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $phone = $_POST['number'];
  $sql = "SELECT * FROM `login` WHERE `Username`='$username' AND `Email`='$email' AND `Phone`='$phone'";
  $query = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($query);
  if ($count > 0) {
    $row = mysqli_fetch_assoc($query);
    $id = $row['Id'];
    header("Location:password.php?edit=$id");
  } else {
    header("Location:forgot.php?notFound=1");
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
      if (isset($_GET['notFound'])) {
        echo '	<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <span><strong>oops!</strong>Details not found <a href="index.php" class="alert-link">retry!</a></span>
</div>';
      }
      ?>

      <!-- Icon -->
      <div class="fadeIn first">
        <img src="images/—Pngtree—gradient lightning logo_6488282 (1).png" style="height: 70px; width: 70px;" id="icon" alt="User Icon" />
      </div>

      <!-- Login Form -->
      <form method="post">
        <input type="text" id="login" class="fadeIn second" name="username" placeholder="Enter Username">
        <input type="email" id="password" class="fadeIn third" name="email" placeholder="Enter Email">
        <input type="number" id="login" class="fadeIn second" name="number" placeholder="Enter Phone Number">
        <input type="submit" class="fadeIn fourth" name="verify" value="Verify">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="index.php">Log In</a>
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