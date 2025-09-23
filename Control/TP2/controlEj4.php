<?php
//
class controlPeliculas
{
    function mostrarPeliculas($tit, $act, $dir, $gui, $prod, $anio, $nac, $gen, $dur, $res, $sin)
    {

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
            "*******LA PELICULA INTRODUCIDA ES******* <br>".
            ">Titulo: " . $tit . "<br>" .
            ">Actores: " . $act . "<br>" .
            ">Director: " . $dir . "<br>" .
            ">Guion: " . $gui . "<br>" .
            ">Produccion: " . $prod . "<br>" .
            ">Anio: " . $anio . "<br>" .
            ">Nacionalidad: " . $nac . "<br>" .
            ">Genero: " . $gen . "<br>" .
            ">Duracion: " . $dur .  " minutos" . "<br>" .
            ">Restriccion por edad: " . $edad . "<br>". 
            ">Sinopsis: '" . $sin . "'"."<br>";

        return $mensaje;
    }
}
