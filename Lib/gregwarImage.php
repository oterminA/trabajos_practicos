<?php

require '../../../vendor/autoload.php'; //esto carga las librerias q tiene composer, en este caso gregwar/image

use Gregwar\Image\Image; //creo q es lo q me permite usar los metodos sin tener que usarlos completos, los uso como abreviados

Image::open($archivo) //es uno de los metodos q se usan con gregwar/image, acá están todos juntos pero pueden usarse separados. Open abre una imagen q ya existe
    ->brighness(200) //ajusta el brillo entre -255 y +255
    ->contrast(50) //aplica constraste entre -100 y +100
    // ->sepia() //pone un filtro sepia
    ->scaleResize(1000, 600, 'gray') //da el tamaño
    // ->forceResize($width, $height, $background) //esto es para que se ajuste directamente al numeroque se le da
    // ->cropResize($width, $height, $background) // es como resize pero corta los bordes
    ->save($directorio . $nombre, 'jpg', 85); //se guarda en un directorio especificado, con un formato especifico y el 85 es la calidad de imagen q se le quiere dar