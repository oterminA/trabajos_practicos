
let edad = document.getElementById('edad');
let estudio = document.getElementById('estudio');


function validar() {
    let lleno = true;

    if(edad.value.trim()==""){
        lleno = false;
        edad.style.border = "1px solid red";
    }

    if (estudio.value === "#") {
        estudio.style.border = "1px solid red";
        lleno = false;
    }

    return lleno;
}