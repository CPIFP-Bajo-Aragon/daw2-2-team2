<?php

class Entidades extends Controlador {

    private $EntidadesModelo;
    private $UsuarioModelo;



    public function __construct(){

        Session::IniciarSesion($this->datos);

        $this->UsuarioModelo = $this->modelo('UsuarioModelo');
        $this->EntidadesModelo = $this->modelo('EntidadesModelo');

    }
    public function index(){

        $this->datos['entidades'] = $this->EntidadesModelo->mostrarEntidades();

        $this->datos['usuarios'] = $this->EntidadesModelo->usuariosEntidad();

        $this->datos['roles'] = $this->EntidadesModelo->usuarioRol();

        $this->datos['noti']  = $this->UsuarioModelo->NumeroNotificacionesActivas();

        $this->vista('Entidades/entidades', $this->datos);
     
    }

    public function anadirEntidad(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $anadirEntidad = [
                'nombre_entidad' => $_POST['nombre_entidad'],
                'cif_entidad' => $_POST['cif_entidad'],
                'sector_entidad' => $_POST['sector_entidad'],
                'direccion_entidad' => $_POST['direccion_entidad'],
                'numero_telefono_entidad' => $_POST['numero_telefono_entidad'],
                'correo_entidad' => $_POST['correo_entidad'],
                'pagina_web_entidad' => $_POST['pagina_web_entidad']
            ];
                        
            $this->EntidadesModelo->anadirEntidad($anadirEntidad);

            redireccionar('/Entidades');

        }else{

        }
    }

    public function anadirUsuarioaEntidad(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $anadirUsuarioaEntidad = [
                'dni_usuario' => $_POST['dni_usuario'],
                'id_entidad' => $_POST['id_entidad'],
            ];
                        
            $this->EntidadesModelo->anadirUsuarioaEntidad($anadirUsuarioaEntidad);

            redireccionar('/Entidades');

        }else{

        }
    }

    public function eliminarUsuarioEntidad(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $eliminarUsuarioEntidad = [
                'id_usuario' => $_POST['id_usuario'],
                'id_entidad' => $_POST['id_entidad']
            ];
                        
            $this->EntidadesModelo->eliminarUsuarioEntidad($eliminarUsuarioEntidad);

            redireccionar('/Entidades');

        }else{

        }
    }

    public function eliminarEntidad(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $eliminarEntidad = [
                'id_entidad' => $_POST['id_entidad'],
            ];
                        
            $this->EntidadesModelo->eliminarEntidad($eliminarEntidad);

            redireccionar('/Entidades');

        }else{

        }
    }
}