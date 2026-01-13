<?php

//estos scripts permiten acceder al orm y entregarle informacion a las paginas de la interfaz

class AbmRol{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Rol
     */
    private function cargarObjeto($param)
    {
        $obj = null;

        if (isset($param['roldescripcion'])) {
            $id = $param['idrol'] ?? null; // si no existe ese id null porque en realidad acá no viene xq es autoincremental
            $obj = new Rol();
            $obj->setear($id, $param['roldescripcion']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Rol
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;

        if (isset($param['idrol'])) { //creo q solo va la clave de la entidad q está en el sql
            $obj = new Rol();
            $obj->setear($param['idrol'], null);
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
        if (isset($param['idrol'])) //HELP. Tengo q poner todos los atributos?
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
        $elObjtRol = $this->cargarObjeto($param);
        //        verEstructura($elObjtRol);
        if ($elObjtRol != null and $elObjtRol->insertar()) {
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
            $elObjtRol = $this->cargarObjetoConClave($param);
            if ($elObjtRol != null and $elObjtRol->eliminar()) {
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
            $elObjtRol = $this->cargarObjeto($param);
            if ($elObjtRol != null and $elObjtRol->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite Buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function Buscar($param)
    {
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['idrol']))
                $where .= " and idrol =" . $param['idrol'];
            if (isset($param['roldescripcion']))
                $where .= " and roldescripcion ='" . $param['roldescripcion'] . "'";
        }
        $arreglo = Rol::listar($where);
        return $arreglo;
    }

    /**
     * 
    */
    public function obtenerRol($descripcion){
        $idRol = false;
        $roles = $this->Buscar(['roldescripcion'=>$descripcion]); 
        if ($roles) {
            $objRol = $roles[0];
            $idRol = $objRol->getIdrol(); //recupero el id de ese rol
        }
        return $idRol;
}

    /**
     * devuelve falso o el array de usuarios listados
    */
    public function listar($param = "") {
        $resp = false;
        $arregloRoles = Rol::listar($param);
    
        if ($arregloRoles === false) {
            $resp = $arregloRoles; 
        }
    
        return $resp; 
    }
}