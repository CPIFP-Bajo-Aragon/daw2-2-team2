<?php
//Funcion para redireccionar pagina 

function redireccionar($pagina){
    header('location:'.RUTA_URL.$pagina);
}

function tienePrivilegios($rol_usuario,$rolesPermitidos){
    // si roles permitiods esta vacio
    if (empty($rolesPermitidos) || in_array($rol_usuario, $rolesPermitidos)){
        return true;
    }
}

//Cifrado contraseña 
function shas256($contrasena) {
    $contrasena = hash('sha256', $contrasena);
    return $contrasena;
}

//Pone la cabecera correspondiente en funcion de si estas registrado o no
function cabecera($datos){
    if (isset($_SESSION['UsuarioSesion'])){
       require_once RUTA_APP.'/vistas/inc/header_logueado.php';

    }else{
        require_once RUTA_APP.'/vistas/inc/header_no_logueado.php';
    }
}

//Funcion para subir imagenes
function imagenes($carpeta, $imagen, $nif) {
    $rutaCompleta = $carpeta . $nif . ".png";

    if (!file_exists($rutaCompleta)) {
        mkdir($rutaCompleta, 0777, true);
    }

    if (!empty($imagen["tmp_name"])) {
        $allowedExtensions = array('jpg', 'png');
        $fileExtension = pathinfo($imagen['name'], PATHINFO_EXTENSION);

        // Verificar si la extensión del archivo está permitida
        if (in_array(strtolower($fileExtension), $allowedExtensions)) {
            if (move_uploaded_file($imagen["tmp_name"], $rutaCompleta)) {
                echo "<script>
                Swal.fire({
                    position: 'top-mid',
                    icon: 'success',
                    title: 'Imagen subida con exito',
                    showConfirmButton: false,
                    timer: 2500
                  });
                </script>";
            } else {
                echo "<script>
            Swal.fire({
                position: 'top-mid',
                icon: 'error',
                title: 'Error al subir la imagen',
                showConfirmButton: false,
                timer: 2500
              });
            </script>";
            }
        } else {
            echo "<script>
            Swal.fire({
                position: 'top-mid',
                icon: 'error',
                title: 'Solo se permiten archivos .jpg y .png',
                showConfirmButton: false,
                timer: 2500
              });
            </script>";
        }
    } else {
        echo "<script>
            Swal.fire({
                position: 'top-mid',
                icon: 'error',
                title: 'No has subido ninguna imagen',
                showConfirmButton: false,
                timer: 2500
              });
            </script>";
    }
}



    function subirDocumento($nif){

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombreArchivo = $_FILES['archivo']['name'];
        $tipoArchivo = $_FILES['archivo']['type'];
        $tamanoArchivo = $_FILES['archivo']['size'];
        $archivoTemporal = $_FILES['archivo']['tmp_name'];

        if (isset($_FILES['archivo'])) {
        if ($tipoArchivo == 'application/pdf') {

            $rutaGuardar = RUTA_URL_DOCUMENTOS . $nif."_".$nombreArchivo;

            move_uploaded_file($archivoTemporal, $rutaGuardar);

            $subirDocumento = [
                'nombre_documento' => trim($_POST['nombre_documento']),
                'descripcion_documento' => trim($_POST['descripcion_documento']),
                'nif' => $_POST['nif'],
                'archivo' => $nombreArchivo,
                'tipo_documento' => $tipoArchivo
            ];

            $this->UsuarioModelo->subirDocumento($subirDocumento);
        
            //redireccionar('/Miperfil');


            }else{
    
                echo "<script>
                Swal.fire({
                    position: 'top-mid',
                    icon: 'error',
                    title: 'Solo se permiten archivos .pdf',
                    showConfirmButton: false,
                    timer: 2500
                });
                </script>";
                //redireccionar('/Miperfil');
                ?>
                <?php
                exit;
            }
        }else{
            echo "no se ha seleccionado ningun archivo";
        }

        
    }
  
}
function subirImagenes() {
    // Verificar si se ha enviado un formulario mediante el método POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar si se han enviado archivos
        if (isset($_FILES['fotos_inmueble'])) {
            // Recorrer cada archivo enviado
            foreach ($_FILES['fotos_inmueble']['tmp_name'] as $key => $archivoTemporal) {
                // Obtener información sobre el archivo
                $nombreArchivo = $_FILES['fotos_inmueble']['name'][$key];
                $tipoArchivo = $_FILES['fotos_inmueble']['type'][$key];
                $tamanoArchivo = $_FILES['fotos_inmueble']['size'][$key];

                // Verificar si el archivo es una imagen
                if (strpos($tipoArchivo, 'image') !== false) {
                    // Ruta donde se guardará el archivo
                    $rutaGuardar = RUTA_INMUEBLES . "_" . $nombreArchivo;

                    // Mover el archivo a su destino final
                    if (move_uploaded_file($archivoTemporal, $rutaGuardar)) {
                        // Guardar información sobre la imagen en la base de datos
                        $subirImagen = [
                            'nombre_imagen' => trim($_POST['nombre_imagen']), // Asegúrate de que este campo exista en tu formulario
                            'descripcion_imagen' => trim($_POST['descripcion_imagen']), // Asegúrate de que este campo exista en tu formulario
                            'formato_imagen' => $tipoarchivo,
                            'ruta_imagen'=>$rutaGuardar,
                        ];

                        // Llama a la función del modelo para subir la imagen a la base de datos
                        $this->UsuarioModelo->subirImagen($subirImagen);

                        // Redireccionar a alguna página, si es necesario
                        // redireccionar('/Miperfil');
                    } else {
                        echo "Error al subir el archivo $nombreArchivo.";
                    }
                } else {
                    // El archivo no es una imagen
                    echo "<script>
                        Swal.fire({
                            position: 'top-mid',
                            icon: 'error',
                            title: 'Solo se permiten archivos de imagen',
                            showConfirmButton: false,
                            timer: 2500
                        });
                    </script>";
                }
            }
        } else {
            echo "No se ha seleccionado ninguna imagen.";
        }
    }
}

