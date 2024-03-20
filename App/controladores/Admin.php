<?php


class Admin extends Controlador {
    private $AdminModelo;
   
    public function __construct(){
         Session::IniciarSesion($this->datos);
        $this->AdminModelo = $this->modelo('AdminModelo');


    }




    private function esAdmin($id_usuario) {
        $id_rol = $this->AdminModelo->obtenerrol($id_usuario);

        if (isset($id_rol->id_rol)) {
            $id = $id_rol->id_rol;
           
            return $id == 1;
        } else {
            return false;
        }
    }




    public function index(){  
       

        if ($this->esAdmin($this->datos['UsuarioSesion']->id_usuario)) {
            

            $this->vista('/Admin/inicio', $this->datos);
        } else {
   
           redireccionar('/');
        }
       
    }
   


    }








