<!DOCTYPE html>
<!-- Ejercicio 5
Modificar el formulario del ejercicio anterior solicitando, tal que usando componentes
“radios buttons” se ingrese el nivel de estudio de la persona: 1-no tiene estudios, 2-
estudios primarios, 3-estudios secundarios. Agregar el componente que crea más
apropiado para solicitar el sexo. En la página que procesa el formulario mostrar además
un mensaje que indique el tipo de estudios que posee y su sexo. -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/TP2/styleEj2_5.css">
    <title>Ejercicio 2.5</title>
</head>

<body>
    <?php include_once '../Estructura/header.php';?>
    <form action="../Action/TP2/actionEj2_5.php" method="get" onsubmit="return validar()" id="formulario">
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
        <input type="radio" name="est" id="sin_est" value="sin_es">Sin estudios<br>
        <input type="radio" name="est" id="est_prim" value="est_prim">Primario<br>
        <input type="radio" name="est" id="est_sec" value="est_sec">Secundario<br>
        <input type="radio" name="est" id="est_uni" value="est_uni">Universitario<br><br>
        <input type="submit" value="Enviar" id="boton"><br>
        <input type="reset" value="Borrar" id="boton">
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="../Js/TP2/ej2_5.js"></script> 
<?php include_once '../Estructura/footer.php';?>

</body>

</html>