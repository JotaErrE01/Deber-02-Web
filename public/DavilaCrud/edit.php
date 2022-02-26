<?php
include("../conexion/db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM hoteles Where Id = $id";
    $result = mysqli_query(conectarDB(), $query);
    
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        $nombre = $row['Nombrehotel'];
        $provincia = $row['ProvinciaCiudad'];
        $email = $row['Email'];
        $cuartos = $row['NumeroCuartos'];
        $tipo = $row['TipoHotel'];
        $categoria = $row['Estrellas'];
    }
        

        
    

    

}

if(isset($_POST['update'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $provincia = $_POST['provincia'];
        $correo = $_POST['correo'];
        $ncuartos = $_POST['cuartos'];
        $tipoH = $_POST['tipo'];
        $estrellas = $_POST['opciones'];

       
        $query = "UPDATE hoteles SET Nombrehotel='$nombre', ProvinciaCiudad='$provincia', Email = '$correo',
        NumeroCuartos = '$ncuartos', TipoHotel = '$tipoH', Estrellas = '$estrellas' WHERE id=$id";

        mysqli_query(conectarDB(), $query);
       
        header("Location: formAdminhoteles.php");
    }

?>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/formulariohoteles.css">
    <script src="https://kit.fontawesome.com/5ad6b79db6.js" crossorigin="anonymous"></script>
</head>
<form action="edit.php?id=<?php echo $_GET['id']; ?>"  method ="POST" class="form-registrar">
        <h4>Nuevo Hotel</h4>
        <div class="doble">
            <input required="" autocomplete="off" class="controls" type="text"  name="nombre" placeholder="Nombre de hotel" value="<?php echo $nombre; ?>">
            <div class="input-group">-</div>
            <input required="" autocomplete="off" class="controls" type="text" name="provincia"  placeholder="Provincia - Ciudad" value="<?php echo $provincia; ?>">
            <input required="" autocomplete="off" class="controls" type="email" name="correo"  placeholder="Correo electronico Hotel" value="<?php echo $email; ?>">
            <div class="input-group">-</div>
            <input required="" autocomplete="off" class="controls" type="number" name="cuartos"  placeholder="Número de cuartos" value="<?php echo $cuartos; ?>">
            <div>
            <input required="" type="radio" name="tipo" id='playa' value = 'Hotel playero'<?php echo $tipo== "Hotel playero"?"checked=\"checked\"":'';?>>
            <label for="playa">Hotel Playero</label>
            <input required="" type="radio" name="tipo" id='ciudad' value = 'Hotel de ciudad'<?php echo $tipo == "Hotel de ciudad"?"checked=\"checked\"":'';?> >
            <label for="ciudad">Hotel de Ciudad</label>
           
            </div>

            <div class="input-group">-</div>

            <select required="" id="selector" class="controlsOp" name="opciones" >
            <option class="optionText" value="">Tipo de Hotel</option>
			<option class="optionText" value="5 estrellas"
            
            <?php if($categoria == "5 estrellas"){
                echo "selected";}
                
                ?>
            >5 Estrellas</option>
			<option class="optionText" value="4 estrellas"
            
            <?php if($categoria == "4 estrellas"){
                echo "selected";}
                
                ?>
            >4 Estrellas</option>
			<option class="optionText" value="3 estrellas"
            <?php if($categoria == "3 estrellas"){
                echo "selected";}
                
                ?>

            >3 Estrellas </option>
			<option class="optionText" value="2 estrellas"
            <?php if($categoria == "2 estrellas"){
                echo "selected";}
                
                ?>
            
            >2 Estrellas</option>
            </select>
            
        </div>
        <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a> <input  required="" id="box" type="checkbox" checked="true" disabled="disabled"  ></p>
        
        <input type="submit"  class="boton" value="Actualizar" name="update"> 
        <!-- <button class="boton" name = "update" >Actualizar</button> -->
        
        
            
    </form>