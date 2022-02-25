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
                width: 100%;
            }
            table {
                border: #b2b2b2 0.5px solid;
                margin: 0 auto;
                text-align: center;  
            }
            td, th {
                border: #b2b2b2 0.5px solid;
                height: 10px;
                padding: 15px;  
            }
            thead{
                background-color: #ED8600;
                
            }
           
    </style>
</head>
<body>

    <?php
        include '../templates/header.php';
    ?>
    <br>
    <div class="formulario">
            <h3>-RESERVACIONES-</h3>
    </div> 
        
     <!-- CONSULTAR -->   
    <?php  
       require_once '../conexion/db.php';
        
        $sql = "select * from reserva";
        $resultado = mysqli_query(conectarDB(), $sql);
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
       
        <?php
            include '../templates/footer.php';
        ?> 
</body>
</html>