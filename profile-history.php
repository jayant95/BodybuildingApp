<?php
  session_start();
  require("includes/header.php");
  require_once("includes/db_connection.php");

  $pic_arr = array();
  $pic_counter = 0;
  $path = "includes/uploads/" . $_SESSION['username'] . "/";
  if (is_dir($path)) {
    if ($dh = opendir($path)) {
      while (($file = readdir($dh)) !== false) {
        if ($file == '.' || $file == '..') {
            continue;
        } else {
          $new_path = $path . $file;
          if (is_dir($new_path)) {
              if ($newDir = opendir($new_path)) {
                while (($dirFile = readdir($newDir))) {
                  if ($dirFile !== "." && $dirFile !== "..") {
                    // Sort by date and push to array
                    $fullPath = $new_path . "/" . $dirFile;
                    $fileTime = filemtime($fullPath);

                    $temp_arr = array(
                      "file" => $fullPath,
                      "date" => $fileTime
                    );
                    $pic_arr[$fileTime] = $fullPath;
                  }
                }
              }
          }
        }

      }
      closedir($dh);
    }
  }
?>
<div class="page-background short-page">
    <?php 
      if (isset($_SESSION['upload-message'])) {
        echo "<div class='site-message'>";
        echo "<p>" . $_SESSION['upload-message'] . "</p>";
        echo "</div>";
        unset($_SESSION['upload-message']);
      }
    ?>
  <div class="content-wrapper progress-pics">
    <div class="progress-header">
      <h2>Progress Pictures</h2>
      <p>You can view and upload your progress photos here! (JPG, JPEG and PNG under 500kb)</p>
    </div>
    <form action="includes/upload.php" method="post" enctype="multipart/form-data">
      <div class="upload-form">
        <input type="file" name="photo">
        <input class="login-button upload" type="submit" name="submit" value="Submit"/>
      </div>
    </form>

    <div class="upload-history">
      <?php
        ksort($pic_arr);

        $fileDate = "";
        $pictureID = 1;
        $picID = "galleryPic";
        foreach ($pic_arr as $dateKey => $name) {
          $temp = date("F Y", $dateKey);
          if ($temp !== $fileDate) {
            $fileDate = date("F Y", $dateKey);
            echo "<h3 class='picture-month'>" . $fileDate . "</h3>";
          }

          $image_info = getImageSize($name);
          $fullName = $picID . $pictureID;
          echo "<form action='includes/deleteImage.php' method='post' class='image-holder'>";
          echo "<img src=" . $name . " value=" . $name . " name='delete-file' class='progress-pic' alt='progress-pic' width=" . $image_info[0] . " height=" . $image_info[1] . ">";
          echo "<input type='hidden' name='image-path' value=" . $name . "  value='Delete'/>";
          echo "<input type='submit' name='submit-delete' class='pic-delete' value='X'/>";
          echo "</form>";
          $pictureID++;
        }
      ?>
    </div>

    <div id="imgModal" class="modal">
      <span class="close">&times;</span>
      <img class="modal-content" id="modal-progressImg">
      <div id="caption"></div>
    </div>
  </div>
  <?php require("includes/navigation_bottom.php") ?>
</div>

<script>
  function deleteCheck(pictureID){
    let image_x = document.getElementById(pictureID);
    image_x.parentNode.removeChild(image_x);
  }
</script>

<?php require("includes/footer.php") ?>
