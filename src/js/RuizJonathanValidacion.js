// modo estricto
'use strict';

//selectores
const $formualrioVuelos = document.querySelector('#formulario_vuelos');
const $fechaVueltaContenedor = document.querySelector('#contenedorFechaVuelta');
const $fechaIdaContenedor = document.querySelector('#contenedorFechaIda');
const $formularioOpinion = document.querySelector('#formulario-opinion');
const $inputOpinion = document.querySelector('textarea');

const iniciarApp = () => {
    $formualrioVuelos.addEventListener('submit', validarFormulario);
    $inputOpinion.addEventListener('blur', validarInputOpinion);
    $formularioOpinion.addEventListener('submit', e => e.preventDefault());

    verficarTipoVuelo();
}

const validarInputOpinion = ({ target }) => {
    if(target.value.trim().length < 10 ){
        target.classList.add('border-red-500');
        const p = document.createElement('p')
        p.textContent = 'Este campo debe tener al menos 10 caracteres';
        p.classList.add('text-red-500', 'text-sm', 'my-2');
        target.after(p);
        // document.querySelector().appendChild();
    }else{
        $inputOpinion.classList.remove('border-red-500');
        document.querySelector('.text-red-500').remove();
    }
}

const verficarTipoVuelo = () => {
    //selectores de tipos de vuelo
    const $soloIda = document.querySelector('#soloIda');
    const $idaVuelta = document.querySelector('#idaVuelta');

    $soloIda.addEventListener('click', () => {
        if($soloIda.checked){
            $fechaVueltaContenedor.classList.add('hidden');
        }
    });

    $idaVuelta.addEventListener('click', () => {
        if($idaVuelta.checked){
            $fechaVueltaContenedor.classList.remove('hidden');
        }
    })
}

const validarFormulario = e => {
    e.preventDefault();
    const formulario = e.target;
    
    // selectores inputs
    const $origen = formulario.querySelector('#origen');
    const $destino = formulario.querySelector('#destino');
    const $fechaIda = formulario.querySelector('#fechaIda');
    const $presupuesto = formulario.querySelector('#presupuesto');
    const $terminos = formulario.querySelector('#terminosCondiciones');

    let $fechaVuelta;

    
    // convirtiendo a fecha
    const fechaPartida = Date.parse($fechaIda.value);

    if($fechaVueltaContenedor.classList.contains('hidden')){
        if ($origen.value === '' || $destino.value === '' || $fechaIda.value === '' || $presupuesto.value === '') {
            mostrarAlerta('Todos los campos son obligatorios');
            return;
        }
    }else{
        $fechaVuelta = formulario.querySelector('#fechaVuelta');
        const fechaRegreso = Date.parse($fechaVuelta.value);

        if ($origen.value === '' || $destino.value === '' || $fechaIda.value === '' || $fechaVuelta.value === '' || $presupuesto.value === '') {
            mostrarAlerta('Todos los campos son obligatorios');
            return;
        }

        if (fechaPartida >= fechaRegreso) {
            mostrarAlerta('La fecha de regreso debe ser mayor a la fecha de partida');
            return;
        }
    }


    if( $origen.value === $destino.value ){
        mostrarAlerta('El origen y el destino deben ser distintos');
        return;
    }
    
    if(Date.parse($fechaIda.value) <= Date.now()) {
        mostrarAlerta('La fecha de ida no puede ser menor o igual a la fecha actual');
        return;
    }
    
    if(!$presupuesto.value.match(/^\d+(\.\d{1,2})?$/)){
        mostrarAlerta('El Presupuesto debe ser un Número');
        return;
    }

    if(!$terminos.checked){
        mostrarAlerta('Debe aceptar los términos y condiciones');
        return;
    }

    //enviar el formulario
    console.log('Formulario enviado uwu');

    //mostrar alerta
    mostrarAlerta('Formulario enviado correctamente', 'correcto');
}

const mostrarAlerta = (mensaje, tipo = "error", eliminar = true) => {
    const $btnBuscar = document.querySelector('#buscar');
    const p = document.createElement('p');
    p.id = 'alerta';

    const $alertaPrevia = $formualrioVuelos.querySelector('#alerta');

    //eliminar alerta previa 
    if($alertaPrevia) {
        $alertaPrevia.remove();
    }

    if (tipo === 'error') {
        p.classList.add('text-center', 'bg-red-100', 'text-white-700', 'px-4', 'py-3', 'border', 'border-red-400', 'rounded', 'max-w-lg', 'mx-auto', 'mt-6');
    }else{
        p.classList.add('text-center', 'bg-green-100', 'text-white-700', 'px-4', 'py-3', 'border', 'border-green-400', 'rounded', 'max-w-lg', 'mx-auto', 'mt-6');
    }
    p.textContent = mensaje;
    
    $btnBuscar.before(p);

    if (eliminar) {
        setTimeout(() => {
            p.remove();
        }, 3000);
    }
}


document.addEventListener('DOMContentLoaded', iniciarApp);
