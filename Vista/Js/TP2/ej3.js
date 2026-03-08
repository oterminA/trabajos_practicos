let inputPassword2 = document.getElementById('inputPassword2');
let inputUsername2 = document.getElementById('inputUsername2');
let divError = document.getElementById('divError');

//!!!!no sé como hacer que se valide bien lo de la repeticion del usuario y que se usen letras/numeros, o sea pasa una o pasa la otra, como q no valida ambos

function marcarBorde() {
    inputPassword2.style.border = "1px solid red";
}

function validarFormulario() {
    let pass = inputPassword2.value.trim(); //recupero lo q está dentro del input
    let user = inputUsername2.value.trim(); //misma
    bien = true; //bandera
    divError.textContent = " ";

    //valido q la contraseña tiene que tener minimo 8caracteres
    if (pass.length < 8) {
        divError.textContent = "La contraseña debe tener al menos 8 caracteres";
        marcarBorde();
        bien = false
    }

    //valido que la contra no puede ser igual al nombre de usuario
    if (pass === user) {
        divError.textContent = "La contraseña no puede ser igual al username";
        marcarBorde();
        bien = false

    }

    //valido q la contra debe tener numeros y letras
    const regex = /^(?=.*[a-zA-Z])(?=.*\d).+$/;
    if (!regex.test(pass)) {
        divError.textContent = "La contraseña debe contener letras y numeros";
        marcarBorde();
        bien = false

    }

    return bien;
}