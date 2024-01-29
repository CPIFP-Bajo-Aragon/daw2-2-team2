<?php

    class Miperfil extends Controlador{

        public function __construct(){
            session_start();
            $this->UsuarioModelo = $this->modelo('UsuarioModelo');
            
        }
        
        public function index(){
            
            $this->datos['documentos'] = $this->UsuarioModelo->documentosUsuarios();
            $this->vista('/Miperfil/perfil', $this->datos);

        
            $subir = imagenes('fotoperfil', $_FILES['imagen'],  $_SESSION['UsuarioSesion']->NIF);
 
                if ($subir){
                 echo "Correcto";
                 exit;
                }else {
                 echo 'error';
                 exit;
                }
        }

        //eliminar documentos usuarios
        public function eliminardocumentosUsuarios(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
                $eliminarDocumento = [
                    'id_documento' => $_POST['id_documento']  
                ];

                // echo $_POST['id_documento'];
                // exit;
                
                $this->UsuarioModelo->eliminardocumentosUsuarios($eliminarDocumento);
                redireccionar('/Miperfil');

            }else{

            }
        }

        //editar perfil usuario
        public function editarUsuarios(){
          
        }





        //Notificaciones
        

        public function Notificaciones() {
            $this->datos['noti']  = $this->UsuarioModelo->NumeroNotificacionesActivas();
            $this->vista('/Miperfil/notificaciones');
            
        }
        
        public function NotificacionesAPI($tipo) {
            if ($tipo === 'Activas') {
                $this->datos['notificaciones'] = $this->UsuarioModelo->NotificacionesActivas();
            } elseif ($tipo === 'Historico') {
                $this->datos['notificaciones'] = $this->UsuarioModelo->NotificacioneNoActivas();
            } else {
                $this->datos['notificaciones'] = $this->UsuarioModelo->NotificacionesActivas();
            }
        
            $this->vistaAPI($this->datos['notificaciones']);
        }

        public function NotificacionLeida($id){
            
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $this->UsuarioModelo-> NotificacionesLeidas($id);
                redireccionar('/Miperfil/notificaciones');
            }
        }
        

    }