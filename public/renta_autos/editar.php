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
        if (isset($_GET['id'])) {
            $id =  htmlentities($_GET['id']);
            $sql = "select * from vehiculo where id_vehiculo =".$id;
            $resultado = mysqli_query($db, $sql);
            while ($fila = mysqli_fetch_assoc($resultado)){
        ?>

                <main id="main-formulario">
                    <div id="contenedor-formulario">
                        <h1 class="titulos-seccion Formulario"> Editar Vehiculo</h1>
                        <div id="campos-ingreso">
                            <form class="form-renta" id="formEditar" method="post">
                                <div class="campos">
                                    <input type="hidden" name="txtid" value="<?php echo $fila['id_vehiculo'] ?>">
                                    <label for="i-placa">Placa:</label>
                                    <input type="text" id="i-placa" name="txtPlaca" required value="<?php echo $fila['placa'] ?> " pattern="[A-Z]{3}[-][0-9]{4}" title="Las placas deben seguir el siguiente formato: AAA-0001">
                                    
                                </div>
                                <div class="campos"><label for="i-color">Color:</label>
                                    <input type="text" id="i-color" name="txtColor" required value="<?php echo $fila['color'] ?>">
                                </div>
                                <div class="campos"><label for="i-modelo">Modelo:</label>
                                    <input type="text" id="i-modelo" name="txtModelo" required value="<?php echo $fila['modelo'] ?>">
                                </div>
                                <div class="campos"><label for="i-marca">Marca:</label>
                                    <input type="text" id="i-marca" name="txtMarca" required value="<?php echo $fila['marca'] ?>">
                                </div>
                                <div class="campos"><label for="i-precioDia">Precio/Día:</label>
                                    <input type="number" step="any" id="i-precioDia" name="txtPrecioDia" required value="<?php echo $fila['precioDia'] ?>">
                                </div>
                                <div class="campos">
                                    <label>Categoria:</label>
                                    <select name="categoria" id="categorias">
                                        <?php
                                        $sql = "SELECT * FROM categoriavehiculo";
                                        $resultado = mysqli_query($db, $sql);
                                        while($valores = mysqli_fetch_assoc($resultado)){                                          
                                        ?>
                                        <option value="<?php echo $valores['id_categoria_vehiculo']?>" <?php echo ($valores['id_categoria_vehiculo']==$fila['id_categoria'])?"selected='selected'":''?>><?php echo $valores["nombre"]?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <input type="checkbox"  name="aireacondicionado" value="<?php echo $fila['aire_acondicionado'] ?>" id="aireacondicionado" <?php echo ($fila['aire_acondicionado']==1)?'checked':'' ?>> 
                                    <label>Aire acondicionado?</label>
                                </div>
                                <div id="botones">                   
                                    <input type="submit" id="boton-enviar" value="Actualizar">
                                </div>

                            </form>
                        </div>

                    </div>
                    
  <?php
            }
        }
        ?>
                 
        <?php
        if (!empty($_POST['txtid'])&& !empty($_POST['txtPlaca']) && !empty($_POST['txtColor']) && !empty($_POST['txtModelo']) &&
                !empty($_POST['txtMarca']) && !empty($_POST['txtPrecioDia']) && !empty($_POST['categoria'])) {

                $id = htmlentities($_POST['txtid']);
                $placa = htmlentities($_POST['txtPlaca']);
                $color = htmlentities($_POST['txtColor']);
                $marca = htmlentities($_POST['txtMarca']);
                $modelo = htmlentities($_POST['txtModelo']);
                $precioDia = number_format(doubleval(htmlentities($_POST['txtPrecioDia'])),2,".","");
                $aireacondicionado = isset($_POST['aireacondicionado']) ? intval('1') : intval('0');
                $categoria = intval(htmlentities($_POST['categoria']));
            
            $sql2 = "update vehiculo set placa='$placa', color='$color', marca='$marca', modelo='$modelo', precioDia=$precioDia, 
            aire_acondicionado=$aireacondicionado, id_categoria=$categoria where id_vehiculo=$id";
            if (mysqli_query($db, $sql2)) {// si se ejecuto sin errores
                echo "<script> window.location='presentar.php'; </script>"; //redireccionar
            } else {
                echo "Error: " . $sql2 . "" . mysqli_error($db);
            }
        }
        ?>
    </body>
    
    <?php include_once '../templates/footer.php'; ?>
</html>
