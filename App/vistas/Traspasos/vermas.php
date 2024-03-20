<?php cabecera($this->datos); ?>
<!-- Contenido de la página -->

<div class="container mt-5">
  <div class="row">
    <div class="col-md-6">
      <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <?php
          $active = true;
          foreach ($datos['traspasosverImg'] as $imagen):
            ?>
            <div class="carousel-item <?php echo ($active ? 'active' : ''); ?> mt-5 pt-4">
              <img src="<?php echo htmlspecialchars($imagen->ruta_imagen) ?>" class="d-block w-100" alt="Imagen de la oferta">
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
        <?php foreach ($datos['traspasosver'] as $traspasover): ?>
        <p class="text-muted text-end"><i class="bi bi-calendar"></i>
          <?php echo date('d/m/Y', strtotime($traspasover->fecha_publicacion_oferta)) ?>
        </p>
        <h1>
          <?php echo htmlspecialchars($traspasover->titulo_oferta) ?>
        </h1>
        <h3>
          <?php echo recortarfrases(htmlspecialchars($traspasover->descripcion_oferta), 70)?>
        </h3>
        <p><strong><i class="bi bi-calendar-event"></i> Fecha de inicio:</strong>
          <?php echo date('d/m/Y', strtotime($traspasover->fecha_inicio_oferta)) ?>
        </p>
        <p><strong><i class="bi bi-calendar-event-fill"></i> Fecha de fin:</strong>
          <?php echo date('d/m/Y', strtotime($traspasover->fecha_fin_oferta))  ?>
        </p>
        <p><strong><i class="bi bi-card-checklist"></i> Condiciones:</strong>
          <?php echo htmlspecialchars($traspasover->condiciones_oferta) ?>
        </p>
    
        <p><strong><i class="bi bi-award-fill"></i>Estado:</strong>
          <?php echo htmlspecialchars($traspasover->estado) ?>
        </p>
        
        <p><i class="bi bi-geo-alt"></i>
          <?php echo htmlspecialchars($traspasover->direccion_inmueble) . ", " . htmlspecialchars($traspasover->nombre_municipio) ?>
        </p>
      </div>
    </div>
  </div>


  <div class="row mt-5">
    <div class="col-md-6">
      <h4>Detalles del Inmueble</h4>
      <p><strong><i class="bi bi-building"></i> Nombre:</strong>
        <?php echo htmlspecialchars($traspasover->nombre_local) ?>
      </p>
      <p><strong><i class="bi bi-clipboard-minus"></i> Descripción:</strong>
        <span><?php echo recortarfrases(htmlspecialchars($traspasover->descripcion_inmueble), 40)?></span>
      </p>
      <p><strong><i class="bi bi-grid-3x3-gap-fill"></i> Distribución:</strong>
        <?php echo htmlspecialchars($traspasover->distribucion_inmueble) ?>
      </p>
      <p><i class="bi bi-arrows-move"></i><strong> Metros Cuadrados:</strong>
        <?php echo $traspasover->metros_cuadrados_inmueble ?> m²
      </p>
      <p><strong><i class="bi bi-star-fill"></i> Características:</strong>
        <?php echo htmlspecialchars($traspasover->caracteristicas_inmueble) ?>
      </p>
      <p><strong><i class="bi bi-tools"></i> Equipamiento:</strong>
        <?php echo htmlspecialchars($traspasover->equipamiento_inmueble) ?>
      </p>
      <p><strong><i class="bi bi-cash-stack"></i> Tasado:</strong>
        <?php echo $traspasover->precio_inmueble ?>€ / Mes
      </p>
      <p><strong><i class="bi bi-arrows-move"></i> Capacidad:</strong>
        <?php echo htmlspecialchars($traspasover->capacidad_local) ?>
      </p>
      <p><strong><i class="bi bi-star-fill"></i> Recursos:</strong>
        <?php echo htmlspecialchars($traspasover->recursos_local) ?>
      </p>
    </div>
    <div class="col-md-6">
    <h4>Detalles del Negocio</h4>
      <p><strong><i class="bi bi-briefcase"></i> Nombre:</strong>
        <?php echo htmlspecialchars($traspasover->titulo_negocio) ?>
      </p>
      <p><strong><i class="bi bi-grid-3x3-gap-fill"></i> Motivo traspaso:</strong>
        <?php echo htmlspecialchars($traspasover->motivo_traspaso_negocio) ?>
      </p>
      <p><strong><i class="bi bi-cash-stack"></i> Coste de traspaso:</strong>
        <?php echo $traspasover->coste_traspaso_negocio ?>€
      </p>
      <p><strong><i class="bi bi-cash-stack"></i> Coste mensual:</strong>
        <?php echo $traspasover->coste_mensual_negocio ?>€ / Mes
      </p>
      <p><strong><i class="bi bi-clipboard-minus"></i></i> Descripcion:</strong>
        <span><?php echo recortarfrases(htmlspecialchars($traspasover->descripcion_negocio), 40)?></span>
      </p>
      <p><strong><i class="bi bi-cash-stack"></i> Capital minimo:</strong>
        <?php echo $traspasover->capital_minimo_negocio ?>€
      </p>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-md-6">
      <!-- <h4>Detalles del local</h4>
      <p><strong><i class="bi bi-building"></i> Nombre:</strong>
        <?php echo htmlspecialchars($traspasover->nombre_local) ?>
      </p>
      <p><strong><i class="bi bi-arrows-move"></i> Capacidad:</strong>
        <?php echo htmlspecialchars($traspasover->capacidad_local) ?>
      </p>
      <p><strong><i class="bi bi-star-fill"></i> Recursos:</strong>
        <?php echo htmlspecialchars($traspasover->recursos_local) ?>
      </p> -->
      <?php endforeach; ?>
    </div>
    <div class="col-md-6">
      <h1 id="precio" class="text-danger">Precio:
        <?php echo $traspasover->precio_inm ?>€
      </h1>
      <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-5">
      <?php if ($datos['sesion']!=""){?>
        <?php
        if($datos['reserva'] != ""){

        }else{
          
        }

        ?>
        <?php 
        $idUsuario = $datos['idusuario'][0]->id_usuario;
        
        if(count($datos['reserva'])==0){
            ?> 
              <form action="<?php echo RUTA_URL?>/Traspaso/reservar" method="post">
                <input type="hidden" name="id_oferta" id="id_oferta" value="<?php echo $traspasover->id_oferta?>">
                <input type="submit" class="btn btn-success btn-lg" value="Reservar">
              </form> 
            <?php
            }else{
            ?>  
              <p>¡Ya has reservado esta oferta!</p>
            <?php
            }
            ?>
        
        
        <!-- <button class="btn btn-success btn-lg"><i class="bi bi-calendar-plus"></i> Reserva</button> -->
        <a class="btn btn-warning btn-lg" href="<?php echo RUTA_URL?>/Chat/Inicio/<?php echo cifrar_url_aes($idUsuario)?>"><i class="bi bi-telephone-fill"></i> Contactar</a>
      <?php }else{
        
      }?>
      </div> 
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
<?php require_once RUTA_APP . '/vistas/inc/footer.php'; ?>