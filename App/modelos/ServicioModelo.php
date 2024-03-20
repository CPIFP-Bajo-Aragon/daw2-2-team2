<?php
//Pasa las cosas del controlador aqui para hacer la consulta en la bd

class ServicioModelo {
    private $db;
    private $datos;

    public function __construct() {
        $this->db = new Base;
    }

    public function obtenerMunicicipios() {
        $this->db->query('SELECT * FROM municipio');
        return $this->db->registros();
    }

    public function obtenerServicios($municipio) {
        $this->db->query("SELECT *
            FROM servicio
            JOIN tipo_servicio ON servicio.id_tipo_servicio = tipo_servicio.id_tipo_servicio
            WHERE servicio.id_municipio = $municipio ORDER BY servicio.id_tipo_servicio ;
        ");
        return $this->db->registros();
    }

    public function ponerresena($datos) {
        $this->db->query('INSERT INTO valorar_municipio (Id_municipio, estrellas_municipio, valoracion, Id_usuario) VALUES (:mun, :rate, :resena, :id)');
    

        $this->db->bind(':mun', $datos['municipio']);
        $this->db->bind(':rate', $datos['rate']);
        $this->db->bind(':resena', $datos['resena']);
        $this->db->bind(':id', $datos['id_usuario']);
        
        
        return $this->db->execute();
    }

    public function sacarresena($municipio) {
        $this->db->query("SELECT *
            FROM valorar_municipio, usuario
            WHERE usuario.id_usuario =  valorar_municipio.Id_usuario AND 
            Id_municipio = $municipio");
        return $this->db->registros();
    
    }
}