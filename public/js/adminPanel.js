const verficarTipoVuelo = () => {
    //selectores de tipos de vuelo
    const $fechaVueltaContenedor = document.querySelector('#contenedorFechaVuelta');
    const $soloIda = document.querySelector('#soloIda');
    const $idaVuelta = document.querySelector('#idaVuelta');

    if($soloIda.checked){
        $fechaVueltaContenedor.classList.add('hidden');
    }

    if($idaVuelta.checked){
        $fechaVueltaContenedor.classList.remove('hidden');
    }

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

document.addEventListener('DOMContentLoaded', verficarTipoVuelo);