<?php
/*Ejercicio 1- Crear la capa de los datos, implementando el ORM (Modelo de datos) para la base de datos
entregada. Recordar que se debe generar al menos, un clase php por cada tabla. Cada clase debe contener
las variables de instancia y sus metodos get y set; ademas de los metodos que nos permitan seleccionar,
ingresar, modificar y eliminar los datos de cada tabla. */
class Auto
{
    private $patente;
    private $marca;
    private $modelo;
    private ?Persona $objDuenio; //ref a la clase persona(nombr,fechaNa,telefon,domicilio), delegacion. Esas cosas raras es para que deje de marcarme el error de inteliphense o como sea
    private $mensajeBD;

    private $imagen; //esto es SOLO por el tp de librerias


    public function __construct()
    {
        $this->patente = "";
        $this->marca = "";
        $this->modelo = "";
        $this->objDuenio = null;
        $this->mensajeBD = "";
        $this->imagen = "";
    }

    public function getPatente()
    {
        return $this->patente;
    }
    public function getMarca()
    {
        return $this->marca;
    }
    public function getModelo()
    {
        return $this->modelo;
    }
    public function getObjDuenio()
    {
        return $this->objDuenio;
    }
    public function getmensajeoperacion()
    {
        return $this->mensajeBD;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setPatente($patente)
    {
        $this->patente = $patente;
    }
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }
    public function setObjDuenio($objDuenio)
    {
        $this->objDuenio = $objDuenio;
    }
    public function setmensajeoperacion($mensajeBD)
    { //lo que se muestra si hay o no algun error xq es una variable que viene desde la bd
        $this->mensajeBD = $mensajeBD;
    }
    public function setear($patente, $marca, $modelo, $objDuenio, $imagen)
    {
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setObjDuenio($objDuenio);

        $this->setImagen($imagen);

    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }



    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto WHERE Patente = '" . $this->getPatente() . "'";
    
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    
                    $objDuenio = new Persona();
                    $objDuenio->setNroDni($row['DniDuenio']);
                    $objDuenio->cargar();
    
                    $this->setear($row['Patente'], $row['Marca'], $row['Modelo'], $objDuenio, $row['Imagen']);
                    $resp = true;
                }
            }
        } else {
            $this->setmensajeoperacion("auto->cargar: " . $base->getError());
        }
        return $resp;
    }
    

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO auto (Patente, Marca, Modelo, DniDuenio, Imagen)
        VALUES (
            '" . $this->getPatente() . "',
            '" . $this->getMarca() . "',
            '" . $this->getModelo() . "',
            '" . $this->getObjDuenio()->getNroDni() . "',
            '" . $this->getImagen() . "'
        )";


        if ($base->Iniciar()) {
            if ($laPatente = $base->Ejecutar($sql)) {
                $this->setPatente($laPatente);
                $resp = true;
            } else {
                $this->setmensajeoperacion("auto->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("auto->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE auto SET
            Marca = '" . $this->getMarca() . "',
            Modelo = '" . $this->getModelo() . "',
            DniDuenio = '" . $this->getObjDuenio()->getNroDni() . "',
            Imagen = '" . $this->getImagen() . "'
        WHERE Patente = '" . $this->getPatente() . "'";


        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("auto->modificar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("auto->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM auto WHERE Patente='" . $this->getPatente() . "'";

        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp= true;
            } else {
                $this->setmensajeoperacion("auto->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("auto->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {

                while ($row = $base->Registro()) {
                    $obj = new Auto();
                
                    $objDuenio = new Persona();
                    $objDuenio->setNroDni($row['DniDuenio']);
                    $objDuenio->cargar();
                
                    $obj->setear($row['Patente'], $row['Marca'], $row['Modelo'], $objDuenio, $row['Imagen']);
                    array_push($arreglo, $obj);
                }
                
            }
        } else {
            self::setmensajeoperacion("auto->listar: " . $base->getError()); //la misma forma de arreglar ese error que antes?
        }

        return $arreglo;
    }

    ///////////to_String()
    public function __toString()
    {
        $mensaje =
            "Patente: " . $this->getPatente() . "\n" .
            "Marca: " . $this->getMarca() . "\n" .
            "Modelo: " . $this->getModelo() . "\n" .
            "Datos dueño----\n" . $this->getObjDuenio() . "\n";
        return $mensaje;
    }
}
