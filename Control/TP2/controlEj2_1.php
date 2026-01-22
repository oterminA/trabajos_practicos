<?php

class controlNumero{
    function numeroPositivo($num){
        if ($num >0){
            $texto = "El numero es positivo.";
        }elseif ($num < 0) {
            $texto = "El numero es negativo.";
        }else{
            $texto = "El numero es cero.";
        }
        return $texto;
    }
}

?>