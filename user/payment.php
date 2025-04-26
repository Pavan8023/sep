<?php
session_start();

// Ensure the user is logged in before making the payment
if (!isset($_SESSION['user'])) {
    echo "<script>alert('You need to log in first!'); window.location.href = 'login.php';</script>";
    exit;
}

// Redirect user to Razorpay payment link
header("Location: https://rzp.io/rzp/seSZWVD");
exit;
?>
