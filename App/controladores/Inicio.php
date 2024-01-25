<?php

class Inicio extends Controlador {
    //private $usuarioModelo;

    public function __construct(){

    }
    public function index(){
            $this->vista('inicio');

    }
}