<?php
header('Content-Type: application/json');

$conn = new mysqli("sql108.infinityfree.com", "if0_38272913", "Cyber515", "if0_38272913_login");

$id = $_GET['id'];
$sql = "SELECT * FROM eligible WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode(['error' => 'Candidate not found']);
}

$stmt->close();
$conn->close();
?>