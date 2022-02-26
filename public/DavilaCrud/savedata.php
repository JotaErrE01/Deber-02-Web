<?php 

include("../conexion/db.php");
$nombre = $_POST['nombre'];
$provincia = $_POST['provincia'];
$correo = $_POST['correo'];
$ncuartos = $_POST['cuartos'];
$tipoH = $_POST['tipo'];
$estrellas = $_POST['opciones'];

$query = "INSERT INTO hoteles(Nombrehotel,
ProvinciaCiudad, Email, NumeroCuartos, TipoHotel,
Estrellas) Values('$nombre', '$provincia', '$correo', '$ncuartos', '$tipoH', '$estrellas')";
$result = mysqli_query(conectarDB(), $query);
if(!$result){
    die('Query failed');
}



header("location:formAdminhoteles.php")

?>

