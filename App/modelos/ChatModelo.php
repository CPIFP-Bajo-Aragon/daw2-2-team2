<?php

    class ChatModelo{
            private $db;
            private $datos;

            public function __construct(){
                $this->db= new Base;
            }


            public function chatsActivos($id){
                $this->db->query("
                    SELECT usuario.id_usuario, usuario.nombre_usuario, usuario.apellidos_usuario 
                    FROM chatear 
                    INNER JOIN usuario ON usuario.id_usuario = chatear.emisor OR usuario.id_usuario = chatear.receptor
                    WHERE (chatear.emisor = $id OR chatear.receptor = $id) AND usuario.id_usuario != $id
                    GROUP BY usuario.id_usuario;
                ");
                return $this->db->registros();  
            }


            public function mostrarmensajes($id){
                Session::IniciarSesion($this->datos);
                $emisor = $_SESSION['UsuarioSesion']->id_usuario;

                $this->db->query("SELECT * FROM chatear WHERE (emisor=$emisor AND receptor=$id) OR (emisor=$id AND receptor=$emisor) ORDER BY fecha_chat ");
                return $this->db->registros();
            }

            
            public function mandarMensaje($receptor, $mensaje) {
                $emisor = $_SESSION['UsuarioSesion']->id_usuario;
            
                if (empty(trim($mensaje))) {
                    return;
                } else {
            
             
                $this->db->query("
                    INSERT INTO chatear (emisor, receptor, mensaje_chat) 
                    VALUES (:emisor, :receptor, :mensaje);
                ");
                $this->db->bind(':emisor', $emisor);
                $this->db->bind(':receptor', $receptor);
                $this->db->bind(':mensaje', $mensaje);
                
                try {
                    $this->db->execute();
                } catch (Exception $e) {
                    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                        <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'No mandes el mismo mensaje muchas veces :(',
                            showConfirmButton: true,
                            confirmButtonText: 'vale'
                          })
                        </script>
                    ";
                 }  
                }
             }
            
            
            


            public function usuariochat($id){
                $this->db->query("SELECT * FROM usuario WHERE id_usuario=$id");
                return $this->db->registro();
            }



            public function addNoti($id, $nombreapelldio){
                $envio = "<a href='/Chat/Inicio/" . cifrar_url_aes($id) . "'>" . $nombreapelldio . "</a>";
    
                // Construir el contenido de la notificación
                $contenido_notificacion = "Nuevo mensaje de " . $nombreapelldio. ", a las ".FechayHora();;
            

                $this->db->query("
                INSERT INTO notificacion (contenido_notificacion, id_usuario, titulo_notificacion) 
                VALUES (:contenido_notificacion, :id_usuario, :titulo_notificacion);
            ");
            
                $envio =  "<a href='/Chat/Inicio/".cifrar_url_aes($id)."'>".$nombreapelldio."</a>";
                $this->db->bind(':contenido_notificacion',  $contenido_notificacion);
                $this->db->bind(':id_usuario', $id);
                $this->db->bind(':titulo_notificacion', "Nuevo mensaje");

            try {
                $this->db->execute();
            } catch (Exception $e) {
                echo "Error al enviar el mensaje: " . $e->getMessage();
             }
            }






        }