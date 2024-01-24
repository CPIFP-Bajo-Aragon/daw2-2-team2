<?php

class Inicio extends Controlador {
    //private $usuarioModelo;

    public function __construct(){
        // $this->usuarioModelo = $this->modelo('UsuarioModelo');
    }
    public function index(){
            $this->vista('inicio_no_logueado');
    }
}