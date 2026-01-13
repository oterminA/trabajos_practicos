<?php include_once '../Estructura/header.php'; ?>


<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Inicio</title>
        <style> 
        /* no se pone el estilo acá pero es la unica forma de q no se despelote todo porque no le puedo dar un alto general al body ya q los ejercicios (que tienen bootstrap creo) se deforman según el alto del body */
            #body-index{
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 15px;
            }
        </style>
    </head>

    <body id="body-index">
    <div class="container text-center mt-4">
    <h2 class="lead mb-5"><b>Acá vas a ingresar al primer ejercicio de cada tp. <br> Para visualizarlos todos está el menú superior.</b></h2>

    <!-- Accesos rápidos con tarjetas -->
    <div class="row justify-content-center">

            <!-- TP1 -->
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Trabajo Práctico 1</h5>
                        <a href="../TP1/ejercicio_1.php" class="btn btn-success" target="_blank">Ingresar al primer ejercicio de este tp</a>
                    </div>
                </div>
            </div>

            <!-- TP2 -->
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Trabajo Práctico 2</h5>
                        <a href="../TP2/ejercicio_2_1.php" class="btn btn-success" target="_blank">Ingresá al primer ejercicio de este tp</a>
                    </div>
                </div>
            </div>

            <!-- TP3 -->
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Trabajo Práctico 3</h5>
                        <a href="../TP3/ejercicio_1.php" class="btn btn-success" target="_blank">Ingresá al primer ejercicio de este tp</a>
                    </div>
                </div>
            </div>

            <!-- TP4 -->
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Trabajo Práctico 4</h5>
                        <a href="../TP4/ejercicio_3.php" class="btn btn-success" target="_blank">Ingresá al primer ejercicio de este tp</a>
                    </div>
                </div>
            </div>

            <!-- TP4Librerias -->
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Trabajo Práctico librerias</h5>
                        <a href="../TPLibrerias/ejercicio_gregwar/Image.php" class="btn btn-success" target="_blank">Ingresá al primer ejercicio de este tp</a>
                    </div>
                </div>
            </div>

            <!-- TP5 -->
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Trabajo Práctico 5</h5>
                        <a href="../TP5/login.php" class="btn btn-success" target="_blank">Ingresá al primer ejercicio de este tp</a>
                    </div>
                </div>
            </div>

    </div>

</div>
    </body>


</html>
<?php include_once '../Estructura/footer.php'; ?>