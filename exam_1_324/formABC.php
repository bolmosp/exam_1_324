<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>HAM-LP Ficha Catastral</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script>
            function toggleField(checkbox) {
                // Get the input field
                var field = document.getElementById("subpredio");
                // Enable or disable the field based on checkbox status
                field.disabled = !checkbox.checked;
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
        <script language="javascript">
        $(document).ready(function(){
            $("#distrito").on('change', function () {
                $("#distrito option:selected").each(function () {
                    selected=$(this).val();
                    $.post("zoneOptions.php", { selected: selected }, function(data){
                        $("#zona").html(data);
                    });			
                });
        });
        });
        </script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="index.php">HAM-LP</a>
            </div>
        </nav>
        <header class="bg-primary bg-gradient text-white">
            <div class="container px-4 text-left">
                <h1 class="fw-bolder">Llenar Ficha Catastral</h1>
            </div>
        </header>
        <section id="form">
            <div class="container px-4">
                <form  action="formSubmit.php" method="POST">
                    <h2>Datos personales</h2>
                    <div class="mb-3">
                    <label for="ci" class="form-label">C.I.</label>
                    <input type="number" class="form-control" name="ci" id="ci" required>
                    </div>
                    <div class="mb-3">
                    <label for="paterno" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" name="paterno" id="paterno" required>
                    </div>
                    <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required>
                    </div>
                    <h2>Datos de Catastro</h2>
                    <div class="mb-3">
                    <label for="id" class="form-label">Codigo catastral</label>
                    <input type="number" class="form-control" name="id" id="id" required>
                    </div>
                    <div class="mb-3">
                    <label for="distrito" class="form-label">Distrito</label>
                    <select name="distrito" id="distrito" class="form-control" required>
                        <option value="" disabled selected>Selecciona un Distrito</option>
                        <option value="13">Distrito 13</option>
                        <option value="14">Distrito 14</option>
                        <option value="20">Distrito 20</option>
                        <option value="24">Distrito 24</option>
                    </select>
                    </div>
                    <div class="mb-3">
                    <label for="manzana" class="form-label">Manzana</label>
                    <input type="number" class="form-control" name="manzana" id="manzana" required>
                    </div>
                    <div class="mb-3">
                    <label for="predio" class="form-label">Predio</label>
                    <input type="number" class="form-control" name="predio" id="predio" required>
                    </div>
                    <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="CheckSubproperty" onclick="toggleField(this)">
                    <label class="form-check-label" for="CheckSubproperty">Tiene subpredio</label>
                    </div>
                    <div class="mb-3">
                    <label for="subpredio" class="form-label">Subpredio</label>
                    <input type="number" class="form-control" name="subpredio" id="subpredio" disabled>
                    </div>
                    <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" required>
                    </div>
                    <div class="mb-3">
                    <label for="zona" class="form-label">Zona</label>
                    <select name="zona" id="zona" class="form-control" required>
                        <option value="" disabled selected>Selecciona una Zona</option>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
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