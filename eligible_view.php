<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli("sql108.infinityfree.com", "if0_38272913", "Cyber515", "if0_38272913_login");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete action
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $conn->prepare("DELETE FROM eligible WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    if ($stmt->execute()) {
        header("Location: ".strtok($_SERVER['REQUEST_URI'], '?'));
        exit();
    } else {
        die("Error deleting record: " . $conn->error);
    }
}

// Fetch eligible users for HTML display
$sql = "SELECT id, name, email, number, state, status, checked_at FROM eligible ORDER BY checked_at DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Error fetching records: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eligible Candidates | National Talent Search Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        :root {
            --bg-color: #ffffff;
            --text-color: #333333;
            --card-bg: #f9fafb;
            --border-color: #e5e7eb;
            --header-bg: #ffffff;
            --footer-bg: #ffffff;
            --status-eligible-bg: #d1fae5;
            --status-eligible-text: #065f46;
            --status-pending-bg: #fef3c7;
            --status-pending-text: #92400e;
            --modal-bg: #ffffff;
            --search-bg: #ffffff;
            --button-bg: #3b82f6;
            --button-hover: #2563eb;
        }

        .dark-mode {
            --bg-color: #000000;
            --text-color: #ffffff;
            --card-bg: #111111;
            --border-color: #333333;
            --header-bg: #111111;
            --footer-bg: #111111;
            --status-eligible-bg: #064e3b;
            --status-eligible-text: #a7f3d0;
            --status-pending-bg: #92400e;
            --status-pending-text: #fef3c7;
            --modal-bg: #1a1a1a;
            --search-bg: #1a1a1a;
            --button-bg: #1e40af;
            --button-hover: #1e3a8a;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            transition: all 0.3s ease;
        }

        .status-eligible {
            background-color: var(--status-eligible-bg);
            color: var(--status-eligible-text);
        }

        .status-pending {
            background-color: var(--status-pending-bg);
            color: var(--status-pending-text);
        }

        .modal {
            transition: opacity 0.25s ease;
        }

        header {
            background-color: var(--header-bg);
        }

        footer {
            background-color: var(--footer-bg);
        }

        .bg-white {
            background-color: var(--card-bg) !important;
        }

        .border-gray-200 {
            border-color: var(--border-color) !important;
        }

        #searchInput {
            background-color: var(--search-bg);
            color: var(--text-color);
            border-color: var(--border-color);
        }

        .export-button {
            background-color: var(--button-bg);
        }

        .export-button:hover {
            background-color: var(--button-hover);
        }
    </style>
    <script>
        // Listen for theme updates from parent
        window.addEventListener('message', function(event) {
            if (event.data.type === 'THEME_UPDATE') {
                applyTheme(event.data.isDark, event.data.theme);
            }
        });

        // Apply theme changes
        function applyTheme(isDark, theme) {
            document.documentElement.classList.toggle('dark-mode', isDark);
            updateChartsTheme(isDark);
        }

        // Update all charts with current theme
        function updateChartsTheme(isDark) {
            if (typeof Chart === 'undefined') return;
            
            Chart.helpers.each(Chart.instances, function(instance) {
                instance.options.scales.x.grid.color = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';
                instance.options.scales.y.grid.color = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';
                instance.options.scales.x.ticks.color = isDark ? '#ffffff' : '#666666';
                instance.options.scales.y.ticks.color = isDark ? '#ffffff' : '#666666';
                if (instance.options.plugins?.legend?.labels) {
                    instance.options.plugins.legend.labels.color = isDark ? '#ffffff' : '#666666';
                }
                instance.update();
            });
        }

        // Request current theme on load
        window.addEventListener('DOMContentLoaded', function() {
            // Check if we're in an iframe
            if (window.parent !== window) {
                window.parent.postMessage({ type: 'THEME_REQUEST' }, '*');
            }
            
            // Fallback to data attribute
            const iframeTheme = window.frameElement?.getAttribute('data-theme');
            if (iframeTheme) {
                applyTheme(iframeTheme === 'dark');
            }
        });
    </script>
