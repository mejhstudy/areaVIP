<?php
session_start();

// Log the logout (optional)
if (!empty($_SESSION['user'])) {
    $log_entry = date('Y-m-d H:i:s') . " | Logout: " . $_SESSION['user'] . "\n";
    file_put_contents('access_log.txt', $log_entry, FILE_APPEND | LOCK_EX);
}

// Clear session data
session_unset();
session_destroy();

// Clear session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Redirect with logout confirmation
header('Location: login.php?logout=1');
exit;
