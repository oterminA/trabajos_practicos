<?php
class controlArchivos {
    function procesarArchivo($archivo, $dir) {

        $extensionesPermitidas = ['doc', 'pdf'];

        if ($archivo['error'] !== 0) {
            $mensaje = "ERROR: Hubo un problema al subir el archivo.";
        } else {
            $extension = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));

            if (!in_array($extension, $extensionesPermitidas)) {
                $mensaje = "ERROR: Solo se permiten archivos .doc o .pdf.";
            } elseif ($archivo['size'] > 2 * 1024 * 1024) {
                $mensaje = "ERROR: El archivo supera el tamaño máximo de 2MB.";
            } else {
                $destino = $dir . '\\' . basename($archivo['name']);


                if (move_uploaded_file($archivo['tmp_name'], $destino)) {
                    $urlRelativa = '../../Vista/Assets/' . basename($archivo['name']);
                    $mensaje = "Archivo subido con éxito.";
                } else {
                    $mensaje = "ERROR: No se pudo guardar el archivo.";
                }
            }
        }

        return $mensaje;
    }
}
