<?php cabecera($this->datos); ?>
<link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/login.css">

<div id="fondo" class="d-flex flex-column min-vh-90">
    <div id="contenido" class="container mt-5 text-center">
        <div class="jumbotron text-center">
            <h1 class="display-4">Iniciar Sesión</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">     
                <form method="POST" action="" class="p-4">        
                    <div class="form-floating mb-3">
                        <input name="correo" id="correo" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input name="contrasena" id="contrasena" type="password" class="form-control" id="floatingPassword" placeholder="Contraseña" required>
                        <label for="floatingPassword">Contraseña</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary" name="envio">Iniciar Sesión</button>
                    </div>    
                </form>
                <?php if (isset($datos['error']) && $datos['error'] == 'error'): ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        ERROR DE LOGIN <a href="/login/RecuperarClave">¿Quieres recuperar tu cuenta?</a>
                    </div>
                <?php endif ?>
            </div>    
        </div>
    </div>
</div>

<script src="<?php echo RUTA_URL?>/js/coockies.js"></script>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
