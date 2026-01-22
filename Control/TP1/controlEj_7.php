<?php

class controlOperaciones{
    function realizarOperaciones($numA, $numB, $operacion) {
        switch ($operacion) {
            case 'suma':
                $operacion = $numA + $numB;
                $calculo = "El resultado de la operacion es " . $operacion;
                break;
    
            case 'resta':
                $operacion = $numA - $numB;
                $calculo = "El resultado de la operacion es " . $operacion;

                break;
    
            case 'multiplicacion': //acá tiene que ir el valor que está en el value!!
                $operacion = $numA * $numB;
                $calculo = "El resultado de la operacion es " . $operacion;

                break;
    
            case 'division':
                if ($numB > 0) {
                    $operacion = $numA / $numB;
                $calculo = "El resultado de la operacion es " . $operacion;

                } else {
                    $calculo = "Error. No se puede dividir por cero";
                }
                break;
        }
        return $calculo;
    }
}