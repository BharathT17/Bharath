<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["book-now"]))
{
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"]; 
  $subject = $_POST["subject"];
  
  // $page = $_POST["page"];

// Start | Mail Function

// Load Composer's autoloader
require 'phpmailer/vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'backendentellusco@gmail.com';                     // SMTP username
    $mail->Password   = 'rdfvzfclhfkazpfh';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('backendentellusco@gmail.com', 'Portfolio');



 
    $mail->addAddress('bharath.t1718@gmail.com', 'Bookings | Portfolio');



    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
  $mail->isHTML(true);                                  // Set email format to HTML
  $mail->Subject = 'Contact  Booking Form - Portfolio';
  $mail->Body    = '<div style="border: 3px solid #FF4502; padding: 20px;font-size: 16px;"><br /> 
  <p style="font-size: 17px;">';
  $mail->Body    .= 'Hi, </p>';
  $mail->Body    .= '<h1 style="color: #ff4502; font-size: 18px;">Booking Form Details are:</h1>';
  $mail->Body    .= '<p><strong>◉ Name :</strong> ' . $name . '</p>';
  $mail->Body    .= '<p><strong>◉ Email :</strong> ' . $email . '</p>';
  $mail->Body    .= '<p><strong>◉ Subject :</strong> ' . $subject . '</p>';
  $mail->Body    .= '<p><strong>◉ Message :</strong> ' . $message . '</p>';
  
  $mail->Body    .= '</div>';
  $mail->AltBody = 'Booking  from | Booking  Form';

  $mail->send();
  header("Location: index.php?success=1#form_section");
  
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
// Close | Mail Function
  
}


?>