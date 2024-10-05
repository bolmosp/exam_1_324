<?php
session_start(); // Start session to store user data

// Database connection
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "dbusers";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreusr = $conn->real_escape_string($_POST['nombreusr']);
    $password = $_POST['password'];

    // Get user from database
    $result = $conn->query("SELECT * FROM usuarios WHERE nombreusr='$nombreusr'");
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['nombreusr'] = $nombreusr; // Store user info in session
            header("Location: dashboard.php"); // Redirect to dashboard
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "No account found with that username.";
    }
}

$conn->close();

// Redirect to another page after execution
header("Location: index.html");
exit();
?>
