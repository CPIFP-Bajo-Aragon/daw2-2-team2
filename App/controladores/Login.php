<?php

class Login extends Controlador {
    private $LoginModelo;
   
    public function __construct(){
        $this->LoginModelo = $this->modelo('LoginModelo');
    }
    public function index($error = ''){
        //LLamamos a la vista Login

        if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['envio'])){

            //Contraseña cifrada (Descomentar cuando se quieran cifrar)
            $contrasena=$_POST['contrasena'];
            $contrasena = shas256(trim($contrasena));

            $login = [
            'correo' => trim($_POST['correo']),
            'contrasena' => $contrasena,
            ];

            $ejecucion = $this->LoginModelo->login($login);
     
            if (isset($ejecucion) && !empty($ejecucion)){ //Si no esta vacio te entra 
                Session::crearSesion($ejecucion); //Definimos las condiciones de la variable de Sesión
                redireccionar('/');

            } else {
                redireccionar('/login/index/error');


            }
        } else { // si la sesion esta creada no deja entrar a login
            if (Session::SesionCreada()){
                redireccionar('');
            }
            $this->datos['error'] = $error;
          
            $this->vista('/Registro/login', $this->datos);
        }


    }

        public function CerrarSesion(){
            session_start();
            Session::cerrarSession();
            redireccionar('/');

        }

}