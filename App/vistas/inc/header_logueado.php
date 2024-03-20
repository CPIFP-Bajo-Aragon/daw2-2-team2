<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" /> <!-- Animacion -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web de Alquiler/Traspaso Comarca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/estilos.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/validarformulario.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/notificaciones.css">
    <link rel="stylesheet" href="https://unpkg.com/jcrop/dist/jcrop.css">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <!-- Estilos del Footer -->
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/footer.css">
    <!-- Estilos del Footer -->

</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
            <a class="navbar-brand" href="<?php echo RUTA_URL?>/">
            <img src="<?php echo RUTA_URL_IMAGENES?>/Logo.png" alt="Logo" height="50" class="d-inline-block align-top">
            </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo RUTA_URL?>/Servicio">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo RUTA_URL?>/Traspaso">Traspasos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo RUTA_URL?>/Alquiler">Alquileres</a>
                    </li>

                    <?php
                    
                    if(isset($datos['UsuarioSesion']) && $datos['UsuarioSesion']->id_rol==1){
                        ?>
                        <li class="nav-item">
                        <a class="border nav-link bg-danger-subtle" href="<?php echo RUTA_URL?>/Admin">Portal Administrador</a>
                    </li>
                    <?php
                    }else{

                    }
                    ?>
                    <div class="d-lg-none">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo RUTA_URL?>/Miperfil/Notificaciones">Notificaciones</a>
                        </li>
                    </div>
                </ul>
            </div>


            <!-- ESTO HAY QUE METERLO EN EL DIV DE ARRIVA PARA QUE SE HAGA RESPONSIVE, SI QUEREMOS QUE ESTE EN EL LADO DERECHO HAY QUE HACERLO DE OTRA MANERA -->
            <ul class="navbar-nav md-auto">
                <li class="nav-item d-none d-md-block">
 
                   <a class="nav-link" href="<?php echo RUTA_URL?>/Miperfil/Notificaciones">
                   <?php if(isset($datos['noti']) && $datos['noti'] != 0){ ?>
                    <div class="animate__animated animate__tada animate__slow"><i class="bi bi-bell-fill text-danger"></i> <?php echo isset($datos['noti']) ? $datos['noti'] : ''; ?></div>  
                    <?php }else{ ?>
                    <i class="bi bi-bell-fill "></i> 
                    <?php }?>
                </a>
             
                </li>
                <!-- <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="<?php echo RUTA_URL?>/Miperfil">Mi perfil</a>
                </li>
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="<?php echo RUTA_URL?>/login/CerrarSesion">Cerrar Sesion</a>
                </li> -->
            </ul>

            <div class="dropdown">
                <a class="btn btn-light dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php
                        echo $_SESSION['UsuarioSesion']->nombre_usuario ;
                    ?>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="<?php echo RUTA_URL?>/Miperfil"><i class="bi bi-person"></i> Mi perfil</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?php echo RUTA_URL?>/Misanuncios"><i class="bi bi-card-list"></i> Mis anuncios</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?php echo RUTA_URL?>/Reservar"><i class="bi bi-calendar-check"></i> Reservas</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?php echo RUTA_URL?>/Chat"><i class="bi bi-chat-dots"></i> Chat</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?php echo RUTA_URL?>/Entidades"><i class="bi bi-building"></i> Entidades</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?php echo RUTA_URL?>/cambiar_contrasena"><i class="bi bi-key"></i> Cambiar Contraseña</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?php echo RUTA_URL?>/login/CerrarSesion"><i class="bi bi-door-closed"></i> Cerrar Sesion</a>
                    </li>                    
                </ul>

            </div>
        </div>
    </nav>
</header>