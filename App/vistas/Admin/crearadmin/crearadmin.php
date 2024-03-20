<?php require_once RUTA_APP . '/vistas/inc/cabecera_admin.php' ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
    <form action="<?php echo RUTA_URL ?>/Admincrear/crearadmin" method="POST">
        <div class="mb-3 mt-3">
            <label for="exampleInputEmail1" class="form-label">CIF/NIF</label>
            <input type="text" name="nif" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text" name="nombre_usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Apellidos</label>
            <input type="text" name="apellidos_usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="correo_usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password"  name="contrasena_usuario" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Fecha Nacimiento</label>
            <input type="date" name="fecha_nacimiento_usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Telefono</label>
            <input type="text" name="telefono_usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
  </div>
</div>       
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>