function cifrar_url_aes($url) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $url_cifrada = openssl_encrypt($url, 'aes-256-cbc', PSSWD_HASH, 0, $iv);
    if ($url_cifrada === false) {
        die("Error durante el cifrado: " . openssl_error_string());
    }
    $url_cifrada = str_replace(["+", "/", "="], ["_", "-", ""], base64_encode($url_cifrada . '#' . $iv));
    return $url_cifrada;
}

function descifrar_url_aes($url_cifrada) {
    $url_cifrada = str_replace(["_", "-"], ["+", "/"], $url_cifrada);
    $decoded = base64_decode(str_pad(strtr($url_cifrada, '-_', '+/'), strlen($url_cifrada) % 4, '=', STR_PAD_RIGHT));
    if ($decoded === false) {
        die("Error al decodificar la URL cifrada.");
    }
    $parts = explode('#', $decoded, 2);
    if (count($parts) < 2) {
        die("URL cifrada no válida.");
    }
    list($url_cifrada, $iv) = $parts;
    $iv = str_pad($iv, 16, "\0");
    $url_descifrada = openssl_decrypt($url_cifrada, 'aes-256-cbc', PSSWD_HASH, 0, $iv);
    if ($url_descifrada === false) {
        die("Error durante el descifrado: " . openssl_error_string());
    }
    return $url_descifrada;
}


function recortarfrases($frase, $limite) {
    if (strlen($frase) > $limite) {
        $frase_recortada = substr($frase, 0, $limite) . '... <span class="leermas" style="cursor:pointer; color:black;" onclick="this.parentElement.innerHTML = \''.$frase.'\';"> Leer mas</span>';
        return $frase_recortada;
    } else {
        return $frase;
    }
}

function FechayHora(){
    date_default_timezone_set("Europe/Madrid");
    return date("d/m/y H:i:s");
}