<?php cabecera($this->datos); ?>
<style>
  #mi_mapa {
    height: 400px;
    width: 600px;
  }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
  integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

<!-- Contenido de la página -->
<div class="container mt-5">
  <div class="row">
    <div class="col-md-6">
      <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <?php
          $active = true;
          foreach ($datos['imagenes'] as $imagen):
            ?>
            <div class="carousel-item <?php echo ($active ? 'active' : ''); ?>">
              <img src="<?php echo $imagen->ruta_imagen?>" class="d-block w-100" alt="Imagen de la oferta">
            </div>
            <?php
            $active = false;
          endforeach;
          ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Siguiente</span>
        </button>
      </div>
    </div>
    <div class="col-md-6">
      <div class="p-4">
        <p class="text-muted text-end"><i class="bi bi-calendar"></i>
          <?php echo date('d/m/Y', strtotime($this->datos['datosoferta']->fecha_publicacion_oferta)) ?>
        </p>
        <h1>
          <?php echo htmlspecialchars($this->datos['datosoferta']->titulo_oferta) ?>
        </h1>
        <h4>
          <?php echo recortarfrases(htmlspecialchars($this->datos['datosoferta']->descripcion_oferta ), 40)?>
        </h4>
        <p><strong><i class="bi bi-calendar-event"></i> Fecha de inicio:</strong>
          <?php echo date('d/m/Y', strtotime($this->datos['datosoferta']->fecha_inicio_oferta)) ?>
        </p>
        <p><strong><i class="bi bi-calendar-event-fill"></i> Fecha de fin:</strong>
          <?php echo date('d/m/Y', strtotime($this->datos['datosoferta']->fecha_fin_oferta)) ?>
        </p>
        <p><strong><i class="bi bi-card-checklist"></i> Condiciones:</strong>
          <?php echo htmlspecialchars($this->datos['datosoferta']->condiciones_oferta) ?>
        </p>
    
        <p><strong><i class="bi bi-award-fill"></i>Estado:</strong>
          <?php echo htmlspecialchars($this->datos['datosinmueble']->estado) ?>
        </p>
        
        <p><i class="bi bi-geo-alt"></i>
          <?php echo $this->datos['datosinmueble']->direccion_inmueble . ", " . $this->datos['datosinmueble']->nombre_municipio?>
        </p>
      </div>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-md-6">
      <h4>Detalles del Inmueble</h4>
      <p><strong><i class="bi bi-house-fill"></i> Descripción:</strong>
      <span><?php echo recortarfrases(htmlspecialchars($this->datos['datosinmueble']->descripcion_inmueble), 40)?></span>
      </p>
      <p><strong><i class="bi bi-grid-3x3-gap-fill"></i> Distribución:</strong>
        <?php echo htmlspecialchars($this->datos['datosinmueble']->distribucion_inmueble) ?>
      </p>
      <p><strong>Metros Cuadrados:</strong>
        <?php echo htmlspecialchars($this->datos['datosinmueble']->metros_cuadrados_inmueble) ?> m²
      </p>
      <p><strong><i class="bi bi-star-fill"></i> Características:</strong>
      <span><?php echo recortarfrases(htmlspecialchars($this->datos['datosinmueble']->caracteristicas_inmueble), 40)?></span>
      </p>
      <p><strong><i class="bi bi-tools"></i> Equipamiento:</strong>
        <span><?php echo recortarfrases(htmlspecialchars($this->datos['datosinmueble']->equipamiento_inmueble), 40)?></span>
      </p>
      <p><strong><i class="bi bi-cash-stack"></i> Tasado:</strong>
        <?php echo htmlspecialchars($this->datos['datosinmueble']->precio_inmueble) ?>€ / Mes
      </p>
      <p><strong><i class="bi bi-universal-access-circle"></i> Número habitaciones:</strong>
        <?php echo htmlspecialchars($this->datos['datosvivienda']->habitaciones_vivienda) ?>
      </p>
      <p><strong><i class="bi bi-building-exclamation"></i> Tipo:</strong>
        <?php echo htmlspecialchars($this->datos['datosvivienda']->tipo_vivienda) ?>
      </p>





    </div>
    <div class="col-md-6">

      <!--Esto lo quitare de aqui en un futuro de momento esta aqui de manera provisional -->
      <?php
      $mensajes = array(
        "<strong>¡Oportunidad única!</strong> Este inmueble cuenta con una ubicación privilegiada y características impresionantes. ¡Contáctanos para más detalles!",
        "<strong>¡No te pierdas esta oportunidad!</strong> Un inmueble excepcional te está esperando con amplios espacios y vistas espectaculares. ¡Contáctanos ahora!",
        "<strong>¡Increíble oportunidad de inversión!</strong> Este inmueble puede ser tuyo con excelente rentabilidad y potencial de crecimiento. ¡Contáctanos para más información!",
        "<strong>¡Descubre este magnífico inmueble!</strong> Perfecto para ti, con acabados de alta calidad y comodidades modernas. ¡Contáctanos para conocer más!",
        "<strong>¡No dejes pasar esta oportunidad!</strong> Un inmueble de ensueño te está esperando con amplias áreas verdes y espacios para disfrutar en familia. ¡Contáctanos para más detalles!"
      );

      // Obtener un mensaje aleatorio
      $mensaje_aleatorio = $mensajes[array_rand($mensajes)];
      ?>

      <div class="alert alert-danger" role="alert">
        <?php echo $mensaje_aleatorio ; ?>
      </div>



      <h1 id="precio" class="text-danger">Precio:
        <?php echo htmlspecialchars($this->datos['datosinmueble']->precio_inm) ?>€ / Mes
      </h1>
      <?php if($datos['sesion']!=""): ?>
      <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-5">
        <?php 
        
        if($datos['reserva'] != ""){
            ?>  
            <p>¡Ya has reservado esta oferta!</p>
            <?php
            }else{
              ?>
                <form action="<?php echo RUTA_URL?>/Alquiler/reservar" method="post">
                  <input type="hidden" name="id_oferta" id="id_oferta" value="<?php echo htmlspecialchars($this->datos['datosoferta']->id_oferta)?>">
                  <input type="submit" class="btn btn-success btn-lg" value="Reservar">
                </form>
              <?php
            }
        ?>
        
        <a href="<?php echo RUTA_URL?>/Chat/Inicio/<?php echo cifrar_url_aes($datos['idusuario']->id_usuario)?>" class="btn btn-warning btn-lg"><i class="bi bi-telephone-fill"></i> Contactar</a>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="row mt-5">
    <hr>
  
  <div id="contenido" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
    <script>
      window.onload = function () {
        ordenar(1);
      };
    </script>

  </div>

</div>
</div>



<script src="<?php echo RUTA_URL ?>/js/AsincronoAlquileres.js"></script>

<script src="<?php echo RUTA_URL ?>/js/vermas.js"></script>
<?php require_once RUTA_APP . '/vistas/inc/footer.php'; ?>