<?php

class Traspaso extends Controlador {
    private $UsuarioModelo;
    private $TraspasoModelo;

    public function __construct(){
        $this->UsuarioModelo = $this->modelo('UsuarioModelo');
        $this->TraspasoModelo = $this->modelo('TraspasoModelo');
    }

    public function index(){
        Session::IniciarSesionSinRedireccion($this->datos);

        $variable = "oferta.activo = 1 AND negocio.id_negocio IS NOT NULL";



        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            if (isset($_POST['premax']) && $_POST['premax'] !== '') {
                $variable .= " AND oferta_inmueble.precio_inm < " . $_POST['premax'];
            }
            if (isset($_POST['premin']) && $_POST['premin'] !== '') {
                $variable .= " AND oferta_inmueble.precio_inm > " . $_POST['premin'];
            }
            if (isset($_POST['localidad']) && $_POST['localidad'] !== '') {
                $variable .= " AND inmueble.id_municipio = " . $_POST['localidad'];
            }
            switch ($_POST['global']) {
                case 1:
                    $variable .= " ORDER BY oferta_inmueble.precio_inm ASC";
                    break;
                case 2:
                    $variable .= " ORDER BY oferta_inmueble.precio_inm DESC";
                    break;
                case 3:
                    $variable .= " ORDER BY oferta.fecha_publicacion_oferta ASC";
                    break;
                case 4:
                    $variable .= " ORDER BY oferta.fecha_publicacion_oferta DESC";
                    break;
                default:
                    break; // You may want to handle this case accordingly
            }
        }
       // $this->datos['usuarios'] = $this->UsuarioModelo->obtenerDatos();
        $this->datos['noti'] = $this->UsuarioModelo->NumeroNotificacionesActivas();
        $this->datos['traspasos'] = $this->TraspasoModelo->obtenerTraspasos($variable);
        $this->datos['localidades'] = $this->TraspasoModelo->obtenerMunicicipios();
        $this->datos['sesion']=Session::ComprobarSesion();



       foreach ($this->datos['traspasos'] as $traspaso) {
        $id_inmueble = $traspaso->id_inmueble;
        $imagenes_traspaso = $this->TraspasoModelo->obtenerTraspasosimagenes($id_inmueble);
        $this->datos['imagenes_traspasos'][$id_inmueble] = $imagenes_traspaso;
    }



        $this->vista('Traspasos/traspasos', $this->datos);
    }
    

    public function vermas() {
        //Funciones para tomar el id_inmueble en la url.
        $url = $_SERVER['REQUEST_URI'];
        $parts = explode('/', $url);
        $id_inmueble = end($parts);

        $vermas = ['id_inmueble' => $id_inmueble];


        $this->datos['sesion']=Session::ComprobarSesion();



        $this->datos['traspasosver'] = $this->TraspasoModelo->vermasTraspaso($vermas);
        $this->datos['traspasosverImg'] = $this->TraspasoModelo->vermasTraspasoImg($vermas);
        $this->datos['reserva'] = $this->TraspasoModelo->reservarCheck($vermas);
        $this->datos['idusuario'] = $this->TraspasoModelo->idusuarioTraspaso($vermas);
        $this->datos['noti']  = $this->UsuarioModelo->NumeroNotificacionesActivas();


        $this->vista('Traspasos/vermas', $this->datos);
    }

    public function reservar(){

        Session::IniciarSesion($this->datos);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
            $reservar = [
            'id_oferta' => trim($_POST['id_oferta'])
            ];

            $this->TraspasoModelo->reservar($reservar);
            $this->TraspasoModelo->addNotificacionReserva();

            redireccionar('/Reservar');

        }else{
            echo "error";
            exit;   
        }
    }
}
