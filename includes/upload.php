<?php
    session_start();
    $path = "uploads/" . $_SESSION['username'] . "/" . date("F");

    if (!file_exists($path)) {
      mkdir($path, 0777, true);
    }

    $targetDir = "uploads/";
    $targetFile = $path . "/" . basename($_FILES['photo']['name']);
    $uploadSuccessful = -1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES['photo']['tmp_name']);
    if ($check !== false) {
      $uploadSuccessful = 1;
    } else {
      $uploadSuccessful = 0;
    }

    if (file_exists($targetFile)) {
      echo "File already exists";
      $uploadSuccessful = 0;
    }

    if ($_FILES["photo"]["size"] > 500000) {
      echo "File too large";
      $uploadSuccessful = 0;
    }

    if ($uploadSuccessful == 0) {
      $_SESSION['upload-message'] = "Sorry, there was an error uploading your file. Only JPG, JPEG and PNG under 500kb.";
    } else {
      if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
        //echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
        $_SESSION['upload-message'] = "Your photo was successfully uploaded!";
        header("Location: ../profileHistory.php");
      } else {
        $_SESSION['upload-message'] = "Sorry, there was an error uploading your file. Only JPG, JPEG and PNG under 500kb.";
      }
    }

    header("Location: ../profileHistory.php");









?>
