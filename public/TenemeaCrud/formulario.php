<?php 
include("../conexion/db.php")
?>
<!DOCTYPE html>
<html lang="es">

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

<body>
<?php
    include '../templates/header.php';
    ?>

  
    <div id="formGeneral">
        <!---->

        
        <div class="containerFormulario" style="margin-left:25%; text-align:center;">
        <table>
		<thead>
			<tr>
				<th>Pedido</th>
				<th>Cantidad</th>
				<th>Nombres</th>
				<th>Dirección</th>
				<th>Correo</th>
				<th>Teléfono</th>
                <th>Detalles</th>
                <th></th>

			</tr>
		</thead>
		<tbody>
            <?php 
            $query = "SELECT * FROM  gastronomia";
            $resultado = mysqli_query(conectarDB(), $query);
            while($row= mysqli_fetch_array($resultado)){?>
                <tr>
                    <td><?php echo $row['opciones']?></td>
                    <td><?php echo $row['cantidad']?></td>
                    <td><?php echo $row['nombres']?></td>
                    <td><?php echo $row['direccion']?></td>
                    <td><?php echo $row['correo']?></td>
                    <td><?php echo $row['telefono']?></td>
                    <td><?php echo $row['detalles']?></td>
                    <td>
                    <a href="edit.php?id=<?php echo $row['id'] ?>">
                    <i class="fa-solid fa-pen"></i>
                        </a>

                    <a href="delete.php?id=<?php echo $row['id'] ?>">
                    <i class="fa-solid fa-circle-minus"></i>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
		
			
		</tbody>
	</table>
    <br>

  
<div  style="clear:both;">
<a href="#formularioAgregar">
    <button class="mibutton">Crear nuevo pedido</button>
        </a> </div>
        </div>

        <div class="containerFormulario" >
            <table id="tablaGeneral">

                <thead>
                    <tr>
                        <th colspan="3">Lista de platillos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Parrillada Personal</td>
                        <td> - </td>
                        <td>10.00</td>
                    </tr>
                    <tr>
                        <td>Lomo de res</td>
                        <td> - </td>
                        <td>7.00</td>
                    </tr>
                    <tr>
                        <td>Chuleta a la parrilla</td>
                        <td> - </td>
                        <td>9.00</td>
                    </tr>
                    <tr>
                        <td> Apanado de pollo</td>
                        <td> - </td>
                        <td>6.00</td>
                    </tr>
                    <tr>
                        <td> Chivo al hueco </td>
                        <td> - </td>
                        <td>8.00</td>
                    </tr>
                    <tr>
                        <td>Cuy asado</td>
                        <td> - </td>
                        <td>24.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="containerFormulario" id="formularioAgregar">

            <form class="form" action='create.php' method ='POST' >
                <table style="text-align: center; margin: auto;">
                    <tr>
                        <td><strong>Opciones</strong> : </td>
                        <td>
                            <select required style="width: 100%;" name='opciones'> 
                    <option value="">-- Selecciona --</option>
                    <option>Parrillada Personal</option>
                    <option>Lomo de res	</option> 
                    <option>Chuleta a la parrilla</option> 
                    <option>Apanado de pollo</option> 
                    <option>Chivo al hueco	</option> 
                   
                    <option>Cuy asado	</option> 
                    </select>
                        </td>
                    </tr>
                </table>
                <p>
                    <span>Cantidad de platos</span>
                    <input required id="valor" maxlength="3" onkeyup="validarNumero(this)" name='cantidad'>
                </p>
                <p>
                    <span>Nombres:</span>
                    <input placeholder="**Neysser" id="txt" maxlength="20" minlength="5" onkeyup="validarTexto(this)" required name='nombres'> 
                </p>
                <p>
                    <span>Dirección:</span>
                    <input placeholder="**Av. Macas" maxlength="10" minlength="0" required name='direccion'>
                </p>
                <p>
                    <span>Correo electrónico:</span>
                    <input placeholder="**neysser.tenemeal@ug.edu.ec" name='correo'
                    type="email" name="email" id="email" onchange="validarCorreo(this.value);" required>
                </p>
                <div id="status">
                </div>
                <p>
                    <span>Teléfono celular  :</span>
                    <input placeholder="09-  --- ----" maxlength="10" minlength="3" onkeyup="validarNumero(this)" name='telefono'>
                </p>
                <p>
                    <span>Agrega más detalles a tu pedido:</span>
                </p>
                <p></p>
                <textarea name="detalles" required placeholder="Ingresa texto"></textarea >
                <div></div>
                <p>
                    <input type="checkbox" required onchange="this.setCustomValidity(validity.valueMissing ?
                     'Por favor, indica que aceptas los términos y condiciones.' : '');" id="terminosCondiciones">
                    <label>He leído y acepto los <a href="#"
                        title="Puedes leer los términos y condiciones haciendo click aquí!">términos y
                        condiciones
                    </a> para el pedido.</label><span class="req">* </span>
                </p>
                <button class="mibutton">Añadir pedido</button>
                <div style="clear: both;"></div>
            </form>
        </div>
        <div style="clear: both;">
            <br><br><br>
        </div>
    </div>
    <!-- Footer -->
    <?php
    include '../templates/footer.php';
    ?>
    <script src="./bundle.js"></script>
    <script src="js/Pagina2-Tenemea.js"></script>

</body>

</html>