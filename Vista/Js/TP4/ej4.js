let inputPat = document.getElementById('patente');
let spanError = document.getElementById('spanError');
let inputBorrar = document.getElementsByClassName('btn')[1]; //es el input reset

inputBorrar.addEventListener('click', limpiar);

//para limpiar el borde porque quedó rojo por la validación
function limpiar(){
    inputPat.style.border = "";
    spanError.textContent= "";
}


//para validar que se puso algo en el inpt
function validar(){
    let patente = inputPat.value.trim();
    bien = true;

    if (patente == ""){
        inputPat.style.border = "1px solid red";
        bien = false;
        spanError.textContent= "Debe ingresar una patente";
    }

    return bien;
}