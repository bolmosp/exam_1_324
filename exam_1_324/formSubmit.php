<?php
// Database connection details
$servername = "localhost";  // Change if your DB is on a different server
$username = "root";         // Database username
$password = "";             // Database password
$dbname = "bdbenjamin";  // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Prepare the SQL statement
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $distrito = intval($_POST['distrito']);
    $manzana = intval($_POST['manzana']);
    $predio = intval($_POST['predio']);
    $subpredio = intval($_POST['subpredio']);
    $direccion = $conn->real_escape_string($_POST['direccion']);
    $zona = $conn->real_escape_string($_POST['zona']);

    // Check if the subpredio field is empty
    $subpredio = $_POST['subpredio'] ?? NULL;

    // SQL Insert statement
    $sql = "INSERT INTO catastro (id, distrito, manzana, predio, subpredio, direccion, zona)
            VALUES ('$id', '$distrito', '$manzana', '$predio', '$subpredio', '$direccion', '$zona')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();

    // Redirect to another page after execution
    header("Location: /formABC.html");
    exit();
}
?>
