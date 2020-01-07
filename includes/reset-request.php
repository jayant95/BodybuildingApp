<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['reset-request-submit'])) {
        $selectorTkn = bin2hex(random_bytes(8));
        $userTkn = bin2hex(random_bytes(16));

        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https" : "http");
        $url .= "://";
        $url .= $_SERVER['HTTP_HOST'];
        $url .= "/BodybuildingApp/includes/reset/create-new-password.php?selector=" . $selectorTkn . "&validator=" . $userTkn;
        
        // "www.deltoyd.com/reset/create-new-password?selector=" . $selectorTkn . "&validator=" . bin2hex($userTkn);

        $expires = date("U") + 1800;

        require_once("db_connection.php");

        $userEmail = $_POST["email"];

        // Delete any tokens already in the table
        $sql = "DELETE FROM pwdreset WHERE resetEmail = ?;";
        $stmt = $connection->prepare($sql);
        if ($stmt) {
            $stmt->bind_param('s', $userEmail);
            $stmt->execute();
          } else {
            $error = $connection->errno . ' ' . $connection->error;
            echo $error;
        }

        $sql = "INSERT INTO pwdreset (resetEmail, resetSelector, resetToken, resetExpires) VALUES (?, ?, ?, ?);";
        $stmt = $connection->prepare($sql);

        if ($stmt) {
            $hashedToken = password_hash($userTkn, PASSWORD_DEFAULT);
            $stmt->bind_param('ssss', $userEmail, $selectorTkn, $userTkn, $expires);
            $stmt->execute();
        } else {
            $error = $connection->errno . ' ' . $connection->error;
            echo $error;
        }

        $stmt->close();
        $connection->close();

        // Send confirmation email
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = 'smtp';
        $mail->SMTPAuth = true;
        // $mail->SMTPDebug = 2;
        $mail->Host = 'smtp.gmail.com'; 
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );
      
        // need to put this information safer once online
        $mail->Username = "********";
        $mail->Password = "*********";
      
        $mail->IsHTML(true); // if you are going to send HTML formatted emails
        $mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.
      
        $mail->From = "deltoyd@gmail.com";
        $mail->FromName = "Jayant";
      
        $subject = "Reset your password for Deltoyd";
        $message = '<p>We received a password reset request. The link to reset your password is below. 
            If you have not made this request, please ignore this email.</p>';
        
        $message .= '<p>Here is your password reset link: </br>';
        $message .= '<a href="' . $url . '">' . $url . '</a></p>';
        // $headers .= "Content-type: text/html\r\n";

        $mail->addAddress($userEmail);
        $mail->Subject = $subject;
        $mail->Body = $message;

        if (!$mail->Send()) {
            header("Location: ../reset-password.php?reset=failed");
        } else {
            header("Location: ../reset-password.php?reset=success");
        }

    } else {
        header("Location: ../home.php");
    }

?>
