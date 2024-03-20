<?php

class Cambiar_contrasena extends Controlador {
    private $UsuarioModelo;
    private $AnuncioModelo;


    public function __construct(){       
        Session::IniciarSesion($this->datos);  
        $this->UsuarioModelo = $this->modelo('UsuarioModelo');
        $this->AnuncioModelo = $this->modelo('AnuncioModelo');
    }

    public function index() {    
          
        $this->datos['usuario'] = $this->UsuarioModelo->datosUsuarios();
        foreach ($this->datos['usuario'] as &$usuario) {
            $contra_usuario = $usuario->contrasena_usuario;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $error = "Las contraseñas no coinciden";
            $success = "Se ha cambiado correctamente";
            $contrasena = $_POST['contrasena'];
            $contrasena_nueva = $_POST['contrasena_nueva'];
            $contrasena_nueva_repetida = $_POST['contrasena_nueva_repetida'];
            $contrasena_encriptada = shas256(trim($contrasena));
            
            if (($contrasena_nueva_repetida == $contrasena_nueva) && ($contra_usuario == $contrasena_encriptada)) {
                $editar_contrasena = [
                    'contrasena' => shas256(trim($contrasena_nueva)),
                    'nif' => trim($_POST['nif'])
                ];
                $this->UsuarioModelo->cambiar_contrasena($editar_contrasena);
        
                $this->datos['success_message'] = $success;
            } else {
               
                $this->datos['error_message'] = $error;
            }
        }
        $this->datos['noti']  = $this->UsuarioModelo->NumeroNotificacionesActivas();

        $this->vista('/Miperfil/cambiar_contrasena', $this->datos);
    }
    
}
