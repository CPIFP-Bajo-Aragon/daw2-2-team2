<?php


class Admincrear extends Controlador {
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

    public function index(){  
    
        if ($this->esAdmin($this->datos['UsuarioSesion']->id_usuario)) {
            

            $this->vista('/Admin/crearadmin/crearadmin', $this->datos);
        } else {
   
           redireccionar('/');
        }
       
    }


    public function crearadmin(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $contrasena = $_POST['contrasena_usuario'];
            $contrasena = shas256(trim($contrasena));
            $admin= [
                'nif'=> trim($_POST['nif']),
                'nombre_usuario'=>trim($_POST['nombre_usuario']),
                'apellidos_usuario'=>trim($_POST['apellidos_usuario']),
                'correo_usuario'=> trim($_POST['correo_usuario']),
                'contrasena_usuario'=> trim($contrasena),
                'fecha_nacimiento_usuario'=>trim($_POST['fecha_nacimiento_usuario']),
                'telefono_usuario'=>trim($_POST['nombre_usuario']),

            ];
            $this->AdminModelo->crearadministrador($admin);
        }
        redireccionar('Admincrear');
    }

}