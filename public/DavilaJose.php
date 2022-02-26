<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Reserva de hoteles</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="styles/estilos.css">
    <link rel="stylesheet" href="styles/style.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
</head>

<body>
    <!-- header -->
    <?php 
        include __DIR__ . '/./templates/header.php';
    ?>
  
    
    <!-- header -->
    <section class="slid">

        <div class="slider">
            <div class="slide active">
                <img src="./img/galapagos.jpg" alt="">
                <div class="info">
                    <h3>GALAPAGOS</h3>
                </div>
            </div>
            <div class="slide">
             <img src="./img/cuenca.jpg" alt="">
             <div class="info">
                 <h3>CUENCA</h3>
             </div>
         </div>
         <div class="slide">
             <img src="./img/quito.jpg" alt="">
             <div class="info">
                 <h3>QUITO</h3>
             </div>
         </div>
         <div class="slide">
             <img src="./img/amazonia.jpg" alt="">
             <div class="info">
                 <h3>AMAZONIA</h3>
             </div>
         </div>
         <div class="navigation">
             <i class="fas fa-chevron-left prev-btn"></i>
             <i class="fas fa-chevron-right next-btn"></i>
         </div>
         <div class="navigation-visibility">
             <div class="slide-icon active"></div>
             <div class="slide-icon"></div>
             <div class="slide-icon"></div>
             <div class="slide-icon"></div>
         </div>
        </div>
     
        
    </section>
    

    <!-- divisor y paalabras -->

  


    <!-- Tarjetas ↓ -->

    <div class="container2">

        <div class="card">
            <img src="./img/spa.jpg"
                alt="">
            <h4 class="titleCard">Spa</h4>
            <p class="textCard">Un espacio de relajación y salud, con los mejores para los mejores, disfruta de la calidad y el placer,
            </p>
            <a class="textMas" href="#">Leer mas</a>
        </div>

        <div class="card">
            <img src="./img/confort.jpg"
                alt="">
            <h4 class="titleCard">Confort</h4>
            <p class="textCard">Siente la comodidad y tranquilidad en un solo espacio, calma y paz para ti, te lo mereces!</p>
            <a class="textMas" href="#">Leer mas</a>
        </div>
        <div class="card">

            <img src="./img/restaurante.jpg" alt="">
            <h4 class="titleCard">Restaurantes</h4>
            <p class="textCard">Si de sabores se trata, disfruta de los mejores sabores y siente como tu paladar llega a otro nivel. </p>
            <a class="textMas" href="#">Leer mas</a>
        </div>

        <div class="card">
            <img src="./img/gym.jpg" alt="">
            <h4 class="titleCard">Gimnasio</h4>
            <p class="textCard">Espacios para ejercitarse de primera, implementados al maximo y sin limitaciones. </p>
            <a class="textMas" href="#">Leer mas</a>
        </div>

        <div class="card">
            <img src="./img/arte.jpg" alt="">
            <h4 class="titleCard">Arte</h4>
            <p class="textCard">Disfruta, siente y vive el arte, despierta el artista que llevas dentro de ti junto a nosotros.</p>
            <a class="textMas" href="#">Leer mas</a>
        </div>
        <div class="card">

            <img src="./img/diversion.jpg"
                alt="">
            <h4 class="titleCard">Diversión</h4>
            <p class="textCard"> "Momentos unicos llenos de espectaculo y diversión para vivirlos con quien quieras y a la hora que quieras.</p>
            <a class="textMas" href="#">Leer mas</a>
        </div>
        
    </div>

    <br>

    <div id="divbutton">
        <a href="formularioDávila.html" class="butt"> Reserva Ahora</a>
        <a href="/DavilaCrud/formAdminhoteles.php" class="butt"> Administrar Hoteles</a>
    </div>
    
    <!-- footer ↓ -->
    <footer class="bg-black" >
        <div class="container mx-auto flex items-center justify-center flex-col p-2">
            <a href="/" class="text-white">
                <i class="text-3xl fas fa-plane-departure"></i>
            </a>
            <p class="text-white text-sm">Todos los Derechos Reservados EcuTravel &copy;</p>
        </div>
    </footer>
    <script src="./bundle.js" ></script>
    <script src="app.js"></script>
</body>

</html>