<?php
require "connection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";
session_start();

use PHPMailer\PHPMailer\PHPMailer;

$name = $_POST["name"];
$password = $_POST["password"];

if (strlen($name) > 50) {
    echo ("name50+");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("passwordError");
} else {


    $uniqCode = uniqid();

    Database::iud("UPDATE `user` SET `verification_code` = '" . $uniqCode . "' WHERE `email` = '" . $_SESSION["u"]["email"] . "'");

    // email code
    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'gameakade@gmail.com';
    $mail->Password = 'grytookhidnbfdal';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('gameakade@gmail.com', 'Edit Your profile');
    $mail->addReplyTo('gameakade@gmail.com', 'Edit Your profile');
    $mail->addAddress($_SESSION["u"]["email"]);
    $mail->isHTML(true);
    $mail->Subject = 'Gamea Kade verification Code for Edit your profile ';
    $bodyContent = '<p>Dear customer,</p>
     <p>This message was sent automatically by Gamea Kade in response to your request to Edit your Profile. This is done for your protection.
         Only you the recipient of this email can take the next step in the edit profile process.
     </p>
     <h5 style="color:black; font-weight: bold; font-size:18px;">this is your verification code: ' . $uniqCode . '</h5>';
    $mail->Body    = $bodyContent;

    if (!$mail->send()) {
        echo ("verification code sending faied Try again later");
    } else {
        echo ("verify");
    }
}
