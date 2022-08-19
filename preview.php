<?php
session_start();
if (!isset($_SESSION['id'])) {
   header('Location:index.php');
   die();
}
$conn = mysqli_connect("localhost", "root", "", "project");

if (isset($_POST['submit'])) {
   $caption = $_POST['caption'];
   $date = date('d-m-Y');
   $name = $_SESSION['username'];
   $profile = $_SESSION['image'];
   $id = $_SESSION['id'];
   $image =  $_FILES['image']['name'];
   $tmp_img =   $_FILES['image']['tmp_name'];

   if($image==""){
      header("Location:preview.php?error=1");
      die();
   }
   move_uploaded_file($tmp_img, 'post/' . $image);
   $sql = "INSERT INTO `post`(`Caption`, `Profile_img`, `Image`,`Name`,`Date`, `Profile_id`) VALUES ('$caption','$profile','$image','$name','$date','$id')";
   mysqli_query($conn, $sql);
   header("Location:details.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ElectroHub</title>
   <!--Font Awesome CDN-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <!--Google Font-->
   <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
   <!--Stylesheet-->
   <link rel="stylesheet" href="style5.css">
</head>

<body>

   <form action="" method="post" enctype="multipart/form-data">
      <div class="caption">
         <input class="messageSender__input" placeholder="Write a caption" type="text" name="caption" />

      </div>
      <div class="container">

         <figure class="image-container">
            <img id="chosen-image">
            <figcaption id="file-name"></figcaption>
         </figure>

         <input type="file" id="upload-button" accept="image/*" name=image>
         <label for="upload-button">
            <i class="fas fa-upload"></i> &nbsp; Choose A Photo
         </label>
         <button type="submit" name="submit" class="upload-button">Upload</button>
      </div>
   </form>
   <!--Script-->
   <script>
      let uploadButton = document.getElementById("upload-button");
      let chosenImage = document.getElementById("chosen-image");
      let fileName = document.getElementById("file-name");

      uploadButton.onchange = () => {
         let reader = new FileReader();
         reader.readAsDataURL(uploadButton.files[0]);
         reader.onload = () => {
            chosenImage.setAttribute("src", reader.result);
         }
         fileName.textContent = uploadButton.files[0].name;
      }
   </script>
   <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
</body>

</html>