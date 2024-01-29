<?php
//Pasa las cosas del controlador aqui para hacer la consulta en la bd

    class ServicioModelo{
            private $db;
            public function __construct(){
                $this->db= new Base;
            }

            public function obtenerServicios(){
                $this->db->query('SELECT municipio.nombre_municipio, servicio.nombre, servicio.tipo
                FROM disponer_servicio
                JOIN municipio ON disponer_servicio.id_municipio = municipio.id_municipio
                JOIN servicio ON disponer_servicio.id_servicio = servicio.id_servicio
                ');
                return $this->db->registros();
            }
        }