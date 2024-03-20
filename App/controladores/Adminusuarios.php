<?php

class Adminusuarios extends Controlador {
    private $AdminModelo;
    
    public function __construct(){
        Session::IniciarSesion($this->datos);
        $this->AdminModelo = $this->modelo('AdminModelo');

    }

    
    private function esAdmin($id_usuario) {
        $id_rol = $this->AdminModelo->obtenerrol($id_usuario);

        if (isset($id_rol->id_rol)) {
            $id = $id_rol->id_rol;
           
            return $id === 1;
        } else {
            return false;
        }
    }

    public function index($pagina = 1){  

        if ($this->esAdmin($this->datos['UsuarioSesion']->id_usuario)) {
            

            $this->paginarusuarios(TAM_PAGINA_MEDIANO, $pagina);
        } else {
   
           redireccionar('/');
        }
       
    }
    
    public function paginarusuarios($datos_por_pagina, $pagina) {
        $offset = ($pagina - 1) * $datos_por_pagina;
        $this->datos['usuarios'] = $this->AdminModelo->mostrarusuariospaginados($datos_por_pagina, $offset);
        $total  = $this->AdminModelo->totalusuarios();
        $this->datos['numeropaginas'] = ceil($total / $datos_por_pagina);
        $this->vista('/Admin/usuarios/usuarios', $this->datos);
    }
    

    public function eliminarusuarios(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idusuario=$_POST['id_usuario'];
        $this->datos['usuarios']  = $this->AdminModelo->borrarusuarios($idusuario);
        }
        redireccionar('/Adminusuarios');
    }

    public function activarusuarios(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idusuario=$_POST['id_usuario'];
        $this->datos['usuarios']  = $this->AdminModelo->activarusuarios($idusuario);
        }
        redireccionar('/Adminusuarios');
    }

    public function actualizarusuarios() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $modificarusuario = [
                'id_usuario' => trim($_POST['id_usuario']),
                'nombre_usuario' => trim($_POST['nombre_usuario']),
                'apellidos_usuario' => trim($_POST['apellidos_usuario']),
                'fecha_nacimiento_usuario' => trim($_POST['fecha_nacimiento_usuario']),
                'telefono_usuario' => trim($_POST['telefono_usuario'])
            ];

            $this->AdminModelo->modificarusuario($modificarusuario);
        }
        
        redireccionar('/Adminusuarios');
    }





}