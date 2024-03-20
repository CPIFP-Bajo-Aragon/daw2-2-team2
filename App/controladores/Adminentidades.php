<?php

class Adminentidades extends Controlador {
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
            

            $this->paginarEntidades(TAM_PAGINA, $pagina);
        } else {
   
           redireccionar('/');
        }
       
    }

    
    public function paginarEntidades($pagina) {
        $offset = ($pagina - 1) * TAM_PAGINA;
        $this->datos['entidades'] = $this->AdminModelo->mostrarentidadesPaginadas(TAM_PAGINA, $offset);
        $total  = $this->AdminModelo->totalentidades();
        $this->datos['numeropaginas'] = ceil($total / TAM_PAGINA);
        $this->vista('/Admin/entidades/entidades', $this->datos);
    }

    public function eliminarentidades(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $identidad=$_POST['id_entidad'];
        $this->datos['entidades']  = $this->AdminModelo->borrarentidades($identidad);
        }
        redireccionar('/Adminentidades');
    }   

    public function activarentidades(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $identidad=$_POST['id_entidad'];
        $this->datos['entidades']  = $this->AdminModelo->activarentidades($identidad);
        }
        redireccionar('/Adminentidades');
    }   

    public function actualizarentidades() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $modificarEntidad = [
                'id_entidad' => trim($_POST['id_entidad']),
                'nombre_entidad' => trim($_POST['nombre_entidad']),
                'cif_entidad' => trim($_POST['cif_entidad']),
                'sector_entidad' => trim($_POST['sector_entidad']),
                'direccion_entidad' => trim($_POST['direccion_entidad']),
                'numero_telefono_entidad' => trim($_POST['numero_telefono_entidad']),
                'correo_entidad' => trim($_POST['correo_entidad']),
                'pagina_web_entidad' => trim($_POST['pagina_web_entidad'])
            ];
    
            $this->AdminModelo->modificarentidades($modificarEntidad);
        }
        
        redireccionar('/Adminentidades');
    }
    



}