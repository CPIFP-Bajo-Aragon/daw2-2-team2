<?php

class Servicio extends Controlador {
    //private $usuarioModelo;

    public function __construct(){
        $this->ServicioModelo = $this->modelo('ServicioModelo');
    }
    public function index(){
        $this->datos['servicios'] = $this->ServicioModelo->obtenerServicios();
            $this->vista('Servicios/servicios');
    }
}