<?php
include_once '../../Estructura/header.php';
include_once '../../../Utils/funciones.php';
include_once '../../../Control/TP4/AbmAuto.php'; 

$objAbmAuto = new AbmAuto();
$dniFiltro = $_GET['dni'] ?? null;

$arrayAutos = $objAbmAuto->buscar($dniFiltro ? ['dni' => $dniFiltro] : null);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../../Css/TP4/styleGregwar.css">
<title>Galería de Autos</title>
<style>
    #main-div {
        max-width: 1200px;
        margin: 30px auto;
    }
    #dni-form {
        text-align: center;
        margin-bottom: 30px;
    }
    #dni-form input {
        width: 250px;
        font-size: 1.1rem;
        text-align: center;
        margin-bottom: 10px;
    }
    .card {
        transition: transform 0.3s, box-shadow 0.3s;
        cursor: pointer;
    }
    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        z-index: 10;
    }
    .card-img-overlay {
        background: rgba(0,0,0,0.4);
        color: #fff;
        bottom: 0;
        top: auto;
        padding: 10px;
        font-weight: bold;
        border-radius: 0 0 8px 8px;
        text-align: center;
    }
    .card-img-top {
        height: 250px;
        object-fit: cover;
        border-radius: 8px 8px 0 0;
    }
</style>
</head>
<body>
<?php include_once '../../Estructura/header.php'; ?>

<div id="main-div" class="d-flex flex-column align-items-center">

    <!-- GALERÍA DE AUTOS -->
    <div id="galeria" class="w-100">
        <?php
        if (!is_array($arrayAutos) || count($arrayAutos) === 0) {
            echo "<p class='text-center'>No hay autos cargados.</p>";
            echo '<div class="text-center"><a href="../../TPLibrerias/ejercicio_gregwarImage.php" class="btn btn-primary">Ir al formulario de carga</a></div>';
        } else {
            echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">';
            foreach ($arrayAutos as $objAuto) {
                $imagen = $objAuto->getImagen();
                $patente = $objAuto->getPatente();

                if (!empty($imagen)) {
                    $nombre_archivo = basename($imagen);
                    $ruta_servidor = __DIR__ . '/../Assets/' . $nombre_archivo;
                    $ruta_web = "../Assets/" . $nombre_archivo;

                    if (file_exists($ruta_servidor)) {
                        echo '<div class="col">';
                        echo '<div class="card h-100 text-center">';
                        echo "<img src='$ruta_web' class='card-img-top' alt='Imagen de auto'>";
                        echo "<div class='card-img-overlay'>$patente</div>";
                        echo '</div>';
                        echo '</div>';
                    }
                }
            }
            echo '</div>'; // cierre row

            echo '<div class="mt-4 text-center">';
            echo '<a href="../../TPLibrerias/ejercicio_gregwarImage.php" class="btn btn-primary btn-lg">Volver al formulario</a>';
            echo '</div>';
        }
        ?>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php include_once '../../Estructura/footer.php'; ?>
</html>
