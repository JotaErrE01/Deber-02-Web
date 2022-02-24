<?php

$con = mysqli_connect("localhost", "root", "2003");
mysqli_select_db($con, "turismo");

if ($con->connect_error) {   
    die("Connection failed: " . $con->connect_error);
    // die imprime y sale del script
}
?>
