<?php

class controlInformacion {
    function mostrarInformacion($nombre, $apellido, $edad, $direccion){
        $mensaje = 
        "Hola! Soy " . $nombre . " " . $apellido . ". Tengo " . $edad  . " años y  vivo en " . $direccion;
        return $mensaje;
    }
}