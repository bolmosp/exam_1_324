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
        <title>HAM-LP Inicio</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="#page-top">HAM-LP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">Informacion</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Tramites</a></li>
                        <li class="nav-item"><a class="nav-link" href="helloworld.php">Hola Mundo PHP</a></li>
                        <?php
                        if (empty($_SESSION['nombreusr'])){
                            echo '<li class="nav-item"><a class="btn btn-primary" href="login.html">Ingresar/Registrarse</a></li>';
                        } else {
                            if ($_SESSION['rol'] == "admin") {
                                echo '<div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">'
                            . htmlspecialchars($username) .
                            '</button>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="formABC.php">Llenar ficha Catastral</a></li>
                            <li><a class="dropdown-item" href="viewTaxList.php">Lista por Tipo Impuesto</a></li>
                            <li><a class="dropdown-item" href="logout.php">Cerrar Sesion</a></li>
                            </ul>
                            </div>';
                            } else {
                            echo '<div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">'
                            . htmlspecialchars($username) .
                            '</button>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="viewABC.php">Ver Registros Catastro</a></li>
                            <li><a class="dropdown-item" href="logout.php">Cerrar Sesion</a></li>
                            </ul>
                            </div>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-primary bg-gradient text-white">
            <div class="container px-4 text-center">
                <h1 class="fw-bolder">Municipio de La Paz</h1>
                <p class="lead">Autoridad Catastral Municipal</p>
                <a class="btn btn-lg btn-light" href="#about">Informacion</a>
            </div>
        </header>
        <!-- About section-->
        <section id="about">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>Mapa Catastral de La Paz</h2>
                        <p class="lead">El Mapa Catastral brinda información general sobre la cartografía, normativa, guías, herramientas y otros relacionados al registro catastral en el municipio de La Paz-Bolivia. El mapa catastral tambien permite interactuar con otras capas o mapas del Sistema de Información Territorial (SIT) del GAMLP como ser el mapa de Uso de Suelos (LUSU), mapa de Riesgos y otros.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services section-->
        <section class="bg-light" id="services">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>Tipos de Tramites</h2>
                        <p class="lead">Se cuenta con los siguientes tipos de tramites:</p>
                        <ul>
                            <li>Cartilla de Catastro</li>
                            <li>Modelo de Carta Notariada con validez de 60 dias calendario</li>
                            <li>Acta de entendimiento entre el GAMLP y Derechos Reales 2021</li>
                        </ul>
                    </div>
                </div>
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
