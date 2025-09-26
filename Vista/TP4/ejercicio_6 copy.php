<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Css/TP4/styleEj6 copy.css">

    <title>Ejercicio 6 COPIAA</title>
</head>

<body>
    <?php include_once '../Estructura/header.php'; ?>
    <main>
        <div id="wrapper">
        <h2>INGRESAR NUEVO PROPIETARIO</h2><br>

        <form class="row g-3 needs-validation" novalidate action="../Action/TP4/actionEj6_nuevaPersona.php" method="POST">

            <div class="mb-3">
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
                <div class="invalid-feedback">El nombre no puede estar vacío.</div>
            </div>

            <div class="mb-3">
                <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido" required>
                <div class="invalid-feedback">El apellido no puede estar vacío.</div>
            </div>

            <div class="mb-3">
                <input type="text" id="dni" name="dni" class="form-control" placeholder="DNI" pattern="\d{8}" required>
                <div class="invalid-feedback">El DNI debe tener 8 números.</div>
            </div>

            <div class="mb-3">
                <input type="text" id="domicilio" name="domicilio" class="form-control" placeholder="Domicilio" required>
                <div class="invalid-feedback">El domicilio no puede estar vacío.</div>
            </div>

            <div class="mb-3">
                <input type="number" id="telefono" name="telefono" class="form-control" placeholder="Telefono" required>
                <div class="invalid-feedback">El telefono no puede estar vacío.</div>
            </div>

            <div class="mb-3">
                <input type="date" id="fechaNac" name="fechaNac" class="form-control" placeholder="Fecha de nacimiento" required>
                <div class="invalid-feedback">La fecha de nacimiento no puede estar vacia.</div>
            </div>

            <input type="submit" class="btn btn-primary"></input>
            <input type="reset" class="btn btn-danger"></input>

        </form>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script src="../Js/TP4/ej6 copy.js"></script>
    <?php include_once '../Estructura/footer.php'; ?>

</body>

</html>