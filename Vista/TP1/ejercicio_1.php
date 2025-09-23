<!DOCTYPE html>
<!-- Ejercicio 1
Confeccionar un formulario que solicite un número. Al pulsar el botón de enviar debe
llamar a un script –vernumero.php- y visualizar un mensaje que indique si el número
enviado fue: positivo, cero o negativo. Añadir un link, a la página que visualiza la
respuesta, que permita volver a la página anterior. -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/TP1/style_ej1.css">
    <title>Ejercicio 1</title>
</head>

<body>

    <?php include('../Estructura/header.php'); ?>

    <main id="container">
        <form onsubmit="return validar()" action="../Action/TP1/actionEj1.php" method="get" id="formulario">
            <label>Ingrese un número</label><br>
            <input type="text" name="numero" id="numero"><br>
            <input type="submit" value="Enviar">
            <input type="reset" value="Borrar">
        </form>
    </main>


    <script src="../Js/TP1/ej_1.js"></script>
    <?php include('../Estructura/footer.php'); ?>

</body>

</html>