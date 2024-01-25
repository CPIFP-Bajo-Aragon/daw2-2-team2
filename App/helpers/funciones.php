<?php
//Funcion para redireccionar pagina 

function redireccionar($pagina){
    header('location:'.RUTA_URL.$pagina);
}

//Cifrado contraseña 
function shas256($contrasena) {
    $contrasena = hash('sha256', $contrasena);
    return $contrasena;
}

//Pone la cabecera correspondiente en funcion de si estas registrado o no
function cabecera(){
    session_start();
    if (Session::SesionCreada()){
       require_once RUTA_APP.'/vistas/inc/header_logueado.php';

    }else{
        require_once RUTA_APP.'/vistas/inc/header_no_logueado.php';
    }
}



