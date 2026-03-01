<?php
/*Ejercicio 2 - Crear la capa de control, que nos permitan acceder al ORM (Modelo de datos) y entregarle la
informacion a las paginas de la interface. */
class AbmPersona
{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Persona
     */
    private function cargarObjeto($param)
    {
        $obj = null;

        if (isset($param['NroDni']) && isset($param['Apellido']) && isset($param['Nombre']) && isset($param['fechaNac']) && isset($param['Telefono']) && isset($param['Domicilio'])) {
            $obj = new Persona();
            $obj->setear($param['NroDni'], $param['Apellido'], $param['Nombre'], $param['fechaNac'], $param['Telefono'], $param['Domicilio']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Persona
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;

        if (isset($param['NroDni'])) { //HELP. Tengo que poner todos los atributos?
            $obj = new Persona();
            $obj->setear($param['NroDni'], $param['Apellido'], $param['Nombre'], $param['fechaNac'], $param['Telefono'], $param['Domicilio'], null);
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
        if (isset($param['NroDni'])) //HELP. Tengo q poner todos los atributos?
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
        $elObjtPersona = $this->cargarObjeto($param);
        //        verEstructura($elObjtPersona);
        if ($elObjtPersona != null and $elObjtPersona->insertar()) {
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
            $elObjtPersona = $this->cargarObjetoConClave($param);
            if ($elObjtPersona != null and $elObjtPersona->eliminar()) {
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
            $elObjtPersona = $this->cargarObjeto($param);
            if ($elObjtPersona != null and $elObjtPersona->modificar()) {
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
            if (isset($param['NroDni']))
                $where .= " and NroDni =" . $param['NroDni'];
            if (isset($param['Apellido']))
                $where .= " and Apellido ='" . $param['Apellido'] . "'";
            if (isset($param['Nombre']))
                $where .= " and Nombre ='" . $param['Nombre'] . "'";
            if (isset($param['fechaNac']))
                $where .= " and fechaNac ='" . $param['fechaNac'] . "'";
            if (isset($param['Telefono']))
                $where .= " and Telefono ='" . $param['Telefono'] . "'";
            if (isset($param['Domicilio']))
                $where .= " and Domicilio ='" . $param['Domicilio'] . "'";
        }
        $arreglo = Persona::listar($where);
        return $arreglo;
    }
}
