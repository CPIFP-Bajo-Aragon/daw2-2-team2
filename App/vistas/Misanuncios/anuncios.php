<?php cabecera($this->datos); ?>

<div class="container mt-5">
    <div class="jumbotron text-center">
        <h1 class="display-3">Mis anuncios</h1>
    </div>
    <hr class="mt-4">
    <div class="text-center">
        <a href="#" class="btn btn-primary btn-lg">Subir Anuncio</a>
    </div>
    <div class="mt-3">
        <?php foreach($datos['anuncios'] as $anuncio): ?>
            <?php
                //print_r($datos);
            ?>
            <div class="card mb-3">
                <img src="<?php echo $anuncio->fotos; ?>" class="card-img-top" alt="Fotos">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $anuncio->titulo; ?></h5>
                    <p class="card-text"><?php echo $anuncio->descripcion; ?></p>
                    <p class="card-text"><strong>Precio:</strong> <?php echo $anuncio->precio; ?>€</p>

                    <!-- INICIO MODAL -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" onclick="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ver Detalles
                    </button>
                    <!-- <button class="btn btn-primary" onclick="openModalDetalles({ 'fotos': 'URL', 'titulo': 'Título', 'descripcion': 'Descripción', 'metros_cuadrados': 100, 'precio': 1000, 'fecha_publicacion': '2024-01-29', 'estado': 'Disponible', 'nombre_municipio': 'Ciudad' })">Ver Detalles</button> -->

                    
                    <!-- <div id="modal-container"></div> -->


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detalles</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Fotos: <?php echo $anuncio->fotos; ?></p>
                                <p>Título: <?php echo $anuncio->titulo; ?></p>
                                <p>Descripción: <?php echo $anuncio->descripcion; ?></p>
                                <p>Metros Cuadrados: <?php echo $anuncio->metros_cuadrados; ?>m²</p>
                                <p>Precio: <?php echo $anuncio->precio; ?>€</p>
                                <p>Fecha de Publicación: <?php echo $anuncio->fecha_publicacion; ?></p>
                                <p>Estado: <?php echo $anuncio->estado; ?></p>
                                <p>Municipio: <?php echo $anuncio->nombre_municipio; ?></p>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- FIN MODAL --> 
                    <!-- INICIO MODAL -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                    Modificar
                    </button>
                    <?php
                    //print_r($datos);
                    // print_r($datos['municipios']);
                    // print_r($datos['municipios']->id_municipio);
                    ?>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModal2Label">Modificar</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo RUTA_URL?>/Misanuncios/modificarAnuncio" method="post">
                                <!-- <p>Fotos: <input type="text" name="fotos" value="<?php echo $anuncio->fotos; ?>" id="fotos"></p> -->
                                <p>Título: <input type="text" name="titulo" value="<?php echo $anuncio->titulo; ?>" id="titulo"></p>
                                <p>Descripción: <input type="text" name="descripcion" value="<?php echo $anuncio->descripcion; ?>" id="descripcion"></p>
                                <!-- <p>Descripción: <textarea name="descripcion" id="descripcion"><?php echo $anuncio->descripcion; ?></textarea></p> -->
                                <p>Distribucion: <input type="text" name="distribucion" value="<?php echo $anuncio->distribucion; ?>" id="distribucion"></p>
                                <p>Caracteristicas: <input type="text" name="caracteristicas" value="<?php echo $anuncio->caracteristicas; ?>" id="caracteristicas"></p>
                                <p>Direccion: <input type="text" name="direccion" value="<?php echo $anuncio->direccion; ?>" id="direccion"></p>
                                <p>Metros Cuadrados: <input type="text" name="metros_cuadrados" value="<?php echo $anuncio->metros_cuadrados; ?>" id="metros_cuadrados"></p>
                                <p>Precio: <input type="text" name="precio" value="<?php echo $anuncio->precio; ?>" id="precio"></p>
                                <div>
                                    <p>Municipio:</p>
                                    <select name="id_municipio" id="">
                                        <option value="<?php echo $anuncio->id_municipio; ?>"><?php echo $anuncio->nombre_municipio; ?></option>
                                    <?php foreach($datos['municipios'] as $municipio): ?>
                                        <?php
                                        // print_r($datos);
                                        //print_r($datos['anuncios']);
                                    
                                        if($municipio->id_municipio == $anuncio->id_municipio){
                                            
                                        }else{
                                            ?>
                                                <option value="<?php echo $municipio->id_municipio;?>"><?php echo $municipio->nombre_municipio; ?></option>
                                            <?php
                                        }
                                        ?>
                                    <?php endforeach; ?>
                                    </select>
                                </div> 
                                <!-- <p>Estado: <input type="text" name="estado" value="<?php echo $anuncio->estado; ?>" id="estado"></p> -->
                                <!-- <p>Municipio: <input type="text" name="nombre_municipio" value="<?php echo $anuncio->nombre_municipio; ?>" id="nombre_municipio"></p> -->
                                <input type="hidden" name="id_oferta" value="<?php echo $anuncio->id_oferta; ?>" id="id_oferta">
                                <input type="submit" class="btn btn-primary mt-3" value="Guardar cambios">
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- FIN MODAL --> 
                    
                </div>
            </div>
 
        <?php endforeach; ?>
        
    </div>
</div>
<script src="<?php echo RUTA_URL?>/js/modalMisanuncios.js"></script>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
