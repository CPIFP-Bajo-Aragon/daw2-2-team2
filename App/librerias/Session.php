<?php
class Session{
    public static function crearSesion($UsuarioSesion){
        $sessionTime = 365 * 24 * 60 * 60;
        session_set_cookie_params($sessionTime);
        session_start();
        session_regenerate_id();
        $_SESSION['UsuarioSesion'] = $UsuarioSesion;
    }

    public static function SesionCreada(&$datos = []){ // el & Haze que se apliquen los datos de la sesion;
     
        if (isset($_SESSION['UsuarioSesion'])){
            $datos['UsuarioSesion'] = $_SESSION['UsuarioSesion'];
            return true;
        } else {
            return false;
        }
    }

    public static function IniciarSesion(&$datos = []){ 
        session_start();
        if (isset($_SESSION['UsuarioSesion'])){
            $datos['UsuarioSesion'] = $_SESSION['UsuarioSesion'];
            return true;
        } else {
            session_destroy();
            if ($_SERVER['REQUEST_URI'] !== '/') {
                header("Location: /"); 
                exit(); 
            }
        }
    }



    
    public static function IniciarSesionSinRedireccion(&$datos = []){ 
        session_start();
        if (isset($_SESSION['UsuarioSesion'])){
            $datos['UsuarioSesion'] = $_SESSION['UsuarioSesion'];
            return true;
        } else {
            session_destroy();
        }
    }


    public static function ComprobarSesion() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        return isset($_SESSION['UsuarioSesion']);
    }
    

    public static function cerrarSession(){
    
        setcookie(session_name(), "", time(), 3600, "/");
        session_unset();
        session_destroy();
        $_SESSION=array();
    }

    public static function agregarDatoSesion($clave, $valor) {
        if (isset($_SESSION['UsuarioSesion'])) {
            $_SESSION['UsuarioSesion'][$clave] = $valor;
            return true;
        } else {
            return false;
        }
    }

    // public static function actualizarSesion(&$datos, $UsuarioSesion){
    //     $_SESSION['UsuarioSesion'] = $UsuarioSesion;
    //     $datos['UsuarioSesion'] = $_SESSION['UsuarioSesion'];
    // }

}