let inputNum = document.getElementById('numero');

function mostrarError() {
    inputNum.style.border = "1px solid red";
}

function limpiarFormato() {
    inputNum.style.border = "1px solid"; //limpio el campo
}

function validar() {
    let num = inputNum.value.trim();
    let lleno = true;

    if (num === "") { //evaluo si está vacio
        mostrarError();
        alert("El campo debe estar lleno");
        lleno = false;
    } else {
        limpiarFormato();
    }

    return lleno;
}