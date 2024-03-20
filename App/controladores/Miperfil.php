<?php

    class Miperfil extends Controlador{
        private $UsuarioModelo;

        public function __construct(){
            Session::IniciarSesion($this->datos);
            $this->UsuarioModelo = $this->modelo('UsuarioModelo');
            
        }
        
        public function index(){
            
            $this->datos['documentos'] = $this->UsuarioModelo->documentosUsuarios();
            $this->datos['usuario'] = $this->UsuarioModelo->datosUsuarios();
            $this->datos['noti']  = $this->UsuarioModelo->NumeroNotificacionesActivas();

            $this->vista('/Miperfil/perfil', $this->datos);


            if(isset($_POST['subir'])){
                $subir = imagenes(RUTA_PERFIL, $_FILES['imagen'],  $this->datos['UsuarioSesion']->nif);
            }
            // if (isset($_POST['subir-archivo'])){
            //     $subirDocumento = [
            //         'nombre_documento' => trim($_POST['nombre_documento']),
            //         'descripcion_documento' => trim($_POST['descripcion_documento']),
            //         'nif' => $_POST['nif'],
            //         'archivo' => $nombreArchivo,
            //         'tipo_documento' => $tipoArchivo
            //     ];
            //     subirDocumento($_SESSION['UsuarioSesion']->NIF);
            //     $this->UsuarioModelo->subirDocumento($subirDocumento);
            // }else{

            // }

        }

        //eliminar documentos usuarios
        public function eliminardocumentosUsuarios(){
            $id_usuario = $this->datos['UsuarioSesion']->id_usuario;

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
                $eliminarDocumento = [
                    'id_documento' => $_POST['id_documento']  
                ];

                // echo $_POST['id_documento'];
                // exit;

                $nombreArchivo = $_POST['archivoeliminar'];
                // echo $nombreArchivo;
                // exit;
                // echo $nombreArchivo;
                // exit;
                if (unlink($nombreArchivo)) {

                } else {
                    echo 'Error al eliminar el archivo.';
                }
                
                $this->UsuarioModelo->eliminardocumentosUsuarios($eliminarDocumento);
                redireccionar('/Miperfil');

            }else{

            }
        }

        //editar perfil usuario
        public function editarUsuarios(){
            if(Session::SesionCreada()){
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $editarUsuarios = [
                        'nombre' => trim($_POST['nombre']),
                        'apellido' => trim($_POST['apellido']),
                        'fnacimiento' => trim($_POST['fnacimiento']),
                        'telefono' => trim($_POST['telefono']),
                        'mail' => trim($_POST['mail']),
                        'nif' => trim($_POST['nif'])
                    ];
                        
                    $this->UsuarioModelo->editarUsuarios($editarUsuarios);
                    // $cambiarUserSesion = $this->UsuarioModelo->datosUsuarios2();
                    // Session::actualizarSesion($this->datos, $cambiarUserSesion);
                    // echo $_SESSION['UsuarioSesion']->NIF;
                    // exit;
                    redireccionar('/Miperfil');
                }
            }else{

            }
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

        public function NotificacionesDesLeidas($id){
            
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $this->UsuarioModelo->NotificacionesDesLeidas($id);
                redireccionar('/Miperfil/notificaciones');
            }
        }

        function subirDocumento(){

            $id_usuario = $this->datos['UsuarioSesion']->id_usuario;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
                $nombreArchivo = $_FILES['archivo']['name'];
                $tipoArchivo = $_FILES['archivo']['type'];
                $tamanoArchivo = $_FILES['archivo']['size'];
                $archivoTemporal = $_FILES['archivo']['tmp_name'];
        
                if (isset($_FILES['archivo'])) {
                if ($tipoArchivo == 'application/pdf') {
        
                    $rutaGuardar = RUTA_URL_DOCUMENTOS . $id_usuario."_".$nombreArchivo;
        
                    move_uploaded_file($archivoTemporal, $rutaGuardar);
        
                    $subirDocumento = [
                        'nombre_documento' => trim($_POST['nombre_documento']),
                        'descripcion_documento' => trim($_POST['descripcion_documento']),
                        'archivo' => $nombreArchivo,
                        'tipo_documento' => $tipoArchivo,
                        'ruta_archivo' => $rutaGuardar
                    ];
        
                    $this->UsuarioModelo->subirDocumento($subirDocumento);
                
                    redireccionar('/Miperfil');
        
        
                    }else{
            
                    }
                }else{
                    //echo "no se ha seleccionado ningun archivo";
                }
        
            }
        
        }

    }