<?php

    class AnuncioModelo{
            private $db;
            private $datos;

            public function __construct(){
                $this->db= new Base;
            }

            public function subirAnunciobd($datos) {
            
                $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;

                $nombre_usuario = $_SESSION['UsuarioSesion']->nombre_usuario;

                $cif_usuario = $_SESSION['UsuarioSesion']->nif;

                // print_r($datos);
                // exit;
                
                if($datos['crear_id_entidad'] == 1){
                    $this->db->query('INSERT INTO entidad (
                        nombre_entidad, 
                        cif_entidad, 
                        sector_entidad,
                        direccion_entidad, 
                        numero_telefono_entidad, 
                        correo_entidad, 
                        pagina_web_entidad,
                        activo
                        ) VALUES (
                        :nombre_entidad, 
                        :cif_entidad, 
                        :sector_entidad,
                        :direccion_entidad, 
                        :numero_telefono_entidad, 
                        :correo_entidad, 
                        :pagina_web_entidad,
                        :activo 
                        )');

                    $this->db->bind(':nombre_entidad', $nombre_usuario);
                    $this->db->bind(':cif_entidad', $cif_usuario);
                    $this->db->bind(':sector_entidad', "-");  
                    $this->db->bind(':direccion_entidad', "-");
                    $this->db->bind(':numero_telefono_entidad', "-");
                    $this->db->bind(':correo_entidad', "-");
                    $this->db->bind(':pagina_web_entidad', "-");
                    $this->db->bind(':activo', 1);


                    $id_entidad_creada = $this->db->executeLastId();
                    
                    
                    $this->db->query('INSERT INTO usuario_entidad (
                        id_usuario, 
                        id_entidad, 
                        rol
                        ) VALUES (
                        :id_usuario, 
                        :id_entidad, 
                        :rol
                        )');

                    $this->db->bind(':id_usuario', $id_usuario);
                    $this->db->bind(':id_entidad', $id_entidad_creada);
                    $this->db->bind(':rol', 1); 

                    $this->db->execute();

                }


                $this->db->query('INSERT INTO oferta (
                    titulo_oferta,
                    fecha_inicio_oferta,
                    fecha_fin_oferta,
                    condiciones_oferta,
                    descripcion_oferta,
                    id_entidad,
                    activo 	
                ) VALUES (
                    :titulo_oferta,
                    :fecha_inicio_oferta,
                    :fecha_fin_oferta,
                    :condiciones_oferta,
                    :descripcion_oferta,
                    :id_entidad,
                    :activo
                )');
            
                $this->db->bind(':titulo_oferta', $datos['titulo']);
                $this->db->bind(':fecha_inicio_oferta', $datos['inicio_oferta']);
                $this->db->bind(':fecha_fin_oferta', $datos['fin_oferta']);  
                $this->db->bind(':condiciones_oferta', $datos['condiciones_oferta']);
                $this->db->bind(':descripcion_oferta', $datos['descripcion_oferta']);
                $this->db->bind(':activo', 1);

                if(isset($id_entidad_creada)){
                    $this->db->bind(':id_entidad', $id_entidad_creada);
                }else{
                    $this->db->bind(':id_entidad', $datos['id_entidad']);
                }

                $oferta_id = $this->db->executeLastId();
            

                $this->db->query('INSERT INTO inmueble (
                        metros_cuadrados_inmueble,
                        descripcion_inmueble,
                        distribucion_inmueble,
                        precio_inmueble,
                        direccion_inmueble,
                        caracteristicas_inmueble,
                        equipamiento_inmueble,
                        id_municipio,
                        id_estado
                ) VALUES (
                        :metros_cuadrados_inmueble,
                        :descripcion_inmueble,
                        :distribucion_inmueble,
                        :precio_inmueble,
                        :direccion_inmueble,
                        :caracteristicas_inmueble,
                        :equipamiento_inmueble,
                        :id_municipio,
                        :id_estado
                )');
            
                $this->db->bind(':metros_cuadrados_inmueble', $datos['metros_cuadrados_inmueble']);
                $this->db->bind(':distribucion_inmueble', $datos['distribucion_inmueble']);
                $this->db->bind(':equipamiento_inmueble', $datos['equipamiento_inmueble']);
                $this->db->bind(':descripcion_inmueble', $datos['descripcion_inmueble']);
                $this->db->bind(':precio_inmueble', $datos['precio_inmueble']);
                $this->db->bind(':direccion_inmueble', $datos['direccion_inmueble']);
                $this->db->bind(':caracteristicas_inmueble', $datos['caracteristicas_inmueble']);
                $this->db->bind(':id_municipio', $datos['municipio']);
                $this->db->bind(':id_estado', $datos['estado']);
            
                $inmueble_id = $this->db->executeLastId();

                        foreach ($datos['imagenes'] as $imagen) {
                            $this->db->query("INSERT INTO imagen (nombre_imagen, formato_imagen, ruta_imagen, id_inmueble) 
                                                VALUES (:nombre_imagen, :formato_imagen, :ruta_imagen,:id_inmueble)");
                            
                            $this->db->bind(':nombre_imagen', $imagen['nombre']);
                            $this->db->bind(':formato_imagen', $imagen['formato']);
                            $this->db->bind(':ruta_imagen', $imagen['ruta']);
                            $this->db->bind(':id_inmueble', $inmueble_id);
                        
                            $this->db->execute(); 
                        }

                        $query = 'INSERT INTO local (
                            nombre_local, 
                            capacidad_local, 
                            recursos_local, 
                            id_inmueble
                            ) VALUES (
                            :nombre_local, 
                            :capacidad_local, 
                            :recursos_local, 
                            :id_inmueble)';

                        $this->db->query($query);

                        $this->db->bind(':nombre_local', $datos['nombre_local']);
                        $this->db->bind(':capacidad_local', $datos['capacidad_local']);
                        $this->db->bind(':recursos_local', $datos['recursos_local']);
                        $this->db->bind(':id_inmueble', $inmueble_id);

                        if($this->db->execute()) {
                                
                        } else {
                           return false;
                        }


                       $this->db->query('INSERT INTO vivienda (
                        habitaciones_vivienda, 
                        tipo_vivienda, 
                        id_inmueble
                        ) VALUES (
                        :habitaciones_vivienda, 
                        :tipo_vivienda, 
                        :id_inmueble
                        )');

                        $this->db->bind(':habitaciones_vivienda', $datos['num_habitaciones']);
                        $this->db->bind(':tipo_vivienda', $datos['tipo_vivienda']);
                        $this->db->bind(':id_inmueble', $inmueble_id);

                        if($this->db->execute()) {
                                
                        } else {
                           return false;
                        }

                        $this->db->query('INSERT INTO oferta_inmueble (
                            id_oferta, 
                            d_inmueble, 
                            precio_inm) VALUES (
                            :id_oferta, 
                            :id_inmueble, 
                            :precio_inm
                            )');
            
                        $this->db->bind(':id_oferta', $oferta_id);
                        $this->db->bind(':id_inmueble', $inmueble_id);
                        $this->db->bind(':precio_inm', $datos['precio_oferta']); 
            
                        if($this->db->execute()) {
                                
                         } else {
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
        
                $this->db->bind(':contenido_notificacion', '¡Ha subido un anuncio de alquiler!');
                $this->db->bind(':id_usuario', $id_usuario);
                $this->db->bind(':titulo_notificacion', 'Anuncio alquiler');
        
                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }
            }
            
            public function obtenerUltimoIdInmueble() {


                $this->db->query("SELECT MAX(id_inmueble) AS ultimo_id FROM inmueble");
               
                return $this->db->registros();
            }


            public function subirTraspasobd($datos){
                // print_r($datos);
                // exit;
                $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;

                $nombre_usuario = $_SESSION['UsuarioSesion']->nombre_usuario;

                $cif_usuario = $_SESSION['UsuarioSesion']->nif;

                //echo $datos['crear_id_entidad'];
                
                if($datos['crear_id_entidad'] == 1){
                    $this->db->query('INSERT INTO entidad (
                        nombre_entidad, 
                        cif_entidad, 
                        sector_entidad,
                        direccion_entidad, 
                        numero_telefono_entidad, 
                        correo_entidad, 
                        pagina_web_entidad,
                        activo
                        ) VALUES (
                        :nombre_entidad, 
                        :cif_entidad, 
                        :sector_entidad,
                        :direccion_entidad, 
                        :numero_telefono_entidad, 
                        :correo_entidad, 
                        :pagina_web_entidad,
                        :activo 
                        )');

                    $this->db->bind(':nombre_entidad', $nombre_usuario);
                    $this->db->bind(':cif_entidad', $cif_usuario);
                    $this->db->bind(':sector_entidad', "-");  
                    $this->db->bind(':direccion_entidad', "-");
                    $this->db->bind(':numero_telefono_entidad', "-");
                    $this->db->bind(':correo_entidad', "-");
                    $this->db->bind(':pagina_web_entidad', "-");
                    $this->db->bind(':activo', 1);


                    $id_entidad_creada = $this->db->executeLastId();
                    
                    
                    $this->db->query('INSERT INTO usuario_entidad (
                        id_usuario, 
                        id_entidad, 
                        rol
                        ) VALUES (
                        :id_usuario, 
                        :id_entidad, 
                        :rol
                        )');

                    $this->db->bind(':id_usuario', $id_usuario);
                    $this->db->bind(':id_entidad', $id_entidad_creada);
                    $this->db->bind(':rol', 1); 

                    $this->db->execute();

                }

                $this->db->query('INSERT INTO inmueble (
                    metros_cuadrados_inmueble,
                    descripcion_inmueble,
                    distribucion_inmueble,
                    precio_inmueble,
                    direccion_inmueble,
                    caracteristicas_inmueble,
                    equipamiento_inmueble,
                    id_municipio,
                    id_estado
                ) VALUES (
                    :metros_cuadrados_inmueble,
                    :descripcion_inmueble,
                    :distribucion_inmueble,
                    :precio_inmueble,
                    :direccion_inmueble,
                    :caracteristicas_inmueble,
                    :equipamiento_inmueble,
                    :id_municipio,
                    :estado
                )');

                $this->db->bind(':metros_cuadrados_inmueble', $datos['metros_cuadrados_inmueble']);
                $this->db->bind(':descripcion_inmueble', nl2br($datos['descripcion_inmueble']));
                $this->db->bind(':distribucion_inmueble', nl2br($datos['distribucion_inmueble']));
                $this->db->bind(':precio_inmueble', $datos['precio_inmueble']);
                $this->db->bind(':direccion_inmueble', $datos['direccion_inmueble']);
                $this->db->bind(':caracteristicas_inmueble', nl2br($datos['caracteristicas_inmueble']));
                $this->db->bind(':equipamiento_inmueble', nl2br($datos['equipamiento_inmueble']));
                // $this->db->bind(':latitud_inmueble', $datos['latitud_inmueble']);
                // $this->db->bind(':longitud_inmueble', $datos['longitud_inmueble']);
                $this->db->bind(':id_municipio', $datos['municipio']);
                $this->db->bind(':estado', $datos['estado']);

                $inmueble_id = $this->db->executeLastId();


                foreach ($datos['imagenes'] as $imagen) {
                    $this->db->query("INSERT INTO imagen (nombre_imagen, formato_imagen, ruta_imagen, id_inmueble) 
                                        VALUES (:nombre_imagen, :formato_imagen, :ruta_imagen,:id_inmueble)");
                    
                    $this->db->bind(':nombre_imagen', $imagen['nombre']);
                    $this->db->bind(':formato_imagen', $imagen['formato']);
                    $this->db->bind(':ruta_imagen', $imagen['ruta']);
                    $this->db->bind(':id_inmueble', $inmueble_id);
                
                    $this->db->execute(); 
                }
            
                
                $this->db->query('INSERT INTO local (
                    nombre_local,
                    capacidad_local,
                    recursos_local,
                    id_inmueble

                ) VALUES (
                    :nombre_local,
                    :capacidad_local,
                    :recursos_local,
                    :id_inmueble

                )');
                
                $this->db->bind(':nombre_local', $datos['nombre_local']);
                $this->db->bind(':capacidad_local', $datos['capacidad_local']);
                $this->db->bind(':recursos_local', $datos['recursos_local']);
                $this->db->bind(':id_inmueble', $inmueble_id);

                $local_id = $this->db->executeLastId();
                

                $this->db->query('INSERT INTO negocio (
                    titulo_negocio,
                    motivo_traspaso_negocio,
                    coste_traspaso_negocio,
                    coste_mensual_negocio,
                    descripcion_negocio,
                    capital_minimo_negocio,
                    local_id_inmueble

                ) VALUES (
                    :titulo_negocio,
                    :motivo_traspaso_negocio,
                    :coste_traspaso_negocio,
                    :coste_mensual_negocio,
                    :descripcion_negocio,
                    :capital_minimo_negocio,
                    :local_id_inmueble

                )');

                $this->db->bind(':titulo_negocio', $datos['titulo_negocio']);
                $this->db->bind(':motivo_traspaso_negocio', $datos['motivo_traspaso_negocio']);
                $this->db->bind(':coste_traspaso_negocio', $datos['coste_traspaso_negocio']);
                $this->db->bind(':coste_mensual_negocio', $datos['coste_mensual_negocio']);
                $this->db->bind(':descripcion_negocio', $datos['descripcion_negocio']);
                $this->db->bind(':capital_minimo_negocio', $datos['capital_minimo_negocio']);
                $this->db->bind(':local_id_inmueble', $local_id);

                $negocio_id = $this->db->executeLastId();
                

            
                $this->db->query('INSERT INTO oferta (
                    titulo_oferta,
                    fecha_inicio_oferta,
                    fecha_fin_oferta,
                    condiciones_oferta,
                    descripcion_oferta,
                    id_entidad,
                    id_negocio,
                    activo

                ) VALUES (

                    :titulo_oferta,
                    :fecha_inicio_oferta,
                    :fecha_fin_oferta,
                    :condiciones_oferta,
                    :descripcion_oferta,
                    :id_entidad,
                    :id_negocio,
                    :activo       

                )');

                $this->db->bind(':titulo_oferta', $datos['titulo_oferta']);
                $this->db->bind(':fecha_inicio_oferta', $datos['inicio_oferta']);
                $this->db->bind(':fecha_fin_oferta', $datos['fin_oferta']);
                $this->db->bind(':condiciones_oferta', $datos['condiciones_oferta']);
                $this->db->bind(':descripcion_oferta', $datos['descripcion_oferta']);
                $this->db->bind(':id_negocio', $negocio_id);
                $this->db->bind(':activo', 1);

                if(isset($id_entidad_creada)){
                    $this->db->bind(':id_entidad', $id_entidad_creada);
                }else{
                    $this->db->bind(':id_entidad', $datos['id_entidad']);
                }

                $oferta_id = $this->db->executeLastId();
                
    
                $this->db->query('INSERT INTO oferta_inmueble (
                    id_oferta, 
                    d_inmueble, 
                    precio_inm

                    ) VALUES (

                    :id_oferta, 
                    :id_inmueble, 
                    :precio_inm
                    )');

                $this->db->bind(':id_oferta', $oferta_id);
                $this->db->bind(':id_inmueble', $inmueble_id);
                $this->db->bind(':precio_inm', $datos['precio_inm']); 
        
                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }                
                
                //
                //$this->db->bind(':id_entidad', $datos['id_entidad']);
                //

            
            }

            public function addNotificacionReservaTraspasobd(){

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
        
                $this->db->bind(':contenido_notificacion', '¡Ha subido un anuncio de un traspaso!');
                $this->db->bind(':id_usuario', $id_usuario);
                $this->db->bind(':titulo_notificacion', 'Anuncio traspaso');
        
                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }
            }
            
    }