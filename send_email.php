<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullName = $_POST['fullName'];
  $mobileNumber = $_POST['mobileNumber'];
  $emailAddress = $_POST['emailAddress'];
  $selectDate = $_POST['selectDate'];
  $pickupPoint = $_POST['pickupPoint'];
  $trekkersNumber = $_POST['trekkersNumber'];
  
  $to = "info@matoshreeholidaystoursandtravels.com"; // Replace with your email
  $subject = "New Booking";
  $message = "Full Name: $fullName\n";
  $message .= "Mobile Number: $mobileNumber\n";
  $message .= "Email Address: $emailAddress\n";
  $message .= "Select Date: $selectDate\n";
  $message .= "Pickup Point: $pickupPoint\n";
  $message .= "Number of Trekkers: $trekkersNumber\n";
  
  // Send email
  if (mail($to, $subject, $message)) {
    echo "Email sent successfully!";
  } else {
    echo "Failed to send email.";
  }
}
?>
