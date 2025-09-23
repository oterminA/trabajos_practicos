// let body = document.body;


// if (body.classList.contains('duenio')) {

//     let inputNombre = document.getElementById('nombre');
//     let inputApellido = document.getElementById('apellido');
//     let inputDni = document.getElementById('nuevo_dni');
//     let inputDomicilio = document.getElementById('domicilio');
//     let borro = document.getElementsByClassName('btn')[1];
    
//     borro.addEventListener('click', borroEstilo);
//     function borroEstilo(){
//         inputDni.style.border = "";
//         inputNombre.style.border = "";
//         inputApellido.style.border = "";
//         inputDomicilio.style.border = "";
//     }

//     function valido() {
//         let bien = true;

//         let nombre = inputNombre.value.trim();
//         let apellido = inputApellido.value.trim();
//         let dni = inputDni.value.trim();
//         let dom = inputDomicilio.value.trim();


//         if (dni.length !== 8) {
//             bien = false;
//             inputDni.style.border = "1px solid red";
//             alert("El DNI debe tener 8 números");
//         }

//         if (nombre === "") {
//             bien = false;
//             inputNombre.style.border = "1px solid red";
//             alert("El nombre no puede estar vacío");
//         }

//         if (apellido === "") {
//             bien = false;
//             inputApellido.style.border = "1px solid red";
//             alert("El apellido no puede estar vacío");
//         }

//         if (dom === "") {
//             bien = false;
//             inputDomicilio.style.border = "1px solid red";
//             alert("El domicilio no puede estar vacío");
//         }

//         return bien;
//     }
// }

//     if (body.classList.contains('auto')) {
//         let inputPatente = document.getElementById('patente');
//         let inputMarca = document.getElementById('marca');
//         let inputModelo = document.getElementById('modelo');
//         let borrar = document.getElementsByClassName('btn')[1];

//         borrar.addEventListener('click', borrarEstilo);
//         function borrarEstilo(){
//             inputPatente.style.border = "";
//             inputMarca.style.border = "";
//             inputModelo.style.border = "";
//         }


//         function validar() {
//             let bien = true;

//             let patente = inputPatente.value.trim();
//             let marca = inputMarca.value.trim();
//             let modelo = inputModelo.value.trim();

//             if (patente === "") {
//                 bien = false;
//                 inputPatente.style.border = "1px solid red";
//                 alert("La patente no puede estar vacía");
//             }

//             if (marca === "") {
//                 bien = false;
//                 inputMarca.style.border = "1px solid red";
//                 alert("La marca no puede estar vacía");
//             }

//             if (modelo === "") {
//                 bien = false;
//                 inputModelo.style.border = "1px solid red";
//                 alert("El modelo no puede estar vacío");
//             }

//             if (dni.length !== 8) {
//                 bien = false;
//                 inputDni.style.border = "1px solid red";
//                 alert("El DNI debe tener 8 números");
//             }


//             return bien;
//         }
//     }