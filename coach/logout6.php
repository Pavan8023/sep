<?php
session_start();
session_unset();
session_destroy();

// Force redirect to logsign.php after logout
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Location: ../index.php?logout=1");
exit;
?>
