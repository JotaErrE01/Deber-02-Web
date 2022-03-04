<?php
include("../conexion/db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM gastronomia Where id = $id";
    $result = mysqli_query(conectarDB(), $query);
    
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        $opciones = $row['opciones'];
        $cantidad = $row['cantidad'];
        $nombres = $row['nombres'];
        $direccion = $row['direccion'];
        $correo = $row['correo'];
        $telefono = $row['telefono'];
        $detalles = $row['detalles'];

    }
        

        
    

    

}

if(isset($_POST['update'])){
        $id = $_GET['id'];

        $opciones = $_POST['opciones'];
        $cantidad = $_POST['cantidad'];
        $nombres = $_POST['nombres'];
        $direccion = $_POST['direccion'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $detalles = $_POST['detalles'];


       
        $query = "UPDATE gastronomia SET opciones='$opciones', cantidad='$cantidad', nombres = '$nombres',
        direccion = '$direccion', correo = '$correo', telefono = '$telefono', detalles = '$detalles'  WHERE id=$id";

        mysqli_query(conectarDB(), $query);
       
        header("Location: formulario.php");
    }

?>

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Tenemea Neysser" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página 2 -Formulario</title>
    <!-- Hoja de estilo interna  -->
    <link rel="stylesheet" href="../styles/Tenemea-Css-Formulario.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <!-- Hoja de estilo externa  -->
    <link rel="stylesheet" href="../styles/style.css">
    <script src="https://kit.fontawesome.com/5ad6b79db6.js" crossorigin="anonymous"></script>

</head>
<form class="form" action="edit.php?id=<?php echo $_GET['id']; ?>" method ='POST' >
                <table style="text-align: center; margin: auto;">
                    <tr>
                        <td><strong>Opciones</strong> : </td>
                        <td>
                            <select required style="width: 100%;" name='opciones'> 
                    <option value="">-- Selecciona --</option>
                    <option value ="Parrillada Personal"
                    <?php if($opciones == "Parrillada Personal"){
                echo "selected";}
                ?>>Parrillada Personal </option>
                    <option
                    <?php if($opciones == "Lomo de res"){
                echo "selected";}
                ?>
                    >Lomo de res	</option> 
                    <option
                    <?php if($opciones == "Chuleta a la parrilla"){
                echo "selected";}
                ?>
                    >Chuleta a la parrilla</option> 
                    <option
                    <?php if($opciones == "Apanado de pollo"){
                echo "selected";}
                ?>
                    >Apanado de pollo</option> 
                    <option
                    <?php if($opciones == "Chivo al hueco"){
                echo "selected";}
                ?>
                    >Chivo al hueco	</option> 
                   
                    <option
                    <?php if($opciones == "Cuy asado"){
                echo "selected";}
                ?>
                    >Cuy asado	</option> 
                    </select>
                        </td>
                    </tr>
                </table>
                <p>
                    <span>Cantidad de platos</span>
                    <input required id="valor" maxlength="3" onkeyup="validarNumero(this)" name='cantidad' value="<?php echo $cantidad; ?>">
                </p>
                <p>
                    <span>Nombres:</span>
                    <input placeholder="**Neysser" id="txt" maxlength="20" minlength="5" onkeyup="validarTexto(this)" required name='nombres' value="<?php echo $nombres; ?>"> 
                </p>
                <p>
                    <span>Dirección:</span>
                    <input placeholder="**Av. Macas" maxlength="10" minlength="0" required name='direccion' value="<?php echo $direccion; ?>">
                </p>
                <p>
                    <span>Correo electrónico:</span>
                    <input placeholder="**neysser.tenemeal@ug.edu.ec" name='correo'
                    type="email" name="email" id="email" onchange="validarCorreo(this.value);" required value="<?php echo $correo; ?>">
                </p>
                <div id="status">
                </div>
                <p>
                    <span>Teléfono celular  :</span>
                    <input placeholder="09-  --- ----" maxlength="10" minlength="3" onkeyup="validarNumero(this)" name='telefono' value="<?php echo $correo; ?>">
                </p>
                <p>
                    <span>Agrega más detalles a tu pedido:</span>
                </p>
                <p></p>
                <textarea name="detalles" required placeholder="Ingresa algo de texto."><?php echo $detalles; ?></textarea >
                <div></div>
                <p>
                    <input type="checkbox" required onchange="this.setCustomValidity(validity.valueMissing ?
                     'Por favor, indica que aceptas los términos y condiciones.' : '');" id="terminosCondiciones">
                    <label>He leído y acepto los <a href="#"
                        title="Puedes leer los términos y condiciones haciendo click aquí!">términos y
                        condiciones
                    </a> para el pedido.</label><span class="req">* </span>
                </p>
                <button type="submit" class="mibutton" name="update">Actualizar pedido</button>
                <div style="clear: both;"></div>
            </form>