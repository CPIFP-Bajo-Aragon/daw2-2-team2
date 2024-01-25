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


            public function datosUsuarios(){
                $this->db->query("SELECT * FROM usuario");
        
                return $this->db->registros();
        
            }
          

      
    }