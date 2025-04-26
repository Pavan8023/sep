<?php
header('Content-Type: application/json');

$conn = new mysqli("sql108.infinityfree.com", "if0_38272913", "Cyber515", "if0_38272913_login");

$id = $_GET['id'];
$name = $_POST['editName'];
$email = $_POST['editEmail'];
$number = $_POST['editPhone'];
$status = $_POST['editStatus'];

$sql = "UPDATE eligible SET name = ?, email = ?, number = ?, status = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $name, $email, $number, $status, $id);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => $conn->error]);
}

$stmt->close();
$conn->close();
?>