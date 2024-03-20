<?php

class Admininmuebles extends Controlador {
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
            

            $this->paginarinmuebles(TAM_PAGINA_MEDIANO, $pagina);
        } else {
   
           redireccionar('/');
        }
       
    }
    
    public function paginarinmuebles($datos_por_pagina, $pagina) {
        $offset = ($pagina - 1) * $datos_por_pagina;
        $this->datos['inmuebles'] = $this->AdminModelo->mostrarinmueblespaginados($datos_por_pagina, $offset);
        $total  = $this->AdminModelo->totalinmuebles();
        $this->datos['numeropaginas'] = ceil($total / $datos_por_pagina);
        $this->vista('/Admin/inmuebles/inmuebles', $this->datos);
    }
    


     public function eliminarinmuebles(){
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $idinmueble=$_POST['id_inmueble'];
         $this->datos['ofertas']  = $this->AdminModelo->borrarinmueble($idinmueble);
        }
            redireccionar('/Admininmuebles');
    }

    public function activarinmuebles(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idinmueble=$_POST['id_inmueble'];
        $this->datos['ofertas']  = $this->AdminModelo->activarinmueble($idinmueble);
        }
            redireccionar('/Admininmuebles');
    }

     public function actualizarinmuebles(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $modificarinmueble = [
                        'id_inmueble' => trim($_POST['id_inmueble']),
                        'metros_cuadrados_inmueble' => trim($_POST['metros_cuadrados_inmueble']),
                        'descripcion_inmueble' => trim($_POST['descripcion_inmueble']),
                        'distribucion_inmueble' => trim($_POST['distribucion_inmueble']),
                        'precio_inmueble' => trim($_POST['precio_inmueble']),
                        'caracteristicas_inmueble' => trim($_POST['caracteristicas_inmueble']),
                        'equipamiento_inmueble' => trim($_POST['equipamiento_inmueble'])
                    ];
                        $this->AdminModelo->modificarInmueble($modificarinmueble);
        }
            redireccionar('/Admininmuebles');
    }

}