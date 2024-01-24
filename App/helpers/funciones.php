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

