let nombre = document.getElementById('nombre');
let apellido = document.getElementById('apellido');
let direccion = document.getElementById('direccion');
let edad = document.getElementById('edad');
let genero = document.getElementById('genero');
let checkboxes = document.getElementsByName('opciones[]'); 
let divError = document.getElementById('divError');

function limpiar() {
    nombre.style.border = "1px solid";
    apellido.style.border = "1px solid";
    edad.style.border = "1px solid";
    direccion.style.border = "1px solid";
}

function validarCheckboxes() {
    let contador = 0;
    bandera = true;
    for (let i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked) {
        contador++;
      }
    }
    if (contador === 0) {
      divError.textContent="Debe tildar al menos un casillero";
      bandera= false;
    } 
    return bandera;
  }

function validar() {
    let lleno = true;
    limpiar();
    if ((nombre.value.trim() == "") ||
        (apellido.value.trim() == "") ||
        (edad.value.trim() == "") ||
        (direccion.value.trim() == "") || 
        (genero.value === "")) { //evaluo si está vacio
        alert("Los campos deben estar llenos");
        nombre.style.border = "1px solid red";
        apellido.style.border = "1px solid red";
        edad.style.border = "1px solid red";
        direccion.style.border = "1px solid red";
        genero.style.border = "1px solid red";
        lleno = false;
    } else {
        limpiar();
    }

    if(!validarCheckboxes()){
        lleno=false;
    }

    return lleno;
}