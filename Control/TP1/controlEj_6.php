<?php
class controlInformacion{
    function revisarInformacion($nombre, $apellido, $edad, $direccion, $genero, $estudios, $deportes){
        switch ($estudios) {
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
    
        $cantidadDeportes = count($deportes);
        
        if ($edad >= 18) {
            $mensaje =  "Hola " . $nombre . " " . $apellido . ". Tenes " . $edad . " años y vivis en " . $direccion . ". Te identificas como genero " . $gen . " y tu nivel de estudios es: " . $nivel . ". Practicas " . $cantidadDeportes . " deportes." .
            "<br> Sos MAYOR de edad.";
        } else {
            $mensaje =  "Hola " . $nombre . " " . $apellido . ". Tenes " . $edad . " años y vivis en " . $direccion . ". Te identificas como genero " . $gen . " y tu nivel de estudios es: " . $nivel . ". Practicas " . $cantidadDeportes . " deporte(s)." .
            "<br> Sos MAYOR de edad.";
        }
        return $mensaje;
    }
}