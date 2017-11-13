<?php
require 'PHPMailer-master/src/PHPMailer.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->Username = 'alam.ravbar@gmail.com';
$mail->Password = '2tmP8D2tmP8D';
$mail->setFrom('alam.ravbar@gmail.com');
$mail->addAddress('alam.ravbar@gmail.com');
$mail->Subject = 'Hello from PHPMailer!';
$mail->Body = 'This is a test.';
//send the message, check for errors
if (!$mail->send()) {
    echo "ERROR: " . $mail->ErrorInfo;
} else {
    echo "SUCCESS";
}
