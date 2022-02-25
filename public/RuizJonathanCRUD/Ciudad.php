<?php
require_once '../conexion/db.php';

class Ciudad {
    public $tabla = 'ciudades';
    public $db;

    public function __construct($args = []) {
        $this->db = conectarDB();
        $this->id = $args['id'] ?? null;
        $this->ciudad = $args['ciudad'] ?? null;
    }

    public function getAll() {
        $sql = "SELECT * FROM $this->tabla";
        $resultado = mysqli_query($this->db, $sql);
        $ciudades = [];

        while ($ciudad = mysqli_fetch_assoc($resultado)) {
            $ciudades[] = $ciudad;
        }

        return $ciudades;
    }

    public function getOne() {
        $sql = "SELECT * FROM $this->tabla WHERE id = $this->id";
        $resultado = mysqli_query($this->db, $sql);
        $ciudad = mysqli_fetch_assoc($resultado);

        return $ciudad;
    }

    public function insert() {
        $sql = "INSERT INTO $this->tabla (ciudad) VALUES ('$this->ciudad')";
        $resultado = mysqli_query($this->db, $sql);

        return $resultado;
    }

    public function update() {
        $sql = "UPDATE $this->tabla SET ciudad = '$this->ciudad' WHERE id = $this->id";
        $resultado = mysqli_query($this->db, $sql);

        return $resultado;
    }

    public function delete() {
        $sql = "DELETE FROM $this->tabla WHERE id = $this->id";
        $resultado = mysqli_query($this->db, $sql);

        return $resultado;
    }
}
