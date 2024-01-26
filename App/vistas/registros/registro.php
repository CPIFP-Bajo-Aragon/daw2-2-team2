<?php require_once RUTA_APP.'/vistas/inc/header_no_logueado.php'?>

<div class="container mt-5">
        <div class="jumbotron text-center">
            <h1 class="display-4">Registrarse</h1>
        </div>

        <form action="" class="card p-4" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingNombre" placeholder="Jose Antonio" required>
                <label for="floatingNombre">Nombre</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingApellidos" placeholder="Gonzalez Lopez" required>
                <label for="floatingApellidos">Apellidos</label>
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña" required>
                <label for="floatingPassword">Contraseña</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPPassword" placeholder="Repetir contraseña" required>
                <label for="floatingPPassword">Repetir contraseña</label>
            </div>

            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>