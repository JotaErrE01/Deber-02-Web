<?php

function conectarDB() {
    $conexion = mysqli_connect("<tu_host>", "<tu_usuario>", "<tu_password>", "<nombre_DB>");

    if (!$conexion) {
        return die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }
    return $conexion;
}

