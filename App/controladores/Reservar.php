<?php

    class Reservar extends Controlador{
        private $ReservarModelo;
        private $UsuarioModelo;

        public function __construct(){
            Session::IniciarSesion($this->datos);

            $this->ReservarModelo = $this->modelo('ReservarModelo');
            $this->UsuarioModelo = $this->modelo('UsuarioModelo');

        }
    
        public function index(){
            $this->datos['noti']  = $this->UsuarioModelo->NumeroNotificacionesActivas();
            $this->datos['reservas'] = $this->ReservarModelo->MostrarReservas();
            $this->datos['reservasami'] = $this->ReservarModelo->MostrarReservasAMi();
            foreach ($this->datos['reservasami'] as $reservasami){
                $this->datos['usuarios_para_oferta'][$reservasami->id_oferta] = $this->ReservarModelo->MostrarUsuarios($reservasami->id_oferta);
            }

            $this->vista('/Reservar/reservar', $this->datos);

        }

        public function EliminarReserva(){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
                $EliminarReserva = [
                'id_oferta' => trim($_POST['id_oferta'])
                ];

                $this->ReservarModelo->EliminarReserva($EliminarReserva);

                redireccionar('/Reservar');

            }else{

                exit;   
            }

        }
    
    
    }