<?php
//Pasa las cosas del controlador aqui para hacer la consulta en la bd

    class AlquilerModelo{
            private $db;
            private $datos;

            public function __construct(){
                $this->db= new Base;
            }

            //posible uso mas adelante
    // public function obtenerAlquileres(){
    //     $this->db->query("SELECT * FROM inmueble");
    //     return $this->db->registros();
    // }

    // public function obtenerImagenes(){
    //     $this->db->query("SELECT imagen.nombre_imagen, imagen.formato_imagen 
    //                       FROM imagen, inmueble
    //                       WHERE imagen.id_inmueble=inmueble.id_inmueble
    //     ");
    //     return $this->db->registros();
    // }
    
    public function obtenerDatos(){
        $this->db->query("SELECT  GROUP_CONCAT(i.ruta_imagen) AS rutas_imagenes,
                                  ue.id_usuario, inm.id_municipio, 
                                  inm.id_inmueble, inm.metros_cuadrados_inmueble, inm.direccion_inmueble, inm.descripcion_inmueble,
                                  o.id_oferta, o.titulo_oferta, o.fecha_inicio_oferta, o.fecha_fin_oferta,
                                  oi.precio_inm, o.fecha_publicacion_oferta
                          FROM  oferta AS o
                          JOIN usuario_entidad AS ue ON ue.id_entidad = o.id_entidad
                          JOIN oferta_inmueble AS oi ON o.id_oferta = oi.id_oferta
                          JOIN inmueble AS inm ON inm.id_inmueble = oi.d_inmueble
                          JOIN imagen AS i ON i.id_inmueble = inm.id_inmueble
                          where o.activo=1 and o.id_negocio is NULL
                          GROUP BY inm.id_inmueble");

        return $this->db->registros();



        //HAY QUE ARREGLAR ESTA CONSULTA
        //HAY QUE ARREGLAR ESTA CONSULTA
        //HAY QUE ARREGLAR ESTA CONSULTA
        //HAY QUE ARREGLAR ESTA CONSULTA

        // $this->db->query("SELECT  GROUP_CONCAT(i.ruta_imagen) AS rutas_imagenes,
        //                         ue.id_usuario, inm.id_municipio, 
        //                         inm.id_inmueble, inm.metros_cuadrados_inmueble, inm.direccion_inmueble, inm.descripcion_inmueble,
        //                         o.id_oferta, o.titulo_oferta, o.fecha_inicio_oferta, o.fecha_fin_oferta,
        //                         oi.precio_inm
        //                     FROM  oferta AS o
        //                     JOIN usuario_entidad AS ue ON ue.id_entidad = o.id_entidad
        //                     JOIN oferta_inmueble AS oi ON o.id_oferta = oi.id_oferta
        //                     JOIN inmueble AS inm ON inm.id_inmueble = oi.d_inmueble
        //                     JOIN imagen AS i ON i.id_inmueble = inm.id_inmueble
        //                     where o.activo=1 and o.id_negocio is NULL
        //                     GROUP BY inm.id_inmueble");

        // $registros = $this->db->registros();
        // exit;
        // return $registros;
    }



    public function obtenerDatos2($max){
        $this->db->query("SELECT 
                          inm.id_municipio,inm.metros_cuadrados_inmueble,inm.direccion_inmueble, inm.descripcion_inmueble,
                          o.titulo_oferta, o.fecha_inicio_oferta, o.fecha_fin_oferta, oi.precio_inm
                          FROM oferta AS o, oferta_inmueble AS oi, inmueble AS inm
                          WHERE o.id_oferta=oi.id_oferta and inm.id_inmueble=oi.d_inmueble AND oi.id_oferta=1");
        return $this->db->registros();
    }



    public function ImagenesAlquiler($id){
        $this->db->query("SELECT *  FROM imagen, oferta_inmueble 
                                    WHERE oferta_inmueble.id_oferta=$id 
                                        AND imagen.id_inmueble = oferta_inmueble.d_inmueble");
        return $this->db->registros();
    }



    public function DatosInmueble($id){
        $this->db->query("SELECT * 
        FROM inmueble, 
        oferta_inmueble, 
        municipio, 
        estado
        WHERE oferta_inmueble.id_oferta=$id 
        AND inmueble.id_inmueble = oferta_inmueble.d_inmueble 
        AND inmueble.id_municipio=municipio.id_municipio 
        AND estado.id_estado=inmueble.id_estado");
        return $this->db->registro();
    }

    public function DatosVivienda($id){
        $this->db->query("SELECT * 
        FROM 
        inmueble, 
        oferta_inmueble, 
        vivienda
        WHERE oferta_inmueble.id_oferta=$id 
        AND inmueble.id_inmueble = oferta_inmueble.d_inmueble 
        AND inmueble.id_inmueble=vivienda.id_inmueble 
        ");
        return $this->db->registro();
    }



    public function DatosOferta($id){
        $this->db->query("SELECT * FROM oferta, oferta_inmueble WHERE oferta_inmueble.id_oferta=$id AND oferta.id_oferta = oferta_inmueble.id_oferta");
        return $this->db->registro();
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

        $this->db->bind(':contenido_notificacion', '¡Ha realizado la reserva de un alquiler!');
        $this->db->bind(':id_usuario', $id_usuario);
        $this->db->bind(':titulo_notificacion', 'Reserva alquiler');

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function reservarCheck($id){
        if(isset($_SESSION['UsuarioSesion']) && $_SESSION['UsuarioSesion'] != null) {

        $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;
     
        $this->db->query("SELECT * 
        FROM 
        usuario_oferta
        WHERE 
        id_usuario = :id_usuario 
        AND 
        id_oferta = :id_oferta
        ");

        $this->db->bind(':id_usuario', $id_usuario);
        $this->db->bind(':id_oferta', $id);

        return $this->db->registro();
        }else{
            return false;
        }
    }

    public function idusuarioAlquiler($id){


        $this->db->query("SELECT usuario.*
        FROM usuario
        JOIN usuario_entidad ON usuario.id_usuario = usuario_entidad.id_usuario
        JOIN oferta ON oferta.id_entidad = usuario_entidad.id_entidad
        WHERE oferta.id_oferta = :id_oferta;
              
        ");

        $this->db->bind(':id_oferta', $id);

        return $this->db->registro();
        
    }
    
}

