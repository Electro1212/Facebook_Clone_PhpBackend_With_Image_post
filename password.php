<?php
$conn = mysqli_connect("localhost","root","","project");

if(isset($_POST['change'])){
  $password = $_POST['password'];
  $conf_password = $_POST['conf_password'];
  $id = $_POST['id'];
  $Id = $_GET['edit'];
  if($password==""||$conf_password==""){
    header("Location:password.php?edit=$Id&&empty=1");
    die();
  }

  if($password==$conf_password){
    $sql = "UPDATE `login` SET `Password`='$password',`Conf_Password`='$conf_password' WHERE Id=$id";
    mysqli_query($conn,$sql);
    header("Location:index.php?success=1");
    die();
  }
  else{
    header("Location:password.php?edit=$Id&&error=1");
    die();
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
if(isset($_GET['error'])){
  echo'	<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <span><strong>oops!</strong>Passwords are not same   <a href="index.php" class="alert-link">retry!</a></span>
</div>';
}
?>       
<?php
if(isset($_GET['empty'])){
  echo'	<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <span><strong>oops!</strong>Fields are empty   <a href="index.php" class="alert-link">retry!</a></span>
</div>';
}
?>  
   

      <!-- Icon -->
      <div class="fadeIn first">
        <img src="images/—Pngtree—gradient lightning logo_6488282 (1).png" style="height: 70px; width: 70px;" id="icon" alt="User Icon" />
      </div>

      <!-- Login Form -->
      <form method="post">
<?php
if(isset($_GET['edit'])){?>
       <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
<?php }?>
        <input type="text" id="login" class="fadeIn second" name="password" placeholder="Enter New Password" required>
        <input type="text" id="password" class="fadeIn third" name="conf_password" placeholder="Confirm New Password"required>
        <input type="submit" class="fadeIn fourth" name="change" value="Change">
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