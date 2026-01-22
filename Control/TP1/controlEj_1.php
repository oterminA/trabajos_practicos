<?php

class controlNumero{
    function numeroPositivo($num){
        if ($num >0){
            $texto = "El numero $num es positivo.";
        }elseif ($num < 0) {
            $texto = "El numero $num es negativo.";
        }else{
            $texto = "El numero $num es cero.";
        }
        return $texto;
    }
}

?>