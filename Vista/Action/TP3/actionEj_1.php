<?php
// lo que voy a recibir del $_files es algo asi:
// Array
// (
//     [name] => documento.pdf           // Nombre original del archivo
//     [type] => application/pdf         // Tipo MIME
//     [tmp_name] => /tmp/php123.tmp     // Ruta temporal en el servidor
//     [error] => 0                      // Código de error (0 = todo bien)
//     [size] => 124500                  // Tamaño del archivo en bytes
// )


// Directorio donde se guarda el archivo
$dir = 'C:\\xampp\\htdocs\\trabajos_practicos\\Vista\\Assets/';  //barra invertida doble 
include_once('../../../Control/TP3/controlEj_1.php');
$control = new controlArchivos();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['archivo'])) {
    $archivo = $_FILES['archivo'];
}
$mensaje = $control->procesarArchivo($archivo, $dir);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Css/TP3/styleEj_1.css">
</head>

<body>
    <?php include_once(__DIR__ . '/../../Estructura/footer.php'); ?>
    <div id="divMensaje">
        <?php
        echo $mensaje;
        ?>
        <a href="../../TP3/ejercicio_1.php">ir a inicio</a>
    </div>
    <?php include_once(__DIR__ . '/../../Estructura/footer.php'); ?>
</body>

</html>