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
// let divError = document.getElementById('divError');

// function limpiar() {
//     nombre.style.border = "1px solid";
//     apellido.style.border = "1px solid";
//     edad.style.border = "1px solid";
//     direccion.style.border = "1px solid";
//     divError.innerHTML = "";
// }

// function validar() {
//     let lleno = true;
//     limpiar();
//     if (nombre.value.trim() === "") {
//         nombre.style.border = "1px solid red";
//         lleno = false;
//     }

//     if (apellido.value.trim() === "") {
//         apellido.style.border = "1px solid red";
//         lleno = false;
//     }

//     if (edad.value.trim() === "") {
//         edad.style.border = "1px solid red";
//         lleno = false;
//     }

//     if (direccion.value.trim() === "") {
//         direccion.style.border = "1px solid red";
//         lleno = false;
//     }

//     const soloNumeros = /^[0-9]+$/;
//     if(!soloNumeros.test(edad.value.trim())){
//         divError.textContent= "La edad debe ser solo numeros";
//         edad.style.border = "1px solid red";
//         lleno=false;
//     }else{
//         limpiar();
//     }

//     return lleno;
// }