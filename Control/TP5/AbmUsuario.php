<?php

//estos scripts permiten acceder al orm y entregarle informacion a las paginas de la interfaz

class AbmUsuario{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Usuario
     */
    private function cargarObjeto($param)
    {
        $obj = null;

        if (isset($param['usnombre']) && isset($param['uspass']) && isset($param['usmail'])) {
            $obj = new Usuario();
            $id = $param['idusuario'] ?? null;
            $deshabilitado = $param['usdeshabilitado'] ?? null;
            $obj->setear($id, $param['usnombre'], $param['uspass'], $param['usmail'], $deshabilitado);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Usuario
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;

        if (isset($param['idusuario'])) { //creo q solo va la clave de la entidad q está en el sql
            $obj = new Usuario();
            $obj->setear($param['idusuario'], null, null, null, null);
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
        if (isset($param['idusuario'])) 
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
        $elObjtUsuario = $this->cargarObjeto($param);
        //        verEstructura($elObjtUsuario);
        if ($elObjtUsuario != null and $elObjtUsuario->insertar()) {
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
        // $resp = false;
        // if ($this->seteadosCamposClaves($param)) {
        //     $elObjtUsuario = $this->cargarObjetoConClave($param);
        //     if ($elObjtUsuario != null and $elObjtUsuario->eliminar()) {
        //         $resp = true;
        //     }
        // }

        // return $resp;

        $resp = false;
        if (isset($param['idusuario'])) {
            $lista = $this->buscar(['idusuario' => $param['idusuario']]);
            
            if (count($lista) > 0) {
                $objUsuario = $lista[0]; 
                
                $objUsuario->setDeshabilitado(date("Y-m-d H:i:s"));
                
                if ($objUsuario->modificar()) {
                    $resp = true;
                }
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
            $elObjtUsuario = $this->cargarObjeto($param);
            if ($elObjtUsuario != null and $elObjtUsuario->modificar()) {
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
            if (isset($param['idusuario']))
                $where .= " and idusuario =" . $param['idusuario'];
            if (isset($param['usnombre']))
                $where .= " and usnombre ='" . $param['usnombre'] . "'";
            if (isset($param['uspass']))
                $where .= " and uspass ='" . $param['uspass'] . "'";
            if (isset($param['usmail']))
                $where .= " and usmail ='" . $param['usmail'] . "'";
            if (isset($param['usdeshabilitado']))
                $where .= " and usdeshabilitado ='" . $param['usdeshabilitado'] . "'";
        }
        $arreglo = Usuario::listar($where);
        return $arreglo;
    }

    /**
     * devuelve un array con las credenciales del user o uno vacio
    */
    public function verificarCredenciales($usuario, $contra){
        $arrayUser= false;
       $param = ["usnombre"=> $usuario, "uspass"=> $contra];
       $usuario = $this->buscar($param); //pongo this xq elmismo abmusuario tiene que buscar en su funcion buscar
       if($usuario){
        $user = $usuario[0];
        if ($user->getDeshabilitado()===null){
            $arrayUser = $user;
        }
       }
       return $arrayUser;
    }

    
    /**
     * devuelve falso o el array de usuarios listados
    */
    public function listar($param = "") {
        $resp = false;
        $arregloUsuarios = Usuario::listar($param);
    
        if ($arregloUsuarios != false) {
            $resp = $arregloUsuarios; 
        }
    
        return $resp; 
    }
}
