<?php

class Notificaciones extends Controlador {
    //private $usuarioModelo;

    public function __construct(){
    }

    
    public function index(){
            $this->vista('Miperfil/notificaciones');
    }
}