<?php

class controlInformacion {
    function calcularMayoriaEdad($nombre, $apellido, $edad, $direccion){
        if ($edad >= 18){
            $mensaje = 
             "Hola " . $nombre . " " . $apellido . "! Tenes " . $edad . " años y vivis en " . $direccion . "<br>". 
            "Sos MAYOR de edad. <br>";
        }else{ 
            $mensaje = 
             "Hola " . $nombre . " " . $apellido . "! Tenes " . $edad . " años y vivis en " . $direccion . "<br>". 
            "Sos MENOR de edad. <br>";
        }
        return $mensaje;
    }
}