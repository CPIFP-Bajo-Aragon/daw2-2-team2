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

            public function anunciosUsuarios(){
                $nif = $_SESSION['UsuarioSesion']->NIF;
                $this->db->query("SELECT
                a.id_oferta,
                a.tipo_oferta,
                a.fecha_inicio,
                a.fecha_fin,
                a.condiciones,
                a.fecha_publicacion,
                a.tipo,
                a.NIF,
                a.id_entidad,
                i.codigo_inmueble,
                i.metros_cuadrados,
                i.distribucion,
                i.titulo,
                i.caracteristicas,
                i.descripcion,
                i.fotos,
                i.direccion,
                i.precio,
                i.ubicacion,
                i.tipo_alquiler,
                i.planta,
                i.planos,
                i.equipamiento,
                i.estado,
                i.id_municipio,
                m.nombre_municipio
              FROM oferta a
              LEFT JOIN inmueble i ON a.id_oferta = i.id_oferta
              LEFT JOIN municipio m ON i.id_municipio = m.id_municipio
              WHERE a.NIF = '$nif';              
                ");

                return $this->db->registros();
                //987654321B
            }

            //realiza un update de los datos modificados por el usuario de un anuncio(inmueble)
            public function modificarAnuncio($datos){

                //$nif = $_SESSION['UsuarioSesion']->NIF;

                $this->db->query('UPDATE inmueble SET
                titulo = :titulo,
                descripcion = :descripcion,
                metros_cuadrados = :metros_cuadrados,
                precio = :precio,
                caracteristicas = :caracteristicas,
                distribucion = :distribucion,
                direccion = :direccion,
                id_municipio = :id_municipio
                WHERE id_oferta = :id_oferta'); 
                                        
                $this->db->bind(':titulo',$datos['titulo']);
                $this->db->bind(':descripcion',$datos['descripcion']);
                $this->db->bind(':metros_cuadrados',$datos['metros_cuadrados']);
                $this->db->bind(':precio',$datos['precio']);
                $this->db->bind(':caracteristicas',$datos['caracteristicas']);
                $this->db->bind(':distribucion',$datos['distribucion']);
                $this->db->bind(':direccion',$datos['direccion']);
                $this->db->bind(':id_oferta',$datos['id_oferta']);
                $this->db->bind(':id_municipio',$datos['id_municipio']);


                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }
            }

            //recoge el id de los municipios con su nombre
            public function idmunicipios(){
                $this->db->query("SELECT * FROM municipio");

                return $this->db->registros();
            }

            public function NotificacionesActivas(){
                $nif = $_SESSION['UsuarioSesion']->NIF;
                $this->db->query("SELECT * FROM notificacion WHERE NIF='$nif' AND Leido=0");

                return $this->db->registros();
            }

            public function NumeroNotificacionesActivas(){
                $nif = $_SESSION['UsuarioSesion']->NIF;
                $this->db->query("SELECT * FROM notificacion WHERE NIF='$nif' AND Leido=0");
                $this->db->execute();  
                $rowCount = $this->db->rowCount();
                return $rowCount;  
            }
            

            public function NotificacioneNoActivas(){
                $nif = $_SESSION['UsuarioSesion']->NIF;
                $this->db->query("SELECT * FROM notificacion WHERE NIF='$nif' AND Leido=1 ORDER BY Fecha_Leido DESC ");
                return $this->db->registros();
                
            }

            public function NotificacionesLeidas($id){
                $nif = $_SESSION['UsuarioSesion']->NIF;
                $hora =  date("Y-m-d H:i:s");
                $this->db->query("UPDATE notificacion SET Fecha_Leido='$hora', Leido=1 WHERE id_notificacion=$id AND NIF='$nif'");
                return $this->db->registros();
            }


            // public function editarUsuario($datos){

            //     $this->db->query("SELECT * FROM usuario WHERE");

            // }
          

          
    }