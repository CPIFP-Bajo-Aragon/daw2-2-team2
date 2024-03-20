<?php
//Pasa las cosas del controlador aqui para hacer la consulta en la bd

    class LoginModelo{
            private $db;
            private $datos;

            public function __construct(){
                $this->db= new Base;
            }

            public function login($credenciales) {
                $correo = $credenciales['correo'];
                $contrasena = $credenciales['contrasena'];
            
                $this->db->query('  SELECT * 
                                    FROM usuario, usuario_has_rol 
                                    WHERE correo_usuario = :correo 
                                    AND contrasena_usuario = :contrasena 
                                    AND usuario.id_usuario=usuario_has_rol.id_usuario');
                $this->db->bind(':correo', $correo);
                $this->db->bind(':contrasena', $contrasena);
            
            
                $usuario = $this->db->registro();
            
                return $usuario;
            }
            
            
            
            public function recuperarclave($email, $clave) {
                $this->db->query("UPDATE usuario SET contrasena_usuario = :clave WHERE correo_usuario = :email");
            
                // Bind parameters
                $this->db->bind(':clave', $clave);
                $this->db->bind(':email', $email);
            
                // Execute the query
                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;   
                }
            }
            
    }