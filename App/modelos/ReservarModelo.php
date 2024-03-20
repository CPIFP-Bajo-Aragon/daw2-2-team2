<?php

    class ReservarModelo{
        private $db;
        private $datos;

        public function __construct(){
            $this->db= new Base;
        }
        
        public function MostrarReservas(){

            $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;

            $this->db->query(
            "SELECT usuario_oferta.*, 
            oferta.id_oferta, 
            oferta.titulo_oferta, 
            oferta.fecha_inicio_oferta, 
            oferta.fecha_fin_oferta, 
            oferta.condiciones_oferta, 
            oferta.descripcion_oferta, 
            oferta.fecha_publicacion_oferta, 
            oferta.id_entidad, 
            oferta.id_negocio, 
            oferta.activo
            FROM usuario_oferta
            JOIN oferta ON usuario_oferta.id_oferta = oferta.id_oferta
            WHERE usuario_oferta.id_usuario = $id_usuario AND oferta.activo = 1;
            
            ");

            return $this->db->registros();
            
        }

        public function EliminarReserva($datos){

            $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;

            $this->db->query("DELETE 
            FROM usuario_oferta 
            WHERE id_usuario = :id_usuario
            AND id_oferta = :id_oferta
            ");

            $this->db->bind(':id_usuario', $id_usuario);
            $this->db->bind(':id_oferta', $datos['id_oferta']);

            $this->db->execute();

        }

        public function MostrarReservasAMi(){

            $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;

            $this->db->query("SELECT DISTINCT oferta.*
            FROM usuario
            JOIN usuario_entidad ON usuario.id_usuario = usuario_entidad.id_usuario
            JOIN oferta ON usuario_entidad.id_entidad = oferta.id_entidad
            JOIN usuario_oferta ON oferta.id_oferta = usuario_oferta.id_oferta
            WHERE usuario.id_usuario = $id_usuario;
            ");

            return $this->db->registros();

        }
        public function MostrarUsuarios($id){

            $this->db->query("SELECT usuario.*
            FROM usuario, usuario_oferta
            WHERE usuario_oferta.id_oferta = $id AND usuario.id_usuario = usuario_oferta.id_usuario;
            
            ");

            return $this->db->registros();
        }

    }
