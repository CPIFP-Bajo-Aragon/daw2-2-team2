<?php

class Registro extends Controlador {
    private $RegistroModelo;

    public function __construct(){
        $this->RegistroModelo = $this->modelo('RegistroModelo');
    }

    public function index($error = ''){

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['envio'])) {
            // Comparamos las contraseñas    
            if ($_POST['password'] == $_POST['password2']) {
                // Contraseña cifrada (Descomentar cuando se quieran cifrar)
                $contrasena = $_POST['password'];
                $contrasena = shas256(trim($contrasena));

                $registro = [
                    'nif' => trim($_POST['nif']),
                    'nombre' => trim($_POST['nombre']),
                    'apellido' => trim($_POST['apellidos']),    
                    'email' => trim($_POST['email']),
                    'fecha_nac' => trim($_POST['fecha_nac']),
                    'telf' => trim($_POST['telf']),

                    'contrasena' => $contrasena,
                ];

                try {
                    $this->RegistroModelo->addUser($registro);
                    redireccionar('/');
                      $mailer = new Mailer();
                      $mailer->sendEmail($_POST['email'], $_POST['nombre']);
                      $this->RegistroModelo->Notificacionbienvenido($_POST['nif']);
                } catch (Exception $e) {
                    echo($e);
                    exit;
                    redireccionar('/registro/index/error-1');
                }
                

            } else {
                echo($e);
                exit;
                redireccionar('/registro/index/error-2');
            }
        } else {
            $this->datos['error'] = $error;
            $this->vista('/Registro/registro',$this->datos);  
        }
    }
}
