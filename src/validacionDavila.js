const nombre = document.getElementById("nombres");
nombre.required = "true";
const apellidos = document.getElementById("apellidos");
apellidos.required = "true";
const correo = document.getElementById("correo");
apellidos.required = "true";
const numero = document.getElementById("celular");
numero.required = "true";

const numper = document.getElementById("numper");
numper.required = "true";

const selector = document.getElementById("selector")
selector.required = "true";
const form = document.getElementById("formulario");

var error = document.getElementById("error");


var expRegNombre=/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;
var expRegApellidos=/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;


form.addEventListener('submit', function(edt){
  
  if(!expRegNombre.test(nombre.value)|| nombre.value.trim() ===''){
    alert("Ingrese un nombre valido");
    edt.preventDefault();
    nombre.focus();
  }
  if(!expRegApellidos.test(apellidos.value) || apellidos.value.trim() === ''){
    alert("Ingrese un apellido valido");
    edt.preventDefault();
    apellidos.focus();
  }

  if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(correo.value)){
    alert("Ingrese correctamente su correo")
    edt.preventDefault();
  }
  if(numero.value.length != 10){
    alert("El numero de cedula debe tener 10 digitos");
    edt.preventDefault();
  }

  if(numper.value > 100){
    alert("El numero de personas no puede ser mayor a 100");
    edt.preventDefault();
  }
  
  
});


// function ValidaLongitud(campo, longitudMaxima) {
//   try {
//       if (campo.value.length > (longitudMaxima - 1))
//           return false;
//       else
//           return true;             
//   } catch (e) {
//       return false;
//   }
// }
// function maxlengthNUmer(numper){
//   console.log(numper.value);
//     if(numper.value.length > numper.maxlength){
//       numper.value = numper.value.slice(0, numper.maxlength);
//     }
  
// }

