<?php

    if (isset($_POST['reset-password-submit'])) {
        $selector = "'".$_POST["selector"]."'";
        $validator = $_POST["validator"];
        $pwd = $_POST["password"];
        $pwdConfirm = $_POST["password-confirm"];

        if (empty($pwd) || empty($pwdConfirm)) {
            header("Location: ../login.php");
            exit();
        } else if ($pwd != $pwdConfirm) {
            header("Location: ../create-new-password.php?newpwd=pwdnotsame");
            exit();
        }

        $currentDate = date("U");
        require_once("db_connection.php");

        $selectorStripped = str_replace(' ', '', $selector);

        $sql = "SELECT * FROM pwdreset WHERE resetSelector =". $selectorStripped ." AND resetExpires >= ?";
        $stmt = $connection->prepare($sql);

        if ($stmt) {
             $stmt->bind_param('s', $currentDate);
             $stmt->execute();
        } else {
            $error = $connection->errno . ' ' . $connection->error;
            echo $error;
        }
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $tokenCheck = (trim($row['resetToken']) == trim($validator) ? true : false);

            if ($tokenCheck) {
                $tokenEmail = $row['resetEmail'];
                $sql = "SELECT * FROM members WHERE email = ?";
                $stmt = $connection->prepare($sql);

                if ($stmt) {
                    $stmt->bind_param('s', $tokenEmail);
                    $stmt->execute();
                } else {
                   $error = $connection->errno . ' ' . $connection->error;
                   echo $error;
                }

                $result = $stmt->get_result();
                print_r($result);
                echo "passed select from member email";
                while ($row = $result->fetch_assoc()) {
                    echo "inside member email result";
                    // hash the new password before inserting
                    $sql = "UPDATE members SET password = ? WHERE email = ?";
                    $hashed_password = password_hash($pwd, PASSWORD_BCRYPT);
                    if ($stmt = $connection->prepare($sql)) {
                        $stmt->bind_param('ss', $hashed_password, $tokenEmail);
                        $stmt->execute();
                    }
                    
                    $sql = "DELETE FROM pwdreset WHERE resetEmail = ?";
                    if ($stmt = $connection->prepare($sql)) {
                        $stmt->bind_param('s', $tokenEmail);
                        $stmt->execute();
                        session_start();
                        $_SESSION['message'] = "Password updated successfully!";
                        header("Location: ../login.php?newpwd=passwordupdated");
                    }                     
                }
            } else {
                echo "You need to re-sumbit your reset request";
            }

        }


    } else {
        header("Location: ../home.php");
    }

?>