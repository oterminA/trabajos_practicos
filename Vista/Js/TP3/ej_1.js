let inputFile = document.getElementById('archivo');
let divError = document.getElementById('divError');

function validar(){
    let lleno = true;

    if (inputFile.files.length === 0){
        inputFile.style.border = "1px solid red";
        divError.textContent = "Debe seleccionar un archivo";
        lleno = false;
    }
    return lleno;
}