<?php
//Pasa las cosas del controlador aqui para hacer la consulta en la bd

    class EntidadesModelo{
            private $db;
            private $datos;

            public function __construct(){
                $this->db= new Base;
            }

    
            public function anadirEntidad($datos) {
                $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;
            
                $this->db->query('INSERT INTO entidad (
                    nombre_entidad,
                    cif_entidad,
                    sector_entidad,
                    direccion_entidad,
                    numero_telefono_entidad,
                    correo_entidad,
                    pagina_web_entidad
                ) VALUES (
                    :nombre_entidad,
                    :cif_entidad,
                    :sector_entidad,
                    :direccion_entidad,
                    :numero_telefono_entidad,
                    :correo_entidad,
                    :pagina_web_entidad
                )');
                
                $this->db->bind(':nombre_entidad', $datos['nombre_entidad']);
                $this->db->bind(':cif_entidad', $datos['cif_entidad']);
                $this->db->bind(':pagina_web_entidad', $datos['pagina_web_entidad']);
                $this->db->bind(':sector_entidad', $datos['sector_entidad']);
                $this->db->bind(':direccion_entidad', $datos['direccion_entidad']);
                $this->db->bind(':numero_telefono_entidad', $datos['numero_telefono_entidad']);
                $this->db->bind(':correo_entidad', $datos['correo_entidad']);
                

                    $id_entidad_insertada = $this->db->executeLastId();
                
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
                    $this->db->bind(':id_entidad', $id_entidad_insertada);
                    $this->db->bind(':rol', 1);
                
                    if ($this->db->execute()) {
                        return true;
                    } else {
                        return false;
                    }
                
            }

            public function mostrarEntidades() {

                $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;

                $this->db->query("SELECT entidad.*
                FROM entidad
                INNER JOIN usuario_entidad ON entidad.id_entidad = usuario_entidad.id_entidad
                WHERE usuario_entidad.id_usuario = $id_usuario AND entidad.activo = 1");

                return $this->db->registros();
            }

            public function usuariosEntidad() {

                $id_usuario = $_SESSION['UsuarioSesion']->id_usuario;
                
                $this->db->query("SELECT ue.id_usuario, u.nombre_usuario, r.nombre_rol
                FROM usuario u
                JOIN usuario_entidad ue ON u.id_usuario = ue.id_usuario
                JOIN rol r ON ue.   rol = r.id_rol
                WHERE ue.id_entidad IN (
                    SELECT id_entidad
                    FROM usuario_entidad
                    WHERE id_usuario = $id_usuario
                );                             
                ");

                return $this->db->registros();
                

            }


            public function anadirUsuarioaEntidad($datos) {

                $this->db->query('SELECT id_usuario FROM usuario WHERE nif = :dni_usuario');

                $this->db->bind(':dni_usuario', $datos['dni_usuario']);

                $resultado = $this->db->registros();    
                
                $id_usuario = $resultado[0]->id_usuario;

                echo $id_usuario; 

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
                $this->db->bind(':id_entidad', $datos['id_entidad']);
                $this->db->bind(':rol', 2);

                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
                    
            }

            public function usuarioRol() {
                
                $this->db->query("SELECT * FROM rol");

                return $this->db->registros();

            }

            public function eliminarUsuarioEntidad($datos) {
            
                $this->db->query("DELETE FROM usuario_entidad WHERE id_usuario = :id_usuario AND id_entidad = :id_entidad");

                $this->db->bind(':id_usuario', $datos['id_usuario']);
                $this->db->bind(':id_entidad', $datos['id_entidad']);

                $this->db->execute();

                
            }

            public function eliminarEntidad($datos) {
            
                $this->db->query("UPDATE entidad SET activo = 0 WHERE id_entidad = :id_entidad");

                $this->db->bind(':id_entidad', $datos['id_entidad']);

                $this->db->execute();

            }


             
            
}