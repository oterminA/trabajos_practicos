let inputAnio = document.getElementById('inputAnio');
let divError = document.getElementById('divError');
let spanError = document.getElementById('spanError');
let inputFile = document.getElementById('archivo');


function validarFormulario(){
    bien = true; //bandera
    let anio = inputAnio.value.trim();
    inputAnio.style.border = "1px solid";
    divError.textContent = " ";


    //valido la parte del año 
    if (anio.length <=3 ) {
        divError.textContent = "El año debe tener 4 digitos";
        inputAnio.style.border = "1px solid red";
        bien = false;
    }

    if (inputFile.files.length === 0){
        inputFile.style.border = "1px solid red";
        spanError.textContent = "Debe seleccionar una portada para la pelicula";
        bien = false;
    }
    return bien;
}
