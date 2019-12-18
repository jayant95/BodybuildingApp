<?php
    session_start();
    $username = $_SESSION['username'];

    if (isset($_POST['submit-delete'])) { 
        $fullPath = $_POST['image-path'];
        echo $fullPath;
        echo "<br>";
        $path = "uploads/";
        $path .= $username;

        $filename =  $path; // path to 
        
        $dir = new RecursiveDirectoryIterator($filename);

        foreach(new RecursiveIteratorIterator($dir) as $filename => $file) {
            $fullName = "includes/" . $filename;
            // Make sure path uses forward slashes
            $fullName = str_replace('\\', '/', $fullName);
            if ($fullName == $fullPath) {
                echo "There is a match!";
                unlink($filename);
                echo "Deleting...";
                echo "<br>";
                header("Location: ../profile-history.php");
            }
            echo $fullName . '  </br>';
        }

    }

?>