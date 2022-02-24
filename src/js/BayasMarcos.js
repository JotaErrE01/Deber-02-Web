

//Validacion de Formulario con Vanilla javascript

window.addEventListener('load', ()=>{
    const form=document.querySelector('#lario')
    const nombres = document.getElementById('nombres')
    const apellidos = document.getElementById('apellidos')
    const email = document.getElementById('email')
    const telefono = document.getElementById('telefono')
    const fecha = document.getElementById('fecha')
    const destino = document.getElementById('destino')
    

    
   

    form.addEventListener('submit', (e) => {
        e.preventDefault()
        validaCampos()
    })

    const validaCampos = ()=>{
        const nombresValor = nombres.value.trim()
        const apellidosValor = apellidos.value.trim()
        const emailValor = email.value.trim()
        const telefonoValor = telefono.value.trim()
        const fechaValor= fecha.value
        const destinoValor = destino.value
        
        
        
        //Validando Campo Nombres
        if(!nombresValor){
            //console.log('campo vacio')
            validaFalla(nombres, 'Campo Vacio')
        }else{
            validarOk(nombres)
        }
        
        //Validando Campo Apellidos
        if(!apellidosValor){
            //console.log('campo vacio')
            validaFalla(apellidos, 'Campo Vacio')
        //}else if(!validarLetras(apellidosValor)){
            //validaFalla(apellidos, "solo se permite letras")
        }
        else{
            validarOk(apellidos)
        }

         //Validando Campo email
         if(!emailValor){
            //console.log('campo vacio')
            validaFalla(email, 'Campo Vacio')
        }else if(!validaEmail(emailValor)){
            validaFalla(email, 'El e-mail no es valido')
        }else{
            validarOk(email)
            
        }
        
        //validando telefono
        if(!telefonoValor){
            //console.log('campo vacio')
            validaFalla(telefono, 'Campo Vacio')
        }else if(telefonoValor.length < 10){
            validaFalla(telefono, 'Debe tener 10 caracteres como minimo')
        }else {
            validarOk(telefono)
        }

        //validando fecha
        if(!fechaValor){
            //console.log('Ingrese una fecha de Viaje')
            validaFalla(fecha, 'Ingrese una fecha de Viaje')
        }else{
            validarOk(fecha)
        }

        //validando Destino
        if(destinoValor === null || destinoValor=== '0'){
            //console.log('Ingrese un destino')
            validaFalla(destino, 'Seleccione un destino')
        }else{
            validarOk(destino)
            
        }

        

        

    }
    const validaFalla = (input, msje) =>{
        const field = input.parentElement
        const aviso = field.querySelector('p')
        aviso.innerText = msje

        field.className = 'field falla'
    }
    const validarOk = (input, msje) =>{
        const field = input.parentElement
        field.className = 'field ok'

    }
    const validaEmail = (email)=>{
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
    }
    /*const validarLetras = (letras)=>{
        return /^[a-z ,.'-]+$/.test(letras);
    }*/
    


})