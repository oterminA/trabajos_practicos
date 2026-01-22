<?php
/*Ejercicio 2 - Crear la capa de control, que nos permitan acceder al ORM (Modelo de datos) y entregarle la
informacion a las paginas de la interface. */
include_once __DIR__ . '/../../Modelo/TP4/Auto.php';
include_once __DIR__ . '/../../Modelo/TP4/Persona.php';


class AbmAuto
{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto


    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Auto
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (isset($param['Patente']) && isset($param['Marca']) && isset($param['Modelo']) && isset($param['DniDuenio']) && isset($param['Imagen'])) {
    
            $objPersona = new Persona();
            $objPersona->setNroDni($param['DniDuenio']);
            if ($objPersona->cargar()) {
                $obj = new Auto();
                $obj->setear($param['Patente'], $param['Marca'], $param['Modelo'], $objPersona, $param['Imagen']); 
            }
        }
        return $obj;
    }
    

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Auto
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['Patente'])) {
            $obj = new Auto();
            $obj->setear($param['Patente'], null, null, null, null);
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
        if (isset($param['Patente']))
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
        $elObjtAuto = $this->cargarObjeto($param);
        //        verEstructura($elObjtAuto);
        if ($elObjtAuto != null and $elObjtAuto->insertar()) {
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
            $elObjtAuto = $this->cargarObjetoConClave($param);
            if ($elObjtAuto != null and $elObjtAuto->eliminar()) {
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
            $elObjtAuto = $this->cargarObjeto($param);
            if ($elObjtAuto != null and $elObjtAuto->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param)
    {
        $where = " true ";
        if ($param != null) {
            if (isset($param['DniDuenio']) && $param['DniDuenio'] instanceof Persona) {
                $where .= " AND DniDuenio = '" . $param['DniDuenio']->getNroDni() . "'";
            }    
            if (isset($param['Patente'])) {
                $where .= " AND Patente = '" . $param['Patente'] . "'";
            }
        }
    
        $arreglo = Auto::listar($where);
        return $arreglo;
    }

    
}
