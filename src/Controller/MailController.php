<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class MailController extends AbstractController
{


    public function sendMailSubscribe($email)
    {
        header('Access-Control-Allow-Origin: *');
        $mail = new PHPMailer;
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'lagarchere@gmail.com';                 // SMTP username
        $mail->Password   = 'Scheeftrekken007';                      // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;

        $mail->setFrom('lagarchere@gmail.com', 'Subscribe');
        $mail->addAddress('lagarchere@gmail.com');               // Name is optional
        $mail->addReplyTo('lagarchere@gmail.com', 'Information');

        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Er is een nieuwe subscriber!';
        $mail->Body    = 'Hey! Goed nieuws! Je heb een nieuwe subscriber. ' . $email .' wilt graag de nieuwsbrief van La Garchère ontvangen.';

        //send the message, check for errors
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message sent';
        }
    }

}