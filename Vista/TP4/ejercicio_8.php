<!DOCTYPE html>
<!-- Ejercicio 6 – Crear una página “CambioDuenio.php” que contenga un formulario en donde se solicite el
numero de patente de un auto y un numero de documento de una persona, estos datos deberán ser enviados
a una página “accionCambioDuenio.php” en donde se realice cambio del dueño del auto de la patente
ingresada en el formulario. Mostrar mensajes de error en caso de que el auto o la persona no se encuentren
cargados. Utilizar css y validaciones javaScript cuando crea conveniente. Recordar usar la capa de control
antes generada, no se puede acceder directamente a las clases del ORM. -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Css/TP4/styleEj8.css">
</head>

<body>
<?php include_once '../Estructura/header.php'; ?>
    <div id="divMain">
        <h3 class="mb-4">Formulario para cambio de dueño</h3>
        <form action="../Action/TP4/actionEj8_cambioDuenio.php" id="formulario" method="post">

            <div class="mb-3">
                <input class="form-control" type="text" id="patente" name="patente" placeholder="Patente">
            </div>

            <div class="mb-3">
                <input class="form-control" type="text" id="dni" name="dni" placeholder="Numero de documento">
            </div>

            <div class="mb-3">
                <input class="form-control" type="text" id="dniNuevo" name="dniNuevo" placeholder="Nuevo numero de documento">
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
            <button type="reset" class="btn btn-secondary">Resetear</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="../Js/TP4/ej8.js"></script>
    <?php include_once '../Estructura/footer.php'; ?>
</body>
</html>
