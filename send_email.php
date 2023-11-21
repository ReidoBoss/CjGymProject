<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/emailTest/PHPMailer/src/Exception.php';
require 'c:/xampp/htdocs/emailTest/PHPMailer/src/PHPMailer.php';
require 'c:/xampp/htdocs/emailTest/PHPMailer/src/SMTP.php';

function sendWelcomeEmail($recipient, $userName, $expirationDate) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  
        $mail->SMTPAuth   = true;
        $mail->Username   = 'bryansagarino222@gmail.com';  
        $mail->Password   = 'bxbt uqfo qjdh cgre';  
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('bryansagarino222@gmail.com', 'CJ Fitness Gym');  
        $mail->addAddress($recipient);

        $mail->isHTML(true);
        $mail->Subject = 'Welcome to CJ Fitness Gym';

        $mail->Body = "
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <style>
                    body {
                        font-family: 'Arial', sans-serif;
                        background-color: #f4f4f4;
                        color: #333;
                        margin: 0;
                        padding: 0;
                    }

                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        background-color: #fff;
                        border-radius: 10px;
                        overflow: hidden;
                        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                    }

                    .header {
                        background-color: #7d3cff; /* Purple color */
                        color: #fff;
                        text-align: center;
                        padding: 20px;
                    }

                    h1 {
                        font-size: 36px;
                        margin-bottom: 20px;
                    }

                    .content {
                        padding: 20px;
                    }

                    p {
                        line-height: 1.6;
                    }

                    ul {
                        list-style: none;
                        padding: 0;
                    }

                    li {
                        margin-bottom: 10px;
                    }

                    .footer {
                        text-align: center;
                        padding: 20px;
                        background-color: #7d3cff; /* Purple color */
                        color: #fff;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h1>Welcome to CJ Fitness Gym</h1>
                    </div>
                    <div class='content'>
                        <p>Thank you for choosing CJ Fitness Gym to be a part of your fitness journey. We are excited to have you join our community dedicated to a healthy lifestyle.</p>
                        <p>Your account details:</p>
                        <ul>
                            <li><strong>Name:</strong> $userName</li>
                            <li><strong>Expiration Date:</strong> $expirationDate</li>
                        </ul>
                        <p>If you have any questions or need assistance, feel free to contact us.</p>
                        <p>Best regards,<br>CJ Fitness Gym Team</p>
                    </div>
                    <div class='footer'>
                        Follow us on social media for updates: 
                        <a href='#'>Facebook</a> | <a href='#'>Twitter</a> | <a href='#'>Instagram</a>
                    </div>
                </div>
            </body>
            </html>
        ";

        $mail->SMTPDebug = 2;

        $mail->send();

        echo 'Welcome email sent successfully!';
    } catch (Exception $e) {
        echo "Failed to send welcome email. Error: {$mail->ErrorInfo}";
    }
}
?>
