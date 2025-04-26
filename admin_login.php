<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "admin123" && $password == "admin@123") {
        $_SESSION["admin_logged_in"] = true;
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
  <form method="post" class="bg-white p-8 rounded shadow-md w-80">
    <h2 class="text-xl font-semibold mb-6 text-center">Admin Login</h2>
    <?php if (isset($error)) echo "<p class='text-red-500'>$error</p>"; ?>
    <input type="text" name="username" placeholder="Username" class="w-full p-2 border mb-4 rounded" required>
    <input type="password" name="password" placeholder="Password" class="w-full p-2 border mb-4 rounded" required>
    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Login</button>
  </form>
</body>
</html>
