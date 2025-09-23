<?php 
include_once '../Modelo/conector/BaseDatos.php';

$objBd = new BaseDatos();
echo "\n ----------------------------------------------------------------------------------\n ";
echo "\n ----------------------------------------------------------------------------------\n ";
///////////////////////////////
///    PROBANDO INSERTAR   ///
/////////////////////////////

$sql = "INSERT INTO tabla(descrip)  VALUES('dato de prueba');";
$res = $objBd->Ejecutar($sql);

if($res){
    echo "\n El Registro se inserto.";
    if($res>0){
        echo "\n  El id del campo autoincrement insertado es:".$res;
        $id = $res;
    }else{
        echo " \n La tabla no tiene un campo autoincrement.";
    }
    
} else {
    echo "\n No fue posible realizar la operacion.";
}
echo "\n ----------------------------------------------------------------------------------\n ";

$sql = "INSERT INTO tablasinsecuencia(id, descrip)  VALUES(85, 'dato de prueba');";
$res = $objBd->Ejecutar($sql);
if($res){
    echo "\n  El Registro se inserto.";
    if($res>0){
        echo "\n  El id del campo autoincrement insertado es:".$res;
    }else{
        echo "\n  La tabla no tiene un campo autoincrement.";
    }
    
} else {
    echo "No fue posible realizar la operacion.";
}
echo "\n ----------------------------------------------------------------------------------\n ";

///////////////////////////////
///    PROBANDO ACTUALIZAR   ///
/////////////////////////////
$sql = "update tabla set descrip = 'campo modificado88' WHERE id=".$id;
$res = $objBd->Ejecutar($sql);
if($res>-1){    
    if($res>0){
        echo "\n  La cantidad de registros afectados por la operacion fueron :".$res;
    }else{
        echo "\n  No han sido afectados registros en la actualizacion.";
    }
    
} else {
    echo "\n No fue posible realizar la operacion.";
}


echo "\n ----------------------------------------------------------------------------------\n ";

///////////////////////////////
///    PROBANDO ELIMINAR   ///
/////////////////////////////
$sql = "DELETE FROM tabla  WHERE id=".$id;
$res = $objBd->Ejecutar($sql);
if($res>-1){
    if($res>0){
        echo "\n  La cantidad de registros afectados por la operacion fueron :".$res;
    }else{
        echo "\n  No han sido afectados registros en la actualizacion.";
    }
    
} else {
    echo "\n No fue posible realizar la operacion.";
}

echo "\n ----------------------------------------------------------------------------------\n ";
echo "\n ----------------------------------------------------------------------------------\n ";


///////////////////////////////
///    PROBANDO Select   ///
/////////////////////////////
$sql = "SELECT * FROM tabla ";
$res = $objBd->Ejecutar($sql);
if($res>-1){
    if($res>0){
        echo "\n  La cantidad de registros encontrados por la operacion fueron :".$res;
        while ($reg = $objBd->Registro()){
            echo "<pre>";
            print_r($reg);
            echo "</pre>";
        }
        
        
        
    }else{
        echo "\n  No han encontrado registros.";
    }
    
} else {
    echo "\n No fue posible realizar la operacion.";
}

echo "\n ----------------------------------------------------------------------------------\n ";
echo "\n ----------------------------------------------------------------------------------\n ";



?>