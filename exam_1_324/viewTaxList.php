<?php session_start();
if (isset($_SESSION['nombreusr'])) {
    $username = $_SESSION['nombreusr'];
    $userci = $_SESSION['ci'];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>HAM-LP Ver Lista Personas</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="index.php">HAM-LP</a>
            </div>
        </nav>
        <section id="table">
        <div class="container px-0">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">CI</th>
            <th scope="col">Paterno</th>
            <th scope="col">Nombre</th>
            <th scope="col">Impuesto</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Database connection details
        $servername = "localhost";  // Change this to your server name
        $username = "root";         // Your database username
        $password = "";             // Your database password
        $dbname = "bdbenjamin";  // Your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to sort persona by the first digit of the id from catastro
        $sql = "
            SELECT persona.ci, persona.paterno, persona.nombre, catastro.id
            FROM persona, catastro
            WHERE persona.ci = catastro.id_persona
            ORDER BY SUBSTRING(catastro.id, 1, 1)
        ";

        // Execute the query
        $result = $conn->query($sql);

        // Check if there are results and display them
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                $firstChar = substr($row["id"], 0, 1);
                if($firstChar == '1'){
                    echo '<tr class="table-danger">';
                    echo "<td>" . $row["ci"] . "</td>
                        <td>" . $row["paterno"] . "</td>
                        <td>" . $row["nombre"] . "</td>
                        <td>Alto</td>
                        </tr>";
                } else if ($firstChar == '2'){
                    echo '<tr class="table-warning">';
                    echo "<td>" . $row["ci"] . "</td>
                        <td>" . $row["paterno"] . "</td>
                        <td>" . $row["nombre"] . "</td>
                        <td>Medio</td>
                        </tr>";
                } else if ($firstChar == '3'){
                    echo '<tr class="table-info">';
                    echo "<td>" . $row["ci"] . "</td>
                        <td>" . $row["paterno"] . "</td>
                        <td>" . $row["nombre"] . "</td>
                        <td>Bajo</td>
                        </tr>";
                } else {
                    echo "<tr>
                        <td>" . $row["ci"] . "</td>
                        <td>" . $row["paterno"] . "</td>
                        <td>" . $row["nombre"] . "</td>
                        <td>Bajo</td>
                        </tr>";
                }
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        // Close connection
        $conn->close();
        ?>
        </tbody>
        </table>
        </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; x7b Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
