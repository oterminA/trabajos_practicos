<!DOCTYPE html>
<!-- Ejercicio 7
Crear una página con un formulario que contenga dos input de tipo text y un select. En
los inputs se ingresarán números y el select debe dar la opción de una operación
matemática que podrá resolverse usando los números ingresados. En la página que
procesa la información se debe mostrar por pantalla la operación seleccionada, cada
uno de los operandos y el resultado obtenido de resolver la operación. Ejemplo del
formulario: -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/TP2/styleEj2_7.css">
    <title>Document</title>
</head>
<body>
    <?php include_once '../Estructura/header.php';?>
<form action="../Action/TP2/actionEj2_7.php" method="post" onsubmit="return validar()" id="formulario">
    <label>Ingresar dos números y elegir la operación:</label><br>

    <input type="text" name="numA" id="numA"placeholder="Ej: 5">
    <div id="divError" style="color: red;"></div>

    <input type="text" name="numB" id="numB" placeholder="Ej: 6">
    <span id="spanError" style="color: red;"></span><br>

    <select name="op" id="op">
        <option value="">Operación..</option>
        <!-- antes no habia pasado pero acá le tengo que sacar el # para que se pueda tomar bien la validacion con jquery -->
        <option value="suma" id="suma" name="op">SUMA</option>
        <option value="resta" id="resta" name="op">RESTA</option>
        <option value="multiplicacion" id="mult" name="op">MULTIPLICACIÓN</option>
        <option value="division" id="division" name="op">DIVISIÓN</option>
    </select><br><br>

    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="../Js/TP2/ej2_7.js"></script>
    <?php include_once '../Estructura/footer.php';?>

</body>
</html>