<!DOCTYPE html>
<!-- Ejercicio 9 – Crear una página “BuscarPersona.html” que contenga un formulario que permita cargar un
numero de documento de una persona. Estos datos serán enviados a una página “accionBuscarPersona.php”
busque los datos de la persona cuyo documento sea el ingresado en el formulario los muestre en un nuevo
formulario; a su vez este nuevo formulario deberá permitir modificar los datos mostrados (excepto el nro de
documento) y estos serán enviados a otra página “ActualizarDatosPersona.php” que actualiza los datos de la
persona. Utilizar css y validaciones javaScript cuando crea conveniente. Recordar usar la capa de control
antes generada, no se puede acceder directamente a las clases del ORM. -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Css/TP4/styleEj9.css">
    <title>Ejercicio 9</title>
</head>
<body>
<?php include_once '../Estructura/header.php'; ?>
<div id="main">
        <h3 class="mb-4">Ingrese un documento para realizar el cambio de datos</h3>
        <form action="../Action/TP4/actionEj9/actionEj_9_cambiarDatos.php" id="formulario" method="post">

            <div class="mb-3">
                <input class="form-control" type="text" id="dni" name="dni" placeholder="Numero de documento">
            </div>

            <input type="submit" class="btn btn-primary"></input>
            <input type="reset" class="btn btn-secondary"></input>
        </form>
    </div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="../Js/TP4/ej8.js"></script>
    <?php include_once '../Estructura/footer.php'; ?>
</body>
</html>