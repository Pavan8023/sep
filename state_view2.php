<?php
// Enable all error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = mysqli_connect("sql108.infinityfree.com", "if0_38272913", "Cyber515", "if0_38272913_login");

// Get all states data for pie chart
$query = "SELECT state, COUNT(*) as count FROM eligible GROUP BY state";
$result = mysqli_query($conn, $query);
$states = [];
$counts = [];
$totalStudents = 0;

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $states[] = $row['state'];
        $counts[] = $row['count'];
        $totalStudents += $row['count'];
    }
}

// Get status distribution for bar chart
$statusQuery = "SELECT status, COUNT(*) as count FROM eligible GROUP BY status";
$statusResult = mysqli_query($conn, $statusQuery);
$statusLabels = [];
$statusCounts = [];

if ($statusResult) {
    while ($row = mysqli_fetch_assoc($statusResult)) {
        $statusLabels[] = $row['status'];
        $statusCounts[] = $row['count'];
    }
}

// Get registration timeline data
$timelineQuery = "SELECT DATE(checked_at) as date, COUNT(*) as count FROM eligible GROUP BY DATE(checked_at) ORDER BY date";
$timelineResult = mysqli_query($conn, $timelineQuery);
$timelineDates = [];
$timelineCounts = [];

if ($timelineResult) {
    while ($row = mysqli_fetch_assoc($timelineResult)) {
        $timelineDates[] = $row['date'];
        $timelineCounts[] = $row['count'];
    }
}

// Handle state filtering
$selected_state = $_GET['state'] ?? '';
$students = [];

if (!empty($selected_state)) {
    $filterQuery = "SELECT * FROM eligible WHERE state = ?";
    $stmt = mysqli_prepare($conn, $filterQuery);
    mysqli_stmt_bind_param($stmt, "s", $selected_state);
    mysqli_stmt_execute($stmt);
    $filterResult = mysqli_stmt_get_result($stmt);
    
    while ($row = mysqli_fetch_assoc($filterResult)) {
        $students[] = $row;
    }
}

