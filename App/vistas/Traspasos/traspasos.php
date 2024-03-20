<?php cabecera($this->datos); ?>

<div class="mx-auto p-5">

<!--Migas de pan-->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <!-- <li class="breadcrumb-item"><a href="#">Viviendas</a></li> -->
        <li class="breadcrumb-item active" aria-current="page">Traspasos</li>
      </ol>
    </nav>
<!--Migas de pan-->

<form action="" method="post" class="mb-4">
  <div class="row">

    <div class="col-md-3">
      <select name="global" id="global" class="form-select mb-3">
        <option value="1">Precio Menor</option>
        <option value="2">Precio Mayor</option>
        <option value="3">Más Antiguo</option>
        <option value="4">Más Reciente</option>
      </select>
    </div>

    <div class="col-md-3">
      <div class="input-group mb-3">
        <input type="text" name="premin" id="premin" placeholder="Precio Min" class="form-control">
        <span class="input-group-text">€</span>
      </div>
    </div>
    <div class="col-md-3">
      <div class="input-group mb-3">
        <input type="text" name="premax" id="premax" placeholder="Precio Max" class="form-control">
        <span class="input-group-text">€</span>
      </div>
    </div>

    <div class="col-md-3">
      <select name="localidad" id="localidad" class="form-select mb-3">
        <option value="">Todos</option>
        <?php foreach ($this->datos['localidades'] as $localidad):?>
          <option value="<?php echo htmlspecialchars($localidad->id_municipio) ?>"><?php echo htmlspecialchars($localidad->nombre_municipio) ?></option>
        <?php endforeach; ?>
      </select>
    </div>

  </div>

  <div class="text-center">
    <button class="btn btn-success" type="submit">Filtrar</button>
  </div>

</form>

<div class="spinner-border m-5" role="status" id="spiner" style="width: 3rem; height: 3rem;">
    <span class="visually-hidden">Loading...</span>
  </div>

<div id="contenidoload" class="d-none"> 
<div id="contenido" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4" >
  <!-- CARD 1 -->
  <?php foreach($datos['traspasos'] as $traspaso): ?>
  <div class="col">
    <div class="card h-50">
      <div id="carouselExampleControls<?php echo $traspaso->id_inmueble ?>" class="carousel slide">
        <div class="carousel-inner">
          <?php $active = true;  ?>

          <?php foreach ($this->datos['imagenes_traspasos'][$traspaso->id_inmueble] as $imagen): ?>
              <div class="carousel-item <?php echo $active ? 'active' : '' ?>">
                  <img src="<?php echo htmlspecialchars($imagen->ruta_imagen) ?>" class="img-casa d-block w-100" alt="..." style=" width:170px ; height:300px; ">
              </div>
              <?php $active = false; ?>
          <?php endforeach; ?>




        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls<?php echo $traspaso->id_inmueble ?>" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls<?php echo $traspaso->id_inmueble ?>" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      
      <div class="card-body">
        <h5 class="card-title"><?php echo htmlspecialchars($traspaso->titulo_oferta)?></h5>
        <?php
          // Obtener la fecha actual
          $fecha_actual = date("Y-m-d");
          // Fecha de publicación de la oferta
          $fecha_publicacion = $traspaso->fecha_publicacion_oferta;

          // Calcular la diferencia en días entre la fecha de publicación y la fecha actual
          $diferencia_dias = strtotime($fecha_actual) - strtotime($fecha_publicacion);
          $diferencia_dias = $diferencia_dias / (60 * 60 * 24); // Convertir a días

          // Verificar si la diferencia es menor a 5 días
          if ($diferencia_dias < 5) {
              // Mostrar la etiqueta HTML
              echo '<span class="badge bg-success mb-3 fs-6">Nueva</span>';
          }
        ?>

        <p class="card-text">
            <p><i class="bi bi-tag"></i> <?php echo htmlspecialchars($traspaso->precio_inm)?>€ - <i class="bi bi-superscript"></i> <?php echo $traspaso->metros_cuadrados_inmueble?>m²</p>
            <p><i class="bi bi-map"></i> <?php echo htmlspecialchars($traspaso->nombre_municipio)?></p>
            <p><?php echo recortarfrases($traspaso->descripcion_oferta, 40)?></p>
        </p>

          <a href="<?php echo RUTA_URL?>/Traspaso/vermas/<?php echo $traspaso->id_inmueble ?>" type="button" class="btn btn-secondary btn-sm">Ver más</a>
          
          <?php if ($datos['sesion'] != "") { 
            ?>
              <a href="<?php echo RUTA_URL?>/Chat/Inicio/<?php echo cifrar_url_aes($traspaso->id_usuario)?>" type="button" class="btn btn-primary btn-sm">Contactar</a>
            <?php 
            }else{
              ?>
              <?php
            }
            ?>

      </div>
    </div>
  </div>
  <?php endforeach; ?>
  <!-- CARD 1 -->
  </div>

</div>
</div>
<script>
function ready() {
    mostrar();
}

  document.addEventListener("DOMContentLoaded", ready);

function mostrar() {
    var cont = document.getElementById('contenidoload'); 
    cont.setAttribute("class", "d-block"); 
    var cont = document.getElementById('spiner'); 
    cont.setAttribute("class", "d-none"); 
}
</script>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
