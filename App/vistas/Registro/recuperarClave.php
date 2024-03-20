<?php cabecera($this->datos); ?>

<div class="d-flex flex-column min-vh-90">
    <div class="container mt-5">
            <div class="jumbotron text-center">
                <h1 class="display-4">Recuperar Contraseña</h1>
            </div>

            <form  method="POST" action="" class="card p-4">
                <div class="form-floating mb-3">
                    <input name="email" id="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                    <label for="floatingInput">Email</label>
                </div>
                <button type="submit" class="btn btn-primary" id="envio" name="envio">Recuperar Contraseña</button>
            </form>
            </div>
        </div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
