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
        session_start();
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
            redireccionar('/login/');
        }
    }

    public static function cerrarSession(){
        session_start();
        setcookie(session_name(), "", time(), 3600, "/");
        session_unset();
        session_destroy();
        $_SESSION=array();
    }
}