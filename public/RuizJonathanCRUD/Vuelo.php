<?php

require_once __DIR__ . '/../conexion/db.php';

class Vuelo {
    public $tabla = 'vuelos';
    public $db;
    public $errores = [];

    public function __construct($args = []) {
        $this->db = conectarDB();
        $this->id = $args['id'] ?? null;
        $this->ciudad_origen_id = $args['ciudad_origen_id'] ?? null;
        $this->ciudad_destino_id = $args['ciudad_destino_id'] ?? null;
        $this->fecha_salida = $args['fecha_salida'] ?? null;
        $this->fecha_regreso = $args['fecha_regreso'] ?? null;
        $this->duracion = $args['duracion'] ?? null;
        $this->precio = $args['precio'] ?? null;
        $this->tipoViaje = $args['tipoViaje'] ?? null;
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
        $sql = '';
        if(empty($this->fecha_regreso)){
            $sql = "INSERT INTO $this->tabla (ciudad_origen_id, ciudad_destino_id, fecha_salida, duracion, precio) VALUES ('$this->ciudad_origen_id', '$this->ciudad_destino_id', '$this->fecha_salida', '$this->duracion', '$this->precio')";
        }else {
            $sql = "INSERT INTO $this->tabla (ciudad_origen_id, ciudad_destino_id, fecha_salida, fecha_regreso, duracion, precio) VALUES ('$this->ciudad_origen_id', '$this->ciudad_destino_id', '$this->fecha_salida', '$this->fecha_regreso', '$this->duracion', '$this->precio')";
        }

        $resultado = mysqli_query($this->db, $sql);

        return $resultado;
    }

    public function update($id) {
        $sql = '';
        if($this->tipoViaje == '2'){
            $this->fecha_regreso = 'null';
            $sql = "UPDATE $this->tabla SET ciudad_origen_id = '$this->ciudad_origen_id', ciudad_destino_id = '$this->ciudad_destino_id', fecha_salida = '$this->fecha_salida', fecha_regreso = $this->fecha_regreso, duracion = '$this->duracion', precio = '$this->precio' WHERE id = $id";
        }else {
            $sql = "UPDATE $this->tabla SET ciudad_origen_id = '$this->ciudad_origen_id', ciudad_destino_id = '$this->ciudad_destino_id', fecha_salida = '$this->fecha_salida', fecha_regreso = '$this->fecha_regreso', duracion = '$this->duracion', precio = '$this->precio' WHERE id = $id";
        }
        
        $resultado = mysqli_query($this->db, $sql);

        return $resultado;
    }

    public function delete() {
        $sql = "DELETE FROM $this->tabla WHERE id = $this->id";
        $resultado = mysqli_query($this->db, $sql);

        return $resultado;
    }

    public function getErrores() {

        if( empty($this->ciudad_origen_id) ) {
            $this->errores[] = "La ciudad de origen es obligatoria";
        }

        if( empty($this->tipoViaje) ) {
            $this->errores[] = "El tipo de viaje es obligatorio";
        }

        if( empty($this->ciudad_destino_id)) {
            $this->errores[] = "La ciudad de destino es obligatoria";
        }

        if( $this->ciudad_origen_id == $this->ciudad_destino_id ) {
            $this->errores[] = "La ciudad de origen no puede ser la misma que la ciudad de destino";
        }

        if( empty($this->fecha_salida) ) {
            $this->errores[] = "La fecha de salida es obligatoria";
        }

        if( empty($this->fecha_regreso) && $this->tipoViaje == '1' ) {
            $this->errores[] = "La fecha de regreso es obligatoria";
        }

        if( empty($this->duracion) ) {
            $this->errores[] = "La duración es obligatoria";
        }

        if( empty($this->precio) ) {
            $this->errores[] = "El precio es obligatorio";
        }

        if( !is_numeric($this->precio) ) {
            $this->errores[] = "El precio debe ser un número";
        }

        if( !is_numeric($this->duracion) ) {
            $this->errores[] = "La duración debe ser un número";
        }

        return $this->errores;
    }

}
