<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../styles/PrincipalEstilos.css"/>
    <link rel="stylesheet" href="../styles/style.css">
    <title>Reservaciones CRUD</title>
    <style>
            .tabla{
                margin: 35px auto;
                width: 80%;
            }
            table {
                border: #b2b2b2 0.5px solid;
                margin: 0 auto;
                text-align: center;  
            }
            td, th {
                border: #b2b2b2 0.5px solid;
                height: 50px;
                padding: 15px;  
            }
            thead{
                background-color: #ED8600;
                
            }
           
    </style>
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
    <div class="formulario">
            <h3>-RESERVACIONES-</h3>
    </div> 
        
     <!-- CONSULTAR -->   
    <?php  
        require_once 'conexion.php';
        
        $sql = "select * from reserva";
        $resultado = mysqli_query($con, $sql);
        ?>

        <div class="tabla">
          
            <table>
                <thead>
                    <tr>
                        <th>USUARIO</th>
                        <th>NOMBRE Y APELLIDO</th>
                        <th>DESTINO</th>
                        <th>FECHA DEL VIAJE</th>
                        <th>E-MAIL</th>
                        <th>TELEFONO</th>
                        <th>ACCIONES</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        ?>
                        <tr>
                            <td><?php echo $fila['usuario'] ?></td>
                            <td><?php echo $fila['nombre'] ?></td>
                            <td><?php echo $fila['destino'] ?></td>
                            <td><?php echo $fila['fecha_viaje'] ?></td>
                            <td><?php echo $fila['email']?></td>
                            <td><?php echo $fila['telefono']?></td>
                            <td>
                                <a class="boton" href="editar.php?id=<?php echo $fila['id'] ?> " class="btn btn-o">Editar</a>
                               
                                <a class="boton" href="eliminar.php?id=<?php echo $fila['id'] ?>" class="btn btn-o">Eliminar</a>
                               
                             <?php  
                                ?>


                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table><br>
            <a class="buton" href="Agregar.php">AGREGAR +</a>
            
        </div>
       
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