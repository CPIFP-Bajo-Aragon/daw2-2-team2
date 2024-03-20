<?php

class Alquiler extends Controlador {
    private $UsuarioModelo;
    private $AlquilerModelo;
    private $ServicioModelo;
    

    public function __construct(){
        $this->UsuarioModelo = $this->modelo('UsuarioModelo');
        $this->AlquilerModelo = $this->modelo('AlquilerModelo');
        $this->ServicioModelo = $this->modelo('ServicioModelo');

    }
    public function index(){
        Session::IniciarSesionSinRedireccion($this->datos);

        $this->datos['datos'] = $this->AlquilerModelo->obtenerDatos();
        $this->datos['noti']  = $this->UsuarioModelo->NumeroNotificacionesActivas();
        $this->datos['municipios'] = $this->ServicioModelo->obtenerMunicicipios();
        
        $this->vista('Alquiler/alquiler', $this->datos);
        
    }

  
    public function CargarDatos(){
        $this->datos['datos'] = $this->AlquilerModelo->obtenerDatos();
        foreach ($this->datos['datos'] as &$dato) {
            $dato->id_usuario = cifrar_url_aes($dato->id_usuario);
        }
        $this->vistaAPI($this->datos['datos']);
    }

    
    public function OrdenarPrecio($max){
        $this->datos['datos'] = $this->AlquilerModelo->obtenerDatos2($max);
        $this->vistaAPI($this->datos['datos']);
    }

    public function VerMas($id){
        $this->datos['noti']  = $this->UsuarioModelo->NumeroNotificacionesActivas();
        $this->datos['imagenes'] = $this->AlquilerModelo->ImagenesAlquiler($id);
        $this->datos['datosinmueble'] = $this->AlquilerModelo->DatosInmueble($id);
        $this->datos['datosvivienda'] = $this->AlquilerModelo->DatosVivienda($id);
        $this->datos['datosoferta'] = $this->AlquilerModelo->DatosOferta($id);
        $this->datos['reserva'] = $this->AlquilerModelo->reservarCheck($id);
        $this->datos['sesion']=Session::ComprobarSesion();
        $this->datos['idusuario'] = $this->AlquilerModelo->idusuarioAlquiler($id);


        $this->vista('Alquiler/vermas', $this->datos);

    }

    public function reservar(){

        Session::IniciarSesion($this->datos);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
            $reservar = [
            'id_oferta' => trim($_POST['id_oferta'])
            ];

            $this->AlquilerModelo->reservar($reservar);
            $this->AlquilerModelo->addNotificacionReserva();


            redireccionar('/Reservar');

        }else{
            echo "error";
            exit;   
        }
    }

}