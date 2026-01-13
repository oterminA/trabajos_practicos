<?php
//esta clase es para manejar la autenticación y el estado de la sesión, va atener los metodos que piden los profes en el tp
//segun lo q lei, esta clase no tiene funciones nativas de php sino que tiene las q el programador le ponga lo q ke da flexibilidad 
//desde el action por ejemplo yo voy a hacer una instancia de esta clase y acá es q voy a usar a la superglobal $_SESSION que devuelve un array asociativo
class Session
{
    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start(); //estando esto acá creo q no tengo q volver a llamarlo en ningun otro lugar, o sea instancio a la clase y automaticamente se inicia la sesion, y el if hace q no se inicie dos veces
        }
    }

    /**
     * actualiza las variables de sesión con los valores ingresados
     */
    public function iniciar($usuario, $contra)
    {
        $_SESSION['idusuario'] = $usuario;
        $_SESSION['uspass'] = $contra;
    }

    /**
     * valida si la sesión actual tiene usuario y psw válidos.
     * devuelve true o false.
     */
    public function validar()
    {
        $resp = false;
        if (isset($_SESSION['idusuario']) && isset($_SESSION['uspass'])) {
            $ctrlUsuario = new AbmUsuario();
            $lista = $ctrlUsuario->buscar(['usnombre' => $_SESSION['idusuario'], 'uspass' => $_SESSION['uspass']]);
            if ($lista) {
                $resp = true;
            } else {
                $this->cerrar();
            }
        }
        return $resp;
    }

    /**
     ** Devuelve true o false si la sesión está activa o no
     */
    public function activa()
    {
        return session_status() === PHP_SESSION_ACTIVE;
    }

    /**
     ** Devuelve el usuario logeado
     */
    public function getUsuario()
    {
        $retorno = null;
        if (isset($_SESSION['idusuario'])) {
            $retorno = $_SESSION['idusuario'];
        }
        return $retorno;
    }

    /**
     ** Devuelve el rol del usuario logueado
     */
    public function getRol()
    {
        $roles = [];
        if ($this->validar()) {
            $objAbmUR = new AbmUsuarioRol();
            $roles = $objAbmUR->buscar(['idusuario' => $_SESSION['idusuario']]);
        }
        return $roles;
    }

    /**
     ** Cierra la sesión actual
     */
    public function cerrar()
    {
        if ($this->activa()) {
            session_unset();
        }
        session_destroy();
    }


    /**
     * 
     */
    /* public function login($nombreUsuario, $pass) {
        $resp = false;
        $controlUsuario = new AbmUsuario();
        
        $datosUsuario = $controlUsuario->verificarCredenciales($nombreUsuario, $pass); 
        
        if ($datosUsuario != null) {
            $this->iniciar($nombreUsuario, $pass); 
            
            if (isset($datosUsuario['iduser'])) {
                $_SESSION['idusuario_real'] = $datosUsuario['iduser']; 
            }
            $resp = true;
        }
        return $resp;
    }*/
}

//****
/*Funciones principales
session_start(): Inicia una nueva sesión o reanuda una existente. Debe ser la primera función llamada en un script.
$_SESSION: Es un array superglobal que se utiliza para almacenar y acceder a las variables de la sesión. Se puede usar para guardar datos como $_SESSION['usuario'] = 'nombre'.
isset(): Se usa para verificar si una variable de sesión ya existe antes de intentar leerla, por ejemplo, isset($_SESSION['usuario']).
unset(): Elimina una variable de sesión individual, como unset($_SESSION['nombre']).
session_unset(): Elimina todas las variables de la sesión actual. Es importante usar unset() para variables individuales en lugar de unset($_SESSION).
session_destroy(): Destruye completamente la sesión y todos sus datos. Se usa típicamente para cerrar la sesión de un usuario. */