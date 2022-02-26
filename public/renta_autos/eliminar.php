<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agregar Auto</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
              integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
              crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="../styles/EstilosAutos.css">

    </head>
    <body>
        <?php
        include_once '../templates/header.php';
        require_once '../conexion/db.php';
        $db= conectarDB();

        if (!empty($_GET['id'])) {
            $id =  htmlentities($_GET['id']);
            $sql = "select * from vehiculo where id_vehiculo =".$id;
            $resultado = mysqli_query($db, $sql);
            while ($fila = mysqli_fetch_assoc($resultado)){
        ?>

                <main id="main-formulario">
                    <div id="contenedor-formulario">
                        <h1 class="titulos-seccion Formulario"> Eliminar Vehiculo</h1>
                        <div id="campos-ingreso">
                            <form id="form-renta" method="post" >
                                <div class="campos">
                                    <input type="hidden" name="txtid" value="<?php echo $fila['id_vehiculo'] ?>">
                                    <label for="i-placa">Placa:</label>
                                    <input type="text" id="i-placa" name="txtPlaca" readonly required value="<?php echo $fila['placa'] ?> ">                                   
                                </div>
                                <div class="campos"><label for="i-color">Color:</label>
                                    <input type="text" id="i-color" name="txtColor" readonly required value="<?php echo $fila['color'] ?>">
                                </div>
                                <div class="campos"><label for="i-marca">Marca:</label>
                                    <input type="text" id="i-marca" name="txtMarca" readonly required value="<?php echo $fila['marca'] ?>">
                                </div>
                                <div class="campos"><label for="i-modelo">Modelo:</label>
                                    <input type="text" id="i-modelo" name="txtModelo" readonly required value="<?php echo $fila['modelo'] ?>">
                                </div>
                                <div id="botones">                   
                                    <input type="submit" id="boton-enviar" value="Eliminar">
                                </div>

                            </form>
                        </div>

                    </div>
                    
  <?php
            }
        }
        ?>
        <?php
        if (isset($_POST['txtid']) && !empty($_POST['txtid'])) {
            $id = htmlentities($_POST['txtid']);
            $sql2 = "delete from vehiculo where id_vehiculo = $id";
              if(mysqli_query($db, $sql2)){
                     header("location:presentar.php");
                  
              }else{                  
                echo 'No se pudo eliminar el registro';
              }
        }
        ?>

<?php include_once '../templates/footer.php'; ?>
    </body>
</html>

            