<?php

class Inicio extends Controlador {
    //private $usuarioModelo;

    public function __construct(){
        $this->UsuarioModelo = $this->modelo('UsuarioModelo');

    }
    public function index(){
        session_start();
        $this->datos['noti']  = $this->UsuarioModelo->NumeroNotificacionesActivas();
        $this->vista('inicio', $this->datos);

    }
}