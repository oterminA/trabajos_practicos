 //tomo las variables del html
 let nombre = document.getElementById('nombre');
 let apellido = document.getElementById('apellido');
 let direccion = document.getElementById('direccion');
 let edad = document.getElementById('edad');
 let genero = document.getElementById('genero');

 function limpiar() { //esta funcion limpia el estilo de los campos y la hago para no repetir codigo dos veces
     nombre.style.border = "1px solid";
     nombre.innerHTML = "";
     apellido.style.border = "1px solid";
     apellido.innerHTML = "";
     edad.style.border = "1px solid";
     edad.innerHTML = "";
     direccion.style.border = "1px solid";
     direccion.innerHTML = "";
 }

 function validar() {
     let lleno = true; //bandera
     limpiar();
     if ((nombre.value.trim() == "") ||
         (apellido.value.trim() == "") ||
         (edad.value.trim() == "") ||
         (direccion.value.trim() == "") || (genero.value === "")) { //evaluo si está vacio
         alert("Los campos deben estar llenos");
         nombre.style.border = "1px solid red";
         apellido.style.border = "1px solid red";
         edad.style.border = "1px solid red";
         direccion.style.border = "1px solid red";
         genero.style.border = "1px solid red";

         lleno = false; //bandera q cambia porque los campos están vacios
     } else {
         limpiar();
     }

     return lleno; //retorno la bandera con el valor booleano
 }