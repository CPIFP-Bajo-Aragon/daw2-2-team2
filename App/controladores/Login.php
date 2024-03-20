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
            'contrasena' => $contrasena
            ];

            $ejecucion = $this->LoginModelo->login($login);
     
            if (isset($ejecucion) && !empty($ejecucion)){ 
                Session::crearSesion($ejecucion);
                redireccionar('/');
                // if($ejecucion->id_rol==1){
                //     redireccionar('/admin');
                // }else{
                //     redireccionar('/');
                // }
          
            } else {
                redireccionar('/login/index/error');

            }
        } else { 
            if (Session::SesionCreada()){
                redireccionar('');
            }
            $this->datos['error'] = $error;

            $this->vista('/Registro/login', $this->datos);
        }


    }

        public function CerrarSesion(){
            Session::IniciarSesion($this->datos);
            Session::cerrarSession();
            redireccionar('/');

        }

        public function RecuperarClave(){
            if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['envio'])){
                
                $palabras_graciosas = array("cacahuate", "patatús", "mequetrefe", "chirimbolo", "piltrafa", "chococrispis", "petirrojo", "cachivache", "tiquismiquis", "pachanguear", "lamparilla", "despatarrarse");
                $random_palabra_graciosa = $palabras_graciosas[array_rand($palabras_graciosas)];
                $pass = $random_palabra_graciosa . rand(50000000000, 100000000000000);



                $email = $_POST['email']; 
                $passcifrada = shas256(trim($pass));

                $ejecucion = $this->LoginModelo->recuperarclave($email, $passcifrada);

                $mailer = new Mailer();
                $mailer->sendEmailPerdidaContrasena($_POST['email'], $pass);
                redireccionar('/');
            }else {

            $this->vista('/Registro/recuperarClave' );
            }
        }
}