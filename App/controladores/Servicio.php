<?php

class Servicio extends Controlador {
    private $UsuarioModelo;
    private $ServicioModelo;


    public function __construct(){
        $this->UsuarioModelo = $this->modelo('UsuarioModelo');
        $this->ServicioModelo = $this->modelo('ServicioModelo');
        
    }

    public function index(){
        Session::IniciarSesionSinRedireccion($this->datos);
        $this->datos['noti']  = $this->UsuarioModelo->NumeroNotificacionesActivas();
        $this->datos['municipios'] = $this->ServicioModelo->obtenerMunicicipios();

        $this->vista('/Servicios/servicios',$this->datos);
    }

    public function CargarServicios($municipio){
        $this->datos['servicios'] = $this->ServicioModelo->obtenerServicios($municipio);


        $this->vistaAPI($this->datos['servicios']);
    }
    public function Cargarresenas($municipio){
        $this->datos['resenas'] = $this->ServicioModelo->sacarresena($municipio);
        $this->vistaAPI($this->datos['resenas']);

    }
    public function Resena() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $municipio = $_POST["municipio"];
            $rate = $_POST["rate"];
            $resena = $_POST["resena"];
            
            Session::IniciarSesion($this->datos);
            $id_usuario = $this->datos['UsuarioSesion']->id_usuario;
    
            $datos = array(
                'municipio' => $municipio,
                'rate' => $rate,
                'resena' => $resena,
                'id_usuario' => $id_usuario
            );
            
            $resultado = $this->ServicioModelo->ponerresena($datos);
            if  ($resultado==true){
                    redireccionar('/Servicio');
            }else{
                
            }
        }   
    }
    
}
    