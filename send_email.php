<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'path/to/PHPMailer/src/Exception.php';  // Adjust the path accordingly
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['fullName'];
    $mobileNumber = $_POST['mobileNumber'];
    $emailAddress = $_POST['emailAddress'];
    $selectDate = $_POST['selectDate'];
    $pickupPoint = $_POST['pickupPoint'];
    $trekkersNumber = $_POST['trekkersNumber'];

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com'; // Hostinger's SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'info@matoshreeholidaystoursandtravels.com'; // Your Hostinger email address
        $mail->Password   = 'your-email-password'; // Your Hostinger email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port       = 587; // TCP port for TLS connection

        // Recipients
        $mail->setFrom('info@matoshreeholidaystoursandtravels.com', 'Matoshree Holidays'); // Your "From" email
        $mail->addAddress('info@matoshreeholidaystoursandtravels.com'); // Your email address to receive the form details

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'New Booking Form Submission';
        $mail->Body    = nl2br("Full Name: $fullName\nMobile Number: $mobileNumber\nEmail Address: $emailAddress\nSelect Date: $selectDate\nPickup Point: $pickupPoint\nNumber of Trekkers: $trekkersNumber");

        // Send the email
        $mail->send();
        echo 'Email sent successfully!';

        // Code to trigger the PDF download after email is sent
        echo "<script>window.location.href='download_pdf.php';</script>"; // Replace with your actual PDF download script

    } catch (Exception $e) {
        echo "Failed to send email. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
