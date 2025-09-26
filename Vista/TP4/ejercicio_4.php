<!DOCTYPE html>
<!-- Ejercicio 4 – Crear una pagina "buscarAuto.php" que contenga un formulario en donde se solicite el numero
de patente de un auto, estos datos deberán ser enviados a una pagina “accionBuscarAuto.php” en donde
usando la clase de control correspondiente, se soliciten los datos completos del auto que se corresponda con
la patente ingresada y mostrar los datos en una tabla. También deberán mostrar los carteles que crean
convenientes en caso de que no se encuentre ningún auto con la patente ingresada.
Utilizar css y validaciones javaScript cuando crea conveniente. Recordar usar la capa de control antes
generada, no se puede acceder directamente a las clases del ORM. -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Css/TP4/styleEj4.css">

    <title>Ejercicio 4</title>
</head>

<body>
    <?php include_once '../Estructura/header.php'; ?>
    <main>
        <div id="wrapper">
        <h2>BUSCADOR 🔍</h2>
        <form class="row g-3 needs-validation" novalidate action="../Action/TP4/actionEj_4.php" method="POST">

            <div class="mb-3">
                <input type="num" id="patente" name="patente" class="form-control" placeholder="Patente" required>
                <div class="invalid-feedback">El campo no puede estar vacío.</div>
            </div>

            
            <input type="submit" class="btn btn-primary"></input>
            <input type="reset" class="btn btn-danger"></input>

        </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script src="../Js/TP4/ej6.js"></script>

<?php include_once '../Estructura/footer.php'; ?>

</body>
</html>