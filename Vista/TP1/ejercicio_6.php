<!DOCTYPE html>
<!-- Ejercicio 6
Modificar el formulario del ejercicio anterior para que permita seleccionar los diferentes
deportes que practica (futbol, basket, tennis, voley) un alumno. Mostrar en la página
que procesa el formulario la cantidad de deportes que practica. -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/TP1/style_ej6.css">
    <title>Ejercicio 6</title>
</head>

<body>
<?php include_once '../Estructura/header.php';?>
<form action="../Action/TP1/actionEj6.php" method="get" onsubmit="return validar()">
        <label>Nombre:</label> <br>
        <input type="text" name="nombre" id="nombre"> <br>
        <label>Apellido</label> <br>
        <input type="text" name="apellido" id="apellido"> <br>
        <label>Edad</label> <br>
        <input type="number" name="edad" id="edad"> <br>
        <label>Genero</label> <br>
        <select name="genero" id="genero">
            <option value="">Seleccione una opcion</option>
            <option value="F">F</option>
            <option value="M">M</option>
            <option value="OTRO">OTRO</option>
        </select><br>
        <label>Direccion</label> <br>
        <input type="text" name="direccion" id="direccion"> <br>
        <label>Nivel de estudios</label> <br>
        <!-- como hago acá para que pueda poner el mismo atributo en name e id pero tambien manteniendo eso de que si apreto un boton no puedo apretar el otro? -->
        <input type="radio" name="est" id="sin_est" value="sin_est" required>Sin estudios<br>
        <input type="radio" name="est" id="est_prim" value="est_prim" required>Primario<br>
        <input type="radio" name="est" id="est_sec" value="est_sec" required>Secundario<br>
        <input type="radio" name="est" id="est_uni" value="est_uni" required>Universitario<br>
        <label>Deportes que practica: </label><br>
        <input type="checkbox" name="opciones[]" id="fut">Futbol<br>
        <input type="checkbox" name="opciones[]" id="bas">Basquet<br>
        <input type="checkbox" name="opciones[]" id="ten">Tennis<br>
        <input type="checkbox" name="opciones[]" id="pad">Padel<br>
        <input type="checkbox" name="opciones[]" id="han">Handball<br>
        <input type="checkbox" name="opciones[]" id="otro">Otro<br><br>
        <div id="divError"></div>
        <input type="submit" value="Enviar" class="boton">
        <input type="reset" value="Borrar" class="boton">
    </form>

    <script src="../Js/TP1//ej_6.js"></script>
<?php include_once '../Estructura/footer.php';?>

</body>

</html>