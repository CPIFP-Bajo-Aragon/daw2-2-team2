<?php

class Registro extends Controlador {
    private $RegistroModelo;

    public function __construct(){
        $this->RegistroModelo = $this->modelo('RegistroModelo');
    }

    public function index($error = ''){

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['envio'])) {
            // Comparamos las contraseñas    
            if ($_POST['contrasena'] == $_POST['contrasenarepetida']) {
                // Contraseña cifrada (Descomentar cuando se quieran cifrar)
                $contrasena = $_POST['contrasena'];
                $contrasena = shas256(trim($contrasena));

                $registro = [
                    'nif' => trim($_POST['nif']),
                    'nombre' => trim($_POST['nombre']),
                    'apellido' => trim($_POST['apellido']),
                    'email' => trim($_POST['email']),
                    'contrasena' => $contrasena,
                ];

                try {
                    $this->RegistroModelo->addUser($registro);
                    redireccionar('/');
                } catch (Exception $e) {
                    redireccionar('/registro/index/error-1');
                }
                

            } else {
                redireccionar('/registro/index/error-2');
            }
        } else {
            $this->datos['error'] = $error;
            $this->vista('Registro/registro',$this->datos);  
        }
    }
}
