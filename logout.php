<?php
session_start();
if(isset($_SESSION['id'])){
   unset($_SESSION['id']); 
   unset($_SESSION['username']);
   unset($_SESSION['email']);
   unset($_SESSION['phone']);
   unset($_SESSION['password']);
   unset($_SESSION['conf_password']);
   header("Location:index.php");
}
?>