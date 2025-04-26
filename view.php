<?php
$conn = mysqli_connect("sql108.infinityfree.com", "if0_38272913", "Cyber515", "if0_38272913_login");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Update data if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['Name']);
    $number = mysqli_real_escape_string($conn, $_POST['Number']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $password = mysqli_real_escape_string($conn, $_POST['Password']);

    $update = "UPDATE users SET Name='$name', Number='$number', date='$date', Email='$email', Password='$password' WHERE id=$id";
    mysqli_query($conn, $update);
}

// Fetch all users
$result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View & Edit Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* CSS Variables for theming */
        :root {
            --bg-color: #ffffff;
            --text-color: #333333;
            --card-bg: #f9fafb;
            --border-color: #e5e7eb;
            --header-bg: #1e293b;
            --header-text: #f8fafc;
            --input-bg: #ffffff;
            --button-bg: #3b82f6;
            --button-hover: #2563eb;
            --button-text: #ffffff;
        }

        .dark-mode {
            --bg-color: #0f172a;
            --text-color: #f8fafc;
            --card-bg: #1e293b;
            --border-color: #334155;
            --header-bg: #020617;
            --header-text: #e2e8f0;
            --input-bg: #1e293b;
            --button-bg: #1e40af;
            --button-hover: #1e3a8a;
            --button-text: #ffffff;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        table {
            background-color: var(--card-bg);
            border-color: var(--border-color);
        }

        thead {
            background-color: var(--header-bg);
            color: var(--header-text);
        }

        thead:hover{
            color: black;
        }

        tr:hover {
            background-color: var(--border-color);
        }

        input {
            background-color: var(--input-bg);
            color: var(--text-color);
            border-color: var(--border-color);
        }

        button {
            background-color: var(--button-bg);
            color: var(--button-text);
        }

        button:hover {
            background-color: var(--button-hover);
        }

        /* Dark mode toggle button */
        #darkModeToggle {
            background-color: var(--card-bg);
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }
    </style>
</head>
<body class="p-4">
    <!-- Dark Mode Toggle (for standalone use) -->
    <button id="darkModeToggle" class="fixed top-4 right-4 p-2 rounded-full shadow-lg hidden">
        <span id="darkModeIcon">🌙</span> Toggle Mode
    </button>

    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-center">Users Database</h2>

        <div class="overflow-x-auto shadow-lg rounded-lg">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="text-left py-3 px-4">Name</th>
                        <th class="text-left py-3 px-4">Number</th>
                        <th class="text-left py-3 px-4">Date</th>
                        <th class="text-left py-3 px-4">Email</th>
                        <th class="text-left py-3 px-4">Password</th>
                        <th class="text-center py-3 px-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <form method="POST">
                        <tr class="border-b">
                            <td class="py-3 px-4">
                                <input type="text" name="Name" value="<?= htmlspecialchars($row['Name']) ?>" class="border rounded w-full p-1">
                            </td>
                            <td class="py-3 px-4">
                                <input type="text" name="Number" value="<?= htmlspecialchars($row['Number']) ?>" class="border rounded w-full p-1">
                            </td>
                            <td class="py-3 px-4">
                                <input type="date" name="date" value="<?= htmlspecialchars($row['date']) ?>" class="border rounded w-full p-1">
                            </td>
                            <td class="py-3 px-4">
                                <input type="email" name="Email" value="<?= htmlspecialchars($row['Email']) ?>" class="border rounded w-full p-1">
                            </td>
                            <td class="py-3 px-4">
                                <input type="text" name="Password" value="<?= htmlspecialchars($row['Password']) ?>" class="border rounded w-full p-1">
                            </td>
                            <td class="py-3 px-4 text-center">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" class="px-4 py-2 rounded hover:opacity-90">Save</button>
                            </td>
                        </tr>
                    </form>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Theme management functions
        function applyTheme(isDark) {
            document.documentElement.classList.toggle('dark-mode', isDark);
            localStorage.setItem('darkMode', isDark ? 'dark' : 'light');
            
            // Update button icon if standalone
            if (window === window.parent) {
                const icon = isDark ? '☀️' : '🌙';
                document.getElementById('darkModeIcon').textContent = icon;
            }
        }

        // Initialize theme
        function initTheme() {
            // If in iframe, listen for parent messages
            if (window !== window.parent) {
                window.addEventListener('message', function(event) {
                    if (event.data.type === 'THEME_UPDATE') {
                        applyTheme(event.data.isDark);
                    }
                });
                
                // Request theme from parent
                window.parent.postMessage({ type: 'THEME_REQUEST' }, '*');
            } 
            // If standalone, show toggle and use localStorage
            else {
                const toggle = document.getElementById('darkModeToggle');
                toggle.classList.remove('hidden');
                
                toggle.addEventListener('click', function() {
                    const isDark = !document.documentElement.classList.contains('dark-mode');
                    applyTheme(isDark);
                });
                
                // Initialize from localStorage
                const currentMode = localStorage.getItem('darkMode');
                if (currentMode === 'dark') {
                    applyTheme(true);
                }
            }
        }

        // Initialize when DOM is ready
        document.addEventListener('DOMContentLoaded', initTheme);
    </script>
</body>
</html>

<?php mysqli_close($conn); ?>