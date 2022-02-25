<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../styles/PrincipalEstilos.css"/>
    <link rel="stylesheet" href="../styles/style.css">
    <title>CRUD</title>
    <style>
            table {
                border: #b2b2b2 1px solid;
                
            }
            td, th {
                border: #b2b2b2 1px solid;
                width: 170px;
                height: 40px;
                padding: 10px;
                
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
            
    </div>
    
        
     <!-- CONSULTAR -->   
    <?php  
        require_once 'conexion.php';
        
        $sql = "select * from reserva";
        $resultado = mysqli_query($con, $sql);
        ?>

        <div>
          
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
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
                            <td><?php echo $fila['id'] ?></td>
                            <td><?php echo $fila['usuario'] ?></td>
                            <td><?php echo $fila['nombre'] ?></td>
                            <td><?php echo $fila['destino'] ?></td>
                            <td><?php echo $fila['fecha_viaje'] ?></td>
                            <td><?php echo $fila['email']?></td>
                            <td><?php echo $fila['telefono']?></td>
                            <td>
                                <a class="boton" href="editar.php?id=<?php echo $fila['id'] ?> " class="btn btn-o">Editar</a>
                               
                                <a class="boton" href="presentar.php?id=<?php echo $fila['id'] ?>" class="btn btn-o">Eliminar</a>
                               
                             <?php  
                                ?>


                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table><br>
            <a class="buton" href="Agregar.php">AGREGAR</a>
            
        </div>
       
       <!-- ELIMINAR -->
       <?php
        require_once 'conexion.php';
     
        if (!empty($_GET['id'])) {
            $id = htmlentities($_GET['id']);
            $sql = "select * from reserva where id = $id";
            $resultado = mysqli_query($con, $sql);

            while ($fila = mysqli_fetch_assoc($resultado)) {
                ?>
                <section class="formu" id="formul">
                <div class="formulario">
                <h3>Eliminación de Reservas</h3>
                    <form method="post">
                        <div class="field">
                            <label>Id:</label>
                            <input type="text" name="id" readonly value="<?php echo $fila['id'] ?>" readonly>
                        </div>
                        <div class="field">
                            <label>Usuario:</label>
                            <input type="text" name="usuario"  value="<?php echo $fila['usuario'] ?>" readonly>
                        </div>
                        <div class="field">
                            <label>Nombres:</label>
                            <input type="text" name="nombre"  value="<?php echo $fila['nombre'] ?>" readonly>
                        </div>
                        <div class="field">
                            <label>Fecha de Viaje:</label>
                            <input type="date" name="fecha"  value="<?php echo $fila['fecha_viaje'] ?>" readonly>
                        </div>
                        <div class="submit">
                            <button>ELIMINAR</button>
                        </div>
                    </form>

                </div>
                </section>
            <?php
            }
        }
        ?>
        <?php
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $id = htmlentities($_POST['id']);

            $sql = "delete from reserva where id = $id ";

          if(mysqli_query($con, $sql)){
                 //header("location:presentar.php");
                 echo '<script>window.location="presentar.php"</script>';
              
          }else{         
          }
        }
        ?>
</body>
</html>