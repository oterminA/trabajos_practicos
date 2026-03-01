<!DOCTYPE html>
<!-- Implementacion del tp de librerias. Esta parte es una copia del formulario de nuevo vehiculo + agregar una foto usando gregwar/Image -->
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Css/TP4/styleGregwar.css">
    <title>Ejercicio usando gregwar/image</title>
</head>

<body class="auto">
    <?php include_once '../Estructura/header.php' ?>
    <main>
        <h2>Ingresar un nuevo vehiculo</h2>
        <div id="wrapper">
            <form class="row g-3 needs-validation" novalidate action="../Action/TPLibrerias/action_guardarAuto.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" class="form-control" name="patente" id="patente" placeholder="Patente" required>
                    <div class="invalid-feedback">Debe ingresar una patente.</div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca" required>
                    <div class="invalid-feedback">Debe ingresar una marca.</div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo" required>
                    <div class="invalid-feedback">Debe ingresar un modelo.</div>
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" name="dni" id="dni" placeholder="DNI del dueño" required>
                    <div class="invalid-feedback">Debe ingresar un DNI.</div>
                </div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="imagen" id="imagen" required>
                    <label class="input-group-text" for="inputGroupFile02">Subir</label>
                    <div class="invalid-feedback">Debe subir una foto del vehiculo.</div>
                    <!-- no olvidar revisar el peso del archivo!!! -->
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                    <input type="reset" class="btn btn-secondary" value="Limpiar">
                    <a href="http://localhost/trabajos_practicos/Vista/Action/TPLibrerias/galeria.php" class="btn btn-success">
                    Ver galería de autos
                </a>
                </div>
            </form>

            
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="../Js/TP4/ej6.js"></script>
</body>
<?php include_once '../Estructura/footer.php' ?>
</html>
