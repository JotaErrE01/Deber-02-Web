<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../styles/PrincipalEstilos.css"/>
    <link rel="stylesheet" href="../styles/style.css">
    <title>Document</title>
   
</head>
<body>

<div id="contenedor">
        <header class="bg-black p-2">
            <div class="container flex items-center flex-col sm:flex-row justify-between mx-auto text-white">
                <a href="../index.html" class="flex items-center">
                    <h1 class="my-2 text-4xl sm:ml-0 sm:text-title sm:leading-none ">EcuTravel</h1>
                    <i class="fas fa-plane-departure text-2xl sm:text-logo ml-2"></i>
                </a>
    
                <i id="bar" class="block text-3xl sm:hidden fas fa-bars"></i>
    
                <nav id="nav" class="opacity-0 h-0 invisible sm:visible sm:h-auto sm:opacity-100 sm:flex gap-2 flex-col text-center sm:flex-row sm:justify-between sm:gap-4 sm:text-2sm transition-all duration-300 ease-in-out">
                    <a class="hover:text-orange-500 text-lg sm:text-base" href="../RuizJonathan.html">Vuelos</a>
                    <a class="hover:text-orange-500 text-lg sm:text-base" href="../DavilaJose.html">Hoteles</a>
                    <a class="hover:text-orange-500 text-lg sm:text-base" href="../RonquilloVanessa.html">Reserva de Autos</a>
                    <a class="hover:text-orange-500 text-lg sm:text-base" href="../TenemeaNeysser.html">Gastronomia</a>
                </nav>
            </div>
        </header>
            
    </div><br>
    <div class="reservas">
        <nav>
            <a href="presentar.php">Reservaciones</a>
        </nav>
    </div>

    <?php

        // incluir archivo conexion.php
        require_once 'conexion.php';
     
if (isset($_GET['id'])) {
    $id = htmlentities($_GET['id']);

    $sql = "select * from reserva where id = '" . $id . "'";
    $resultado = mysqli_query($con, $sql);
    while ($fila = mysqli_fetch_assoc($resultado)) {
        ?>
        <section class="formu" id="formul">
        <div class= "formulario">
            <h3>Actualización de Reservas</h3>
            <form method="post">
                <input type="hidden" name="id2" value="<?php echo $fila['id'] ?>">
                <div class="field">
                    <label>Id:</label>
                    <input type="number" name="id" readonly value="<?php echo $fila['id'] ?>">
                </div>
                <div class="field">
                    <label>Usuario:</label>
                    <input type="text" name="usuario" value="<?php echo $fila['usuario'] ?>">
                </div>
                <div class="field">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $fila['nombre'] ?>">
                </div>
                <div class="field">
                    <label>Contraseña:</label>
                    <input type="password" name="contraseña" value="<?php echo $fila['contraseña'] ?>">
                </div>
                <div class="field">
                    <label for="lugar">Destino</label>
                    <select name="lugar" >
                        <option>Quito</option> 
                        <option >Cuenca</option> 
                        <option>Baños</option> 
                        <option>Guayaquil</option> 
                        <option>Galápagos</option> 
                    </select >
                    <p></p>
                </div>
                <div class="field">
                    <label>Fecha del Viaje:</label>
                    <input type="date" name="fecha" value="<?php echo $fila['fecha_viaje'] ?>">
                </div>
                <div class="field">
                    <label>Email:</label>
                    <input type="email" name="email" value="<?php echo $fila['email'] ?>">
                </div>
                <div class="field">
                    <label>telefono:</label>
                    <input type="text" name="telefono" value="<?php echo $fila['telefono'] ?>">
                </div>
                
                <div class="submit">
                <button>ACTUALIZAR</button>
            </div><br>
            </form>
        </div>
        </section>
    <?php
    }
}
?>

<?php
if (!empty($_POST['id']) && !empty($_POST['usuario']) && !empty($_POST['nombre']) && 
!empty($_POST['contraseña']) && !empty($_POST['lugar']) && !empty($_POST['fecha']) && !empty($_POST['email']) && !empty($_POST['email'])) {
    $idp = htmlentities($_POST['id']);
    $usuario = htmlentities($_POST['usuario']);
    $nombre = htmlentities($_POST['nombre']);
    $contraseña = htmlentities($_POST['contraseña']);
    $lugar = htmlentities($_POST['lugar']);
    $fecha = htmlentities($_POST['fecha']);
    $email = htmlentities($_POST['email']);
    $telefono = htmlentities($_POST['telefono']);
 

    $sql2 = "update reserva set id =$idp, usuario ='$usuario', nombre = '$nombre', contraseña = '$contraseña',"
            . " destino = '$lugar', fecha_viaje = '$fecha', email = '$email', telefono=  '$telefono'  where id=$idp";

    if (mysqli_query($con, $sql2)) {
        // echo "Registro ingresado correctamente";
        //header("location:presentar.php"); //redireccionar
        echo '<script>window.location="presentar.php"</script>';
    } else {
        echo "Error: " . $sql2 . "" . mysqli_error($con);
    }
}
?>
<footer class="bg-black">
        <div class="container mx-auto flex items-center justify-center flex-col p-2">
            <a href="/" class="text-white">
                <i class="text-3xl fas fa-plane-departure"></i>
            </a>
            <p class="text-white text-sm">Todos los Derechos Reservados EcuTravel &copy;</p>
        </div>
    </footer>
    <script src="./bundle.js"></script> 
</body>
</html>
