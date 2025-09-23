<!DOCTYPE html>
<!-- Ejercicio 4 – Crear una página “NuevaPersona.php” que contenga un formulario que permita solicitar todos
los datos de una persona. Estos datos serán enviados a una página “accionNuevaPersona.php” que cargue
un nuevo registro en la tabla persona de la base de datos. Se debe mostrar un mensaje que indique si se
pudo o no cargar los datos de la persona. Utilizar css y validaciones javaScript cuando crea conveniente.
Recordar usar la capa de control antes generada, no se puede acceder directamente a las clases del ORM -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/TP4/styleEj6.css">
    <title>Ejercicio 6</title>
</head>
<body>
<label id="h1">INGRESAR DATOS</label>
<main>
    <form action="../Action/TP4/actionEj6_nuevaPersona.php" method="post" onsubmit="return validar()">
<input type="text" name="nombre" id="nombre" placeholder="Nombre"><br>
<input type="text" name="apellido" id="apellido" placeholder="Apellido"><br>
<input type="number" name="dni" id="dni" placeholder="Numero de documento" required><br>
<input type="date" name="fechaNac" id="fechaNac" placeholder="Fecha de nacimiento" required><br>
<input type="number" name="telefono" id="telefono" placeholder="Numero de telefono" required><br>
<input type="text" name="domicilio" id="domicilio" placeholder="Domicilio"><br>
<input type="submit" value="Enviar" class="btn"><br>
<input type="reset" value="Borrar" class="btn">

</form>
    
</main>

<script src="../Js/TP4/ej6.js"></script>
</body>
</html>