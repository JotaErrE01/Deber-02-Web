<?php 

include("../conexion/db.php");
$opciones = $_POST['opciones'];
$cantidad = $_POST['cantidad'];
$nombres = $_POST['nombres'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$detalles = $_POST['detalles'];

$query = "INSERT INTO gastronomia(opciones,
cantidad, nombres, direccion, correo,
telefono, detalles) Values('$opciones', '$cantidad', '$nombres', '$direccion', '$correo', '$telefono','$detalles')";
$result = mysqli_query(conectarDB(), $query);
if(!$result){
    die('Query failed');
}



header("location:formulario.php")

?>

