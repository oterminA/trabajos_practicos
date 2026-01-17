<?php
include_once '../../../Utils/funciones.php'; 
$sesion = new Session();
$cerrar = $sesion->cerrar();
header('Location: ../../TP5/login.php');