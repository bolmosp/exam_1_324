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
    $rol = $_POST['rol'];

    // SQL Insert statement
    $sql = "INSERT INTO usuarios (nombreusr, password, rol)
            VALUES ('$nombreusr', '$password', '$rol')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

// Redirect to another page after execution
header("Location: /login.html");
exit();
?>
