$(document).ready(function () {
    $("#formulario").validate({
        rules: {
            patente: {
                required: true,
                minlength: 6
            },
            dni: {
                required: true,
                digits: true,
                minlength: 8,
                maxlength: 8
            }
        },
        messages: {
            patente: {
                required: "Por favor, ingresa una patente.",
            },
            dni: {
                required: "Por favor, ingresa un DNI.",
                digits: "Solo se permiten números.",
                minlength: "El DNI debe tener al menos 8 dígitos.",
                maxlength: "El DNI no debe superar los 8 dígitos."
            }
        }
    });
});