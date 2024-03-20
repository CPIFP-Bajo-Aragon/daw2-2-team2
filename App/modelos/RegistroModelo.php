<?php
//Pasa las cosas del controlador aqui para hacer la consulta en la bd

    class RegistroModelo{
        private $db;
        private $datos;
        
        public function __construct(){
            $this->db= new Base;
        }

        
        public function addUser($datos){
            $this->db->query('INSERT INTO usuario (nif, nombre_usuario, apellidos_usuario, correo_usuario, contrasena_usuario, fecha_nacimiento_usuario, telefono_usuario, activo) VALUES (:NIF, :nombre, :apellido, :email, :contrasena, :fecha_nac, :telf, :activo) ');
        
            $this->db->bind(':NIF',$datos['nif']);
            $this->db->bind(':nombre',$datos['nombre']);
            $this->db->bind(':apellido',$datos['apellido']);
            $this->db->bind(':email',$datos['email']);   
            $this->db->bind(':contrasena',$datos['contrasena']);    
            $this->db->bind(':fecha_nac',$datos['fecha_nac']);    
            $this->db->bind(':telf',$datos['telf']);  
            $this->db->bind(':activo', 1);   


            $id_usuario = $this->db->executeLastId();
                
                    $this->db->query('INSERT INTO usuario_has_rol (
                        id_usuario,
                        id_rol
                    ) VALUES (
                        :id_usuario,
                        :rol
                    )');
                
                    $this->db->bind(':id_usuario', $id_usuario);
                    $this->db->bind(':rol', 2);
        
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        
        
        public function Notificacionbienvenido($NIF){
                
            $this->db->query("SELECT id_usuario FROM usuario WHERE nif='$NIF'");
            $id = $this->db->registro();

            $contenido_notificacion = '¡Bienvenido/a a nuestra plataforma! Esperamos que disfrutes de tu experiencia aquí.';
            $titulo_notificacion = 'Bienvenida a la plataforma';
            $this->db->query("INSERT INTO notificacion (leida_notificacion, contenido_notificacion, id_usuario, titulo_notificacion, fecha_leido) VALUES (0, '$contenido_notificacion', '$id', '$titulo_notificacion', NULL)");
            return $this->db->execute();
        
        }
            

        }

    