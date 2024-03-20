<?php cabecera($this->datos); ?>

<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <button id="activas" class="nav-link active" onclick="NotificacionesAPI('Activas', 0, <?php echo TAM_PAGINA_MEDIANO?>)">Activas</button>
      </li>
      <li class="nav-item">
        <button id="historico" class="nav-link" onclick="NotificacionesAPI('Historico', 0, <?php echo TAM_PAGINA_MEDIANO?>)">Historico</button>
      </li>
    </ul>
  </div>
    <div class="card-body"  id="contenido">
        
    </div>

    <div class="d-flex justify-content-center">
      <div id="prueba" class="d-flex">
      </div>
    </div>

  </div>
</div>

<script>
  const pageSize = <?php echo TAM_PAGINA_MEDIANO?> 
		window.onload=function() {
      NotificacionesAPI('Activas', 0, pageSize);	
  }
</script>

<script src="<?php echo RUTA_URL?>/js/AsincronoNotificaciones.js"></script>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>