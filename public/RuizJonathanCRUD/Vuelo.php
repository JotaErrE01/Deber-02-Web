<?php

require_once '../conexion/db.php';

class Vuelo {
    public $tabla = 'vuelos';
    public $db;

    public function __construct($args = []) {
        $this->db = conectarDB();
        $this->id = $args['id'] ?? null;
        $this->ciudad_origen_id = $args['ciudad_origen_id'] ?? null;
        $this->ciudad_destino_id = $args['ciudad_destino_id'] ?? null;
        $this->fecha_salida = $args['fecha_salida'] ?? null;
        $this->fecha_regreso = $args['fecha_regreso'] ?? null;
        $this->duracion = $args['duracion'] ?? null;
        $this->precio = $args['precio'] ?? null;
    }

    public function getAll() {
        $sql = "SELECT vuelos.id, fecha_salida, fecha_regreso, ciudades.ciudad as origen, c.ciudad as destino, precio, duracion FROM {$this->tabla} INNER JOIN ciudades ON ciudades.id = vuelos.ciudad_origen_id INNER JOIN ciudades as c ON c.id = vuelos.ciudad_destino_id;";
        $resultado = mysqli_query($this->db, $sql);
        $vuelos = [];

        while ($vuelo = mysqli_fetch_assoc($resultado)) {
            $vuelos[] = $vuelo;
        }

        return $vuelos;
    }

    public function getOne() {
        $sql = "SELECT vuelos.id, fecha_salida, fecha_regreso, ciudades.ciudad as origen, c.ciudad as destino, precio, duracion, ciudades.id as origen_id, c.id as destino_id FROM {$this->tabla} INNER JOIN ciudades ON ciudades.id = vuelos.ciudad_origen_id INNER JOIN ciudades as c ON c.id = vuelos.ciudad_destino_id WHERE vuelos.id = {$this->id};";

        $resultado = mysqli_query($this->db, $sql);
        $vuelo = mysqli_fetch_assoc($resultado);

        return $vuelo;
    }

    public function insert() {
        $sql = "INSERT INTO $this->tabla (origen, destino, fecha_salida, fecha_regreso, duracion, precio) VALUES ('$this->origen', '$this->destino', '$this->fecha_salida', '$this->fecha_regreso', '$this->duracion', '$this->precio')";
        $resultado = mysqli_query($this->db, $sql);

        return $resultado;
    }

    public function update() {
        $sql = "UPDATE $this->tabla SET origen = '$this->origen', destino = '$this->destino', fecha_salida = '$this->fecha_salida', fecha_regreso = '$this->fecha_regreso', duracion = '$this->duracion', precio = '$this->precio' WHERE id = $this->id";
        $resultado = mysqli_query($this->db, $sql);

        return $resultado;
    }

    public function delete() {
        $sql = "DELETE FROM $this->tabla WHERE id = $this->id";
        $resultado = mysqli_query($this->db, $sql);

        return $resultado;
    }

}