// Get unique states count
$uniqueStatesQuery = "SELECT COUNT(DISTINCT state) as unique_states FROM eligible";
$uniqueStatesResult = mysqli_query($conn, $uniqueStatesQuery);
$uniqueStates = mysqli_fetch_assoc($uniqueStatesResult)['unique_states'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Eligibility Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* CSS Variables for theming */
        :root {
            --bg-color: #f3f4f6;
            --text-color: #111827;
            --card-bg: #ffffff;
            --border-color: #e5e7eb;
            --header-bg: #1e293b;
            --header-text: #f8fafc;
            --stat-card-border: #e5e7eb;
            --hover-bg: #f1f5f9;
            --button-primary: #3b82f6;
            --button-primary-hover: #2563eb;
        }

        .dark-mode {
            --bg-color: #111827;
            --text-color: #f3f4f6;
            --card-bg: #1f2937;
            --border-color: #374151;
            --header-bg: #020617;
            --header-text: #e2e8f0;
            --stat-card-border: #374151;
            --hover-bg: #1e293b;
            --button-primary: #1e40af;
            --button-primary-hover: #1e3a8a;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .chart-container {
            position: relative;
            height: 400px;
            width: 100%;
        }

        .stat-card {
            background-color: var(--card-bg);
            border-left: 4px solid var(--stat-card-border);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        /* Dark mode toggle button */
        #darkModeToggle {
            background-color: var(--card-bg);
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }

        /* Table styles */
        table {
            background-color: var(--card-bg);
            border-color: var(--border-color);
        }

        thead {
            background-color: var(--header-bg);
            color: var(--header-text);
        }

        tr:hover {
            background-color: var(--hover-bg);
        }

        /* Button styles */
        .btn-primary {
            background-color: var(--button-primary);
        }

        .btn-primary:hover {
            background-color: var(--button-primary-hover);
        }
    </style>
</head>
<body class="p-4 md:p-6">
    <!-- Dark Mode Toggle (for standalone use) -->
    <button id="darkModeToggle" class="fixed top-4 right-4 p-2 rounded-full shadow-lg hidden">
        <span id="darkModeIcon">🌙</span> Toggle Mode
    </button>

    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">Student Eligibility Dashboard</h1>
        
        <!-- Summary Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="stat-card p-6 rounded-lg shadow-md border-l-red-500">
                <h3 class="text-lg font-semibold mb-2">Total Students</h3>
                <p class="text-3xl font-bold"><?php echo $totalStudents; ?></p>
                <p class="text-sm mt-1">All registered students</p>
            </div>
            <div class="stat-card p-6 rounded-lg shadow-md border-l-blue-500">
                <h3 class="text-lg font-semibold mb-2">States Covered</h3>
                <p class="text-3xl font-bold"><?php echo $uniqueStates; ?></p>
                <p class="text-sm mt-1">Unique states represented</p>
            </div>
            <div class="stat-card p-6 rounded-lg shadow-md border-l-green-500">
                <h3 class="text-lg font-semibold mb-2">Latest Registration</h3>
                <p class="text-3xl font-bold">
                    <?php echo !empty($timelineDates) ? end($timelineDates) : 'N/A'; ?>
                </p>
                <p class="text-sm mt-1">Most recent check-in</p>
            </div>
        </div>

        <!-- Charts Row 1 -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Pie Chart Container -->
            <div class="p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Distribution by State</h2>
                <div class="chart-container">
                    <canvas id="pieChart"></canvas>
                </div>
                <?php if (count($states) === 1): ?>
                <p class="text-center mt-2">
                    100% of students are from <?php echo htmlspecialchars($states[0]); ?>
                </p>
                <?php endif; ?>
            </div>

            <!-- Bar Chart Container -->
            <div class="p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Status Distribution</h2>
                <div class="chart-container">
                    <canvas id="barChart"></canvas>
                </div>
                <?php if (count($statusLabels) === 1): ?>
                <p class="text-center mt-2">
                    All students have status: <?php echo htmlspecialchars($statusLabels[0]); ?>
                </p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Timeline Chart -->
        <div class="p-6 rounded-lg shadow-md mb-8">
            <h2 class="text-xl font-semibold mb-4">Registration Timeline</h2>
            <div class="chart-container">
                <canvas id="timelineChart"></canvas>
            </div>
            <?php if (count($timelineDates) === 1): ?>
            <p class="text-center mt-2">
                All registrations occurred on <?php echo htmlspecialchars($timelineDates[0]); ?>
            </p>
            <?php endif; ?>
        </div>

        <!-- State Selector -->
        <div class="p-6 rounded-lg shadow-md mb-8">
            <form method="GET" class="max-w-md mx-auto">
                <label class="block mb-2 text-lg font-semibold">Filter by State:</label>
                <div class="flex space-x-2">
                    <select name="state" class="text-black px-4 py-2 flex-grow p-2 border rounded focus:ring-2 focus:ring-red-500 focus:border-red-500">
                        <option value="">-- All States --</option>
                        <?php
                        $state_list = [
                            "Punjab", "Uttar Pradesh", "Delhi", "Haryana", "Jammu & Kashmir",
                            "Maharashtra", "Goa", "Gujarat", "Rajasthan", "West Bengal",
                            "Odisha", "Jharkhand", "Bihar", "Karnataka", "Telangana",
                            "Tamil Nadu", "Andhra Pradesh", "Kerala", "Manipur", "Assam",
                            "Mizoram", "Nagaland"
                        ];
                        
                        foreach ($state_list as $state) {
                            $selected = ($selected_state === $state) ? "selected" : "";
                            echo "<option value='".htmlspecialchars($state)."' $selected>".htmlspecialchars($state)."</option>";
                        }
                        ?>
                    </select>
                    <button type="submit" class="btn-primary text-white px-4 py-2 rounded transition duration-200">
                        Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Students Table -->
        <?php if (!empty($students)) : ?>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md overflow-x-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">
                    Students from <?php echo htmlspecialchars($selected_state); ?>
                    <span class="text-sm font-normal">(<?php echo count($students); ?> records)</span>
                </h2>
                <?php if (!empty($selected_state)): ?>
                <a href="?" class="text-red-600 hover:text-red-800 text-sm font-medium">Clear filter</a>
                <?php endif; ?>
            </div>
            <table class="w-full border-collapse">
                <thead>
                    <tr>
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">Name</th>
                        <th class="py-3 px-4 text-left">Email</th>
                        <th class="py-3 px-4 text-left">Phone</th>
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4 text-left">Checked At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $index => $stu): ?>
                    <tr class="<?php echo $index % 2 === 0 ? 'bg-gray-50 dark:bg-gray-700' : 'bg-white dark:bg-gray-800'; ?> hover:bg-gray-100 dark:hover:bg-gray-700">
                        <td class="py-3 px-4 border-b"><?php echo htmlspecialchars($stu['id']); ?></td>
                        <td class="py-3 px-4 border-b"><?php echo htmlspecialchars($stu['name']); ?></td>
                        <td class="py-3 px-4 border-b"><?php echo htmlspecialchars($stu['email']); ?></td>
                        <td class="py-3 px-4 border-b"><?php echo htmlspecialchars($stu['number']); ?></td>
                        <td class="py-3 px-4 border-b">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                <?php echo $stu['status'] === 'Eligible' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-100' : 
                                       ($stu['status'] === 'Pending' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-100' : 
                                       'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-100'); ?>">
                                <?php echo htmlspecialchars($stu['status']); ?>
                            </span>
                        </td>
                        <td class="py-3 px-4 border-b"><?php echo htmlspecialchars($stu['checked_at']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php elseif (isset($_GET['state'])) : ?>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md text-center">
            <p class="text-lg">
                No students found for <span class="font-semibold"><?php echo htmlspecialchars($selected_state); ?></span>.
            </p>
            <a href="?" class="mt-4 inline-block btn-primary text-white px-4 py-2 rounded transition duration-200">
                Show All Students
            </a>
        </div>
        <?php endif; ?>
    </div>

    <script>
        // Theme management functions
        function applyTheme(isDark) {
            document.documentElement.classList.toggle('dark-mode', isDark);
            localStorage.setItem('darkMode', isDark ? 'dark' : 'light');
            
            // Update charts if they exist
            updateChartsTheme(isDark);
            
            // Update button icon if standalone
            if (window === window.parent) {
                const icon = isDark ? '☀️' : '🌙';
                document.getElementById('darkModeIcon').textContent = icon;
            }
        }

        // Update all charts with current theme
        function updateChartsTheme(isDark) {
            if (typeof Chart === 'undefined') return;
            
            Chart.helpers.each(Chart.instances, function(instance) {
                // Update chart options based on theme
                const textColor = isDark ? '#f3f4f6' : '#111827';
                const gridColor = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';
                
                if (instance.options.scales) {
                    if (instance.options.scales.x) {
                        instance.options.scales.x.grid.color = gridColor;
                        instance.options.scales.x.ticks.color = textColor;
                    }
                    if (instance.options.scales.y) {
                        instance.options.scales.y.grid.color = gridColor;
                        instance.options.scales.y.ticks.color = textColor;
                    }
                }
                
                if (instance.options.plugins?.legend?.labels) {
                    instance.options.plugins.legend.labels.color = textColor;
                }
                
                instance.update();
            });
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

        // Initialize charts
        function initCharts() {
            const isDark = document.documentElement.classList.contains('dark-mode');
            const textColor = isDark ? '#f3f4f6' : '#111827';
            const gridColor = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';
            
            // Pie Chart
            const pieCtx = document.getElementById('pieChart').getContext('2d');
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($states); ?>,
                    datasets: [{
                        label: 'Students',
                        data: <?php echo json_encode($counts); ?>,
                        backgroundColor: [
                            '#ef4444', '#f97316', '#f59e0b', '#eab308', '#84cc16',
                            '#22c55e', '#10b981', '#14b8a6', '#06b6d4', '#0ea5e9',
                            '#3b82f6', '#6366f1', '#8b5cf6', '#a855f7', '#d946ef',
                            '#ec4899', '#f43f5e', '#78716c', '#57534e', '#44403c'
                        ],
                        borderWidth: 1,
                        borderColor: isDark ? '#1f2937' : '#ffffff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                color: textColor,
                                boxWidth: 12,
                                padding: 20,
                                font: {
                                    size: 12
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.parsed;
                                    const total = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                                    const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                                    return `${label}: ${value} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });

            // Bar Chart
            const barCtx = document.getElementById('barChart').getContext('2d');
            new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($statusLabels); ?>,
                    datasets: [{
                        label: 'Number of Students',
                        data: <?php echo json_encode($statusCounts); ?>,
                        backgroundColor: isDark ? '#1e40af' : '#3b82f6',
                        borderColor: isDark ? '#1e3a8a' : '#2563eb',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            grid: {
                                color: gridColor
                            },
                            ticks: {
                                color: textColor
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: gridColor
                            },
                            ticks: {
                                color: textColor,
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: textColor
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.dataset.label || '';
                                    const value = context.parsed.y;
                                    const total = <?php echo $totalStudents; ?>;
                                    const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                                    return `${label}: ${value} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });

            // Timeline Chart
            const timelineCtx = document.getElementById('timelineChart').getContext('2d');
            new Chart(timelineCtx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($timelineDates); ?>,
                    datasets: [{
                        label: 'Registrations',
                        data: <?php echo json_encode($timelineCounts); ?>,
                        backgroundColor: isDark ? 'rgba(30, 64, 175, 0.2)' : 'rgba(59, 130, 246, 0.2)',
                        borderColor: isDark ? 'rgba(30, 58, 138, 1)' : 'rgba(59, 130, 246, 1)',
                        borderWidth: 2,
                        tension: 0.1,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            grid: {
                                color: gridColor
                            },
                            ticks: {
                                color: textColor
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: gridColor
                            },
                            ticks: {
                                color: textColor,
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: textColor
                            }
                        }
                    }
                }
            });
        }

        // Initialize when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            initTheme();
            initCharts();
        });
    </script>
</body>
</html>