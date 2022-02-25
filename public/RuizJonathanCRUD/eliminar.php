<?php

require './Vuelo.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $vuelo = new Vuelo(['id' => $id]);
    $resultado = $vuelo->delete();
    if($resultado) {
        header('Location: /RuizJonathanCRUD/adminVuelos.php');
    }else{
        echo 'Error al Eliminar';
    }
}

