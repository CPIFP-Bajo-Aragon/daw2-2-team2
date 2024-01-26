<?php

    class Miperfil extends Controlador{

        public function __construct(){

            //Sesion::iniciarSesion($this->datos);

            $this->UsuarioModelo = $this->modelo('UsuarioModelo');
        }
        
        public function index(){
            
            //print_r($_SESSION);

            $this->datos['usuarios'] = $this->UsuarioModelo->datosUsuarios();
            
            $this->vista('Miperfil/perfil', $this->datos);

        }
    }