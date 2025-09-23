<!DOCTYPE html>
<!-- Ejercicio 2 – Crear un formulario que permita subir un archivo. En el servidor se deberá controlar
que el tipo esperado sea txt (texto plano), si es correcto deberá abrir el archivo y mostrar su
contenido en un textarea.
(OBS: Referencia a funciones para trabajar con archivos http://php.net/manual/en/ref.filesystem.php) -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/TP3/styleEj_2.css">
</head>

<body>
    <?php include_once '../Estructura/header.php';?>
    <form action="../Action/TP3/actionEj_2.php" method="post" onsubmit="return validar()" enctype="multipart/form-data">
        <label for="archivo">Ingrese su archivo:</label>
        <input name="archivo" id="archivo" type="file" />
        <div id="divError"></div>
        <div>
            <input type="submit" value="Enviar" class="boton">
            
            <input type="reset" value="Borrar" class="boton">
        </div>

    </form>

    <script src="../Js/TP3/ej_2.js"></script>
    <?php include_once '../Estructura/footer.php';?>

</body>

</html>