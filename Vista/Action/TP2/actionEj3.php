<?php
//este script solo tiene el $_post y llama al controller
    include_once("../../../Control/TP2/controlEj3.php"); //esto es para poder usar la funcion del controlador, acá mando información para que sea resuelta
    include_once '../../../Utils/funciones.php';
$datos = data_submitted();
    $control = new controlLogin(); //un new de la clase del controlador
    $user = $datos["user"]; //recupero el user que se guarda en el post
    $pass = $datos["pass"]; //lo mismo pero con la contraseña
    $mensaje = $control->existeUsuario($user, $pass); //como hice un new de la clase, guardo acá lo que sea que me devuelva la funcion que ejecuto en el controlador, en este caso es el mensaje de bienvenida
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Css/TP2/styleEj3.css">
    <title>Document</title>
</head>

<body>
    <?php include_once(__DIR__ . '/../../Estructura/header.php'); ?>
    <main>
            <?php
            echo $mensaje;
            ?>
        <a href="../../TP2/ejercicio_3.php" id="back">Volver</a>
    </main>
    <?php include_once(__DIR__ . '/../../Estructura/footer.php'); ?>
</body>

</html>