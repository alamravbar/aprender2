<?php
$to = 'alam.ravbar@gmail.com';
$subject = 'Hello from XAMPP!';
$message = 'This is a test';
$headers = "From: alam.ravbar@gmail.com\r\n";
if (mail($to, $subject, $message, $headers)) {
   echo "SUCCESS";
} else {
   echo "ERROR";
}
?>
