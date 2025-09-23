<?php

class controlInformacion{
    function mostrarInformacion($nombre, $apellido, $edad, $genero, $direccion, $est){
        switch ($est) { //para despues manejar el formato de los niveles de estudios hago este switch
            case 'sin_est':
                $nivel = "sin estudios";
                break;
    
            case 'est_prim':
                $nivel = "estudios primarios";
                break;
    
            case 'est_sec':
                $nivel = "estudios secundarios";
                break;
    
            case 'est_uni':
                $nivel = "estudios universitarios";
                break;
        }
    
        switch ($genero) {
            case 'F':
                $gen = "femenino";
                break;
    
            case 'M':
                $gen = "masculino";
                break;
    
            default:
                $gen = "otro";
                break;
        }
    
        if ($edad >= 18) {
            //como lo trabajabamos en las clases, estos archivos no tienen que escribir usando echos, conviene asignarle eso a una variable y de ahi retornar la respuesta
            $mensaje =  "Hola " . $nombre . " " . $apellido . ". Tenes " . $edad . " años y vivis en " . $direccion . ". Te identificas como genero " . $gen . " y tu nivel de estudios es: " . $nivel . ".<br> Sos MAYOR de edad.";
        } else {
            $mensaje =  "Hola " . $nombre . " " . $apellido . ". Tenes " . $edad . " años y vivis en " . $direccion . ". Te identificas como genero " . $gen . " y tu nivel de estudios es: " . $nivel . ".<br> Sos MENOR de edad.";
        }
        return $mensaje;
    }
}