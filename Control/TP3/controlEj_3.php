<?php
//
class controlPeliculas
{
    function mostrarPeliculas($tit, $act, $dir, $gui, $prod, $anio, $nac, $gen, $dur, $res, $sin, $archivo, $dirFisica, $dirWeb)
    {

        // rut destino
        $destino = $dirFisica . basename($archivo['name']); //esta es la direccion en la WEB

        //tengo q tratar de mover el arvhivo, suponho que es de un limbo en el servidor a mi computadora???
        if (move_uploaded_file($archivo['tmp_name'], $destino)) {
            $imagen = "<img src='$dirWeb' alt='Imagen de la película' style='max-width:100px; margin:5px; border:1px solid gray'><br>";
        } else {
            $error = $_FILES['archivo']['error'];
            $imagen = "<p style='color:red;'>Error al subir la imagen. Código de error: $error</p>";
        }
        
        

        switch ($res) {
            case 'publico':
                $edad = "apta para todo público";
                break;

            case 'mayorSiete':
                $edad = "apta para mayores de 7 años";
                break;

            case 'mayorDieciocho':
                $edad = "apta para mayores de 18 años";
                break;
        }

        $mensaje =
            "*******LA PELICULA INTRODUCIDA ES******* <br>" .
            $imagen . "<br>" . 
            ">Titulo: " . $tit . "<br>" .
            ">Actores: " . $act . "<br>" .
            ">Director: " . $dir . "<br>" .
            ">Guion: " . $gui . "<br>" .
            ">Produccion: " . $prod . "<br>" .
            ">Año: " . $anio . "<br>" .
            ">Nacionalidad: " . $nac . "<br>" .
            ">Genero: " . $gen . "<br>" .
            ">Duracion: " . $dur .  " minutos" . "<br>" .
            ">Restriccion por edad: " . $edad . "<br>" .
            ">Sinopsis: '" . $sin . "'" . "<br>";

        return $mensaje;
    }
}
