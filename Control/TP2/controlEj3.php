<?php
//este script es la clase que contiene la funcion de verificar si los usuarios estan dentro del array 
//despues devuelve el mensaje que es el que se retorna en el mensajeLogin

class controlLogin
{
    public function encontrarUsuario($usuarios, $pass, $user)
    {
        $encontrado = false;
        foreach ($usuarios as $unUsuario) {
            $nombreUsuario = $unUsuario["usuario"]; //por cada elemento del arreglo traigo la clave y el usuario
            $claveUsuario = $unUsuario["clave"];

            if (($nombreUsuario == $user) && ($claveUsuario == $pass)) {
                $encontrado = true;
            }
        }
        return $encontrado;
    }

    public function existeUsuario($user, $pass)
    {
        $usuarios = [
            ["usuario" => "caro", "clave" => 1234],
            ["usuario" => "nena", "clave" => 4567],
            ["usuario" => "cin", "clave" => 8901],
            ["usuario" => "nadia", "clave" => 2345],
            ["usuario" => "fran", "clave" => 6789],
            ["usuario" => "kim", "clave" => 0123]
        ];

        if ($this->encontrarUsuario($usuarios, $pass, $user)) {
            $mensaje = "Bienvenidx.";
        } else {
            $mensaje = "Datos incorrectos o cuenta inexistente.";
        }

        return $mensaje;
    }
}
