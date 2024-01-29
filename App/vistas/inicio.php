<?php cabecera($this->datos); ?>

<main>
  <!-- CARRUSEL -->

  <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        
        <img src="<?php echo RUTA_URL_IMAGENES?>/index/rutas-moteras-bajo-aragon-21.jpg" class="col-sm-2 w-100 objetfit" alt="Bajo Aragon">
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>BAJO ARAGON</h1>
            <p class="sombreado">Descubre las majestuosas rutas moteras que recorren la hermosa Comarca del Bajo Aragón. Experimenta la emoción de explorar paisajes únicos y disfruta de la libertad en cada curva.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Descubre más</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
         
        <img src="<?php echo RUTA_URL_IMAGENES?>/index/IMG_8958-2.jpg" class="col-sm-1 w-100 objetfit"  alt="Bajo Aragon">
        <div class="container">
          <div class="carousel-caption">
            <h1>ALCAÑIZ</h1>
            <p class="sombreado">Sumérgete en la esencia de Alcañiz, donde la historia se encuentra con la modernidad. Desde eventos culturales vibrantes hasta experiencias gastronómicas únicas, hay algo para todos en esta joya del Bajo Aragón.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Ver más</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?php echo RUTA_URL_IMAGENES?>/index/foto-bodega-san-pedro-igp-vino-bajo-aragon.jpg" class="col-sm-2 w-100 objetfit" alt="Bajo Aragon">
        <div class="container">
          <div class="carousel-caption text-end">
            <h1>ALCORISA</h1>
            <p class="sombreado">Descubre la autenticidad de Alcorisa, donde la hospitalidad se mezcla con la tradición. Explora sus calles históricas, conoce a la gente local y sumérgete en la vida cotidiana de esta encantadora localidad del Bajo Aragón.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Explorar</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
    <!-- INFORMACION CENTRAL -->


  <div class="container marketing mt-4">

    <div class="row">
      <div class="col-lg-4 justify-content-center align-items-center text-center">
        <img src="<?php echo RUTA_URL_IMAGENES?>/index/contrato-de-alquiler-temporal.jpeg" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="Alquiler Image">
        <!-- <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg> -->
        <h2 class="fw-normal">Alquiler</h2>
        <p>Explora una variedad de opciones de alquiler en nuestra zona. Encuentra el lugar perfecto para llamar hogar con nuestra selección cuidadosamente curada de propiedades en alquiler.</p>
        <p><a class="btn btn-secondary" href="#">Ver alquileres &raquo;</a></p>
      </div>
      <div class="col-lg-4 justify-content-center align-items-center text-center">
        <img src="<?php echo RUTA_URL_IMAGENES?>/index/Traspaso.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="Alquiler Image">
        <!-- <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg> -->
        <h2 class="fw-normal">Traspasos</h2>
        <p>Descubre emocionantes oportunidades de negocios con nuestros anuncios de traspasos. Ya sea que compres o vendas, encuentra la combinación perfecta para tu trayectoria emprendedora.</p>        
        <p><a class="btn btn-secondary" href="#">Ver traspasos  &raquo;</a></p>
      </div>
      <div class="col-lg-4 justify-content-center align-items-center text-center">
        <img src="<?php echo RUTA_URL_IMAGENES?>/index/Biblioteca_Barzio.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="Alquiler Image">
        <!-- <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg> -->
        <h2 class="fw-normal">Servicios</h2>
        <p>Explora servicios locales que mejoran tu experiencia de vida. Desde mantenimiento hasta servicios públicos, descubre servicios confiables y convenientes en nuestra comunidad.</p>        
        <p><a class="btn btn-secondary" href="#">Ver servicios &raquo;</a></p>
      </div>
    </div>

        <!-- INFORMACION FINAL -->


    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 d-flex align-items-center">
        <div>
          <h2 class="featurette-heading fw-normal lh-1">Descubre tu nuevo hogar en alquiler. <span class="text-body-secondary d-block">Encuentra el lugar perfecto para ti.</span></h2>
          <p class="lead">Explora nuestra selección de propiedades en alquiler con comodidades que se adaptan a tu estilo de vida. ¡Tu próximo hogar te está esperando!</p>
        </div>
      </div>
      <div class="col-md-5">
        <img src="<?php echo RUTA_URL_IMAGENES?>/index/CASA-RURAL.jpg" alt="Imagen" class="img-fluid mx-auto" width="500" height="500">
      </div>      
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2 d-flex align-items-center">
        <div>
          <h2 class="featurette-heading fw-normal lh-1">Oportunidades de traspasos. <span class="text-body-secondary d-block">Haz crecer tu negocio.</span></h2>
          <p class="lead">Explora emocionantes oportunidades de traspasos y haz crecer tu negocio. Ya sea que estés buscando comprar o vender, aquí encontrarás la opción perfecta.</p>
        </div>
      </div>
      <div class="col-md-5">
        <img src="<?php echo RUTA_URL_IMAGENES?>/index/panaderia.jpg" alt="Imagen" class="img-fluid mx-auto" width="500" height="500">
      </div> 
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 d-flex align-items-center">
        <div>
          <h2 class="featurette-heading fw-normal lh-1">Descubre servicios locales. <span class="text-body-secondary d-block">Mejora tu experiencia de vida.</span></h2>
          <p class="lead">Explora una variedad de servicios locales que mejorarán tu experiencia de vida. Desde mantenimiento hasta servicios públicos, aquí encontrarás todo lo que necesitas.</p>
        </div>
      </div>
      <div class="col-md-5">
        <img src="<?php echo RUTA_URL_IMAGENES?>/index/bar.jpg" alt="Imagen" class="img-fluid mx-auto" width="500" height="500">
      </div> 
    </div>

    <hr class="featurette-divider">
    
  </div>

</main>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
