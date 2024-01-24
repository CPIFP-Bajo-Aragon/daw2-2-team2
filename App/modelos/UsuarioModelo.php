<?php
//Pasa las cosas del controlador aqui para hacer la consulta en la bd

    class UsuarioModelo{
            private $db;
            public function __construct(){
                $this->db= new Base;
            }

            public function obtenerUsuarios(){
                $this->db->query('SELECT * FROM usuarios NATURAL JOIN roles GROUP BY Nombre');
                return $this->db->registros();
            }

            public function obtenerRoles(){
                $this->db->query('SELECT * FROM roles GROUP BY rol');
                return $this->db->registros();
            }

            public function addUser($datos){
                $this->db->query('INSERT INTO usuarios (nombre, email, telefono, id_rol) VALUES  (:nombre, :email, :telefono, :id_rol) ');

                $this->db->bind(':nombre',$datos['nombre']);
                $this->db->bind(':email',$datos['email']);
                $this->db->bind(':telefono',$datos['telefono']);
                $this->db->bind(':id_rol',$datos['id_rol']);    

                if($this->db->execute()){
                    return true;
                } else {
                    return false;
                }
            }

            public function login($credenciales){
                $nombre = $credenciales['nombre'];
                $email = $credenciales['email'];
                $this->db->query('SELECT * FROM usuarios WHERE nombre=:nombre AND email=:email');
                $this->db->bind(':nombre',$nombre);
                $this->db->bind(':email',$email);
                return $this->db->rowCount();
            }
    }