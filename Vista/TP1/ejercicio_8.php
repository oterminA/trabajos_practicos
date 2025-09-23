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
    <link rel="stylesheet" href="../Css/TP1/style_ej8.css">
    <title>Document</title>
</head>

<body>
    <!-- tampoco funciona bien el css -->
    <?php include_once '../Estructura/header.php'; ?>
    <form action="../Action/TP1/actionEj8.php" method="post" onsubmit="return validar()">
        <label>Ingrese su edad</label>
        <input type="number" name="edad" id="edad" maxlength="3">
        <label>¿Es estudiante?</label>
        <select name="estudio" id="estudio">
            <option value="#">Seleccione una opcion</option>
            <option value="si">SI</option>
            <option value="no">NO</option>
        </select>
        <input type="submit" value="Enviar datos" id="enviar">
        <input type="reset" value="Borrar" id="enviar">
    </form>
   
    <?php include_once '../Estructura/footer.php'; ?>
 <script src="../Js/TP1/ej_8.js"></script>
</body>

</html>