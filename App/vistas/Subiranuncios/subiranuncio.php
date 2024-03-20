<?php cabecera($this->datos); ?>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-6 offset-md-3 text-center">
      <h2>Seleccione una opción:</h2>
      <div class="mt-4">
        <a href="<?php echo RUTA_URL?>/Misanuncios/anuncioInmueble" class="btn btn-primary btn-lg mr-4" >Anuncio Inmueble</a>
        <a href="<?php echo RUTA_URL?>/Misanuncios/anuncioTraspaso" class="btn btn-success btn-lg">Traspasos</a>
      </div>
    </div>
  </div>
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>