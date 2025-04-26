<?php
// Database connection
$servername = "sql108.infinityfree.com";
$username = "if0_38272913";
$password = "Cyber515";
$dbname = "if0_38272913_login";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data safely
$name = isset($_POST['full_name']) ? $_POST['full_name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$number = isset($_POST['mobile']) ? $_POST['mobile'] : '';
$state = isset($_POST['state']) ? $_POST['state'] : '';
$status = "Eligible";

// Basic validation
if (empty($name) || empty($email) || empty($number) || empty($state)) {
    die("All fields are required.");
}

// Insert into database
$sql = "INSERT INTO eligible (name, email, number, state, status, checked_at) 
        VALUES (?, ?, ?, ?, ?, NOW())";

$stmt = $conn->prepare($sql);

// Check if prepare succeeded
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

// Bind parameters (all strings, including number)
$stmt->bind_param("sssss", $name, $email, $number, $state, $status);

// Execute
if ($stmt->execute()) {
    header("Location: elcenter.php");
    exit();
} else {
    echo "Execute failed: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
