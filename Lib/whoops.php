<?php
 require __DIR__ . "/../vendor/autoload.php"; //carga todas las librerias de composer como la de whoops y la de gregwar
 $whoops = new Whoops\Run(); //se crea la instancia de whoops

 $errorPage = new Whoops\Handler\PrettyPageHandler(); //para configurar la pretty page handler, q es el manejador de errores
 $errorPage->setPageTitle("Algo falló!!"); //se le cambia el titulo
 $errorPage->setEditor("sublime");         //setea el editor usado cuando se abre el linl
 $whoops->pushHandler($errorPage); //le dice a whoops que use el handler q se le pasó más arriba
 $whoops->register(); //activa whoops para q ahora se use esto para menjar los errores