<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>css/estilos.css">

    <!-- Estilos del Footer -->
    <link rel="stylesheet" href="<?php echo RUTA_URL?>css/footer.css">
    <!-- Estilos del Footer -->

</head>
<!-- <body class="">poner valor min de view port como 100 no lo consigo -->
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
            <a class="navbar-brand" href="<?php echo RUTA_URL?>">
                <img src="<?php echo RUTA_URL_IMAGENES?>Logo.png" alt="Logo" height="50" class="d-inline-block align-top">
            </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Traspasos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Alquileres</a>
                    </li>
                    <p>Servidor de Oscar</p>
                    <div class="d-lg-none">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo RUTA_URL?>/login">Login</a>
                        </li>
                    </div>
                    <div class="d-lg-none">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo RUTA_URL?>/registro">Registro</a>
                        </li>
                    </div>
                </ul>
            </div>


            <!-- ESTO HAY QUE METERLO EN EL DIV DE ARRIVA PARA QUE SE HAGA RESPONSIVE, SI QUEREMOS QUE ESTE EN EL LADO DERECHO HAY QUE HACERLO DE OTRA MANERA -->
            <ul class="navbar-nav md-auto">
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="<?php echo RUTA_URL?>/login">Login</a>
                </li>
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="<?php echo RUTA_URL?>/registro">Registro</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

