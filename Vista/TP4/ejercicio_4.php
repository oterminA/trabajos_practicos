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
    <link rel="stylesheet" href="../Css/TP4/styleEj4.css">
    <title>Ejercicio 4</title>
</head>
<body>

    <?php include_once '../Estructura/header.php'; ?>
    <main id="main">
        <h3>BUSCADOR 🔍 </h3>
        <form action="../Action/TP4/actionEj_4.php" method="post" onsubmit="return validar()">
            <input type="text" name="patente" id="patente" placeholder="Ingrese la patente"> <br>
            <span id="spanError"></span><br>
            <input type="submit" value="Buscar" class="btn"><br>
            <input type="reset" value="Borrar" class="btn">
        </form>
    </main>

<script src="../Js/TP4/ej4.js"></script>
<?php include_once '../Estructura/footer.php'; ?>

</body>
</html>