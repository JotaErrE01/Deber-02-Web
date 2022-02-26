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
        
        ?>

        <main id="main-formulario">
        <div id="contenedor-formulario">
            <h1 class="titulos-seccion Formulario"> Agregar nuevo Vehiculo</h1>
            <div id="campos-ingreso">
                <form class="form-renta" id="formAgregar" method="POST">
                    <div class="campos">
                        <label for="i-placa">Placa:</label>
                        <input type="text" id="i-placa" name="txtPlaca" required pattern="[A-Z]{3}[-][0-9]{4}" title="Las placas deben seguir el siguiente formato: AAA-0001">
                    </div>
                    <div class="campos"><label for="i-color">Color:</label>
                        <input type="text" id="i-color" name="txtColor" required>
                    </div>
                    <div class="campos"><label for="i-modelo">Modelo:</label>
                        <input type="text" id="i-modelo" name="txtModelo" required>
                    </div>
                    <div class="campos"><label for="i-marca">Marca:</label>
                        <input type="text" id="i-marca" name="txtMarca" required>
                    </div>
                    <div class="campos"><label for="i-precioDia" >Precio/Día:</label>
                        <input type="number" step="any" id="i-precioDia" name="txtPrecioDia" required>
                    </div>
                    <div class="campos">
                        <label>Categoria:</label>
                        <select name="categoria" id="categorias" required>
                            <?php
                            require_once '../conexion/db.php';
                            $db= conectarDB();
                            $sql = "SELECT * FROM categoriavehiculo";
                            $resultado = mysqli_query($db, $sql);
                            while($valores = mysqli_fetch_assoc($resultado)){
                                echo '<option value="' . $valores['id_categoria_vehiculo'] . '">' . $valores["nombre"] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <input type="checkbox"  name="aireacondicionado" value="1" id="aireacondicionado">
                        <label>Aire acondicionado?</label>
                    </div>
                    <div id="botones">                   
                        <input type="submit" id="boton-enviar" value="Agregar">
                    </div>

                </form>
            </div>
        </div>

    </main>
        <?php
        if (!empty($_POST['txtPlaca']) && !empty($_POST['txtColor']) && !empty($_POST['txtModelo']) &&
                !empty($_POST['txtMarca']) && !empty($_POST['txtPrecioDia']) && !empty($_POST['categoria'])) {
            
                $placa = htmlentities($_POST['txtPlaca']);
                $color = htmlentities($_POST['txtColor']);
                $marca = htmlentities($_POST['txtMarca']);
                $modelo = htmlentities($_POST['txtModelo']);
                $precioDia = number_format(doubleval(htmlentities($_POST['txtPrecioDia'])),2,".",",");
                $aireacondicionado = isset($_POST['aireacondicionado']) ? intval(htmlentities($_POST['aireacondicionado'])) : intval('0');
                $categoria = intval(htmlentities($_POST['categoria']));
            
            $sql = "insert into vehiculo(placa, color, marca, modelo, precioDia, aire_acondicionado, id_categoria) 
            values('$placa', '$color', '$marca','$modelo',$precioDia, $aireacondicionado, $categoria)";
            
            if (mysqli_query($db, $sql)) {// si se ejecuto sin errores
                header("location:presentar.php"); //redireccionar
            } else {
                echo "Error: " . $sql . "" . mysqli_error($db);
            }
        }?>

 
        <?php include_once '../templates/footer.php'; ?>



    </body>
</html>
