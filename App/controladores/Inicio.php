<?php

class Inicio extends Controlador {
    private $UsuarioModelo;

    public function __construct(){
        Session::IniciarSesion($this->datos);

        $this->UsuarioModelo = $this->modelo('UsuarioModelo');
        


    }
    public function index(){
        $this->datos['noti']  = $this->UsuarioModelo->NumeroNotificacionesActivas();
        $this->vista('inicio', $this->datos);

    }
}