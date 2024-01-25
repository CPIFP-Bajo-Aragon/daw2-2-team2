<?php
//Pasa las cosas del controlador aqui para hacer la consulta en la bd

    class RegistroModelo{
        private $db;
        public function __construct(){
            $this->db= new Base;
        }

        
        public function addUser($datos){
            $this->db->query('INSERT INTO usuario (NIF, nombre, apellido, correo, contrasena) VALUES  (:NIF, :nombre, :apellido, :email, :contrasena) ');

            $this->db->bind(':NIF',$datos['nif']);
            $this->db->bind(':nombre',$datos['nombre']);
            $this->db->bind(':apellido',$datos['apellido']);
            $this->db->bind(':email',$datos['email']);   
            $this->db->bind(':contrasena',$datos['contrasena']);    
 

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

    }