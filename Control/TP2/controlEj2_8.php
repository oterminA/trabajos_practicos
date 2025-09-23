<?php

class controlEntradas{
    function valorEntradas($edad, $estudio){
        if (($edad < 12) || ($estudio === "si")) {
            $costo = 160;
        } elseif (($edad >= 12) && ($estudio === "si")) {
            $costo = 180;
        } else {
            $costo = 300;
        }
        
        $mensaje =  "El costo de tu entrada es: $" . $costo . "<br>";
        return $mensaje;
    }
}