let inputDni = document.getElementById('dni');
let formulario = document.getElementById('formulario');
let spanError = document.getElementById('spanError');
let borrar = document.getElementsByClassName('btn')[1];


//funcion pra borrar el estilo cuando se borran los campos
borrar.addEventListener("click", borrarEstilo);

function borrarEstilo(){
    inputDni.style.border = "";
    spanError.textContent="";
}


//funcion xra validar el largo del dni y queno este vacio el input
function validar() {
    let bien = true;
    let dni = inputDni.value.trim();

    if (dni === "") {
        bien = false;
        inputDni.style.border = "1px solid red";
        spanError.textContent = "El campo no puede estar vacío.";
    } else {
        inputDni.style.border = "";
        spanError.textContent = "";
    }

    //podria hacer una funcion para guardar el estilo del borde rojo pero que vagancia
    if (dni.length !==8){
        bien = false;
        inputDni.style.border = "1px solid red";
        spanError.textContent = "El dni debe tener 8 numeros";
    }

    return bien; 
}
