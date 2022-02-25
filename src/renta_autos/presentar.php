<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
         <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agregar Auto</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
              integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
              crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="../styles/EstilosAutos.css">
        <style>
            #tabla-contenedor{
                margin: 35px auto;
                width: 70%;
            }
            table{
                margin: 0 auto;
                text-align: center;
                border-collapse: collapse;
                border:  solid 1px black;
            }
            
            th,td{
                padding: 10px
            }
            
            thead{
                background-color: #c06911;
                color: white;
                border-bottom: solid 5px black;
            }
            
            tr:nth-child(even){
                background-color: #ddd;
            }
            
            .button{
                border: solid 1px black;
                padding: 5px;
                border-radius: 2px;
                margin: 2px;
            }
            
            #buttonEditar{
                background-color: #ffd561;
            }
            
            #buttonEliminar{
                background-color: #fa7b7b;
            }
            
            #buttonAgregar{
                margin-top: 5px;
                background-color: #2563eb;
                color: white;
                
                
            }
            #botonfinal{
                  display: flex;
                justify-content: center;
            }



        </style>
    </head>
    <body>
        

        <?php
        include_once '../templates/header.php';
       require_once '../conexion.php';


        $sql = "select * from vehiculo, categoriavehiculo where id_categoria=id_categoria_vehiculo";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        ?>
        <h1 class="titulos-seccion Formulario">Vehiculos</h1>
        <div id="tabla-contenedor">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>PLACA</th>
                        <th>COLOR</th>
                        <th>MODELO</th>
                        <th>MARCA</th>
                        <th>PRECIO/DIA</th>
                        <th>CATEGORIA</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($filas as $fila) {
                        ?>
                        <tr>
                            <td><?php echo $fila['placa'] ?></td>
                            <td><?php echo $fila['color'] ?></td>
                            <td><?php echo $fila['marca'] ?></td>
                            <td><?php echo $fila['modelo'] ?></td>
                            <td><?php echo $fila['precioDia'] ?></td>
                            <td><?php echo $fila['nombre'] ?></td>
                            <td>
                                <a class="button" id="buttonEditar" href="editar.php?id=<?php echo $fila['id_vehiculo'] ?>">Editar</a>
                                <a class="button" id="buttonEliminar" href="eliminar.php?id=<?php echo $fila['id_vehiculo'] ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                        
                </tbody>
            </table>
            <div id="botonfinal">
                <a class="button" id="buttonAgregar" href="agregar.php">Agregar +</a>
            </div>
            
        </div>
 <?php include_once '../templates/footer.php'; ?>
    </body>
</html>
