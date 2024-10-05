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

// SQL query to fetch data from the users table
$sql = "SELECT id, distrito, manzana, predio, subpredio, direccion, zona FROM catastro";
$result = $conn->query($sql);

// Check if there are results and display them in an HTML table
if ($result->num_rows > 0) {
    // Start the HTML table
    echo "<table border='1'>
            <tr>
                <th>Codigo Catastral</th>
                <th>Distrito</th>
                <th>Manzana</th>
                <th>Predio</th>
                <th>Subpredio</th>
                <th>Direccion</th>
                <th>Zona</th>
            </tr>";
    
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["distrito"] . "</td>
                <td>" . $row["manzana"] . "</td>
                <td>" . $row["predio"] . "</td>
                <td>" . $row["subpredio"] . "</td>
                <td>" . $row["direccion"] . "</td>
                <td>" . $row["zona"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close the connection
$conn->close();
?>
