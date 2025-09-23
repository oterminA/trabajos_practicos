let inputNombre = document.getElementById('nombre');
let inputApellido = document.getElementById('apellido');
let inputDni = document.getElementById('dni');
let inputDomicilio = document.getElementById('domicilio');
let borrar = document.getElementsByClassName('btn')[1];

//funcion para borrar el estilo cuadno se borran los datos
borrar.addEventListener('click', borrarEstilo);
function borrarEstilo(){
    inputNombre.style.border="";
    inputApellido.style.border="";
    inputDni.style.border="";
    inputDomicilio.style.border="";

}

//funcion para validar
function validar() {
    let bien = true;
    let nombre = inputNombre.value.trim();
    let apellido = inputApellido.value.trim();
    let dni = inputDni.value.trim();
    let dom = inputDomicilio.value.trim();

    if (nombre == ""){
        bien=false;
        inputNombre.style.border="1px solid red";
        alert("El nombre no puede estar vacío");
    }

    if (apellido == ""){
        bien=false;
        inputApellido.style.border="1px solid red";
        alert("El apellido no puede estar vacío");
    }

    if (dni.length !==8){
        bien=false;
        inputDni.style.border="1px solid red";
        alert("El DNI debe tener 8 numeros");
    }

    if (dom == ""){
        bien=false;
        inputDomicilio.style.border="1px solid red";
        alert("El domicilio no puede estar vacío");
    }

    return bien;
}

