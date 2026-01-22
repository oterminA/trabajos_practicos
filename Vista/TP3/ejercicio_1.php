<!DOCTYPE html>
<!-- Ejercicio 1 – Crear un formulario HTML que permita subir un archivo. En el servidor se deberá
controlar, antes de guardar el archivo, que los tipos validos son .doc o pdf y además el tamaño
máximo permitido es de 2mb. En caso que se cumplan las condiciones mostrar un link al archivo
cargado, en caso contrario mostrar un mensaje indicando el problema.  -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../Css/TP3/styleEj_1.css">
    <title>Ejercicio 1</title>
</head>

<body>
    <?php include_once '../Estructura/header.php';?>
    <form action="../Action/TP3/actionEj_1.php" method="post" enctype="multipart/form-data" onsubmit="return validar()"> <!-- con el enctype estoy llenando al $_files de la informacion que obtenga de acá -->

        <div class="input-group">
            <input type="file" class="form-control" id="archivo" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="archivo">
            <div id="divError"></div>
            <input class="btn btn-primary" type="submit" ></input>
            <input class="btn btn-primary" type="reset"></input>
        </div>
    </form>

    <script src="../Js/TP3/ej_1.js"></script>
    <?php include_once '../Estructura/footer.php';?>

</body>

</html>