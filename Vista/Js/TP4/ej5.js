let inputDni = document.getElementById('dni');
let formulario = document.getElementById('formulario');
let spanError = document.getElementById('spanError');
let borrar = document.getElementsByClassName('btn')[1];
let linkDesplegar = document.getElementById('linkDesplegar'); //a href que se tinene que apretar para que salga el otro coso

//funcion para desplegar el dni
linkDesplegar.addEventListener('click', desplegar);
inputDni.style.display = "none";
function desplegar() {
    inputDni.style.display = "block";
}


//funcion pra borrar el estilo cuando se borran los campos y ocultar el dni
borrar.addEventListener("click", borrarEstilo);

function borrarEstilo() {
    inputDni.style.border = "";
    spanError.textContent = "";
inputDni.style.display = "none";

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
    if (dni.length !== 8) {
        bien = false;
        inputDni.style.border = "1px solid red";
        spanError.textContent = "El dni debe tener 8 numeros";
    }

    return bien;
}
