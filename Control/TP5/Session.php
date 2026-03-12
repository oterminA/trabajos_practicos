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
     * funcion q inicia sesión validando usuario y contraseña
     */
    public function iniciar($usuario, $contra)
    {
        $resp = false; //valor x defecto

        $ctrlUsuario = new AbmUsuario(); //nueva instancia de abmusuario
        $lista = $ctrlUsuario->buscar([ //busco y listo los usuarios en la base de datos tengan esos datos
            'usnombre' => $usuario,
            'uspass'   => $contra
        ]);

        if (!empty($lista)) { //si no es vacio
            $objUsuario = $lista[0]; //recupero el primer objusuario que aparezca q en teoria tendría que ser el unico

            $_SESSION['idusuario'] = $objUsuario->getIdUsuario(); //en la session guardo el id usuario logueado
            $_SESSION['usnombre']  = $objUsuario->getNombre(); //en la session guardo el nombre del usuario logueado

            $resp = true; //cambio la bandera
        }

        return $resp; //devuelvo true o false, true si está iniciada y false si no
    }

    /**
     * Valida si hay una sesión válida
     */
    public function validar()
    {
        return isset($_SESSION['idusuario']); //acá solo reviso que ese idsuario exista
    }

    /**
     * Devuelve true si la sesión está activa
     */
    public function activa()
    {
        return session_status() === PHP_SESSION_ACTIVE && $this->validar(); //acá valido que se haya hecho un session_start basicamente y uso la funcion de arriba tambien
    }

    /**
     * Devuelve el nombre del usuario logueado
     */
    public function getUsuario()
    {
        $retorno = null; //valor x defecto
        if (isset($_SESSION['usnombre'])) { //busco si en la session existe esa clave o sea el nombre de usuario
            $retorno = $_SESSION['usnombre']; //como lo guardé en el login rendría que retornarlo
        }
        return $retorno; //retorno el nombre entonces o null si nunca se logueo
    }

    /**
     * Devuelve el rol del usuario logueado
     */
    public function getRol()
    {
        $rolNombre = null; //null x defecto

        if ($this->validar()) { //reviso q alguien esté logueado
            $abmUR = new AbmUsuarioRol(); //hago un new de usuario rol
            $listaRoles = $abmUR->buscar([ //listo y busco en usuariorol el idusuario que está logueado en la bd
                'idusuario' => $_SESSION['idusuario']
            ]);

            if (!empty($listaRoles)) { //si listaroles devuelve algo:
                $objUsuarioRol = $listaRoles[0]; //recupero el obj usuariorol
                $objRol = $objUsuarioRol->getObjRol(); //recupero el rol asociado a ese idusuario
                $rolNombre = $objRol->getRolDescripcion(); //recupero el nombre del rol
            }
        }

        return $rolNombre; //devuelvo el nombre del rol o null
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



//****
/*Funciones principales
session_start(): Inicia una nueva sesión o reanuda una existente. Debe ser la primera función llamada en un script.
$_SESSION: Es un array superglobal que se utiliza para almacenar y acceder a las variables de la sesión. Se puede usar para guardar datos como $_SESSION['usuario'] = 'nombre'.
isset(): Se usa para verificar si una variable de sesión ya existe antes de intentar leerla, por ejemplo, isset($_SESSION['usuario']).
unset(): Elimina una variable de sesión individual, como unset($_SESSION['nombre']).
session_unset(): Elimina todas las variables de la sesión actual. Es importante usar unset() para variables individuales en lugar de unset($_SESSION).
session_destroy(): Destruye completamente la sesión y todos sus datos. Se usa típicamente para cerrar la sesión de un usuario. */