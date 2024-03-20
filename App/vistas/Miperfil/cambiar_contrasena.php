<?php cabecera($this->datos); ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
      <form method="POST" action="">
        <div class="mb-3">
          <label for="contrasena" class="form-label d-flex justify-content-center">Contraseña Actual</label>
          <input type="password" name="contrasena" class="form-control" id="contrasena">
        </div>
        <div class="mb-3">
          <label for="contrasena_nueva" class="form-label d-flex justify-content-center">Contraseña Nueva</label>
          <input type="password" name="contrasena_nueva" class="form-control" id="contrasena_nueva">
        </div>
        <div class="mb-3">
          <label for="contrasena_nueva" class="form-label d-flex justify-content-center">Repetir Contraseña</label>
          <input type="password" name="contrasena_nueva_repetida" class="form-control" id="contrasena_nueva_repetida">
        </div>
        <?php foreach($datos['usuario'] as $usuario):?>
          <input type="hidden" name="nif" id="nif" value="<?php echo $usuario->nif ?>">          
        <?php endforeach ?>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="mt-4">
<?php 
if (isset($this->datos['error_message'])) {
    ?>
    <div class="alert alert-danger" role="alert">
      <?php
           echo $this->datos['error_message'];
           ?>
    </div>
    <?php  
}
?>
</div>
<div class="mt-4">
<?php
if (isset($this->datos['success_message'])) {
  ?>
  <div class="alert alert-success " role="alert">
    <?php
         echo $this->datos['success_message'];
         ?>
  </div>
  <?php  
}
?>
</div>





<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>