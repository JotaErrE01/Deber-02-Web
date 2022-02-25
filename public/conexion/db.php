<?php

function conectarDB() {
    $conexion = mysqli_connect("localhost", "root", "jotaerre01", "daw-project");
    if (!$conexion) {
        return die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }
    return $conexion;
}

