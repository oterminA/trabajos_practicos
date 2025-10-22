<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolución</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../Css/TP4/styleGregwar.css">
</head>

<body class="bg-light">

    <?php include_once '../../Estructura/header.php'; ?>

    <main class="container py-5">
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <?php
                include_once '../../../Utils/funciones.php';
                require __DIR__ . '/../../../vendor/autoload.php';
                echo realpath(__DIR__ . '/../../../vendor/autoload.php');

                use Gregwar\Image\Image;

                $datos = data_submitted();

                if (!isset($datos['imagen']) || !isset($datos['dni'])) {
                    echo "<div class='alert alert-danger'>No se recibieron los datos esperados.</div>";
                    exit;
                }

                // Directorio donde se guardarán las imágenes
                $directorio = __DIR__ . '/../Assets/';
                if (!is_dir($directorio)) {
                    mkdir($directorio, 0777, true);
                }

                // Procesamiento del archivo
                $archivo = $datos['imagen']['tmp_name'];
                $nombre = uniqid('auto_') . '.jpg';
                $ruta_imagen = 'Vista/Assets/' . $nombre;

                // Procesar imagen con Gregwar/Image
                try {
                    Image::open($archivo)
                        ->brightness(-50)
                        ->contrast(30)
                        ->scaleResize(1000, 600)
                        ->save($directorio . $nombre, 'jpg', 85);
                } catch (Exception $e) {
                    echo "<div class='alert alert-danger'>Error al procesar la imagen: " . htmlspecialchars($e->getMessage()) . "</div>";
                    exit;
                }

                // Controladores
                $controlPersona = new AbmPersona();
                $dni = $datos["dni"];
                $existePersona = $controlPersona->buscar(['NroDni' => $dni]);

                echo '<div class="mb-3">';

                if (is_array($existePersona) && count($existePersona) > 0) {
                    echo "<div class='alert alert-success'>El DNI <strong>$dni</strong> ya está registrado. Agregando nuevo vehículo...</div>";

                    $controlAuto = new AbmAuto();
                    $param = [
                        "Patente" => $datos['patente'] ?? '',
                        "Marca" => $datos['marca'] ?? '',
                        "Modelo" => $datos['modelo'] ?? '',
                        "DniDuenio" => $dni,
                        "Imagen" => $ruta_imagen
                    ];

                    $cargarAuto = $controlAuto->alta($param);

                    if ($cargarAuto) {
                        echo "<div class='alert alert-primary'>Datos del vehículo cargados con éxito.</div>";
                    } else {
                        echo "<div class='alert alert-warning'>Ocurrió un problema al cargar los datos del vehículo.</div>";
                    }

                    echo '
                        <div class="mt-4">
                            <a href="../../TPLibrerias/ejercicio_gregwarImage.php" class="btn btn-secondary me-2">Volver</a>
                            <a href="../../TP4/ejercicio5/ejercicio_5.php" class="btn btn-success me-2">Visualizar vehículos</a>
                            <a href="./galeria.php" class="btn btn-info">Ver galería de autos</a>
                        </div>';
                } else {
                    echo "<div class='alert alert-danger'>El DNI <strong>$dni</strong> no está registrado en el sistema.</div>";
                    echo '
                        <div class="mt-4">
                            <a href="../../TP4/ejercicio_6.php" class="btn btn-primary me-2">Ingresar nueva persona</a>
                            <a href="../../TP4/ejercicio_7.php" class="btn btn-secondary">Volver al formulario de vehículo</a>
                        </div>';
                }

                echo '</div>';
                ?>
            </div>
        </div>
    </main>

    <?php include_once '../../Estructura/footer.php'; ?>
</body>

</html>
