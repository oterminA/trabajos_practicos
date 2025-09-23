<!DOCTYPE html>
<!-- Ejercicio 4
Diseñar un formulario que permita cargar las películas de la empresa Cinem@s. La lista géneros
tiene los siguientes datos: Comedia, Drama, Terror, Románticas, Suspenso, Otras.
Aplicar Bootstrap y validar los siguiente:
- El año debe ser un campo que debe permitir ingresar como máximo 4 caracteres y solo
aceptar números.
- El campo duración debe permitir un máximo de 3 números.
- Todos los datos son obligatorios
- Al hacer click en el botón “Enviar”, se deberán mostrar todos los datos ingresados en el
formulario. (esto es: action -> control -> action : mensaje)
- El botón “Borrar” debe limpiar el formulario.
El diseño del formulario completo es el siguiente: -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"> 
    <link rel="stylesheet" href="../Css/TP2/styleEj4.css">
</head>

<body>
    <div id="main-container">
        <h5 class="modal-title">Cinem@s</h5>
        <form action="../Action/TP2/actionEj4.php" method="post" onsubmit="return validarFormulario()" class="row g-3">
            <div class="col-md-6">
                <label for="inputTitulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="inputTitulo" required name="inputTitulo">
            </div>
            <div class="col-md-6">
                <label for="inputActores" class="form-label">Actores</label>
                <input type="text" class="form-control" id="inputActores" required name="inputActores">
            </div>
            <div class="col-md-6">
                <label for="inputDirector" class="form-label">Director</label>
                <input type="text" class="form-control" id="inputDirector" required name="inputDirector">
            </div>
            <div class="col-md-6">
                <label for="inputGuion" class="form-label">Guion</label>
                <input type="text" class="form-control" id="inputGuion" required name="inputGuion">
            </div>
            <div class="col-md-6">
                <label for="inputProduccion" class="form-label">Produccion</label>
                <input type="text" class="form-control" id="inputProduccion" required name="inputProduccion">
            </div>
            <div class="col-md-2">
                <label for="inputAnio" class="form-label">Año</label>
                <input type="text" class="form-control" id="inputAnio" required maxlength="4" name="inputAnio">
                <div id="divError"></div>
            </div>
            <div class="col-md-6">
                <label for="inputNac" class="form-label">Nacionalidad</label>
                <input type="text" class="form-control" id="inputNac" required name="inputNac">
            </div>
            <div class="col-md-4">
                <label for="inputGenero" class="form-label">Genero</label>
                <select id="inputGenero" class="form-select" required name="inputGenero">
                    <option selected>Seleccione uno...</option>
                    <option>Comedia</option>
                    <option>Drama</option>
                    <option>Terror</option>
                    <option>Romaticas</option>
                    <option>Supenso</option>
                    <option>Otras</option>

                </select>
            </div>
            <div class="col-md-6">
                <label for="inputDuracion" class="form-label">Duracion</label>
                <input type="text" class="form-control" id="inputDuracion" required maxlength="3" name="inputDuracion">
            </div>
            <div id="rest" class="col-md-2">
                <div>
                    <label class="form-label" id="labelRestr">Restricciones de edad</label>
                </div>
                <div id="radios">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="publico" required>Todos publicos
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="mayorSiete" required>Mayores de 7 años
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="mayorDieciocho" required>Mayores de 18 años
                    </div>
                </div>

            </div>
            <div class="mb-3">
                <label for="textSinopsis" class="form-label">Sinopsis</label>
                <textarea class="form-control" id="textSinopsis" name="textSinopsis" required></textarea>
            </div>
            <div id="buttons" class="col-md-2">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <button type="reset" class="btn btn-light" id="borrar">Borrar</button>
            </div>

            <input type="hidden" name="accion" value="peliculas"> <!-- eso es lo que se permite que el mensajeLogin se conecte con el controlador -->
        </form>
    </div>
    <script src="../Js/TP2/ej_4.js"></script>


</body>

</html>