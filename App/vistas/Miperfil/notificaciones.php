<?php cabecera(); ?>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="Activas">Activas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Historico">Historico</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
  <div class="row">
  <?php foreach($datos['notificaciones'] as $notificaciones):?>
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $notificaciones->tipo?></h5>
                          <p class="card-text"><?php echo $notificaciones->contenido?></p>
                        </div>
                        <a href="#" class="btn btn-primary">Marcar como Leida</a>
                      </div>
                    </div>
                    <?php endforeach ?>
</div>
  </div>


  </div>
</div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
