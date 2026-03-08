let inputAnio = document.getElementById('inputAnio');
let divError = document.getElementById('divError');


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
    return bien;
}
