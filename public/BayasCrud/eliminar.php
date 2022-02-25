<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../styles/PrincipalEstilos.css"/>
    <link rel="stylesheet" href="../styles/style.css">
    <title>Eliminación de Reservaciones</title>
    <style>
        
    </style>
</head>
<body>
    <?php
        include '../templates/header.php';
    ?>
    <br>

    <div class="reservas">
        <nav>
            <a href="presentar.php">Reservaciones</a>
        </nav>
    </div>
    <?php
        
        // incluir archivo conexion.php
        require_once '../conexion/db.php';
     
        if (!empty($_GET['id'])) {
            $id = htmlentities($_GET['id']);
            $sql = "select * from reserva where id = $id";
            $resultado = mysqli_query(conectarDB(), $sql);

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

          if(mysqli_query(conectarDB(), $sql)){
                 header("location:presentar.php");
              
          }else{
              
              
          }

         
        }
        ?>

    
    <?php
        include '../templates/footer.php';
    ?>
        
</body>
</html>