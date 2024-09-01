<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['fullName'];
    $mobileNumber = $_POST['mobileNumber'];
    $emailAddress = $_POST['emailAddress'];
    $selectDate = $_POST['selectDate'];
    $pickupPoint = $_POST['pickupPoint'];
    $trekkersNumber = $_POST['trekkersNumber'];
    $totalPayment = $_POST['totalPayment'];

    $to = "info@matoshreeholidaystoursandtravels.com"; // Replace with your email address
    $subject = "New Booking Form Submission";
    $message = "Full Name: $fullName\nMobile Number: $mobileNumber\nEmail Address: $emailAddress\nDate: $selectDate\nPickup Point: $pickupPoint\nNumber of Trekkers: $trekkersNumber\nTotal Payment: $totalPayment";
    $headers = "From: $emailAddress";

    if (mail($to, $subject, $message, $headers)) {
        echo "Mail Sent Successfully!";
    } else {
        echo "Mail Sending Failed!";
    }
}
?>
