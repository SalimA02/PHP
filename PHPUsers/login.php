<?php
session_start();

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'example');

// Check if the user has submitted the login form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query the database to check if the username and password are correct
  $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $query);

  // If the username and password are correct, store the user's ID in the session
  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $user['id'];
    header('Location: dashboard.php');
    exit;
  } else {
    $error = 'Invalid username or password';
  }
}
?>

<!-- Login form -->
<form method="post">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"><br>
  <input type="submit" value="Login">
</form>

<?php if (isset($error)): ?>
  <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>