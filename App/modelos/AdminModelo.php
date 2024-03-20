<?php


    class AdminModelo{
            private $db;




            public function __construct(){
                $this->db= new Base;
            }


            //inmuebles


            public function mostrarinmueblespaginados($datos_por_pagina, $offset){
                $this->db->query("SELECT * FROM inmueble LIMIT :limite OFFSET :offset");
                $this->db->bind(':limite', $datos_por_pagina);
                $this->db->bind(':offset', $offset);
                return $this->db->registros();
            }

            public function totalinmuebles(){
                $this->db->query("SELECT * FROM inmueble");
                return $this->db->rowCount();
            }



            public function modificarInmueble($datos) {
                $this->db->query("UPDATE inmueble
                                  SET metros_cuadrados_inmueble=:metros_cuadrados_inmueble,
                                      descripcion_inmueble=:descripcion_inmueble,
                                      distribucion_inmueble=:distribucion_inmueble,
                                      precio_inmueble=:precio_inmueble,
                                      caracteristicas_inmueble=:caracteristicas_inmueble,
                                      equipamiento_inmueble=:equipamiento_inmueble
                                  WHERE id_inmueble=:id_inmueble");
           
                $this->db->bind(':metros_cuadrados_inmueble', $datos['metros_cuadrados_inmueble']);
                $this->db->bind(':descripcion_inmueble', $datos['descripcion_inmueble']);
                $this->db->bind(':distribucion_inmueble', $datos['distribucion_inmueble']);
                $this->db->bind(':precio_inmueble', $datos['precio_inmueble']);
                $this->db->bind(':caracteristicas_inmueble', $datos['caracteristicas_inmueble']);
                $this->db->bind(':equipamiento_inmueble', $datos['equipamiento_inmueble']);
                $this->db->bind(':id_inmueble', $datos['id_inmueble']);
           
                $this->db->execute();
            }
           
            public function borrarinmueble($id){
                $this->db->query("  UPDATE inmueble
                SET activo=0
                WHERE id_inmueble=$id");
                $this->db->execute();
            }


            public function activarinmueble($id){
                $this->db->query("  UPDATE oferta
                SET activo=1
                WHERE id_inmueble=$id");
                $this->db->execute();
            }



            //ofertas


            public function mostrarofertaspaginadas($datos_por_pagina, $offset){
                $this->db->query("SELECT * FROM oferta 
                                  INNER JOIN oferta_inmueble ON oferta.id_oferta = oferta_inmueble.id_oferta 
                                  LIMIT :limite OFFSET :offset");
                $this->db->bind(':limite', $datos_por_pagina);
                $this->db->bind(':offset', $offset);
                return $this->db->registros();
            }
            
            public function totalofertas(){
                $this->db->query("SELECT * FROM oferta");
                return $this->db->rowCount();
            }
            
            public function modificaroferta($datos){
                $this->db->query("UPDATE oferta
                                  SET titulo_oferta=:titulo_oferta,
                                      fecha_inicio_oferta=:fecha_inicio_oferta,
                                      fecha_fin_oferta=:fecha_fin_oferta,
                                      condiciones_oferta=:condiciones_oferta,
                                      descripcion_oferta=:descripcion_oferta,
                                      fecha_publicacion_oferta=:fecha_publicacion_oferta
                                  WHERE id_oferta=:id_oferta");
               
                $this->db->bind(':titulo_oferta', $datos['titulo_oferta']);
                $this->db->bind(':fecha_inicio_oferta', $datos['fecha_inicio_oferta']);
                $this->db->bind(':fecha_fin_oferta', $datos['fecha_fin_oferta']);  
                $this->db->bind(':condiciones_oferta', $datos['condiciones_oferta']);
                $this->db->bind(':descripcion_oferta', $datos['descripcion_oferta']);
                $this->db->bind(':fecha_publicacion_oferta', $datos['fecha_publicacion_oferta']);
                $this->db->bind(':id_oferta', $datos['id_oferta']);
           
                $this->db->execute();                          
            }
           
            public function borraroferta($id){
                $this->db->query("  UPDATE oferta
                SET activo=0
                WHERE id_oferta=$id");
                $this->db->execute();
            }

            public function activaroferta($id){
                $this->db->query("  UPDATE oferta
                SET activo=1
                WHERE id_oferta=$id");
                $this->db->execute();
            }


            //usuarios


            public function mostrarusuariospaginados($datos_por_pagina, $offset){
                $this->db->query("SELECT * FROM usuario LIMIT :limite OFFSET :offset");
                $this->db->bind(':limite', $datos_por_pagina);
                $this->db->bind(':offset', $offset);
                return $this->db->registros();
            }
            
            public function totalusuarios(){
                $this->db->query("SELECT * FROM usuario");
                return $this->db->rowCount();
            }
            

            public function borrarusuarios($id){
                $this->db->query("  UPDATE usuario
                                    SET activo=0
                                    WHERE id_usuario=$id");
               $this->db->execute();
            }

            public function activarusuarios($id){
                $this->db->query("  UPDATE usuario
                                    SET activo=1
                                    WHERE id_usuario=$id");
               $this->db->execute();
            }

            public function modificarusuario($datos) {
                $this->db->query("UPDATE usuario
                                  SET nombre_usuario=:nombre_usuario,
                                      apellidos_usuario=:apellidos_usuario,
                                      fecha_nacimiento_usuario=:fecha_nacimiento_usuario,
                                      telefono_usuario=:telefono_usuario
                                  WHERE id_usuario=:id_usuario");
           
                $this->db->bind(':nombre_usuario', $datos['nombre_usuario']);
                $this->db->bind(':apellidos_usuario', $datos['apellidos_usuario']);
                $this->db->bind(':fecha_nacimiento_usuario', $datos['fecha_nacimiento_usuario']);
                $this->db->bind(':telefono_usuario', $datos['telefono_usuario']);
                $this->db->bind(':id_usuario', $datos['id_usuario']);
           
                $this->db->execute();
            }
           

            //entidad


            public function mostrarentidadespaginadas($datos_por_pagina, $offset){
                $this->db->query("SELECT * FROM entidad LIMIT :limite OFFSET :offset");
                $this->db->bind(':limite', $datos_por_pagina);
                $this->db->bind(':offset', $offset);
                return $this->db->registros();
            }
            
            public function totalentidades(){
                $this->db->query("SELECT * FROM entidad");
                return $this->db->rowCount();
            }

            public function borrarentidades($id){
                $this->db->query("  UPDATE entidad
                                    SET activo=0
                                    WHERE id_entidad=$id");
                $this->db->execute();
            }

            public function activarentidades($id){
                $this->db->query("  UPDATE entidad
                                    SET activo=1
                                    WHERE id_entidad=$id");
                $this->db->execute();
            }

            public function modificarentidades($datos) {
                $this->db->query("UPDATE entidad
                                  SET nombre_entidad=:nombre_entidad,
                                      cif_entidad=:cif_entidad,
                                      sector_entidad=:sector_entidad,
                                      direccion_entidad=:direccion_entidad,
                                      numero_telefono_entidad=:numero_telefono_entidad,
                                      correo_entidad=:correo_entidad,
                                      pagina_web_entidad=:pagina_web_entidad
                                  WHERE id_entidad=:id_entidad");
           
                $this->db->bind(':nombre_entidad', $datos['nombre_entidad']);
                $this->db->bind(':cif_entidad', $datos['cif_entidad']);
                $this->db->bind(':sector_entidad', $datos['sector_entidad']);
                $this->db->bind(':direccion_entidad', $datos['direccion_entidad']);
                $this->db->bind(':numero_telefono_entidad', $datos['numero_telefono_entidad']);
                $this->db->bind(':correo_entidad', $datos['correo_entidad']);
                $this->db->bind(':pagina_web_entidad', $datos['pagina_web_entidad']);
                $this->db->bind(':id_entidad', $datos['id_entidad']);
           
                $this->db->execute();
            }


            //crear administrador


            public function crearadministrador($datos){
                $this->db->query("INSERT INTO usuario(nif,nombre_usuario, apellidos_usuario, correo_usuario, contrasena_usuario
                                                      ,fecha_nacimiento_usuario, telefono_usuario, activo)  
                                  VALUES (:nif, :nombre_usuario, :apellidos_usuario, :correo_usuario, :contrasena_usuario, 
                                          :fecha_nacimiento_usuario, :telefono_usuario, :activo)");

                $this->db->bind(':nif', $datos['nif']);
                $this->db->bind(':nombre_usuario', $datos['nombre_usuario']);
                $this->db->bind(':apellidos_usuario', $datos['apellidos_usuario']);
                $this->db->bind(':correo_usuario', $datos['correo_usuario']);
                $this->db->bind(':contrasena_usuario', $datos['contrasena_usuario']);
                $this->db->bind(':fecha_nacimiento_usuario', $datos['fecha_nacimiento_usuario']);
                $this->db->bind(':telefono_usuario', $datos['telefono_usuario']);
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
                        $this->db->bind(':rol', 1);
        
                            if($this->db->execute()){
                                return true;
                            } else {
                                return false;
                            }
            }


            //obtener rol


            public function obtenerrol($id){
                $this->db->query("SELECT id_rol FROM usuario_has_rol WHERE id_usuario=$id");
                return $this->db->registro();
            }



            public function graficomunicipio(){
                $this->db->query(" SELECT COUNT(inmueble.id_inmueble) as inmueble, municipio.nombre_municipio 
                                    FROM inmueble, municipio 
                                    WHERE inmueble.id_municipio = municipio.id_municipio
                                    GROUP BY municipio.nombre_municipio");
                return $this->db->registros();
            }

            public function graficoofertasactivas(){
                $this->db->query("SELECT COUNT(id_oferta) as oferta, activo FROM oferta GROUP BY activo;");
                return $this->db->registros();
            }





            }


            
           
        
        
