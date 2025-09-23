$(document).ready(function () {
    $("#formulario").validate({
        rules: {
            nombre: {
                required: true, //campo es obligatorio
            },
            apellido: {
                required: true, //cmpo es obligatorio
            },
            edad: {
                required: true,
                number: true
            },
            direccion: {
                required: true,
            }
        },
        messages: {
            nombre: {
                required: "Campo obligatorio"
            },
            apellido: {
                required: "Campo obligatorio"
            },
            edad: {
                required: "Campo obligatorio",
                number: "Debe ser un numero valido"
            },
            direccion: {
                required: "Campo obligatorio",
            }
        }
    });
});



















//VALIDACION CON JS PURO
// let nombre = document.getElementById('nombre');
// let apellido = document.getElementById('apellido');
// let direccion = document.getElementById('direccion');
// let edad = document.getElementById('edad');

// function limpiar() {
//     nombre.style.border = "1px solid";
//     nombre.innerHTML = "";
//     apellido.style.border = "1px solid";
//     apellido.innerHTML = "";
//     edad.style.border = "1px solid";
//     edad.innerHTML = "";
//     direccion.style.border = "1px solid";
//     direccion.innerHTML = "";
// }

// function validar() {
//     let lleno = true;
//     limpiar();
//     if ((nombre.value.trim() == "") ||
//         (apellido.value.trim() == "") ||
//         (edad.value.trim() == "") ||
//         (direccion.value.trim() == "")) { //evaluo si está vacio
//         alert("Los campos deben estar llenos");
//         nombre.style.border = "1px solid red";
//         apellido.style.border = "1px solid red";
//         edad.style.border = "1px solid red";
//         direccion.style.border = "1px solid red";
//         lleno = false;
//     }else{
//         limpiar();
//     }

//     return lleno;
// }