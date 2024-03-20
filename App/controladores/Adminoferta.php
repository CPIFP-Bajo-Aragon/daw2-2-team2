<?php

class Adminoferta extends Controlador {
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
            

            $this->paginarofertas(TAM_PAGINA_GRANDE, $pagina);
        } else {
   
           redireccionar('/');
        }
       
    }
    
    public function paginarofertas($datos_por_pagina, $pagina) {
        $offset = ($pagina - 1) * $datos_por_pagina;
        $this->datos['ofertas'] = $this->AdminModelo->mostrarofertaspaginadas($datos_por_pagina, $offset);
        $total  = $this->AdminModelo->totalofertas();
         $this->datos['numeropaginas'] = ceil($total / $datos_por_pagina);
         $this->vista('/Admin/ofertas/ofertas', $this->datos);
    }
    


    public function eliminarofertas(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idoferta=$_POST['id_oferta'];
        $this->datos['ofertas']  = $this->AdminModelo->borraroferta($idoferta);
        }
            redireccionar('/Adminoferta');
    }

    public function activarofertas(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idoferta=$_POST['id_oferta'];
        $this->datos['ofertas']  = $this->AdminModelo->activaroferta($idoferta);
        }
            redireccionar('/Adminoferta');
    }

    public function actualizarofertas(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $modificaroferta = [
                'titulo_oferta' => trim($_POST['titulo_oferta']),
                'fecha_inicio_oferta' => trim($_POST['fecha_inicio_oferta']),
                'fecha_fin_oferta' => trim($_POST['fecha_fin_oferta']),
                'condiciones_oferta' => trim($_POST['condiciones_oferta']),
                'descripcion_oferta' => trim($_POST['descripcion_oferta']),
                'fecha_publicacion_oferta' => trim($_POST['fecha_publicacion_oferta']),
                'id_oferta' => trim($_POST['id_oferta'])
            ];

                
                $this->AdminModelo->modificaroferta($modificaroferta);
        }
            redireccionar('/Adminoferta');
    }

}