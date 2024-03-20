<?php cabecera($this->datos); ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo RUTA_URL?>/Admin">Administrador</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo RUTA_URL?>/Adminusuarios">Usuarios</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo RUTA_URL?>/Adminentidades">Entidades</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo RUTA_URL?>/Admininmuebles">Inmuebles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo RUTA_URL?>/Adminoferta">Ofertas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo RUTA_URL?>/Admingraficos">Gráficos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo RUTA_URL?>/Admincrear">Crear Admin</a>
        </li>
    </ul>

    <!-- Elemento que se colocará a la derecha -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo RUTA_URL?>/login/CerrarSesion">Cerrar Sesión</a>
        </li>
    </ul>
</div>

        </div>
    </nav>