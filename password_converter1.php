<?php
$hashedPassword = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["password"])) {
    $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Password Hash Converter</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* CSS Variables for theming */
    :root {
      --bg-color: #f3f4f6;
      --text-color: #111827;
      --card-bg: #ffffff;
      --border-color: #e5e7eb;
      --input-bg: #ffffff;
      --button-primary-bg: #10b981;
      --button-primary-hover: #059669;
      --button-secondary-bg: #3b82f6;
      --button-secondary-hover: #2563eb;
      --button-text: #ffffff;
    }

    .dark-mode {
      --bg-color: #111827;
      --text-color: #f3f4f6;
      --card-bg: #1f2937;
      --border-color: #374151;
      --input-bg: #1f2937;
      --button-primary-bg: #059669;
      --button-primary-hover: #047857;
      --button-secondary-bg: #2563eb;
      --button-secondary-hover: #1d4ed8;
    }

    body {
      background-color: var(--bg-color);
      color: var(--text-color);
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .card {
      background-color: var(--card-bg);
      border-color: var(--border-color);
    }

    input, textarea {
      background-color: var(--input-bg);
      color: var(--text-color);
      border-color: var(--border-color);
    }

    .btn-primary {
      background-color: var(--button-primary-bg);
      color: var(--button-text);
    }

    .btn-primary:hover {
      background-color: var(--button-primary-hover);
    }

    .btn-secondary {
      background-color: var(--button-secondary-bg);
      color: var(--button-text);
    }

    .btn-secondary:hover {
      background-color: var(--button-secondary-hover);
    }

    /* Dark mode toggle button */
    #darkModeToggle {
      background-color: var(--card-bg);
      color: var(--text-color);
      border: 1px solid var(--border-color);
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
  <!-- Dark Mode Toggle (for standalone use) -->
  <button id="darkModeToggle" class="fixed top-4 right-4 p-2 rounded-full shadow-lg hidden">
    <span id="darkModeIcon">🌙</span> Toggle Mode
  </button>

  <div class="card p-8 rounded-xl shadow-md w-full max-w-md">
    <h1 class="text-2xl font-bold mb-6 text-center">Password Hash Converter</h1>

    <form method="POST" action="">
      <div class="mb-4">
        <label class="block mb-2">Enter Password:</label>
        <input type="password" name="password" placeholder="Type your password..." 
               class="w-full p-3 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300" required>
      </div>

      <div class="flex justify-center mb-6">
        <button type="submit" class="btn-primary font-bold py-2 px-6 rounded-lg">
          Generate Hash
        </button>
      </div>
    </form>

    <?php if (!empty($hashedPassword)): ?>
    <div id="resultSection">
      <div class="mb-4">
        <label class="block mb-2">Hashed Password:</label>
        <textarea id="hashedOutput" readonly 
                  class="w-full p-3 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"><?= $hashedPassword ?></textarea>
      </div>

      <div class="flex justify-center">
        <button onclick="copyHashedPassword()" class="btn-secondary font-bold py-2 px-6 rounded-lg">
          Copy Hash
        </button>
      </div>
    </div>
    <?php endif; ?>
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

    // Copy function
    function copyHashedPassword() {
      const hashed = document.getElementById('hashedOutput');
      hashed.select();
      hashed.setSelectionRange(0, 99999);
      navigator.clipboard.writeText(hashed.value);
      
      // Show a nice notification instead of alert
      const notification = document.createElement('div');
      notification.textContent = 'Copied to clipboard!';
      notification.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg';
      document.body.appendChild(notification);
      
      setTimeout(() => {
        notification.remove();
      }, 2000);
    }

    // Initialize when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
      initTheme();
      
      // Focus password field on load if empty
      if (document.querySelector('input[name="password"]').value === '') {
        document.querySelector('input[name="password"]').focus();
      }
    });
  </script>
</body>
</html>