<?php
session_start();

// Unset the user's ID in the session
unset($_SESSION['user_id']);

// Redirect the user to the login page
header('Location: login.php');
exit;
?>