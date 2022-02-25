<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../styles/PrincipalEstilos.css"/>
    <link rel="stylesheet" href="../styles/style.css">
    <title>Formulario de Reservaciones</title>
    
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
    <section class="formu" id="formul">
        <div class="formulario">
            <h3>RESERVA TU VIAJE AHORA</h3>
            <!-- Formulario -->
            <form method="post" id="lario">
            <div class="field">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" required> 
                <p></p>
            </div>
            <div class="field">
                <label for="nombre">Nombre y Apellido</label>
                <input  type="text" name="nombre" required> 
                <p></p>
            </div>
            <div class="field">
                <label for="contraseña">Contraseña</label>
                <input type="password" name="contraseña" required> 
                <p></p>
            </div>
            <div class="field">
                <label for="lugar">Destino</label>
                <select name="lugar" required>
                   <option>Quito</option> 
                   <option>Cuenca</option> 
                   <option>Baños</option> 
                   <option>Guayaquil</option> 
                   <option>Galápagos</option> 
                </select>
                <p></p>
            </div>
            <div class="field">
                <label for="fecha">Fecha del viaje</label>
                <input  type="date" name="fecha" required> 
                <p></p>              
            </div>
            <div class="field">
                <label for="email">E-mail</label>
                <input  type="email" name="email" placeholder="ej. minombre@gmail.com" required> 
                <p></p>              
            </div>           
            <div class="field">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" placeholder="09- --- ----" required> 
                <p></p>               
            </div>
            
            <div class="submit">
                <button>AGREGAR</button>
            </div>
        </form> 
       
    </section>
    <?php
	// incluir archivo conexion.php
	require_once 'conexion.php';
	if (!empty($_POST['usuario']) &&
			 !empty($_POST['nombre']) && !empty($_POST['contraseña']) && !empty($_POST['lugar'])
			 && !empty($_POST['fecha']) && !empty($_POST['email']) &&
			 !empty($_POST['telefono'])) {
        
		$usuario = htmlentities($_POST['usuario']);
		$nombre = htmlentities($_POST['nombre']);
		$contraseña = htmlentities($_POST['contraseña']);
        $lugar = htmlentities($_POST['lugar']);
        $fecha = htmlentities($_POST['fecha']);
		$email = isset($_POST['email']) ? htmlentities($_POST['email']) : '';
		$telefono = htmlentities($_POST['telefono']);

		$sql = "insert into reserva(usuario, nombre, contraseña, destino, fecha_viaje, email, telefono) "
				. "values('$usuario','$nombre','$contraseña','$lugar','$fecha','$email','$telefono')";

		if (mysqli_query($con, $sql)) {// si se ejecuto sin errores
			//header("location:presentar.php"); //redireccionar
           echo '<script>window.location="presentar.php"</script>';
		} else {
			echo "Error: " . $sql . "" . mysqli_error($con);
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