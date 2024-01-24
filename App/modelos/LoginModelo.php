<?php
//Pasa las cosas del controlador aqui para hacer la consulta en la bd

    class LoginModelo{
            private $db;
            public function __construct(){
                $this->db= new Base;
            }

            public function login($credenciales){
                $nombre = $credenciales['nombre'];
                $email = $credenciales['email'];
                $this->db->query('SELECT * FROM usuarios WHERE nombre=:nombre AND email=:email');
                $this->db->bind(':nombre',$nombre);
                $this->db->bind(':email',$email);
                //return $this->db->rowCount();
                return $this->db->registro();

            }
    }