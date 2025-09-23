<!DOCTYPE html>
<!-- Ejercicio 7 – Crear una página “NuevoAuto.php” que contenga un formulario en el que se permita cargar
todos los datos de un auto (incluso su dueño). Estos datos serán enviados a una página
“accionNuevoAuto.php” que cargue un nuevo registro en la tabla auto de la base de datos. Se debe chequear
antes que la persona dueña del auto ya se encuentre cargada en la base de datos, de no ser así mostrar un
link a la página que permite carga una nueva persona. Se debe mostrar un mensaje que indique si se pudo o
no cargar los datos Utilizar css y validaciones javaScript cuando crea conveniente. Recordar usar la capa de
control antes generada, no se puede acceder directamente a las clases del ORM. 
MI IDEA: tener dos formularios y enviar por post los datos a un solo action-->
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Css/TP4/styleEj7.css">
    <title>Ejercicio 7</title>
</head>

<body class="auto">
    <main>
        <h1>INGRESAR DATOS AUTO</h1>
        <form action="../Action/TP4/actionEj7_nuevoAuto.php" method="post" onsubmit="return validar()">

            <input type="text" name="patente" id="patente" placeholder="Patente" required>
            <input type="text" name="marca" id="marca" placeholder="Marca" required><br>
            <input type="text" name="modelo" id="modelo" placeholder="Modelo" required>
            <input type="number" name="dni" id="dni" placeholder="DNI del dueño" required><br>

            <input type="submit" value="Enviar" name="envio_auto" class="btn">
            <input type="reset" value="Borrar" class="btn">
        </form>
    </main>
    <script src="../../Js/TP4/ej7.js"></script>
</body>

</html>