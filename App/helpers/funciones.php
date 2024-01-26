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
function cabecera(){
    if(!isset($_SESSION)) {
        session_start();
    }
    if (Session::SesionCreada()){
       require_once RUTA_APP.'/vistas/inc/header_logueado.php';

    }else{
        require_once RUTA_APP.'/vistas/inc/header_no_logueado.php';
    }
}

//Funcion para subir imagenes
function imagenes($carpeta, $imagen, $nif){

    $uploadDirectory = RUTA_URL_IMAGENES.'/'.$carpeta.'/';

        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        $targetFile = $uploadDirectory . $nif . ".png";

        if (file_exists($targetFile) && empty($_FILES["imagen"])) {
            unlink($targetFile);
        }

        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $targetFile)) {
            echo "Imagen subida con éxito.";
        } else {
            echo "Error al subir la imagen.";
        }
}


