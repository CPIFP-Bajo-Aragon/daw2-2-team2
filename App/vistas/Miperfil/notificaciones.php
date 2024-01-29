<?php cabecera($this->datos); ?>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <button id="activas" class="nav-link active" onclick="NotificacionesAPI('Activas')">Activas</button>
      </li>
      <li class="nav-item">
        <button id="historico" class="nav-link" onclick="NotificacionesAPI('Historico')">Historico</button>
      </li>
    </ul>
  </div>
    <div class="card-body"  id="contenido">
        
    </div>
  </div>
</div>
<script>
		window.onload=function() {
      NotificacionesAPI('Activas')		
  }
		</script>
<script src="<?php echo RUTA_URL?>/js/AsincronoNotificaciones.js"></script>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
