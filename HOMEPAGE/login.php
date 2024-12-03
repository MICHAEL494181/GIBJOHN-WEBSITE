<?php
// Include the database connection
include('connection.php');

// Connect to SQLite database
$db = getDB();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input
    $username = $db->escapeString($_POST['username']);
    $password = $_POST['password'];

    // Retrieve user data from the database
    $stmt = $db->prepare('SELECT * FROM users WHERE username = :username');
    $stmt->bindValue(':username', $username);
    $result = $stmt->execute();
    $user = $result->fetchArray(SQLITE3_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Successful login, redirect to welcome page
        session_start();
        $_SESSION['username'] = $user['username'];
        header("Location: welcome.php");
    } else {
        echo "Invalid username or password.";
    }
}

// Close the database connection
$db->close();
?>