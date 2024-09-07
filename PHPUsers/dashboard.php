<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'example');

// Query the database to get the user's details
$query = "SELECT * FROM users WHERE id = ".$_SESSION['user_id'];
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Display the user's details
echo "Welcome, ".$user['username']."!";
?>

<!-- Logout button -->
<a href="logout.php">Logout</a>