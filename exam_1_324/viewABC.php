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
        <title>HAM-LP Ver Registro</title>
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
            <th scope="col">Cod. Cat.</th>
            <th scope="col">Distrito</th>
            <th scope="col">Manzana</th>
            <th scope="col">Predio</th>
            <th scope="col">Subpredio</th>
            <th scope="col">Direccion</th>
            <th scope="col">Zona</th>
            </tr>
        </thead>
        <tbody>
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
        $sql1 = "SELECT ci, paterno, nombre FROM persona WHERE ci = '$userci'";
        $result1 = $conn->query($sql1);
        $sql2 = "SELECT id, distrito, manzana, predio, subpredio, direccion, zona, id_persona FROM catastro WHERE id_persona = '$userci'";
        $result2 = $conn->query($sql2);

        // Check if there are results and display them in an HTML table
        if ($result1->num_rows > 0) {
            $row1 = $result1->fetch_assoc();
            $row2 = $result2->fetch_assoc();
                echo "<tr>
                        <td>" . $row1["ci"] . "</td>
                        <td>" . $row1["paterno"] . "</td>
                        <td>" . $row1["nombre"] . "</td>
                        <td>" . $row2["id"] . "</td>
                        <td>" . $row2["distrito"] . "</td>
                        <td>" . $row2["manzana"] . "</td>
                        <td>" . $row2["predio"] . "</td>
                        <td>" . $row2["subpredio"] . "</td>
                        <td>" . $row2["direccion"] . "</td>
                        <td>" . $row2["zona"] . "</td>
                      </tr>";
        } else {
            echo '';
        }

        // Close the connection
        $_SESSION['id'] = $row2["id"];
        $conn->close();
        ?>
        </tbody>
        </table>
        </div>
        </section>
        <script>
            function checkIDJava() {
                document.getElementById("javaForm").submit();
            }
            function checkIDCSharp() {
                document.getElementById("javaForm").submit();
            }
        </script>
        <section id="external-script">
        <div class="container px-0">
        <form id="javaForm" method="POST" action="viewABCTax.php">
        <button type="submit" class="btn btn-success" name="java" value="java" onclick="checkIDJava()">Java: Obtener el tipo de impuesto</button>
        <button type="submit" class="btn btn-warning" name="csharp" value="csharp" onclick="checkIDCSharp()">CSharp: Obtener el tipo de impuesto</button>
        </form>
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
