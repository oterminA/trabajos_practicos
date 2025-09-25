<!DOCTYPE html>
<!-- Ejercicio 5 – Crear una página "listaPersonas.php" que muestre un listado con las personas que se
encuentran cargadas y un link a otra página “autosPersona.php” que recibe un dni de una persona y muestra
los datos de la persona y un listado de los autos que tiene asociados. Recordar usar la capa de control antes
generada, no se puede acceder directamente a las clases del ORM.  

BUENO aparentemente hice el ejercicio como se me cantó y 'listado autos' tiene un link q lleva a una pagina pero nada q ver, lo puse y al final terminé desplegando (nuevamente agregado xq antes se ve q lo borré xd) el input cuando se apreta el coso para poner el dni-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/TP4/styleEj5.css">
    <title>Document</title>
</head>
<body>
    <?php include_once '../../Estructura/header.php' ?>
        <div id="main">
            <h3>Menú autos</h3>
                <a href="./listaPersonas.php" id="link">Listado de dueños</a><br>
                <a href="#" id="linkDesplegar">Listado de autos por DNI</a><br>
            <form action="../../Action/TP4/actionEj_5_autosPersona.php" method="post" onsubmit="return validar()" id="formulario">
                <input type="number" name="dni" id="dni" placeholder="Numero de documento"><br>
                <span id="spanError"></span><br>
                <input type="submit" value="Buscar" class="btn">
                <input type="reset" value="Borrar" class="btn">

            </form>
        </div>
    <script src="../../Js/TP4/ej5.js"></script>
    <?php include_once '../../Estructura/footer.php' ?>

</body>
</html>