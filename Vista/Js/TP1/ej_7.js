let numA = document.getElementById('numA');
let numB = document.getElementById('numB');
let divError = document.getElementById('divError');
let spanError = document.getElementById('spanError');
let select = document.getElementById('op');

function limpiar() {
    numA.style.border = "1px solid";
    numB.style.border = "1px solid";
    divError.textContent = "";
    spanError.textContent = "";
}

function validar() {
    let lleno = true;
    limpiar();

    if (numA.value.trim() === "") {
        divError.textContent = "Debe ingresar un número";
        numA.style.border = "1px solid red";
        lleno = false;
    }

    if (numB.value.trim() === "") {
        spanError.textContent = "Debe ingresar un número";
        numB.style.border = "1px solid red";
        lleno = false;
    }

    if (select.value === "#") {
        select.style.border = "1px solid red";
        lleno = false;
    }

    return lleno; // Solo permite envío si todo está correcto
}
