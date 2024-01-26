<?php
//Pasa las cosas del controlador aqui para hacer la consulta en la bd

    class LoginModelo{
            private $db;
            public function __construct(){
                $this->db= new Base;
            }

            public function login($credenciales){
                $correo = $credenciales['correo'];
                $contrasena = $credenciales['contrasena'];
                $this->db->query('SELECT * FROM usuario WHERE correo=:correo AND contrasena=:contrasena');
                $this->db->bind(':correo',$correo);
                $this->db->bind(':contrasena',$contrasena);

                //return $this->db->rowCount();
                return $this->db->registro();

            }
    }