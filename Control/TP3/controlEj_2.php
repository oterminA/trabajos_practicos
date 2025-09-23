<?php
class controlArchivo{
    function procesarArchivo($archivo, $dir) {
        // muestro la info del archivo
        // $mensaje = 
        //  ">Nombre: " . $archivo['name'] . "<br />". 
        //  ">Tipo: " . $archivo['type'] . "<br />". 
        //  ">Tamaño: " . ($archivo['size'] / 1024) . " kB<br />". 
        //  ">Carpeta temporal: " . $archivo['tmp_name'] . "<br />";
    
        $extension = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION)); //para obtnet la extension del archivo y pasarlo todo a minusculas
        $tipoMime = mime_content_type($archivo['tmp_name']); //la funcion esa detecta el tipo MIME real del archivo leyendo su contenido

        if ($extension === 'txt' && $tipoMime === 'text/plain') { //si todo conincide con lo esperado:
            $destino = $dir . basename($archivo['name']); //esto es para guardar la ruta completa del archivo, esa funcion elimina cualquier ruta y se queda solo con el nombre del archivo

            if (move_uploaded_file($archivo['tmp_name'], $destino)) { //si el archivo se pudo mover bien a la carpeta final muestro el mensaje y el contenido
                $contenido = file_get_contents($destino); //esta fucntion obtiene el contenido de lo que se subió
                $texto = ">> El archivo se subió correctamente \n".
                "****Tu texto es**** \n" .  
                htmlspecialchars($contenido);//lo de htmlblabla es para que se pueda visualizar bien el texto y el navegador no lo tome como algo errado
            } else {
                $texto = ">> ERROR: no se pudo cargar el archivo."; //por si no se puede cargar
            }
        } else {
            $texto = ">> ERROR: solo se permiten archivos de texto (.txt)."; //si el arvhivo no es del tipo esperado
        }

        return $texto; //retorno cualqueira de las opciones
    } 
}