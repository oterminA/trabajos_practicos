<!DOCTYPE html>
<!-- Ejercicio 3
a) Crear una nueva página php con un formulario HTML de login en la que solicitan el usuario
y la password para loguearse. Los datos del formulario son enviados a un script
verificaPass.php en el que contienen un arreglo asociativo por cada usuario del sistema. El
arreglo asociativo tiene como claves: “usuario” y “clave”. El script debe visualizar un mensaje
de bienvenida si los datos ingresados coinciden con alguno de los almacenados en el arreglo
y en caso contrario un mensaje de error

REVISAR ESTA IMPLEMENTACION, FALLA EL ACTION
-->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../Css/TP2/styleEj3.css">
    <title>Inicio sesion</title>
</head>

<body>
    <?php include_once '../Estructura/header.php'; ?>
    <!-- el formAction solo tiene el $_post y llama al controller -->
    <main>
        <h1>Iniciar sesion</h1>
        <form action="../Action/TP2/actionEj3.php" method="post">
            <div class="col-md-6">
                <input type="text" class="form-control" name="user" placeholder="Usuario" required>
            </div>
            <div class="col-md-6">
                <input type="password" class="form-control" name="pass" placeholder="Contraseña" required>
            </div>
            <div class="col-12">
                <input class="btn btn-success" type="submit" value="Ingresar"></input>
            </div>
        </form>
    </main>
    <?php include_once '../Estructura/footer.php'; ?>

</body>

</html>