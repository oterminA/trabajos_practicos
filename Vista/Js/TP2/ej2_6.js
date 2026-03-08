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
      },
      genero: {
        required: true, //campo es obligatorio
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
        required: "Campo obligatorio"
      },
      genero: {
        required: "Campo obligatorio"
      }
    }
  });
});

let divError = document.getElementById('divError');


function validar() {
  let bien = true;
  if ($("input[name='opciones[]']:checked").length === 0) {
   divError.textContent= "Debe elegir al menos una opción";
    bien = false;
  } else {
    $("#divError").html("");
  }

  if ($("input[name='est']:checked").length === 0) {
    spanError.textContent= "Debe elegir al menos una opción";
     bien = false;
   } else {
     $("#spanError").html("");
   }


  return bien;
}












// let nombre = document.getElementById('nombre');
// let apellido = document.getElementById('apellido');
// let direccion = document.getElementById('direccion');
// let edad = document.getElementById('edad');
// let genero = document.getElementById('genero');
// let checkboxes = document.getElementsByName('opciones[]');
// let divError = document.getElementById('divError');

// function limpiar() {
//     nombre.style.border = "1px solid";
//     apellido.style.border = "1px solid";
//     edad.style.border = "1px solid";
//     direccion.style.border = "1px solid";
// }

// function validarCheckboxes() {
//     let contador = 0;
//     bandera = true;
//     for (let i = 0; i < checkboxes.length; i++) {
//       if (checkboxes[i].checked) {
//         contador++;
//       }
//     }
//     if (contador === 0) {
//       divError.textContent="Debe tildar al menos un casillero";
//       bandera= false;
//     }
//     return bandera;
//   }

// function validar() {
//     let lleno = true;
//     limpiar();
//     if ((nombre.value.trim() == "") ||
//         (apellido.value.trim() == "") ||
//         (edad.value.trim() == "") ||
//         (direccion.value.trim() == "") ||
//         (genero.value === "")) { //evaluo si está vacio
//         alert("Los campos deben estar llenos");
//         nombre.style.border = "1px solid red";
//         apellido.style.border = "1px solid red";
//         edad.style.border = "1px solid red";
//         direccion.style.border = "1px solid red";
//         genero.style.border = "1px solid red";
//         lleno = false;
//     } else {
//         limpiar();
//     }

//     if(!validarCheckboxes()){
//         lleno=false;
//     }

//     return lleno;
// }