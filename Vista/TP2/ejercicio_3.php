<!DOCTYPE html>
<!-- Ejercicio 3
a) Crear una nueva página php con un formulario HTML de login en la que solicitan el usuario
y la password para loguearse. Los datos del formulario son enviados a un script
verificaPass.php en el que contienen un arreglo asociativo por cada usuario del sistema. El
arreglo asociativo tiene como claves: “usuario” y “clave”. El script debe visualizar un mensaje
de bienvenida si los datos ingresados coinciden con alguno de los almacenados en el arreglo
y en caso contrario un mensaje de error-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/TP2/styleEj3.css">
    <title>Inicio sesion</title>
</head>

<body>
    <?php include_once '../Estructura/header.php';?>
    <!-- el formAction solo tiene el $_post y llama al controller -->
    <form action="../Action/TP2/actionEj3.php" method="post" id="formulario" onsubmit="return verificarFormulario()"> <!-- en este ejercicio no pide que haga una validacion al estilo js -->
        <input type="text" placeholder="Usuario" name="user" id="user" required maxlength="5">
        <input type="password" name="pass" id="pass" placeholder="Contraseña" required maxlength="4">
        <input type="submit" value="Ingresar" id="submit">
    </form>
    <?php include_once '../Estructura/footer.php';?>

</body>

</html>
