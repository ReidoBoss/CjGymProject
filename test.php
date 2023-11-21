<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/emailTest/PHPMailer/src/Exception.php';
require 'c:/xampp/htdocs/emailTest/PHPMailer/src/PHPMailer.php';
require 'c:/xampp/htdocs/emailTest/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';  
    $mail->SMTPAuth   = true;
    $mail->Username   = 'bryansagarino222@gmail.com';  
    $mail->Password   = '';  
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('bryansagarino222@gmail.com', 'Yeah yeah');  

    $recipients = ['stephensagarino123@gmail.com', 'bryansagarino222@gmail.com', 'patrice.bonganciso@ctu.edu.ph'];

    foreach ($recipients as $recipient) {
        $mail->addAddress($recipient);
    }

    $mail->isHTML(true);
    $mail->Subject = 'Henlo!';
    $mail->Body    = 'Testing Testing';

    $mail->SMTPDebug = 2;

    $mail->send();

    echo 'Email sent successfully!';
} catch (Exception $e) {
    echo "Failed to send email. Error: {$mail->ErrorInfo}";
}

?>
