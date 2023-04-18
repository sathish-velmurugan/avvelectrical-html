<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

// Include PHPMailer class
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $company = "AVV Electricals Pte Ltd";

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0;
        
        // Set mailer to use SMTP
        $mail->isSMTP();

        // SMTP settings
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'metapowerapp@gmail.com';
        $mail->Password = 'fndiyebhpnpmrnxr';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Set email parameters
        $mail->setFrom('metapowerapp@gmail.com', 'Sathish'); //  Sender
        $mail->addAddress('imsathishvj@gmail.com', 'Sathish kumar'); // Recipient

        $mail->isHTML(true);
        $mail->Subject = 'Test Email'; // Subject
        $email_body = "<p>Email from website contact us page form:</p>";
        $email_body .= "<p>Name: " . $name . "</p>";
        $email_body .= "<p>Email: " . $email . "</p>";
        $email_body .= "<p>Phone: " . $phone . "</p>";
        // check if $message is empty and remove it from the email body if it's empty        
        if(!empty($message)) {
            $email_body .= "</p>Message: " . $message . "</p>";
        }
        $email_body .= "<p>Regards,</p>";
        $email_body .= $company;
        $mail->Body = $email_body;
        // $mail->Body    = '<p>Name: ' . $name . '</p> <p>Email: ' . $email . '</p> <p>Phone: ' . $phone . '</p> <p>Message: ' . $message . '</p>';

        // Send the email
        if ($mail->send()) {
            $result = array('success' => true, 'message' => 'Thanks for reaching us. We will revert back as soon as possible.  If your query is urgent, you shall reach us through chat or call us directly!');
        } else {
            $result = array('success' => false, 'message' => 'There was an error while submitting the form. Please try again later');
        }   
    } catch (Exception $e) {
        $result = array('success' => false, 'message' => 'There was an error while submitting the form. Please try again later' . $mail->ErrorInfo);
    }

    echo json_encode($result);

}
?>