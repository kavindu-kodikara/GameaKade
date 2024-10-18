<?php
require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET["e"])) {

    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
    $n = $rs->num_rows;

    if ($n == 1) {

        $code = uniqid();

        Database::iud("UPDATE `user` SET `verification_code`='" . $code . "'
        WHERE `email`='" . $email . "'");

        // email code
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'gameakade@gmail.com';
        $mail->Password = 'grytookhidnbfdal';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('gameakade@gmail.com', 'Reset Password');
        $mail->addReplyTo('gameakade@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Gamea Kade Forgot Password verification Code';
        $bodyContent = '<p>Dear customer,</p>
         <p>This message was sent automatically by Gamea Kade in response to your request to reset your password. This is done for your protection.
             Only you the recipient of this email can take the next step in the password reset process.
         </p>
         <h53 style="color:black font-weight: bold">this is your verification code: ' . $code . '</h5>';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo ("verification code sending faied");
        } else {
            echo ("success");
        }
    } else {
        echo ("Invalid Email address");
    }
}
