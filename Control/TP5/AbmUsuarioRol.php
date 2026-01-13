<?php
//estos scripts permiten acceder al orm y entregarle informacion a las paginas de la interfaz

class AbmUsuarioRol
{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return UsuarioRol
     */
    private function cargarObjeto($param)
    {
        $obj = null;

        if (isset($param['idrol']) && isset($param['idusuario'])) {

            $objUsuario = new Usuario();
            $objUsuario->setIdUsuario($param['idusuario']);

            $objRol = new Rol();
            $objRol->setIdRol($param['idrol']);

            if ($objUsuario->cargar() && $objRol->cargar()) {
                $obj = new UsuarioRol();
                $id = $param['id'] ?? null;
                $obj->setear($id, $objRol, $objUsuario);
            }
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return UsuarioRol
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;

        if (isset($param['id'])) { //creo q solo va la clave de la entidad q está en el sql
            $obj = new UsuarioRol();
            $obj->setear($param['id'], null, null);
        }
        return $obj;
    }


    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */

    private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['id']))
            $resp = true;
        return $resp;
    }

    /**
     * 
     * @param array $param
     */
    public function alta($param)
    {
        $resp = false;
        $elObjtUsuarioRol = $this->cargarObjeto($param);
        //        verEstructura($elObjtUsuarioRol);
        if ($elObjtUsuarioRol != null and $elObjtUsuarioRol->insertar()) {
            $resp = true;
        }
        return $resp;
    }
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtUsuarioRol = $this->cargarObjetoConClave($param);
            if ($elObjtUsuarioRol != null and $elObjtUsuarioRol->eliminar()) {
                $resp = true;
            }
        }

        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param)
    {
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtUsuarioRol = $this->cargarObjeto($param);
            if ($elObjtUsuarioRol != null and $elObjtUsuarioRol->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param)
    {
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['id']))
                $where .= " and id =" . $param['id'];
            if (isset($param['idrol']))
                $where .= " and idrol ='" . $param['idrol'] . "'";
            if (isset($param['idusuario']))
                $where .= " and idusuario ='" . $param['idusuario'] . "'";
        }
        $arreglo = UsuarioRol::listar($where);
        return $arreglo;
    }

    /**
     * devuelve un array con los roles asociados a un user o un array vacio
     * @return array
     */
    public function buscarRoles($idUsuario)
    {
        $arrayRoles = [];
        $listaUsuarioRol = $this->buscar(['idusuario' => $idUsuario]);
    
        foreach ($listaUsuarioRol as $objUR) {
            $objRol = $objUR->getObjRol();
            array_push($arrayRoles, $objRol);
        }
    
        return $arrayRoles;
    }

    /**
     * devuelve falso o el array de usuarios listados
     */
    public function listar($param = "")
    {
        $resp = false;
        $arregloUsuarioRol = UsuarioRol::listar($param);

        if ($arregloUsuarioRol === false) {
            $resp = $arregloUsuarioRol;
        }

        return $resp;
    }
}
