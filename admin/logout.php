<?php 
require_once '../include/initialize.php';

// Start the session
session_start();

// Unset all session variables related to admin
$session_variables = [
    'ADMIN_USERID',
    'ADMIN_FULLNAME',
    'ADMIN_USERNAME',
    'ADMIN_ROLE'
];

foreach ($session_variables as $variable) {
    unset($_SESSION[$variable]);
}

// Optionally, destroy the session
session_destroy();

// Redirect to login page with a logout indicator
redirect(web_root . "admin/login.php?logout=1");
?>
