<?php cabecera($this->datos); ?>

<div class="container mt-5">
    <div class="jumbotron text-center">
        <h1 class="display-3">Mis anuncios</h1>
    </div>
    <hr class="mt-4">
    <div class="text-center">
        <a href="<?php echo RUTA_URL?>/Misanuncios/anuncioInmueble" class="btn btn-primary btn-lg mr-4" >Subir Inmueble</a>
        <a href="<?php echo RUTA_URL?>/Misanuncios/anuncioTraspaso" class="btn btn-success btn-lg">Subir Traspaso</a>
    </div>
    <div class="mt-3">
    <?php  
    if(count($datos['anuncios']) === 0){
        
    }else{
        ?>
        <h4>Alquileres</h4>
        <?php
    }
    ?>
        <?php foreach($datos['anuncios'] as $anuncio): ?>
            <div class="card mb-3">
                <div class="card-body row">
                    <div class="col-xxl-3 col-xl-3 col-lg-3 d-flex align-items-center">
                        <img src="<?php echo $anuncio->ruta_imagen ?>" width="300" height="200" alt="Foto inmueble">
                    </div>
                    <div class="col-xxl-7 col-xl-7 col-lg-7 mt-3">
                        <h5 class="card-title"><?php echo $anuncio->titulo_oferta ?></h5>
                        <p class="card-text"><?php echo $anuncio->descripcion_oferta ?></p>
                        <p class="card-text"><strong>Precio:</strong> <?php echo $anuncio->precio_inm ?>€</p>
                    </div>
                    <div class="col-xxl-2 col-xl-2 col-lg-2 mt-3">
                        <!-- INICIO MODAL -->
                        <!-- Button trigger modal -->
                        <div class="">
                        <div class="col mb-3">
                            <button type="button" class="btn btn-outline-primary w-100" onclick="" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $anuncio->id_oferta ?>">
                            Ver Detalles
                            </button>
                        </div>

                        <!-- Modal Asincrono -->
                        <!-- <button id="btnModal" class="btn btn-primary" onclick="openModalDetalles(this.value)">Ver Detalles</button>
                        <div id="modal-container"></div> -->
                        <!-- Modal Asincrono -->



                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $anuncio->id_oferta ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detalles</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3>Oferta</h3>
                                                <p><strong>Título:</strong> <?php echo $anuncio->titulo_oferta?></p>
                                                <p><strong>Fecha inicio:</strong> <?php echo $anuncio->fecha_inicio_oferta?></p>
                                                <p><strong>Fecha fin:</strong> <?php echo $anuncio->fecha_fin_oferta?></p>
                                                <p><strong>Condiciones de Oferta:</strong> <?php echo $anuncio->condiciones_oferta ?> </p>
                                                <p><strong>Descripción de la Oferta:</strong> <?php $anuncio->descripcion_oferta?></p>
                                                <p><strong>Fecha de Publicación:</strong> <?php echo $anuncio->fecha_publicacion_oferta?></p>
                                                <p><strong>Precio oferta:</strong> <?php echo $anuncio->precio_inm?>€</p>
                                            </div>
                                            <div class="col-md-6">
                                                <h3>Inmueble</h3>
                                                <p><strong>Distribución:</strong> <?php echo nl2br($anuncio->distribucion_inmueble) ?></p>
                                                <p><strong>Descripción del Inmueble:</strong>
                                                    <span>
                                                        <?php echo recortarfrases($anuncio->descripcion_inmueble, 70)?>
                                                    </span>
                                                </p>  
                                                <p><strong>Características:</strong> <?php echo $anuncio->caracteristicas_inmueble?></p>
                                                <p><strong>Equipamiento:</strong> <?php echo $anuncio->equipamiento_inmueble?></p>
                                                <p><strong>Direccion:</strong> <?php echo $anuncio->direccion_inmueble?></p>
                                                <p><strong>Metros Cuadrados:</strong> <?php echo $anuncio->metros_cuadrados_inmueble?>m²</p>
                                                <p><strong>Valorado en:</strong> <?php echo $anuncio->precio_inmueble?>€</p>
                                                <p><strong>Estado:</strong> <?php echo $anuncio->estado?></p>
                                                <p><strong>Municipio:</strong> <?php echo $anuncio->nombre_municipio?></p>
                                                <p><strong>Habitaciones:</strong> <?php echo $anuncio->habitaciones_vivienda?></p>
                                                <p><strong>Tipo:</strong> <?php echo $anuncio->tipo_vivienda?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- FIN MODAL --> 

                        <!-- BOTON MODAL -->
                        <div class="col mb-3">
                        <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal3<?php echo $anuncio->id_oferta ?>">
                        Modificar oferta
                        </button>
                        </div>
                        <!-- INICIO MODAL -->
                        <div class="modal fade" id="exampleModal3<?php echo $anuncio->id_oferta ?>" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModal2Label">Modificar oferta</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="<?php echo RUTA_URL?>/Misanuncios/modificarAnuncioOferta" method="post">
                                <div class="mb-3">
                                    <label for="titulo" class="form-label">Título:</label>
                                    <input type="text" name="titulooferta" id="titulo" value="<?php echo $anuncio->titulo_oferta?>" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="iniciooferta" class="form-label">Fecha inicio:</label>
                                            <input type="date" name="iniciooferta" id="iniciooferta" value="<?php echo $anuncio->fecha_inicio_oferta?>" class="form-control">
                                        </div>
                                    </div>
    
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="finoferta" class="form-label">Fecha fin:</label>
                                            <input type="date" name="finoferta" id="finoferta" value="<?php echo $anuncio->fecha_fin_oferta?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="precio_oferta" class="form-label">Precio oferta:</label>
                                        <div class="input-group">
                                            <input type="number" name="precio_oferta" id="precio_oferta" value="<?php echo $anuncio->precio_inm?>" class="form-control">
                                            <span class="input-group-text">€</span>
                                        </div>
                                </div>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="mb-3">
                                    <label for="condicionesoferta" class="form-label">Condiciones:</label>
                                    <textarea name="condicionesoferta" id="condicionesoferta" class="form-control"><?php echo preg_replace('#<br\s*/?>#i', "\n", $anuncio->condiciones_oferta);?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="descripcionoferta" class="form-label">Descripción:</label>
                                    <textarea name="descripcionoferta" id="descripcionoferta" class="form-control"><?php echo preg_replace('#<br\s*/?>#i', "\n", $anuncio->descripcion_oferta);?></textarea>
                                </div>
                                <input type="hidden" name="id_oferta" value="<?php echo $anuncio->id_oferta ?>" id="id_oferta">
                                <input type="submit" class="btn btn-primary mt-3" value="Guardar cambios">
                            </form>

                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- FIN MODAL --> 
                        <!-- BOTON MODAL -->
                        <div class="col mb-3">
                        <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal2<?php echo $anuncio->id_oferta ?>">
                        Modificar inmueble
                        </button>
                        </div>

                        <!-- INICIO MODAL -->
                        <div class="modal fade" id="exampleModal2<?php echo $anuncio->id_oferta ?>" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModal2Label">Modificar inmueble</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="<?php echo RUTA_URL?>/Misanuncios/modificarAnuncio" method="post">
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción:</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control"><?php echo preg_replace('#<br\s*/?>#i', "\n", $anuncio->descripcion_inmueble); ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="distribucion" class="form-label">Distribución:</label>
                                    <textarea name="distribucion" id="distribucion" class="form-control"><?php echo preg_replace('#<br\s*/?>#i', "\n",$anuncio->distribucion_inmueble); ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="caracteristicas" class="form-label">Características:</label>
                                    <textarea name="caracteristicas" id="caracteristicas" class="form-control"><?php echo preg_replace('#<br\s*/?>#i', "\n",$anuncio->caracteristicas_inmueble); ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="equipamiento" class="form-label">Equipamiento:</label>
                                    <textarea name="equipamiento" id="equipamiento" class="form-control"><?php echo preg_replace('#<br\s*/?>#i', "\n",$anuncio->equipamiento_inmueble); ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección:</label>
                                    <input type="text" name="direccion" id="direccion" value="<?php echo $anuncio->direccion_inmueble ?>" class="form-control">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="metros_cuadrados" class="form-label">Metros Cuadrados:</label>
                                        <div class="input-group mb-3">
                                            <input type="number" name="metros_cuadrados" id="metros_cuadrados" value="<?php echo $anuncio->metros_cuadrados_inmueble ?>" class="form-control">
                                            <span class="input-group-text">m²</span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="valoradoen" class="form-label">Valorado en:</label>
                                        <div class="input-group mb-3">
                                            <input type="number" name="valoradoen" id="valoradoen" value="<?php echo $anuncio->precio_inmueble ?>" class="form-control">
                                            <span class="input-group-text">€</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="id_estado" class="form-label">Estado:</label>
                                            <select name="id_estado" id="id_estado" class="form-select">
                                                <option value="<?php echo $anuncio->id_estado ?>"><?php echo $anuncio->estado ?></option>
                                                <?php foreach($datos['estados'] as $estado): ?>
                                                    <?php if($estado->id_estado != $anuncio->id_estado): ?>
                                                        <option value="<?php echo $estado->id_estado ?>"><?php echo $estado->estado ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div> 
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="id_municipio" class="form-label">Municipio:</label>
                                            <select name="id_municipio" id="id_municipio" class="form-select">
                                                <option value="<?php echo $anuncio->id_municipio ?>"><?php echo $anuncio->nombre_municipio ?></option>
                                                <?php foreach($datos['municipios'] as $municipio): ?>
                                                    <?php if($municipio->id_municipio != $anuncio->id_municipio): ?>
                                                        <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div> 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="num_habitaciones" class="form-label">Habitaciones:</label>
                                            <input type="text" name="num_habitaciones" id="num_habitaciones" class="form-control" value="<?php echo $anuncio->habitaciones_vivienda?>">
                                        </div> 
                                    </div>
                                    
                                    <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tipo_vivienda" class="form-label">Tipo vivienda:</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="tipo_vivienda" id="exampleRadios1" value="Casa" <?php if($anuncio->tipo_vivienda=="Casa"){ echo "checked"; }?>>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Casa
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="tipo_vivienda" id="exampleRadios2" value="Piso" <?php if($anuncio->tipo_vivienda=="Piso"){ echo "checked"; }?>>
                                                <label class="form-check-label" for="exampleRadios2">
                                                    Piso
                                                </label>
                                            </div>
                                    </div>
                                    </div>
                                </div>

                                <input type="hidden" name="id_vivienda" value="<?php echo $anuncio->id_vivienda ?>" id="id_vivienda">
                                <input type="hidden" name="id_inmueble" value="<?php echo $anuncio->id_inmueble ?>" id="id_inmueble">
                                <input type="submit" class="btn btn-primary mt-3" value="Guardar cambios">
                            </form>

                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- FIN MODAL --> 

                        <div class="col mb-3">
                        <form action="<?php echo RUTA_URL?>/Misanuncios/eliminarAnuncio" method="post">
                            <input type="hidden" name="id_oferta" value="<?php echo $anuncio->id_oferta ?>" id="">
                            <input type="submit" class="btn btn-outline-danger w-100" value="Eliminar">
                        </form>
                        </div>
                        </div>
                    </div>                   
                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <div class="mt-3">

    <?php
    if(count($datos['anunciosTraspasos']) === 0){
        
    }else{
        ?>
        <h4>Traspasos</h4>
        <?php
    }
    ?>
        <?php foreach($datos['anunciosTraspasos'] as $anuncioTraspaso): ?>
            <div class="card mb-3">
                <div class="card-body row">
                    <div class="col-xxl-3 col-xl-3 col-lg-3 d-flex justify-content-center align-items-center">
                        <img src="<?php echo $anuncioTraspaso->ruta_imagen ?>" width="300" height="200" alt="Foto inmueble">
                    </div>
                    <div class="col-xxl-7 col-xl-7 col-lg-7 mt-3 d-flex align-items-center">
                        <div>
                            <h5 class="card-title"><?php echo $anuncioTraspaso->titulo_oferta ?></h5>
                            <p class="card-text"><?php echo $anuncioTraspaso->descripcion_oferta ?></p>
                            <p class="card-text"><strong>Precio:</strong> <?php echo $anuncioTraspaso->precio_inm ?>€</p>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-xl-2 col-lg-2 mt-3">
                        <!-- INICIO MODAL -->
                        <!-- Button trigger modal -->
                        <div class="">
                        <div class="col mb-3">
                            <button type="button" class="btn btn-outline-primary w-100" onclick="" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $anuncioTraspaso->id_oferta ?>">
                            Ver Detalles
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $anuncioTraspaso->id_oferta ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detalles</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3>Oferta</h3>
                                                <p><strong>Título:</strong> <?php echo $anuncioTraspaso->titulo_oferta?></p>
                                                <p><strong>Fecha inicio:</strong> <?php echo $anuncioTraspaso->fecha_inicio_oferta?></p>
                                                <p><strong>Fecha fin:</strong> <?php echo $anuncioTraspaso->fecha_fin_oferta?></p>
                                                <p><strong>Condiciones de Oferta:</strong> <?php echo $anuncioTraspaso->condiciones_oferta?></p>
                                                <p><strong>Descripción de la Oferta:</strong> <?php echo $anuncioTraspaso->descripcion_oferta?></p>
                                                <p><strong>Fecha de Publicación:</strong> <?php echo $anuncioTraspaso->fecha_publicacion_oferta?></p>
                                                <p><strong>Precio oferta:</strong> <?php echo $anuncioTraspaso->precio_inm?>€</p>
                                            </div>
                                            <div class="col-md-6">
                                                <h3>Inmueble</h3>
                                                <p><strong>Distribución:</strong> <?php echo nl2br($anuncioTraspaso->distribucion_inmueble) ?></p>
                                                <p><strong>Descripción del Inmueble:</strong> <?php echo $anuncioTraspaso->descripcion_inmueble?></p>  
                                                <p><strong>Características:</strong> <?php echo $anuncioTraspaso->caracteristicas_inmueble?></p>
                                                <p><strong>Equipamiento:</strong> <?php echo $anuncioTraspaso->equipamiento_inmueble?></p>
                                                <p><strong>Direccion:</strong> <?php echo $anuncioTraspaso->direccion_inmueble?></p>
                                                <p><strong>Metros Cuadrados:</strong> <?php echo $anuncioTraspaso->metros_cuadrados_inmueble?>m²</p>
                                                <p><strong>Valorado en:</strong> <?php echo $anuncioTraspaso->precio_inmueble?>€</p>
                                                <p><strong>Estado:</strong> <?php echo $anuncioTraspaso->estado?></p>
                                                <p><strong>Municipio:</strong> <?php echo $anuncioTraspaso->nombre_municipio?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3>Negocio</h3>
                                                <p><strong>Titulo:</strong> <?php echo $anuncioTraspaso->titulo_negocio?></p>
                                                <p><strong>Motivo de traspaso:</strong> <?php echo $anuncioTraspaso->motivo_traspaso_negocio?></p>
                                                <p><strong>Coste:</strong> <?php echo $anuncioTraspaso->coste_traspaso_negocio?></p>
                                                <p><strong>Coste mensual:</strong> <?php echo $anuncioTraspaso->coste_mensual_negocio?></p>
                                                <p><strong>Descripción:</strong> <?php echo $anuncioTraspaso->descripcion_negocio?></p>
                                                <p><strong>Capital minimo:</strong> <?php echo $anuncioTraspaso->capital_minimo_negocio?></p>

                                            </div>
                                            <div class="col-md-6">
                                                <h3>Local</h3>
                                                <p><strong>Nombre:</strong> <?php echo $anuncioTraspaso->nombre_local?></p>
                                                <p><strong>Capacidad:</strong> <?php echo $anuncioTraspaso->capacidad_local?></p>
                                                <p><strong>Recursos:</strong> <?php echo $anuncioTraspaso->recursos_local?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- FIN MODAL --> 

                        <!-- BOTON MODAL -->
                        <div class="col mb-3">
                        <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal3<?php echo $anuncioTraspaso->id_oferta ?>">
                        Modificar oferta
                        </button>
                        </div>
                        <!-- INICIO MODAL -->
                        <div class="modal fade" id="exampleModal3<?php echo $anuncioTraspaso->id_oferta ?>" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModal2Label">Modificar oferta</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo RUTA_URL?>/Misanuncios/modificarAnuncioOferta" method="post">
                                    <div class="mb-3">
                                        <label for="titulo" class="form-label">Título:</label>
                                        <input type="text" name="titulooferta" id="titulo" value="<?php echo $anuncioTraspaso->titulo_oferta?>" class="form-control">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="iniciooferta" class="form-label">Fecha inicio:</label>
                                                <input type="date" name="iniciooferta" id="iniciooferta" value="<?php echo $anuncioTraspaso->fecha_inicio_oferta?>" class="form-control">
                                            </div>
                                        </div>
        
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="finoferta" class="form-label">Fecha fin:</label>
                                                <input type="date" name="finoferta" id="finoferta" value="<?php echo $anuncioTraspaso->fecha_fin_oferta?>" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="precio_oferta" class="form-label">Precio oferta:</label>
                                            <div class="input-group">
                                                <input type="number" name="precio_oferta" id="precio_oferta" value="<?php echo $anuncioTraspaso->precio_inm?>" class="form-control">
                                                <span class="input-group-text">€</span>
                                            </div>
                                    </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="mb-3">
                                        <label for="condicionesoferta" class="form-label">Condiciones:</label>
                                        <textarea name="condicionesoferta" id="condicionesoferta" class="form-control"><?php echo preg_replace('#<br\s*/?>#i', "\n", $anuncioTraspaso->condiciones_oferta);?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="descripcionoferta" class="form-label">Descripción:</label>
                                        <textarea name="descripcionoferta" id="descripcionoferta" class="form-control"><?php echo preg_replace('#<br\s*/?>#i', "\n", $anuncioTraspaso->descripcion_oferta);?></textarea>
                                    </div>
                                    <input type="hidden" name="id_oferta" value="<?php echo $anuncioTraspaso->id_oferta ?>" id="id_oferta">
                                    <input type="submit" class="btn btn-primary mt-3" value="Guardar cambios">
                                </form>

                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- FIN MODAL --> 
                        <!-- BOTON MODAL -->
                        <div class="col mb-3">
                        <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal2<?php echo $anuncioTraspaso->id_oferta ?>">
                        Modificar inmueble
                        </button>
                        </div>

                        <!-- INICIO MODAL -->
                        <div class="modal fade" id="exampleModal2<?php echo $anuncioTraspaso->id_oferta ?>" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModal2Label">Modificar inmueble</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo RUTA_URL?>/Misanuncios/modificarAnuncio" method="post">
                                    <div class="mb-3">
                                        <label for="descripcion" class="form-label">Descripción:</label>
                                        <textarea name="descripcion" id="descripcion" class="form-control"><?php echo preg_replace('#<br\s*/?>#i', "\n", $anuncioTraspaso->descripcion_inmueble); ?></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="distribucion" class="form-label">Distribución:</label>
                                        <textarea name="distribucion" id="distribucion" class="form-control"><?php echo preg_replace('#<br\s*/?>#i', "\n",$anuncioTraspaso->distribucion_inmueble); ?></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="caracteristicas" class="form-label">Características:</label>
                                        <textarea name="caracteristicas" id="caracteristicas" class="form-control"><?php echo preg_replace('#<br\s*/?>#i', "\n",$anuncioTraspaso->caracteristicas_inmueble); ?></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="equipamiento" class="form-label">Equipamiento:</label>
                                        <textarea name="equipamiento" id="equipamiento" class="form-control"><?php echo preg_replace('#<br\s*/?>#i', "\n",$anuncioTraspaso->equipamiento_inmueble); ?></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="direccion" class="form-label">Dirección:</label>
                                        <input type="text" name="direccion" id="direccion" value="<?php echo $anuncioTraspaso->direccion_inmueble ?>" class="form-control">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="metros_cuadrados" class="form-label">Metros Cuadrados:</label>
                                            <div class="input-group mb-3">
                                                <input type="number" name="metros_cuadrados" id="metros_cuadrados" value="<?php echo $anuncioTraspaso->metros_cuadrados_inmueble ?>" class="form-control">
                                                <span class="input-group-text">m²</span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label for="valoradoen" class="form-label">Valorado en:</label>
                                            <div class="input-group mb-3">
                                                <input type="number" name="valoradoen" id="valoradoen" value="<?php echo $anuncioTraspaso->precio_inmueble ?>" class="form-control">
                                                <span class="input-group-text">€</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="id_estado" class="form-label">Estado:</label>
                                                <select name="id_estado" id="id_estado" class="form-select">
                                                    <option value="<?php echo $anuncioTraspaso->id_estado ?>"><?php echo $anuncioTraspaso->estado ?></option>
                                                    <?php foreach($datos['estados'] as $estado): ?>
                                                        <?php if($estado->id_estado != $anuncioTraspaso->id_estado): ?>
                                                            <option value="<?php echo $estado->id_estado ?>"><?php echo $estado->estado ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div> 
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="id_municipio" class="form-label">Municipio:</label>
                                                <select name="id_municipio" id="id_municipio" class="form-select">
                                                    <option value="<?php echo $anuncioTraspaso->id_municipio ?>"><?php echo $anuncioTraspaso->nombre_municipio ?></option>
                                                    <?php foreach($datos['municipios'] as $municipio): ?>
                                                        <?php if($municipio->id_municipio != $anuncioTraspaso->id_municipio): ?>
                                                            <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div> 
                                        </div>
                                    </div>

                                    <input type="hidden" name="id_inmueble" value="<?php echo $anuncioTraspaso->id_inmueble ?>" id="id_inmueble">
                                    <input type="submit" class="btn btn-primary mt-3" value="Guardar cambios">
                                </form>

                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- FIN MODAL --> 

                        <!-- BOTON MODAL -->
                        <div class="col mb-3">
                        <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal4<?php echo $anuncioTraspaso->id_oferta ?>">
                        Modificar negocio
                        </button>
                        </div>

                        <!-- INICIO MODAL -->
                        <div class="modal fade" id="exampleModal4<?php echo $anuncioTraspaso->id_oferta ?>" tabindex="-1" aria-labelledby="exampleModal4Label" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModal4Label">Modificar negocio</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">                             
                                <form action="<?php echo RUTA_URL?>/Misanuncios/modificarAnuncioOfertaNegocio" method="post">
                                    <div class="mb-3">
                                        <label for="titulo_negocio" class="form-label">Título del negocio:</label>
                                        <input type="text" name="titulo_negocio" id="titulo_negocio" value="<?php echo $anuncioTraspaso->titulo_negocio ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="motivo_traspaso_negocio" class="form-label">Motivo del traspaso:</label>
                                        <textarea name="motivo_traspaso_negocio" id="motivo_traspaso_negocio" class="form-control"><?php echo preg_replace('#<br\s*/?>#i', "\n", $anuncioTraspaso->motivo_traspaso_negocio); ?></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="descripcion_negocio" class="form-label">Descripción del negocio:</label>
                                        <textarea name="descripcion_negocio" id="descripcion_negocio" class="form-control"><?php echo preg_replace('#<br\s*/?>#i', "\n", $anuncioTraspaso->descripcion_negocio); ?></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="coste_traspaso_negocio" class="form-label">Coste del traspaso:</label>
                                            <div class="input-group mb-3">
                                                <input type="number" name="coste_traspaso_negocio" id="coste_traspaso_negocio" value="<?php echo $anuncioTraspaso->coste_traspaso_negocio ?>" class="form-control">
                                                <span class="input-group-text">€</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="coste_mensual_negocio" class="form-label">Coste mensual:</label>
                                            <div class="input-group mb-3">
                                                <input type="number" name="coste_mensual_negocio" id="coste_mensual_negocio" value="<?php echo $anuncioTraspaso->coste_mensual_negocio ?>" class="form-control">
                                                <span class="input-group-text">€</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="capital_minimo_negocio" class="form-label">Capital mínimo requerido:</label>
                                            <div class="input-group mb-3">
                                                <input type="number" name="capital_minimo_negocio" id="capital_minimo_negocio" value="<?php echo $anuncioTraspaso->capital_minimo_negocio ?>" class="form-control">
                                                <span class="input-group-text">€</span>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="id_inmueble" value="<?php echo $anuncioTraspaso->id_inmueble ?>" id="id_inmueble">
                                    <input type="hidden" name="id_negocio" value="<?php echo $anuncioTraspaso->id_negocio ?>" id="id_negocio">
                                    <input type="submit" class="btn btn-primary mt-3" value="Guardar cambios">
                                </form>

                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- FIN MODAL --> 

                        <!-- BOTON MODAL -->
                        <div class="col mb-3">
                        <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal5<?php echo $anuncioTraspaso->id_oferta ?>">
                        Modificar local
                        </button>
                        </div>

                        <!-- INICIO MODAL -->
                        <div class="modal fade" id="exampleModal5<?php echo $anuncioTraspaso->id_oferta ?>" tabindex="-1" aria-labelledby="exampleModal5Label" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModal5Label">Modificar local</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">                             
                                <form action="<?php echo RUTA_URL?>/Misanuncios/modificarAnuncioOfertaLocal" method="post">
                                    <div class="mb-3">
                                        <label for="nombre_local" class="form-label">Nombre del local:</label>
                                        <input type="text" name="nombre_local" id="nombre_local" value="<?php echo $anuncioTraspaso->nombre_local ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="capacidad_local" class="form-label">Capacidad del local:</label>
                                        <input type="text" name="capacidad_local" id="capacidad_local" value="<?php echo $anuncioTraspaso->capacidad_local ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="recursos_local" class="form-label">Recursos del local:</label>
                                        <textarea name="recursos_local" id="recursos_local" class="form-control"><?php echo preg_replace('#<br\s*/?>#i', "\n", $anuncioTraspaso->recursos_local); ?></textarea>
                                    </div>

                                    <input type="hidden" name="id_inmueble" value="<?php echo $anuncioTraspaso->id_inmueble ?>" id="id_inmueble">
                                    <input type="submit" class="btn btn-primary mt-3" value="Guardar cambios">
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- FIN MODAL --> 

                        <div class="col mb-3">
                        <form action="<?php echo RUTA_URL?>/Misanuncios/eliminarAnuncio" method="post">
                            <input type="hidden" name="id_oferta" value="<?php echo $anuncioTraspaso->id_oferta ?>" id="">
                            <input type="submit" class="btn btn-outline-danger w-100" value="Eliminar">
                        </form>
                        </div>
                        </div>
                    </div>                   
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script src="<?php echo RUTA_URL?>/js/vermas.js"></script>
<script src="<?php echo RUTA_URL?>/js/modalMisanuncios.js"></script>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>



