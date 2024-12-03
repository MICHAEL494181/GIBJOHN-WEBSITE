<?php
// Include the database connection
include('connection.php');

// Connect to SQLite database
$db = getDB();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input
    $username = $db->escapeString($_POST['username']);
    $email = $db->escapeString($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    // Check if username or email already exists
    $stmt = $db->prepare('SELECT * FROM users WHERE username = :username OR email = :email');
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':email', $email);
    $result = $stmt->execute();

    if ($result->fetchArray(SQLITE3_ASSOC) > 0) {
        echo "Username or email already exists.";
    } else {
        // Insert user data into database
        $stmt = $db->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);

        if ($stmt->execute()) {
            header("Location: login.html"); // Redirect to login
        } else {
            echo "Error: " . $db->lastErrorMsg();
        }
    }
}

// Close the database connection
$db->close();
?>