<?php
$conn = mysqli_connect("sql108.infinityfree.com", "if0_38272913", "Cyber515", "if0_38272913_login");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Test query
$test = mysqli_query($conn, "SHOW TABLES");
if (!$test) {
    die("Database error: " . mysqli_error($conn));
}

echo "Database connection successful!";
die();
?>