<?php
include("../conexion/db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM gastronomia WHERE id = $id";
    $result = mysqli_query(conectarDB(), $query);

    if(!$result){
        die("Query Failed");
    }

    header("Location: formulario.php");
}

?>
