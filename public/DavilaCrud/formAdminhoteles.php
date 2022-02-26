<?php 
include("../conexion/db.php")
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="..\styles\style.css">
    <link rel="stylesheet" href="..\styles\formulariohoteles.css">
    <script src="https://kit.fontawesome.com/5ad6b79db6.js" crossorigin="anonymous"></script>


<style>




 table {
    border-radius: 12px;
    margin: auto;
	 width: 1000px;
	 border-collapse: collapse;
	 overflow: hidden;
	 box-shadow: 0 0 20px rgba(0,0,0,0.1);
    
}
 th, td {
	 padding: 15px;
	 background-color: rgba(255,255,255,0.2);
	 color: #fff;
}
 th {
	 text-align: left;
}
 thead th {
	background-color: #000000a3;
}
 tbody tr:hover {
	 background-color: rgba(255,255,255,0.3);
}
tbody{
    background-color: #000000dc;
}
 tbody td {
	 position: relative;
}
 tbody td:hover:before {
	 content: "";
	 position: absolute;
	 left: 0;
	 right: 0;
	 top: -9999px;
	 bottom: -9999px;
	 background-color: rgba(255,255,255,0.2);
	 z-index: -1;
}

.container1{
    padding: 10px;
    min-height:calc(90vH - 150px) ;
}

.divboton{
    
  justify-content: center;
    text-align:center;
    margin-top: 40px
}

    
 
</style>



    
    <title>Document</title>
</head>
<body class="fondo">
<?php
    include '../templates/header.php';
    ?>



    
    
    
    <div class="container1">
	<table>
		<thead>
			<tr>
				<th>Nombre de hotel</th>
				<th>Provincia - Ciudad</th>
				<th>Email</th>
				<th>Numero de Cuartos</th>
				<th>Tipo de Hotel</th>
				<th>Categoría</th>
                <th></th>

			</tr>
		</thead>
		<tbody>
            <?php 
            $query = "SELECT * FROM  hoteles";
            $resultado = mysqli_query(conectarDB(), $query);
            while($row= mysqli_fetch_array($resultado)){?>
                <tr>
                    <td><?php echo $row['Nombrehotel']?></td>
                    <td><?php echo $row['ProvinciaCiudad']?></td>
                    <td><?php echo $row['Email']?></td>
                    <td><?php echo $row['NumeroCuartos']?></td>
                    <td><?php echo $row['TipoHotel']?></td>
                    <td><?php echo $row['Estrellas']?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['Id'] ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <a href="deletehotel.php?id=<?php echo $row['Id'] ?>">
                        <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
		
			
		</tbody>
	</table>
</div>

<div class="divboton">
    <a class="boton"  href="#formulario">Agregar hotel
    <i class="fa-solid fa-plus"></i>
    </a>
    </div>


<form id="formulario" class="form-registrar" action='savedata.php' method ='POST' >
        <h4>Nuevo Hotel</h4>
        <div class="doble">
            <input required="" autocomplete="off" class="controls" type="text" id="nombres" name='nombre' placeholder="Nombre de hotel">
            <div class="input-group">-</div>
            <input required="" autocomplete="off" class="controls" type="text" name="provincia" id="provincias" placeholder="Provincia - Ciudad">
            <input  required=""autocomplete="off" class="controls" type="email" name="correo" id="correo" placeholder="Correo electronico Hotel">
            <div class="input-group">-</div>
            <input required="" autocomplete="off" class="controls" type="number" name="cuartos" id="celular" placeholder="Número de cuartos">
            <div>
            <input required="" type="radio" name="tipo" id='playa' value = 'Hotel playero'>
            <label for="playa">Hotel Playero</label>
            <input required="" type="radio" name="tipo" id='ciudad' value = 'Hotel de ciudad'>
            <label for="ciudad">Hotel de Ciudad</label>
           
            </div>

            <div class="input-group">-</div>

            <select required="" id="selector" class="controlsOp" name="opciones">
            <option class="optionText" value="">Tipo de Hotel</option>
			<option class="optionText" value="5 estrellas">5 Estrellas</option>
			<option class="optionText" value="4 estrellas">4 Estrellas</option>
			<option class="optionText" value="3 estrellas">3 Estrellas </option>
			<option class="optionText" value="2 estrellas">2 Estrellas</option>
            </select>
            
        </div>
        <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a> <input required="" id="box" type="checkbox"></p>
        
        <input type="submit"  class="boton" value="Registrar">
       
        </form>
        
            
    
    

    <?php
    include '../templates/footer.php';
    ?>
    <!-- <script src="validacionDavila.js"></script> -->
</body>
<script src="./bundle.js" ></script>
</html>