<?php require_once RUTA_APP.'/vistas/inc/header_no_logueado.php'?>

<div class="d-flex flex-column min-vh-90">
    <div class="container mt-5">
            <div class="jumbotron text-center">
                <h1 class="display-4">Iniciar Sesión</h1>
            </div>

            <form  method="POST" action="" class="card p-4">
                <div class="form-floating mb-3">
                    <input name="correo" id="correo" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                    <label for="floatingInput">Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input name="contrasena"  id="contrasena" type="password" class="form-control" id="floatingPassword" placeholder="Contraseña" required>
                    <label for="floatingPassword">Contraseña</label>
                </div>

                <button type="submit" class="btn btn-primary"  name="envio">Iniciar Sesión</button>
            </form>
            </div>
        </div>
        <?php if (isset($datos['error'])&& $datos['error']=='error'): ?>
        <div class="alert alert-danger" role="alert">
            ERROR DE LOGIN
    </div>
    <?php endif ?>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
