// Confirmar que JS puro funciona
console.log("✅ js.js cargado");

// Confirmar que jQuery funciona
$(document).ready(function () {
  console.log("✅ jQuery también está funcionando");
});


$(document).ready(function () {
    $("#formulario").validate({
      rules: {
        edad: {
          required: true//campo es obligatorio
        },
        estudio: {
          required: true //campo es obligatorio
        } 
      },
      messages: {
        edad: {
          required: "Campo obligatorio"
        },
        estudio: {
          required: "Campo obligatorio"
        }
      }
    });
  });



// let edad = document.getElementById('edad');
// let estudio = document.getElementById('estudio');


// function validar() {
//     let lleno = true;

//     if(edad.value.trim()==""){
//         lleno = false;
//         edad.style.border = "1px solid red";
//     }

//     if (estudio.value === "#") {
//         estudio.style.border = "1px solid red";
//         lleno = false;
//     }

//     return lleno;
// }