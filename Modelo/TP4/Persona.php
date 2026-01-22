<?php
/*Ejercicio 1- Crear la capa de los datos, implementando el ORM (Modelo de datos) para la base de datos
entregada. Recordar que se debe generar al menos, un clase php por cada tabla. Cada clase debe contener
las variables de instancia y sus metodos get y set; ademas de los metodos que nos permitan seleccionar,
ingresar, modificar y eliminar los datos de cada tabla. */
include_once __DIR__ . '/conector/BaseDatos.php';


class Persona
{
    private $nroDni;
    private $apellido;
    private $nombre;
    private $fechaNac;
    private $telefono;
    private $domicilio;
    private $mensajeBD; //esto lo tengo q poner igual?


    public function __construct()
    {
        $this->nroDni = "";
        $this->apellido = "";
        $this->nombre = "";
        $this->fechaNac = "";
        $this->telefono = "";
        $this->domicilio = "";
        $this->mensajeBD = "";
    }

    public function getNroDni()
    {
        return $this->nroDni;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getFechaNac()
    {
        return $this->fechaNac;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function getDomicilio()
    {
        return $this->domicilio;
    }
    public function getmensajeoperacion()
    {
        return $this->mensajeBD;
    }


    public function setNroDni($nroDni)
    {
        $this->nroDni = $nroDni;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setFechaNac($fechaNac)
    {
        $this->fechaNac = $fechaNac;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;
    }
    public function setmensajeoperacion($mensajeBD)
    { //lo que se muestra si hay o no algun error xq es una variable que viene desde la bd
        $this->mensajeBD = $mensajeBD;
    }

    public function setear($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio)
    {
        $this->setNroDni($nroDni);
        $this->setApellido($apellido);
        $this->setNombre($nombre);
        $this->setFechaNac($fechaNac);
        $this->setTelefono($telefono);
        $this->setDomicilio($domicilio);
    }


    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM persona WHERE NroDni = " . $this->getNroDni();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']);
                    $resp = true;
                }
            }
        } else {
            $this->setmensajeoperacion("persona->listar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO persona(NroDni, Apellido, Nombre, fechaNac, Telefono, Domicilio)  
        VALUES('" . $this->getNroDni() . "', '" . $this->getApellido() . "', '" . $this->getNombre() . "', '" . $this->getFechaNac() . "', '" . $this->getTelefono() . "', '" . $this->getDomicilio() . "')";

        if ($base->Iniciar()) {
            if ($elDni = $base->Ejecutar($sql)) {
                $this->setNroDni($elDni);
                $resp = true;
            } else {
                $this->setmensajeoperacion("persona->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("persona->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE persona 
        SET Apellido='" . $this->getApellido() . "', 
            Nombre='" . $this->getNombre() . "', 
            fechaNac='" . $this->getFechaNac() . "', 
            Telefono='" . $this->getTelefono() . "', 
            Domicilio='" . $this->getDomicilio() . "' 
        WHERE NroDni='" . $this->getNroDni() . "'";

        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("persona->modificar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("persona->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM persona WHERE NroDni=" . $this->getNroDni();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("persona->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("persona->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM persona ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {

                while ($row = $base->Registro()) {
                    $obj = new Persona(); 
                    $obj->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            self::setmensajeoperacion("persona->listar: " . $base->getError()); //la misma forma de arreglar ese error que antes?
        }

        return $arreglo;
    }
    

    ///////////to_String()
    public function __toString()
    {
        $mensaje =
            "DNI: " . $this->getNroDni() . "\n" .
            "Apellido: " . $this->getApellido() . "\n" .
            "Nombre: " . $this->getNombre() . "\n" .
            "Fecha de nacimiento: " . $this->getFechaNac() . "\n" .
            "Telefono: " . $this->getTelefono() . "\n" .
            "Domicilio: " . $this->getDomicilio() . "\n";
        return $mensaje;
    }
}
