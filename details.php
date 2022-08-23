<?php
session_start();
if (!isset($_SESSION['id'])) {
  header('Location:index.php');
  die();
}
$conn = mysqli_connect("localhost", "root", "", "project");
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $image = $_GET['image'];
  $delete = "DELETE FROM `post` WHERE Id = $id";
  unlink('post/' . $image);
  mysqli_query($conn, $delete);
  header("Location:details.php");
}
if (isset($_SESSION['id'])) {
  $id = $_SESSION['id'];
  $fetch = "SELECT * FROM `login`WHERE Id =$id;";
  $query = mysqli_query($conn, $fetch);
  $row = mysqli_fetch_assoc($query);
  $image = $row['Image'];
  $id2 = $row['Id'];
  $sql = "UPDATE `post` SET `Profile_img`='$image' WHERE Profile_id = $id2";
  mysqli_query($conn, $sql);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ElectroHub</title>
  <link rel="stylesheet" href="style2.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
  </button>
  <!-- header starts -->
  <div class="header">
    <div class="header__left">
      <img src="images/—Pngtree—gradient lightning logo_6488282 (1).png" alt="" />
      <div class="header__input">
        <span class="material-icons"> search </span>
        <input type="text" placeholder="Search ElectroHub" />
      </div>
    </div>

    <div class="header__middle">
      <div class="header__option active">
        <span class="material-icons"> home </span>
      </div>
      <div class="header__option">
        <span class="material-icons"> flag </span>
      </div>
      <div class="header__option">
        <span class="material-icons"> subscriptions </span>
      </div>
      <div class="header__option">
        <span class="material-icons"> storefront </span>
      </div>
      <div class="header__option">
        <span class="material-icons"> supervised_user_circle </span>
      </div>
    </div>

    <div class="header__right">
      <div class="header__info">
        <a href="profile.php"><?php
                              if (isset($_SESSION['id'])) {
                                $id = $_SESSION['id'];
                                $fetch = "SELECT * FROM `login`WHERE Id =$id;";
                                $query = mysqli_query($conn, $fetch);
                                $row = mysqli_fetch_assoc($query);
                                echo '<img class="user__avatar" src="profile/' . $row["Image"] . '"alt="" />';
                              }
                              ?></a>
        <h4>
          <?php echo $_SESSION['username'] ?>
        </h4>
      </div>
      <a href="post.php"><span class="material-icons">add</span></a>
      <span class="material-icons"> forum </span>
      <span class="material-icons"> notifications_active </span>
      <a href="logout.php" target="_blank" rel="noopener noreferrer"><span class="material-icons"> logout </span></a>
    </div>
  </div>
  <!-- header ends -->

  <!-- main body starts -->
  <div class="main__body">
    <!-- sidebar starts -->
    <div class="sidebar">
      <div class="sidebarRow">
        <a href="profile.php"><?php
                              if (isset($_SESSION['id'])) {
                                $id = $_SESSION['id'];
                                $fetch = "SELECT * FROM `login`WHERE Id =$id;";
                                $query = mysqli_query($conn, $fetch);
                                $row = mysqli_fetch_assoc($query);
                                echo '<img class="user__avatar" src="profile/' . $row["Image"] . '"alt="" />';
                              }
                              ?></a>
        <h4>
          <?php echo $_SESSION['username'] ?>
        </h4>
      </div>

      <div class="sidebarRow">
        <a href="profile.php"><span class="material-icons"> edit </span></a>
        <h4>Profile</h4>
      </div>

      <div class="sidebarRow">
        <span class="material-icons"> emoji_flags </span>
        <h4>Pages</h4>
      </div>

      <div class="sidebarRow">
        <span class="material-icons"> people </span>
        <h4>People</h4>
      </div>

      <div class="sidebarRow">
        <span class="material-icons"> chat </span>
        <h4>Messenger</h4>
      </div>

      <div class="sidebarRow">
        <span class="material-icons"> storefront </span>
        <h4>Marketplace</h4>
      </div>

      <div class="sidebarRow">
        <span class="material-icons"> video_library </span>
        <h4>Videos</h4>
      </div>

      <div class="sidebarRow">
        <span class="material-icons"> expand_more </span>
        <h4>More</h4>
      </div>
    </div>
    <!-- sidebar ends -->

    <!-- feed starts -->
    <div class="feed">
      <div class="storyReel">
        <!-- story starts -->
        <div style="
              background-image: url('images/4016177c-76cc-4233-a717-25e30662a41e.webp'); background-position:center;
            " class="story">
          <?php
          if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $fetch = "SELECT * FROM `login`WHERE Id =$id;";
            $query = mysqli_query($conn, $fetch);
            $row = mysqli_fetch_assoc($query);
            echo '<img class="user__avatar story__avatar" src="profile/' . $row["Image"] . '"alt="" />';
          }
          ?>
          <h4>
            <?php echo $_SESSION['username'] ?>
          </h4>
        </div>
        <!-- story ends -->

        <!-- story starts -->
        <div style="
              background-image: url('images/7b179e9c-75d8-4c47-b498-228f3ee9ed25.webp'); background-position:center;
            " class="story">
          <?php
          if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $fetch = "SELECT * FROM `login`WHERE Id =$id;";
            $query = mysqli_query($conn, $fetch);
            $row = mysqli_fetch_assoc($query);
            echo '<img class="user__avatar story__avatar" src="profile/' . $row["Image"] . '"alt="" />';
          }
          ?>
          <h4>
            <?php echo $_SESSION['username'] ?>
          </h4>
        </div>
        <!-- story ends -->

        <!-- story starts -->
        <div style="
              background-image: url('images/9b62ae3a-0533-4cf6-abf8-d23503fe5379.webp'); background-position:center;
            " class="story">
          <?php
          if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $fetch = "SELECT * FROM `login`WHERE Id =$id;";
            $query = mysqli_query($conn, $fetch);
            $row = mysqli_fetch_assoc($query);
            echo '<img class="user__avatar story__avatar" src="profile/' . $row["Image"] . '"alt="" />';
          }
          ?>
          <h4>
            <?php echo $_SESSION['username'] ?>
          </h4>
        </div>
        <!-- story ends -->

        <!-- story starts -->
        <div style="
              background-image: url('images/f54183a9-cb1b-4bdd-84c5-e13463b72163.webp'); background-position:center;
            " class="story">
          <?php
          if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $fetch = "SELECT * FROM `login`WHERE Id =$id;";
            $query = mysqli_query($conn, $fetch);
            $row = mysqli_fetch_assoc($query);
            echo '<img class="user__avatar story__avatar" src="profile/' . $row["Image"] . '"alt="" />';
          }
          ?>
          <h4>
            <?php echo $_SESSION['username'] ?>
          </h4>
        </div>
        <!-- story ends -->

        <!-- story starts -->
        <div style="
              background-image: url('images/nontay.jpg'); background-position:center;
            " class="story">
          <?php
          if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $fetch = "SELECT * FROM `login`WHERE Id =$id;";
            $query = mysqli_query($conn, $fetch);
            $row = mysqli_fetch_assoc($query);
            echo '<img class="user__avatar story__avatar" src="profile/' . $row["Image"] . '"alt="" />';
          }
          ?>
          <h4>
            <?php echo $_SESSION['username'] ?>
          </h4>
        </div>
        <!-- story ends -->

        <!-- story starts -->
        <div style="
              background-image: url('images/Picsart_22-04-28_13-41-06-616.jpg'); background-position:center;
            " class="story">
          <?php
          if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $fetch = "SELECT * FROM `login`WHERE Id =$id;";
            $query = mysqli_query($conn, $fetch);
            $row = mysqli_fetch_assoc($query);
            echo '<img class="user__avatar story__avatar" src="profile/' . $row["Image"] . '"alt="" />';
          }
          ?>
          <h4>
            <?php echo $_SESSION['username'] ?>
          </h4>
        </div>
        <!-- story ends -->
        <div style="
              background-image: url('images/f54183a9-cb1b-4bdd-84c5-e13463b72163.webp'); background-position:center;
            " class="story">
          <?php
          if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $fetch = "SELECT * FROM `login`WHERE Id =$id;";
            $query = mysqli_query($conn, $fetch);
            $row = mysqli_fetch_assoc($query);
            echo '<img class="user__avatar story__avatar" src="profile/' . $row["Image"] . '"alt="" />';
          }
          ?>
          <h4>
            <?php echo $_SESSION['username'] ?>
          </h4>
        </div>
        <!-- story ends -->

      </div>

      <!-- message sender starts -->
      <div class="messageSender">
        <div class="messageSender__top">
          <?php
          if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $fetch = "SELECT * FROM `login`WHERE Id =$id;";
            $query = mysqli_query($conn, $fetch);
            $row = mysqli_fetch_assoc($query);
            echo '<img class="user__avatar " src="profile/' . $row["Image"] . '"alt="" />';
          }
          ?>
          <form method="post">
            <input class="messageSender__input" placeholder="What's on your mind?" type="text" name="feeling" />
          </form>
        </div>

        <div class="messageSender__bottom">
          <div class="messageSender__option">
            <span style="color: red" class="material-icons"> videocam </span>
            <h3>Live</h3>
          </div>

          <div class="messageSender__option">
            <a href="preview.php"><span style="color: green" class="material-icons"> photo_library </span></a>
            <h3>Photo</h3>
          </div>

          <div class="messageSender__option">
            <a href="post.php"><span style="color: orange;" class="material-icons"> insert_emoticon </span></a>
            <h3>Feeling</h3>
          </div>
        </div>
      </div>
      <!-- message sender ends -->



      <!-- post starts -->
      <div class="post">
        <div class="post__top">
          <img class="user__avatar post__avatar" src="data:image/png;base64,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" alt="" />
          <div class="post__topInfo">
            <h3>
              <?php echo $_SESSION['username'] ?>
            </h3>
            <p>15 August at 20:30</p>
          </div>
        </div>

        <div class="post__bottom">
          <p>Post Without Image</p>
        </div>

        <div class="post__options">
          <div class="post__option">
            <span class="material-icons"> thumb_up </span>
            <p>Like</p>
          </div>

          <div class="post__option">
            <span class="material-icons"> chat_bubble_outline </span>
            <p>Comment</p>
          </div>

          <div class="post__option">
            <span class="material-icons"> near_me </span>
            <p>Share</p>
          </div>
        </div>
      </div>
      <!-- post ends -->

      <!-- post starts -->

      <?php
      if (isset($_SESSION['id'])) {
        $fetch = "SELECT * FROM `post`";
        $query = mysqli_query($conn, $fetch);
        while ($row = mysqli_fetch_assoc($query)) {
          if ($_SESSION['id'] == $row['Profile_id']) {
      ?>
            <div class="post">
              <div class="post__top">

                <img class="user__avatar post__avatar" src=<?php echo 'profile/' . $row['Profile_img'] ?> alt="" />
                <div class="post__topInfo">
                  <h3>
                    <?php echo $row['Name'] ?>
                  </h3>
                  <p><?php echo $row['Date'] ?> at 20:30</p>
                </div>
              </div>

              <div class="post__bottom">
                <p><?php echo $row['Caption'] ?></p>
              </div>

              <div class="post__image">
                <img src="<?php echo 'post/' . $row['Image'] ?>" alt="" />
              </div>

              <div class="post__options">
                <div class="post__option">
                  <span class="material-icons"> thumb_up </span>
                  <p>Like</p>
                </div>

                <div class="post__option">
                  <span class="material-icons" data-modal-target="modal1"> chat_bubble_outline </span>
                  <p>Comment</p>
                </div>
                <div class="post__option">

                  <a href="details.php?<?php echo 'delete=' . $row['Id'] . '&image=' . $row['Image'] . '' ?>"><span class="material-icons"> delete </span></a>
                  <p>Delete</p>
                </div>
              </div>
            </div>
          <?php } else { ?>
            <div class="post">
              <div class="post__top">

                <img class="user__avatar post__avatar" src=<?php echo 'profile/' . $row['Profile_img']; ?> alt="" />
                <div class="post__topInfo">
                  <h3>
                    <?php echo $row['Name'] ?>
                  </h3>
                  <p><?php echo $row['Date'] ?> at 20:30</p>
                </div>
              </div>

              <div class="post__bottom">
                <p><?php echo $row['Caption'] ?></p>
              </div>

              <div class="post__image">
                <img src="<?php echo 'post/' . $row['Image']; ?>" alt="" />
              </div>

              <div class="post__options">
                <div class="post__option">
                  <span class="material-icons"> thumb_up </span>
                  <p>Like</p>
                </div>

                <div class="post__option">
                  <span class="material-icons" data-modal-target="modal1"> chat_bubble_outline </span>
                  <p>Comment</p>
                </div>
                <div class="post__option">
                  <span class="material-icons"> bookmark </span>
                  <p>Save</p>
                </div>
              </div>
            </div>


      <?php }
        }
      } ?>
      <!-- post ends -->
    </div>
    <!-- feed ends -->
    <div class="modal" id="modal1">
      <!-- This is the background overlay -->
      <div class="modal-content">
        <!-- This is the actual modal/popup box -->
        <span class="modal-close">&times;</span>
        <div class="post1">
          <div class="post1__top">
            <img class="user__avatar post1__avatar" src="data:image/png;base64,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" alt="" />
            <div class="post1__topInfo">
              <h3>
                <?php echo $_SESSION['username'] ?>
              </h3>
            </div>
          </div>
          <div class="post1__bottom">
              <p>Post Without Image</p>
            </div>
          <form action="" method="post">
            <input class="messageSender__input" placeholder="What's on your mind?" type="text" name="feeling" />
          </form>

        </div>
      </div>



    </div>
  </div>


  <script>
    const modalTriggerButtons = document.querySelectorAll("[data-modal-target]");
    const modals = document.querySelectorAll(".modal");
    const modalCloseButtons = document.querySelectorAll(".modal-close");

    modalTriggerButtons.forEach(elem => {
      elem.addEventListener("click", event => toggleModal(event.currentTarget.getAttribute("data-modal-target")));
    });
    modalCloseButtons.forEach(elem => {
      elem.addEventListener("click", event => toggleModal(event.currentTarget.closest(".modal").id));
    });
    modals.forEach(elem => {
      elem.addEventListener("click", event => {
        if (event.currentTarget === event.target) toggleModal(event.currentTarget.id);
      });
    });

    // Maybe also close with "Esc"...
    document.addEventListener("keydown", event => {
      if (event.keyCode === 27 && document.querySelector(".modal.modal-show")) {
        toggleModal(document.querySelector(".modal.modal-show").id);
      }
    });

    function toggleModal(modalId) {
      const modal = document.getElementById(modalId);

      if (getComputedStyle(modal).display === "flex") { // alternatively: if(modal.classList.contains("modal-show"))
        modal.classList.add("modal-hide");
        setTimeout(() => {
          document.body.style.overflow = "initial"; // Optional: in order to enable/disable page scrolling while modal is hidden/shown - in this case: "initial" <=> "visible"
          modal.classList.remove("modal-show", "modal-hide");
          modal.style.display = "none";
        }, 200);
      } else {
        document.body.style.overflow = "hidden"; // Optional: in order to enable/disable page scrolling while modal is hidden/shown
        modal.style.display = "flex";
        modal.classList.add("modal-show");
      }
    }
  </script>

  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
</body>

</html>