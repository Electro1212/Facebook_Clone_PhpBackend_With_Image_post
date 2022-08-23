<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:post.php');
    die();
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>ElectroHub <?php echo $_SESSION['username'] ?></title>
    <link rel="stylesheet" href="style3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FontAweome CDN Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <section class="post">
                <header>Create Post</header>
                <form action="" method="post">
                    <div class="content">
                        <img src="images/—Pngtree—gradient lightning logo_6488282 (1).png" alt="logo">
                        <div class="details">
                            <p><?php echo $_SESSION['username'] ?></p>
                            <div class="privacy">
                                <i class="fas fa-user-friends"></i>
                                <span>Friends</span>
                                <i class="fas fa-caret-down"></i>
                            </div>
                        </div>
                    </div>
                    <textarea placeholder="What's on your mind,<?php echo $_SESSION['username'] ?>?" spellcheck="false" required></textarea>
                    <div class="theme-emoji">
                        <img src="icons/theme.svg" alt="theme">
                        <img src="icons/smile.svg" alt="smile">
                    </div>
                    <div class="options">
                        <p>Add to Your Post</p>
                        <ul class="list">
                            <li><a href="preview.php"><img src="icons/gallery.svg" alt="gallery"></a></li>
                            <li><img src="icons/tag.svg" alt="gallery"></li>
                            <li><img src="icons/emoji.svg" alt="gallery"></li>
                            <li><img src="icons/mic.svg" alt="gallery"></li>
                            <li><img src="icons/more.svg" alt="gallery"></li>
                        </ul>
                    </div>
                 
                    <button>Post</button>
                </form>
            </section>
           
</body>

</html>