</head>
<body >
    <!-- Header -->
    <header class="shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="/img3/SEP (1).png" alt="Logo" class="h-12">
                <h1 class="text-xl font-bold">National Talent Search Portal</h1>
            </div>
            <div class="flex items-center space-x-4">
                <!-- Dark mode toggle for standalone page -->
                <button id="darkModeToggle" class="p-2 rounded-full shadow-lg transition hidden">
                    <span id="darkModeIcon">🌙</span> Toggle Mode
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="shadow rounded-lg overflow-hidden">
            <!-- Table Header -->
            <div class="px-6 py-4 border-b flex flex-col sm:flex-row justify-between items-start sm:items-center">
                <div>
                    <h2 class="text-2xl font-semibold">Eligible Candidates</h2>
                    <p class="text-sm mt-1">List of all candidates who meet the eligibility criteria</p>
                </div>
                <div class="mt-4 sm:mt-0 flex items-center space-x-2">
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Search candidates..." class="pl-10 pr-4 py-2 rounded-lg">
                        <i class="fas fa-search absolute left-3 top-3"></i>
                    </div>
                    <button onclick="generatePDF()" class="text-white px-4 py-2 rounded-lg flex items-center space-x-2 transition-colors export-button">
                        <i class="fas fa-download"></i>
                        <span>Export PDF</span>
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y" id="candidatesTable">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Phone
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                State
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Checked At
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <?php if ($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <tr class="dark:hover:bg-gray-800 dark:hover:text-white transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <?= $row["id"] ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <?= htmlspecialchars($row["name"]) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <?= htmlspecialchars($row["email"]) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <?= htmlspecialchars($row["number"]) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <?= htmlspecialchars($row["state"]) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full status-eligible">
                                        <?= $row["status"] ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <?= date('d M Y, h:i A', strtotime($row["checked_at"])) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button onclick="viewCandidate(<?= $row['id'] ?>)" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button onclick="editCandidate(<?= $row['id'] ?>)" class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button onclick="confirmDelete(<?= $row['id'] ?>)" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="px-6 py-4 text-center text-sm">
                                    No eligible candidates found
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- View Modal -->
            <div id="viewModal" class="fixed inset-0 bg-black  text-white overflow-y-auto h-full w-full hidden modal">
                <div class="relative top-20 mx-auto p-5 border w-1/2 shadow-lg rounded-md bg-black bg-opacity-10 text-white">
                    <div class="mt-3 text-center">
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-100">
                            <i class="fas fa-user text-blue-600"></i>
                        </div>
                        <h3 class="text-lg leading-6 font-medium mt-2" id="viewName"></h3>
                        <div class="mt-4 px-7 py-3">
                            <div class="grid grid-cols-2 gap-4 text-left">
                                <div>
                                    <p class="text-sm">Email:</p>
                                    <p class="text-sm font-medium" id="viewEmail"></p>
                                </div>
                                <div>
                                    <p class="text-sm">Phone:</p>
                                    <p class="text-sm font-medium" id="viewPhone"></p>
                                </div>
                                <div>
                                    <p class="text-sm">State:</p>
                                    <p class="text-sm font-medium" id="viewState"></p>
                                </div>
                                <div>
                                    <p class="text-sm">Status:</p>
                                    <p class="text-sm font-medium" id="viewStatus"></p>
                                </div>
                                <div>
                                    <p class="text-sm">Checked At:</p>
                                    <p class="text-sm font-medium" id="viewCheckedAt"></p>
                                </div>
                            </div>
                        </div>
                        <div class="items-center px-4 py-3">
                            <button onclick="closeModal('viewModal')" class="px-4 py-2 bg-blue-600 text-white text-base font-medium rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden modal">
                <div class="relative top-20 mx-auto p-5 border w-1/2 shadow-lg rounded-md">
                    <div class="mt-3 text-center">
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                            <i class="fas fa-edit text-green-600"></i>
                        </div>
                        <h3 class="text-lg leading-6 font-medium mt-2">Edit Candidate</h3>
                        <form id="editForm" class="mt-4 px-7 py-3">
                            <input type="hidden" id="editId">
                            <div class="grid grid-cols-2 gap-4 text-left">
                                <div class="col-span-2">
                                    <label for="editName" class="block text-sm font-medium">Full Name</label>
                                    <input type="text" id="editName" name="editName" class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="editEmail" class="block text-sm font-medium">Email</label>
                                    <input type="email" id="editEmail" name="editEmail" class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="editPhone" class="block text-sm font-medium">Phone</label>
                                    <input type="tel" id="editPhone" name="editPhone" class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="editState" class="block text-sm font-medium">State</label>
                                    <input type="text" id="editState" name="editState" class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="editStatus" class="block text-sm font-medium">Status</label>
                                    <select id="editStatus" name="editStatus" class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        <option value="Eligible">Eligible</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                </div>
                            </div>
                            <div class="items-center px-4 py-3 mt-4">
                                <button type="button" onclick="updateCandidate()" class="px-4 py-2 bg-green-600 text-white text-base font-medium rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                                    Update
                                </button>
                                <button type="button" onclick="closeModal('editModal')" class="ml-2 px-4 py-2 bg-gray-600 text-white text-base font-medium rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="border-t mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-4">
                    <img src="/img3/SEP (1).png" alt="Logo" class="h-10">
                    <p class="text-sm">National Talent Search Portal</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <p class="text-sm">© <?= date('Y') ?> Sports Authority of India. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Initialize dark mode toggle for standalone page
        document.addEventListener('DOMContentLoaded', function() {
            // Only show toggle if not in iframe
            if (window === window.parent) {
                const toggle = document.getElementById('darkModeToggle');
                toggle.classList.remove('hidden');
                
                toggle.addEventListener('click', function() {
                    const isDark = !document.documentElement.classList.contains('dark-mode');
                    document.documentElement.classList.toggle('dark-mode', isDark);
                    localStorage.setItem('darkMode', isDark ? 'dark' : 'light');
                    
                    // Update button icon
                    const icon = isDark ? '☀️' : '🌙';
                    document.getElementById('darkModeIcon').textContent = icon;
                });
                
                // Initialize from localStorage
                const currentMode = localStorage.getItem('darkMode');
                if (currentMode === 'dark') {
                    document.documentElement.classList.add('dark-mode');
                    document.getElementById('darkModeIcon').textContent = '☀️';
                }
            }
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const input = this.value.toLowerCase();
            const rows = document.querySelectorAll('#candidatesTable tbody tr');
            
            rows.forEach(row => {
                const name = row.cells[1].textContent.toLowerCase();
                const email = row.cells[2].textContent.toLowerCase();
                const phone = row.cells[3].textContent.toLowerCase();
                const state = row.cells[4].textContent.toLowerCase();
                
                if (name.includes(input) || email.includes(input) || phone.includes(input) || state.includes(input)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // View candidate details
        function viewCandidate(id) {
            fetch(`get_candidate.php?id=${id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('viewName').textContent = data.name;
                    document.getElementById('viewEmail').textContent = data.email;
                    document.getElementById('viewPhone').textContent = data.number;
                    document.getElementById('viewState').textContent = data.state;
                    document.getElementById('viewStatus').textContent = data.status;
                    document.getElementById('viewCheckedAt').textContent = new Date(data.checked_at).toLocaleString();
                    document.getElementById('viewModal').classList.remove('hidden');
                })
                .catch(error => {
                    Swal.fire('Error', 'Could not fetch candidate details: ' + error.message, 'error');
                });
        }

        // Edit candidate
        function editCandidate(id) {
            fetch(`get_candidate.php?id=${id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('editId').value = data.id;
                    document.getElementById('editName').value = data.name;
                    document.getElementById('editEmail').value = data.email;
                    document.getElementById('editPhone').value = data.number;
                    document.getElementById('editState').value = data.state;
                    document.getElementById('editStatus').value = data.status;
                    document.getElementById('editModal').classList.remove('hidden');
                })
                .catch(error => {
                    Swal.fire('Error', 'Could not fetch candidate details: ' + error.message, 'error');
                });
        }

        // Update candidate
        function updateCandidate() {
            const id = document.getElementById('editId').value;
            const formData = new FormData(document.getElementById('editForm'));
            
            fetch(`update_candidate.php?id=${id}`, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    Swal.fire('Success', 'Candidate updated successfully', 'success').then(() => {
                        window.location.reload();
                    });
                } else {
                    Swal.fire('Error', data.message || 'Update failed', 'error');
                }
            })
            .catch(error => {
                Swal.fire('Error', 'Could not update candidate: ' + error.message, 'error');
            });
        }

        // Confirm delete
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `?delete_id=${id}`;
                }
            });
        }

        // Close modal
        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        // Generate PDF
        function generatePDF() {
            // Initialize jsPDF
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF('p', 'pt');
            
            // Title
            doc.setFontSize(18);
            doc.text('Eligible Candidates Report', 40, 40);
            doc.setFontSize(12);
            doc.text('Generated on: ' + new Date().toLocaleString(), 40, 60);
            
            // Get table data
            const headers = [
                "ID", 
                "Name", 
                "Email", 
                "Phone",
                "State",
                "Status", 
                "Checked At"
            ];
            
            const rows = [];
            document.querySelectorAll('#candidatesTable tbody tr').forEach(row => {
                const rowData = [];
                row.querySelectorAll('td').forEach((cell, index) => {
                    // Skip actions column (last column)
                    if (index < row.cells.length - 1) {
                        rowData.push(cell.innerText);
                    }
                });
                rows.push(rowData);
            });
            
            // Generate table
            doc.autoTable({
                head: [headers],
                body: rows,
                startY: 80,
                styles: {
                    cellPadding: 5,
                    fontSize: 10,
                    valign: 'middle'
                },
                headStyles: {
                    fillColor: [241, 245, 249],
                    textColor: [75, 85, 99],
                    fontStyle: 'bold'
                }
            });
            
            // Save the PDF
            doc.save('eligible_candidates_' + new Date().toISOString().slice(0, 10) + '.pdf');
        }
    </script>
</body>
</html>