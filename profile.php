<?php
session_start();
if (!isset($_SESSION['id'])) {
	header('Location:index.php');
	die();
}
$conn = mysqli_connect("localhost", "root", "", "project");

if (isset($_POST['change'])) {
	$id = $_POST['profile_id'];
	$image = $_FILES['fileUpload']['name'];
	$tmp_name = $_FILES['fileUpload']['tmp_name'];
	
	$fetch = "SELECT * FROM `login`WHERE Id =$id;";
	$query = mysqli_query($conn, $fetch);
	$row = mysqli_fetch_assoc($query);
    $oldImg = $row['Image'];
	if ($image != '') {
		unlink("profile/".$oldImg);
		$update_img = $_FILES['fileUpload']['name'];
	} else {
		$update_img = $oldImg;
	}
	move_uploaded_file($tmp_name, 'profile/'.$image);
	$sql = "UPDATE `login` SET `Image`='$update_img' WHERE Id = $id";
	mysqli_query($conn, $sql);
	header("Location:details.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title>ElectroHub</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.rtl.min.css" integrity="sha384-+4j30LffJ4tgIMrq9CwHvn0NjEvmuDCOfk6Rpg2xg7zgOxWWtLtozDEEVvBPgHqE" crossorigin="anonymous">
	<link rel="stylesheet" href="style4.css">
</head>

<body>
	<form action="" method="post" enctype="multipart/form-data">
		<h2 class="text-center">Change your profile picture</h2>
		<input type="hidden" name="profile_id" value="<?php echo $_SESSION['id'] ?>">
		<div class="profile-images-card">
			<div class="profile-images">
				<?php
				if (isset($_SESSION['id'])) {
					$id = $_SESSION['id'];
					$fetch = "SELECT * FROM `login`WHERE Id =$id;";
					$query = mysqli_query($conn, $fetch);
					$row = mysqli_fetch_assoc($query);
					echo '<img class="user__avatar" src="profile/' . $row["Image"] . '"alt="" id="upload-img"/>';
				}
				?>
				<input type="hidden" name="oldImg" id="" value="<?php echo "profile/".$_SESSION['image'] ?>">
			</div>
			<div class="custom-file">
				<label for="fileupload">Upload Profile</label>
				<input type="file" id="fileupload" name="fileUpload">
			</div>
		</div>
		<div class=" d-flex justify-content-center my-4">
			<button type="submit" class="btn btn-success" name="change">Change</button>
		</div>
	</form>




	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
	<script>
		$(function() {
			$("#fileupload").change(function(event) {
				var x = URL.createObjectURL(event.target.files[0]);
				$("#upload-img").attr("src", x);
				console.log(event);
			});
		})
	</script>
</body>

</html>