<?php
//Pasa las cosas del controlador aqui para hacer la consulta en la bd

    class ServicioModelo{
            private $db;
            public function __construct(){
                $this->db= new Base;
            }

            public function obtenerServicios(){
                $this->db->query('SELECT * FROM servicios');
                return $this->db->registros();
            }
        }