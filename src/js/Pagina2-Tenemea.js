// validar solo texto
function validarTexto(txt) {
    txt.value = txt.value.replace(/[^a-zA-Z -'\n\r.]+/g, '');
}
//validar numero
function validarNumero(valor) {
    valor.value = valor.value.replace(/[-\\A-Za-z!"£$%^&\,*+_={};:'@#~,.Š\/<>?|`¬\]\[]/g, '');
}

// validar email
function validarCorreo(email) {
    var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

    if (regMail.test(email) == false) {
        document.getElementById("status").innerHTML = "<span style='color:#A94442' class='warning'>El correo electrónico ingresado no es válido.</span>";
    } else {
        document.getElementById("status").innerHTML = "<span style='color:#448844' class='valid'>Correo electrónico ingresado correctamente.</span>";
    }
}

//validar checkbox
document.getElementById("terminosCondiciones").setCustomValidity("Por favor, acepta los términos y condiciones");