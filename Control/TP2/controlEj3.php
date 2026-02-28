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
            ["usuario" => "usuario", "clave" => 1234],
        ];

        if ($this->encontrarUsuario($usuarios, $pass, $user)) {
            $mensaje = "Bienvenidx.";
        } else {
            $mensaje = "Datos incorrectos o cuenta inexistente.";
        }

        return $mensaje;
    }
}
