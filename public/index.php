<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="styles/PrincipalEstilos.css"/>
    <link rel="stylesheet" href="styles/style.css">
    
    <title>Agencia de Turismo/Principal</title>
  
    
</head>
<body>
    
    <!-- Header -->
    <?php 
        include './templates/header.php';
    ?>


    <div class="columna">
        <h2>Tu Agencia de Confianza</h2>

        <div class="galeria">
            <img src="img/ecu.png" alt="ecuador" id="slider">
    
            <script>
                window.addEventListener("load",function(){
                    console.log("el contenido ha cargado");
                            
                    var imagenes = [];

                            
                    imagenes[0] ="img/tortuga.jpg";
                    imagenes[1] ="img/iguanas.jpg";
                    imagenes[2] ="img/costa1.jpg";
                    imagenes[3] ="img/costa 22.jpg";
                    imagenes[4] ="img/andesjpg.jpg";
                    imagenes[5] ="img/amazonia-ecuatoriana.jpg";
                    imagenes[6] ="img/amaz.jpg";
        
                    var indiceImagenes=0;
                    var tiempo =1300;
        
                    function cambiarImagenes(){
        
                        document.getElementById("slider").src = imagenes[indiceImagenes];
        
                        if(indiceImagenes < 6){
                            indiceImagenes++;
                        }else{
                            indiceImagenes = 0;
                        }
        
                    }
        
                    setInterval(cambiarImagenes,tiempo);
    
                })
            </script>
        </div>
    </div>
    
    <section  class="titulo">
        <div class="subtitulo">
            <h3>Viaja por el Ecuador</h3>
            <p>Recorre el Ecuador y crea historias que inspiren</p>
        </div>
        <div >
            <!-- Elementos html no utlizados en clases: figure y figcaption-->
            <hr>
            <figure class="destinos">
                <img  src="img/quito2.jpg" alt="quito">
                    <figcaption>Déjate llevar a esos lugares mágicos que encierra <br>
                        nuestro maravilloso territorio.
                    </figcaption>
            </figure>
            <figure class="destinos">
                <img src="img/Cuenca2.jpg" alt="Cuenca">
                     <figcaption>EcuTravel te propone los sitios más inspiradores,
                         <br> las experiencias más emocionantes.
                    </figcaption>
            </figure>
            <figure class="destinos">
                <img src="img/guayaquilt.jpg" alt="guayaquil">
                    <figcaption>Elige un destino, descubre las actividades que puedes<br> realizar 
                         en el y selecciona servicios de alojamiento.
                    </figcaption>
            </figure>
                   
        </div>  

    </section><br>
    
    <div class="imagen">
        <img  src="img/baños.jpg" alt="baños">
        <div class="txt">
            <h2>DESTINO DEL MES</h2>
            <p>Baños y su culumpio del fin del mundo</p>
            
            <a  href="https://www.turismo.gob.ec/banos-un-carismatico-y-tranquilo-lugar-al-pie-de-un-volcan/" class="btn btn-o"> Ver mas</a>
        </div>
        
        
    </div> 
    <div class="mundo">
        <h3>La línea que une los 4 mundos</h3>
        <p>Descubre lo que lo hace único a cada destino</p>
    
        <div class="region">
            <img src="img/galapagos2.jpg" alt="galapagos">
            <img src="img/costa.jpg" alt="costa">
            <img src="img/andes.jpg" alt="andes">
            <img src="img/amazonia2.jpg" alt="amazonia">
        </div><br>
        <div class="reserva">
            <a style="font-size: 25px;" href="BayasCrud/Agregar.php" class="btn btn-o"> Reserva tu Viaje</a>
        </div>
           
    </div><br><br>

    <?php 
        include './templates/footer.php';
    ?>
</body>
</html>