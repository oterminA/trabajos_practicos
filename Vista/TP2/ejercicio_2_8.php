<!DOCTYPE html>
<!-- Ejercicio 8
La empresa de Cine Cinem@s tiene establecidas diferentes tarifas para las entradas, en función de la edad y de la condición de estudiante del cliente. Desea que sean los propios clientes los que puedan calcular el valor de sus entradas a través de una página web. 
*Si es estudiante o menor de 12 años el precio es de $160, 
*si es estudiante y mayor o igual de 12 años el precio es de $180, 
*en cualquier otro caso el precio es de $300. 
Diseñar un
formulario que solicite la edad y permita ingresar si se trata de un estudiante o no. Con
un botón enviar los datos a un script encargado de realizar el cálculo y visualizarlo.
Agregar un botón para limpiar el formulario y volver a consultar. -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/TP2/styleEj2_8.css">
    <title>Ejercicio 2.8</title>
</head>

<body>
    <!-- tampoco funciona bien el css -->
<?php include_once '../Estructura/header.php';?>
    <form action="../Action/TP2/actionEj2_8.php" method="post"  id="formulario">
    <label>Ingrese su edad</label>
    <input type="number" name="edad" id="edad" maxlength="3">
    <label>¿Es estudiante?</label>
    <select name="estudio" id="estudio">
        <option value="">Seleccione una opcion</option>
        <option value="si">SI</option>
        <option value="no">NO</option>
    </select>
    <input type="submit" value="Enviar datos">
    <input type="reset" value="Borrar" >
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    
    <script src="../Js/TP2/ej2_8.js"></script>
    <?php include_once '../Estructura/footer.php';?>
</body>
</html>