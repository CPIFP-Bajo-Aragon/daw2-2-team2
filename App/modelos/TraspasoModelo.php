<?php

    class TraspasoModelo{
            private $db;
            private $datos;

            public function __construct(){
                $this->db= new Base;
            }
    
    public function obtenerTraspasos($where){
        
        $this->db->query("SELECT 
        inmueble.*,
        local.*,
        negocio.*,
        oferta.*,
        oferta_inmueble.*,
        estado.estado,
        municipio.nombre_municipio,
        municipio.provincia_municipio,
        municipio.codigo_postal_municipio,
        usuario_entidad.id_usuario
        FROM 
            inmueble
        JOIN 
            local ON inmueble.id_inmueble = local.id_inmueble
        JOIN 
            negocio ON local.id_local = negocio.local_id_inmueble
        JOIN 
            oferta ON negocio.id_negocio = oferta.id_negocio
        JOIN 
            oferta_inmueble ON oferta.id_oferta = oferta_inmueble.id_oferta
        JOIN 
            estado ON inmueble.id_estado = estado.id_estado
        JOIN 
            municipio ON inmueble.id_municipio = municipio.id_municipio
        JOIN 
            usuario_entidad ON oferta.id_entidad = usuario_entidad.id_entidad

        
        WHERE $where
             ;
          
        ");

        return $this->db->registros();

        
    }


    public function obtenerTraspasosimagenes($id){
        $this->db->query("SELECT * FROM imagen WHERE imagen.id_inmueble=$id");
        return $this->db->registros();

    }

    public function vermasTraspaso($datos){
        $this->db->query("SELECT 
        inmueble.*,
        local.*,
        negocio.*,
        oferta.*,
        oferta_inmueble.*,
        estado.estado,
        municipio.nombre_municipio,
        municipio.provincia_municipio,
        municipio.codigo_postal_municipio
        FROM 
            inmueble
        JOIN 
            local ON inmueble.id_inmueble = local.id_inmueble
        JOIN 
            negocio ON local.id_local = negocio.local_id_inmueble
        JOIN 
            oferta ON negocio.id_negocio = oferta.id_negocio
        JOIN 
            oferta_inmueble ON oferta.id_oferta = oferta_inmueble.id_oferta
        JOIN 
            estado ON inmueble.id_estado = estado.id_estado
        JOIN 
            municipio ON inmueble.id_municipio = municipio.id_municipio
        WHERE 
            oferta.activo = 1 AND negocio.id_negocio IS NOT NULL AND inmueble.id_inmueble = :id_inmueble
        "); 

        $this->db->bind(':id_inmueble', $datos['id_inmueble']);

        return $this->db->registros();

    }

    public function vermasTraspasoImg($datos){
        $this->db->query("SELECT *
        FROM imagen
        WHERE id_inmueble = :id_inmueble
        ");

        $this->db->bind(':id_inmueble', $datos['id_inmueble']);

        return $this->db->registros();

    }

    public function obtenerMunicicipios(){
        $this->db->query('SELECT * FROM municipio');
        return $this->db->registros();
    }

    public function reservar($datos){

        $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;
        
        $this->db->query('INSERT INTO usuario_oferta (
            id_usuario,
            id_oferta
            ) VALUES(
            :id_usuario,
            :id_oferta
            )');

        $this->db->bind(':id_usuario', $id_usuario);
        $this->db->bind(':id_oferta', $datos['id_oferta']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function addNotificacionReserva(){

        $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;
        
        $this->db->query('INSERT INTO notificacion (
            contenido_notificacion,
            id_usuario,
            titulo_notificacion
            ) VALUES(
            :contenido_notificacion,
            :id_usuario,
            :titulo_notificacion
            )');

        $this->db->bind(':contenido_notificacion', '¡Ha realizado la reserva de un traspaso!');
        $this->db->bind(':id_usuario', $id_usuario);
        $this->db->bind(':titulo_notificacion', 'Reserva traspaso');

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    

    public function reservarCheck($vermas){

        if(isset($_SESSION['UsuarioSesion']) && $_SESSION['UsuarioSesion'] != null) {
        $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;

        $this->db->query("SELECT *
        FROM usuario_oferta
        LEFT JOIN oferta_inmueble ON usuario_oferta.id_oferta = oferta_inmueble.id_oferta
        WHERE (oferta_inmueble.d_inmueble = :id_inmueble OR oferta_inmueble.d_inmueble IS NULL)
        AND usuario_oferta.id_usuario = :id_usuario;
        
        
        ");

        $this->db->bind(':id_inmueble', $vermas['id_inmueble']);
        $this->db->bind(':id_usuario', $id_usuario);

        return $this->db->registros();
        }else{
            return false;
        }

    }

    public function idusuarioTraspaso($vermas){

        $this->db->query("SELECT ue.id_usuario
        FROM oferta_inmueble oi
        JOIN oferta o ON oi.id_oferta = o.id_oferta
        JOIN usuario_entidad ue ON o.id_entidad = ue.id_entidad
        WHERE oi.d_inmueble = :id_inmueble;
        ");

        $this->db->bind(':id_inmueble', $vermas['id_inmueble']);

        
        return $this->db->registros();

    }

    }
