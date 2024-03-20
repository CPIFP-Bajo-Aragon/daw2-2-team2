<?php
//Pasa las cosas del controlador aqui para hacer la consulta en la bd

    class UsuarioModelo{
            private $db;
            private $datos;

            public function __construct(){
                $this->db= new Base;
            }

            public function obtenerUsuarios(){
                $this->db->query('SELECT * FROM usuarios NATURAL JOIN roles GROUP BY Nombre');
                return $this->db->registros();
            }

            public function datosUsuarios(){
                //$nif = $_SESSION['UsuarioSesion']->NIF;
                $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;
                $this->db->query("SELECT * FROM usuario WHERE id_usuario = '$id_usuario'");
        
                return $this->db->registros();
        
            }

            public function documentosUsuarios(){
                //session_start();
                //$nif = $_SESSION['UsuarioSesion']->NIF;
                $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;
                $this->db->query("SELECT * FROM documento WHERE documento.id_usuario='$id_usuario'");

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

            public function anunciosUsuarios() {
                $nif = $_SESSION['UsuarioSesion']->nif;
            
                $this->db->query("SELECT 
                inmueble.id_inmueble,
                inmueble.metros_cuadrados_inmueble,
                inmueble.descripcion_inmueble,
                inmueble.distribucion_inmueble,
                inmueble.precio_inmueble,
                inmueble.direccion_inmueble,
                inmueble.caracteristicas_inmueble,
                inmueble.equipamiento_inmueble,
                inmueble.latitud_inmueble,
                inmueble.longitud_inmueble,
                inmueble.id_municipio,
                inmueble.id_estado,
                oferta.id_oferta,
                oferta.titulo_oferta,
                oferta.fecha_inicio_oferta,
                oferta.fecha_fin_oferta,
                oferta.condiciones_oferta,
                oferta.descripcion_oferta,
                oferta.fecha_publicacion_oferta,
                oferta.activo,
                oferta.id_entidad,
                oferta.id_negocio,
                oferta_inmueble.precio_inm,
                entidad.nombre_entidad,
                entidad.correo_entidad,
                entidad.cif_entidad,
                estado.estado,
                municipio.nombre_municipio,
                MIN(imagen.ruta_imagen) AS ruta_imagen,
                vivienda.id_vivienda,
                vivienda.habitaciones_vivienda,
                vivienda.tipo_vivienda
            FROM 
                inmueble
            JOIN 
                oferta_inmueble ON inmueble.id_inmueble = oferta_inmueble.d_inmueble
            JOIN 
                oferta ON oferta_inmueble.id_oferta = oferta.id_oferta
            JOIN 
                entidad ON oferta.id_entidad = entidad.id_entidad
            JOIN 
                estado ON inmueble.id_estado = estado.id_estado
            JOIN 
                municipio ON inmueble.id_municipio = municipio.id_municipio
            LEFT JOIN 
                imagen ON inmueble.id_inmueble = imagen.id_inmueble
            LEFT JOIN
                vivienda ON inmueble.id_inmueble = vivienda.id_inmueble
            WHERE 
                entidad.cif_entidad = '$nif'
            AND
                oferta.activo = 1
            AND 
                oferta.id_negocio IS NULL
            GROUP BY
                inmueble.id_inmueble;

                ");
            
                return $this->db->registros();
            }


            public function anunciosUsuariosTraspasos() {
                $nif = $_SESSION['UsuarioSesion']->nif;
            
                $this->db->query("SELECT 
                inmueble.id_inmueble,
                inmueble.metros_cuadrados_inmueble,
                inmueble.descripcion_inmueble,
                inmueble.distribucion_inmueble,
                inmueble.precio_inmueble,
                inmueble.direccion_inmueble,
                inmueble.caracteristicas_inmueble,
                inmueble.equipamiento_inmueble,
                inmueble.latitud_inmueble,
                inmueble.longitud_inmueble,
                inmueble.id_municipio,
                inmueble.id_estado,
                oferta.id_oferta,
                oferta.titulo_oferta,
                oferta.fecha_inicio_oferta,
                oferta.fecha_fin_oferta,
                oferta.condiciones_oferta,
                oferta.descripcion_oferta,
                oferta.fecha_publicacion_oferta,
                oferta.activo,
                oferta.id_entidad,
                oferta.id_negocio,
                oferta_inmueble.precio_inm,
                entidad.nombre_entidad,
                entidad.correo_entidad,
                entidad.cif_entidad,
                estado.estado,
                municipio.nombre_municipio,
                MIN(imagen.ruta_imagen) AS ruta_imagen,
                local.id_local,
                local.nombre_local,
                local.capacidad_local,
                local.recursos_local,
                local.id_inmueble AS local_id_inmueble,
                negocio.id_negocio,
                negocio.titulo_negocio,
                negocio.motivo_traspaso_negocio,
                negocio.coste_traspaso_negocio,
                negocio.coste_mensual_negocio,
                negocio.descripcion_negocio,
                negocio.capital_minimo_negocio
            FROM 
                inmueble
            JOIN 
                oferta_inmueble ON inmueble.id_inmueble = oferta_inmueble.d_inmueble
            JOIN 
                oferta ON oferta_inmueble.id_oferta = oferta.id_oferta
            JOIN 
                entidad ON oferta.id_entidad = entidad.id_entidad
            JOIN 
                estado ON inmueble.id_estado = estado.id_estado
            JOIN 
                municipio ON inmueble.id_municipio = municipio.id_municipio
            LEFT JOIN 
                imagen ON inmueble.id_inmueble = imagen.id_inmueble
            LEFT JOIN 
                local ON inmueble.id_inmueble = local.id_inmueble
            LEFT JOIN 
                negocio ON oferta.id_negocio = negocio.id_negocio
            WHERE 
                entidad.cif_entidad = '$nif'
                AND oferta.activo = 1
                AND oferta.id_negocio IS NOT NULL
            GROUP BY
                inmueble.id_inmueble;            
                ");
            
                return $this->db->registros();
            }
            
            
            //realiza un update de los datos modificados por el usuario de un anuncio(inmueble)
            public function modificarAnuncio($datos){

                    // print_r($datos);
                    // exit;

                $this->db->query('UPDATE inmueble SET
                -- titulo = :titulo,
                descripcion_inmueble = :descripcion,
                metros_cuadrados_inmueble = :metros_cuadrados,
                precio_inmueble = :precio,
                caracteristicas_inmueble = :caracteristicas,
                equipamiento_inmueble = :equipamiento,
                distribucion_inmueble = :distribucion,
                direccion_inmueble = :direccion,
                id_municipio = :id_municipio,
                id_estado = :id_estado
                WHERE id_inmueble = :id_inmueble'); 
                                        
                //$this->db->bind(':titulo',$datos['titulo']);
                $this->db->bind(':descripcion',$datos['descripcion']);
                $this->db->bind(':metros_cuadrados',$datos['metros_cuadrados']);
                $this->db->bind(':precio',$datos['precio']);
                $this->db->bind(':caracteristicas',$datos['caracteristicas']);
                $this->db->bind(':equipamiento',$datos['equipamiento']);
                $this->db->bind(':distribucion',$datos['distribucion']);
                $this->db->bind(':direccion',$datos['direccion']);
                $this->db->bind(':id_estado',$datos['id_estado']);
                $this->db->bind(':id_municipio',$datos['id_municipio']);
                $this->db->bind(':id_inmueble',$datos['id_inmueble']);

                $this->db->execute();                


                $this->db->query('UPDATE vivienda SET
                habitaciones_vivienda = :num_habitaciones,
                tipo_vivienda = :tipo_vivienda
                WHERE id_vivienda = :id_vivienda'); 

                $this->db->bind(':id_vivienda',$datos['id_vivienda']);
                $this->db->bind(':num_habitaciones',$datos['num_habitaciones']);
                $this->db->bind(':tipo_vivienda',$datos['tipo_vivienda']);

                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }

            }

            public function modificarAnuncioOferta($datos){

                // print_r($datos);
                // exit;

                $this->db->query('UPDATE oferta SET
                titulo_oferta = :titulooferta,
                fecha_inicio_oferta = :iniciooferta,
                fecha_fin_oferta = :finoferta,
                condiciones_oferta = :condicionesoferta,
                descripcion_oferta = :descripcionoferta
                WHERE id_oferta = :id_oferta'); 

                $this->db->bind(':titulooferta',$datos['titulooferta']);
                $this->db->bind(':iniciooferta',$datos['iniciooferta']);
                $this->db->bind(':finoferta',$datos['finoferta']);
                $this->db->bind(':condicionesoferta',$datos['condicionesoferta']);
                $this->db->bind(':descripcionoferta',$datos['descripcionoferta']);
                $this->db->bind(':id_oferta',$datos['id_oferta']);

                if($this->db->execute()){
                    $this->db->query('UPDATE oferta_inmueble SET
                    precio_inm = :precio_oferta
                    WHERE id_oferta = :id_oferta'); 
                                                
                    $this->db->bind(':id_oferta',$datos['id_oferta']);
                    $this->db->bind(':precio_oferta',$datos['precio_oferta']);

                    $this->db->execute();
                } else {
                    return false; // Si la segunda consulta falla, retornar false
                }

                // print_r($datos);
                // exit;

                // // Si la primera consulta se ejecuta correctamente, continuar con la segunda consulta
                // $this->db->query('UPDATE oferta_inmueble SET
                //                 precio_inm = :precio_oferta
                //                 WHERE id_oferta = :id_oferta'); 
                                                            
                // $this->db->bind(':id_oferta',$datos['id_oferta']);
                // $this->db->bind(':precio_oferta',$datos['precio_oferta']);

                    // Ejecutar la segunda consulta
                
                

            }

            public function modificarAnuncioOfertaNegocio($datos){

                $this->db->query('UPDATE negocio SET
                titulo_negocio = :titulo_negocio,
                motivo_traspaso_negocio = :motivo_traspaso_negocio,
                coste_traspaso_negocio = :coste_traspaso_negocio,
                coste_mensual_negocio = :coste_mensual_negocio,
                descripcion_negocio = :descripcion_negocio,
                capital_minimo_negocio = :capital_minimo_negocio
                WHERE id_negocio = :id_negocio'); 
                                        
                $this->db->bind(':titulo_negocio', $datos['titulo_negocio']);
                $this->db->bind(':motivo_traspaso_negocio', $datos['motivo_traspaso_negocio']);
                $this->db->bind(':coste_traspaso_negocio', $datos['coste_traspaso_negocio']);
                $this->db->bind(':coste_mensual_negocio', $datos['coste_mensual_negocio']);
                $this->db->bind(':descripcion_negocio', $datos['descripcion_negocio']);
                $this->db->bind(':capital_minimo_negocio', $datos['capital_minimo_negocio']);
                $this->db->bind(':id_negocio', $datos['id_negocio']);

                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }
            }

            public function modificarAnuncioOfertaLocal($datos){

                $this->db->query('UPDATE local SET
                nombre_local = :nombre_local,
                capacidad_local = :capacidad_local,
                recursos_local = :recursos_local
                WHERE id_inmueble = :id_inmueble'); 
                                        
                $this->db->bind(':nombre_local', $datos['nombre_local']);
                $this->db->bind(':capacidad_local', $datos['capacidad_local']);
                $this->db->bind(':recursos_local', $datos['recursos_local']);
                $this->db->bind(':id_inmueble', $datos['id_inmueble']);

                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }
            }

            public function cambiar_contrasena($datos){


                $this->db->query('UPDATE usuario SET
                 contrasena_usuario= :contrasena_usuario
                WHERE nif=:nif');


                $this->db->bind(':contrasena_usuario',$datos['contrasena']);
                $this->db->bind(':nif',$datos['nif']);




                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }
            }

            


            //Eliminar anuncio 
            public function eliminarAnuncio($datos){
                $this->db->query('UPDATE oferta
                SET activo = 0
                WHERE id_oferta = :id_oferta'); 

                $this->db->bind(':id_oferta',$datos['id_oferta']);

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

            public function idestados(){
                $this->db->query("SELECT * FROM estado");

                return $this->db->registros();
            }


            public function NotificacionesActivas(){
                $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;
                $this->db->query("SELECT * FROM notificacion WHERE id_usuario='$id_usuario' AND leida_notificacion=0 ORDER BY id_notificacion DESC" );

                return $this->db->registros();
            }

            public function NumeroNotificacionesActivas(){
                if (session_status() == PHP_SESSION_NONE) {
                    session_start(); 
                }
                if (isset($_SESSION['UsuarioSesion'])) {
                    $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;
                    $this->db->query("SELECT * FROM notificacion WHERE id_usuario='$id_usuario' AND leida_notificacion=0");
                    $this->db->execute();  
                    $rowCount = $this->db->rowCount();
                    return $rowCount;  
                } else {
                    return 0; 
                }
            }
            

            public function NotificacioneNoActivas(){
                $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;
                $this->db->query("SELECT * FROM notificacion WHERE id_usuario='$id_usuario' AND leida_notificacion=1 ORDER BY Fecha_Leido DESC ");
                return $this->db->registros();
                
            }

            public function NotificacionesLeidas($id){
                $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;
                $hora =  date("Y-m-d H:i:s");
                $this->db->query("UPDATE notificacion SET Fecha_Leido='$hora', leida_notificacion=1 WHERE id_notificacion=$id AND id_usuario='$id_usuario'");
                return $this->db->registros();
            }

            public function NotificacionesDesLeidas($id){
                $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;
                $hora =  date("Y-m-d H:i:s");
                $this->db->query("UPDATE notificacion SET Fecha_Leido='$hora', leida_notificacion=0 WHERE id_notificacion=$id AND id_usuario='$id_usuario'");
                return $this->db->registros();
            }

        


            public function editarUsuarios($datos){

                // print_r($datos);
                // exit;

                $this->db->query("UPDATE usuario
                SET nombre_usuario = :nombre, 
                apellidos_usuario = :apellido, 
                correo_usuario = :mail,
                fecha_nacimiento_usuario = :fnacimiento,
                telefono_usuario = :telefono
                WHERE nif = :nif;
                ");

                $this->db->bind(':nombre',$datos['nombre']);
                $this->db->bind(':apellido',$datos['apellido']);
                $this->db->bind(':fnacimiento',$datos['fnacimiento']);
                $this->db->bind(':telefono',$datos['telefono']);
                $this->db->bind(':mail',$datos['mail']);
                $this->db->bind(':nif',$datos['nif']);

                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }
            }

            public function identidad(){

                $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;

                $this->db->query("SELECT entidad.id_entidad, 
                entidad.nombre_entidad, 
                entidad.cif_entidad, 
                entidad.sector_entidad, 
                entidad.direccion_entidad, 
                entidad.numero_telefono_entidad, 
                entidad.correo_entidad, 
                entidad.pagina_web_entidad, 
                usuario_entidad.id_usuario

                FROM usuario_entidad
                JOIN entidad ON usuario_entidad.id_entidad = entidad.id_entidad
                WHERE usuario_entidad.id_usuario = '$id_usuario'
                "); 

                return $this->db->registros();

            }

            public function subirDocumento($datos){

                //$nif = $_SESSION['UsuarioSesion']->NIF;
                $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;

                // print_r($datos);
                // exit;

                $this->db->query('INSERT INTO documento (
                    nombre_documento,
                    descripcion_documento,
                    tipo_documento,
                    ruta_archivo,
                    id_usuario
                    ) VALUES(
                    :nombre_documento,
                    :descripcion_documento,
                    :tipo_documento,
                    :ruta_archivo,
                    :id_usuario
                    )');

                $this->db->bind(':nombre_documento', $datos['nombre_documento']);
                $this->db->bind(':descripcion_documento', $datos['descripcion_documento']);
                $this->db->bind(':tipo_documento', $datos['tipo_documento']);
                $this->db->bind(':ruta_archivo', $datos['ruta_archivo']);
                $this->db->bind(':id_usuario', $id_usuario);


                


                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }
            }

            public function obtenerrol($id){
                $this->db->query("SELECT id_rol FROM usuario_has_rol WHERE id_usuario=$id");
                return $this->db->registro();
            }
      
    }