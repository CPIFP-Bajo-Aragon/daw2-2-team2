<?php require_once RUTA_APP.'/vistas/inc/header_no_logueado.php'?>

<div class="container mt-5">
        <div class="jumbotron text-center">
            <h1 class="display-4">Registrarse</h1>
        </div>

        <form action="" class="card p-4" method="post">
        <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingNombre" placeholder="1234567F" id="nif" name="nif" required>
                <label for="floatingNombre">NIF</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingNombre" placeholder="Jose Antonio" id="nombre" name="nombre" required>
                <label for="floatingNombre">Nombre</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingApellidos" placeholder="Gonzalez Lopez" id="apellido" name="apellido" required>
                <label for="floatingApellidos">Apellidos</label>
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" id="email" name="email" required>
                <label for="floatingInput">Email</label>
            </div>

            <!--Falta por comparar ambas contraseñas -->

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña" id="contrasena" name="contrasena" required>
                <label for="floatingPassword">Contraseña</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPPassword" placeholder="Repetir contraseña" id="contrasenarepetida" name="contrasenarepetida" required>
                <label for="floatingPPassword">Repetir contraseña</label>
            </div>

            <button type="submit" class="btn btn-primary" name="envio">Registrarse</button>
        </form>
        <!-- Error las contraseñas no coinciden -->
        <?php if (isset($datos['error'])&& $datos['error']=='error-1'): ?>
        <div class="alert alert-danger" role="alert">
            Error al registrarte 
        </div>
        <?php endif ?>

        <!-- Error Registro Incorrecto -->
        <?php if (isset($datos['error'])&& $datos['error']=='error-2'): ?>
            <div class="alert alert-danger" role="alert">
            Error las contraseñas no coinciden
        </div>
        <?php endif ?>

</div>
<script src="<?php echo RUTA_APP.'/js/validarRegistro.js'?>"></script>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>