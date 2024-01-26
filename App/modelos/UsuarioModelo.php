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

            public function documentosUsuarios(){
                //session_start();
                $nif = $_SESSION['UsuarioSesion']->NIF;
                $this->db->query("SELECT * FROM documento WHERE documento.NIF='$nif'");

                return $this->db->registros();

            }

            public function eliminardocumentosUsuarios($datos){
                $this->db->query('DELETE FROM documento WHERE id_documento = :id_documento');

                $this->db->bind(':id_documento' ,$datos['id_documento']);

                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }

            }



            // public function editarUsuario($datos){

            //     $this->db->query("SELECT * FROM usuario WHERE");

            // }
          

          
    }