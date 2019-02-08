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

  if (isset($_SESSION['upload-message'])) {
    echo "<p>" . $_SESSION['upload-message'] . "</p>";
    unset($_SESSION['upload-message']);
  }
?>


  <form action="includes/upload.php" method="post" enctype="multipart/form-data">
    <div class="upload-form">
      <input type="file" name="photo">
      <input type="submit" name="submit" value="Submit"/>
    </div>
  </form>

  <div class="upload-history">
    <?php
      ksort($pic_arr);

      $fileDate = "";
      foreach ($pic_arr as $dateKey => $name) {
        $temp = date("F Y", $dateKey);
        if ($temp !== $fileDate) {
          $fileDate = date("F Y", $dateKey);
          echo "<p>" . $fileDate . "</p>";
        }

        echo "<img src=" . $name . " class='progress-pic' alt='progress-pic'>";
      }
     ?>

  </div>

  <div id="imgModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="modal-progressImg">
    <div id="caption"></div>
  </div>


<?php require("includes/footer.php") ?>
