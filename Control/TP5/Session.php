<?php
//esta clase es para manejar la autenticación y el estado de la sesión, va atener los metodos que piden los profes en el tp
//segun lo q lei, esta clase no tiene funciones nativas de php sino que tiene las q el programador le ponga lo q ke da flexibilidad 
//desde el action por ejemplo yo voy a hacer una instancia de esta clase y acá es q voy a usar a la superglobal $_SESSION que devuelve un array asociativo
class Session
{
    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    /**
     * Inicia sesión validando usuario y contraseña
     */
    public function iniciar($usuario, $contra)
    {
        $resp = false;

        $ctrlUsuario = new AbmUsuario();
        $lista = $ctrlUsuario->buscar([
            'usnombre' => $usuario,
            'uspass'   => $contra
        ]);

        if (!empty($lista)) {
            $objUsuario = $lista[0];

            // Guardamos SOLO lo necesario
            $_SESSION['idusuario'] = $objUsuario->getIdUsuario();
            $_SESSION['usnombre']  = $objUsuario->getNombre();

            $resp = true;
        }

        return $resp;
    }

    /**
     * Valida si hay una sesión válida
     */
    public function validar()
    {
        return isset($_SESSION['idusuario']);
    }

    /**
     * Devuelve true si la sesión está activa
     */
    public function activa()
    {
        return session_status() === PHP_SESSION_ACTIVE && $this->validar();
    }

    /**
     * Devuelve el nombre del usuario logueado
     */
    public function getUsuario()
    {
        $retorno = null;
        if (isset($_SESSION['usnombre'])) {
            $retorno = $_SESSION['usnombre'];
        }
        return $retorno;
    }

    /**
     * Devuelve el rol del usuario logueado
     */
    public function getRol()
    {
        $rolNombre = null;

        if ($this->validar()) {
            $abmUR = new AbmUsuarioRol();
            $listaRoles = $abmUR->buscar([
                'idusuario' => $_SESSION['idusuario']
            ]);

            if (!empty($listaRoles)) {
                // Si el usuario tiene un solo rol
                $objUsuarioRol = $listaRoles[0];
                $objRol = $objUsuarioRol->getObjRol();
                $rolNombre = $objRol->getRolDescripcion();
            }
        }

        return $rolNombre;
    }

    /**
     * Cierra la sesión
     */
    public function cerrar()
    {
        if ($this->activa()) {
            session_unset();
            session_destroy();
        }
    }
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

//****
/*Funciones principales
session_start(): Inicia una nueva sesión o reanuda una existente. Debe ser la primera función llamada en un script.
$_SESSION: Es un array superglobal que se utiliza para almacenar y acceder a las variables de la sesión. Se puede usar para guardar datos como $_SESSION['usuario'] = 'nombre'.
isset(): Se usa para verificar si una variable de sesión ya existe antes de intentar leerla, por ejemplo, isset($_SESSION['usuario']).
unset(): Elimina una variable de sesión individual, como unset($_SESSION['nombre']).
session_unset(): Elimina todas las variables de la sesión actual. Es importante usar unset() para variables individuales en lugar de unset($_SESSION).
session_destroy(): Destruye completamente la sesión y todos sus datos. Se usa típicamente para cerrar la sesión de un usuario. */