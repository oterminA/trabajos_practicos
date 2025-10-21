<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../Css/TP4/styleGregwar.css">
    <title>Resolucion</title>
</head>

<body>
    <?php include_once '../../Estructura/header.php' ?>

    <main>
        <?php
        include_once '../../../Utils/funciones.php';
        // include_once '../../../Lib/gregwarImage.php';
        $datos = data_submitted();

        $directorio = __DIR__ . '/../Assets/'; //ruta relativa
        if (!is_dir($directorio)) { //si el directorio no existe se crea uno y se le da permisos de todo
            mkdir($directorio, 0777, true);
        }

        $archivo = $datos['imagen']['tmp_name'];  //ubicacion temporal del archivo, son datos que vienen desde el $_FILES y que se manejan desde el utils/funciones.php
        $nombre = uniqid('auto_') . '.jpg'; //genera un id para la imagen

        $ruta_imagen = 'Vista/Assets/' . $nombre; //se guarda la ruta completa de la imagen para usarla despues pero tiene este formao para q el navegador pueda acceder, por ejemplo en el param de más abajo como un atributo mas de la columna de ddatos

        /////////codigo de gregwar/image
        require '../../../vendor/autoload.php'; //esto carga las librerias q tiene composer, en este caso gregwar/image

        use Gregwar\Image\Image; //creo q es lo q me permite usar los metodos sin tener que usarlos completos, los uso como abreviados
        
        Image::open($archivo) //es uno de los metodos q se usan con gregwar/image, acá están todos juntos pero pueden usarse separados. Open abre una imagen q ya existe
            ->brightness(-255) //ajusta el brillo entre -255 y +255
            ->contrast(100) //aplica constraste entre -100 y +100
            ->scaleResize(1000, 600) //da el tamaño
            // ->forceResize($width, $height, $background) //esto es para que se ajuste directamente al numeroque se le da
            // ->cropResize($width, $height, $background) // es como resize pero corta los bordes
            ->save($directorio . $nombre, 'jpg', 85); //se guarda en un directorio especificado, con un formato especifico y el 85 es la calidad de imagen q se le quiere dar
        //////

        $controlPersona = new AbmPersona;
        $dni = $datos["dni"]; //guardo acá el dni que entra por el post, q es el del dueño del auto
        $existePersona = $controlPersona->buscar(['NroDni' => $datos['dni']]); //acá busco si la personaestá en la bd

        if (is_array($existePersona) && count($existePersona) > 0) { //si la persona está en la bd solo tengo que guardar los datos del auto+el dni
            echo ">Ese DNI ya está ingresado en el sistema.<br>";
            echo ">... Agregando los datos del nuevo vehiculo ...<br>";
            $controlAuto =  new AbmAuto();
            $marca = $datos['marca'];
            $patente = $datos['patente'];
            $modelo = $datos['modelo'];
            $dni = $datos["dni"];
            $param = ["Patente" => $patente, "Marca" => $marca, "Modelo" => $modelo, "DniDuenio" => $dni, "Imagen"=>$ruta_imagen];
            $cargarAuto = $controlAuto->alta($param);

            echo $cargarAuto ?  "<br> >Datos cargados con éxito.<br>" : "<br> >Ocurrió un problema.<br>"; //carteles por si se cargó bien o pasó algo

            echo '<br><a href="../../TPLibrerias/ejercicio_gregwarImage.php">>Volver</a><br>';
            echo '<a href="../../TP4/ejercicio5/ejercicio_5.php">>Visualizar los vehiculos de cada persona</a><br>';
            echo '<a href="./galeria.php">>Ver la galeria de autos</a>';

        } else { //si no está en la bd tengo que mandarla al otro script para que llene los datos del dueño y vuelva
            echo ">Ese DNI no está en el sistema.<br>";
            echo '<a href="../../TP4/ejercicio_6.php">>Ir al formulario para ingresar una nueva persona</a><br>';
            echo '<a href="../../TP4/ejercicio_7.php">>Volver al formulario de vehiculo</a><br>';
        }

        ?>
    </main>
    <?php include_once '../../Estructura/footer.php'; ?>
</body>

</html>