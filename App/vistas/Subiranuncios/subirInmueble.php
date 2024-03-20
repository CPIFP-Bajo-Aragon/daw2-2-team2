<?php cabecera($this->datos); ?>

<div class="container mt-5">
    <div class="jumbotron text-center">
        <h1 class="display-3">Anuncio inmueble</h1>
    </div>
    <hr class="mt-4">
    <div>

        <form method="POST" action="<?php echo RUTA_URL?>/Misanuncios/subirAnunciobd" class="card p-4" enctype="multipart/form-data">

            <div class="mb-3">
                <h4>Datos oferta:</h4>
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="inicio_oferta" class="form-label">Inicio oferta:</label>
                        <input type="date" name="inicio_oferta" id="inicio_oferta" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="fin_oferta" class="form-label">Fin oferta:</label>
                        <input type="date" name="fin_oferta" id="fin_oferta" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="precio_oferta" class="form-label">Precio:</label>
                    <div class="input-group mb-3">
                        <input type="number" name="precio_oferta" id="precio_oferta" class="form-control" required>
                        <span class="input-group-text">€</span>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="condiciones_oferta" class="form-label">Condiciones:</label>
                <textarea name="condiciones_oferta" id="condiciones_oferta" class="form-control" required></textarea>
            </div>
            
            <div class="mb-3">
                <label for="descripcion_oferta" class="form-label">Descripción:</label>
                <textarea name="descripcion_oferta" id="descripcion_oferta" class="form-control" required></textarea>
            </div>

            <?php
            if (count($datos['entidades']) === 0) {
                ?>
                    <input type="hidden" name="crear_id_entidad" value="1" id="crear_id_entidad">
                    <input type="hidden" name="id_entidad" value="0" id="id_entidad">
                <?php
            }else{
                ?>
                <div class="mb-3">
                <label for="id_entidad" class="form-label">Entidad:</label>
                    <select name="id_entidad" id="id_entidad">
                        <?php foreach($datos['entidades'] as $entidad):?>
                            <option value="<?php echo $entidad->id_entidad?>"><?php echo $entidad->nombre_entidad?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <input type="hidden" name="crear_id_entidad" value="0" id="crear_id_entidad">
                <?php
            }
            ?>

            

            <hr>

            <div class="mb-3">
                <h4>Datos inmueble:</h4>
            </div>
            
            <div class="mb-3">
                <label for="distribucion_inmueble" class="form-label">Distribución:</label>
                <textarea name="distribucion_inmueble" id="distribucion_inmueble" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="equipamiento_inmueble" class="form-label">Equipamiento:</label>
                <textarea name="equipamiento_inmueble" id="equipamiento_inmueble" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="descripcion_inmueble" class="form-label">Descripción del Inmueble:</label>
                <textarea name="descripcion_inmueble" id="descripcion_inmueble" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="direccion_inmueble" class="form-label">Dirección del Inmueble:</label>
                <input type="text" name="direccion_inmueble" id="direccion_inmueble" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="caracteristicas_inmueble" class="form-label">Características del Inmueble:</label>
                <textarea name="caracteristicas_inmueble" id="caracteristicas_inmueble" class="form-control" required></textarea>
            </div>
                        
            <div class="mb-3">
                <label for="img_inmueble" class="form-label">Fotos del Inmueble:</label>
                <input type="file" name="fotos_inmueble[]" multiple accept="image/*" class="form-control-file" required>
            </div>

            <!-- <div class="mb-3">
                <label for="latitud_inmueble" class="form-label">Latitud del Inmueble:</label>
                <input type="text" name="latitud_inmueble" id="latitud_inmueble" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="longitud_inmueble" class="form-label">Longitud del Inmueble:</label>
                <input type="text" name="longitud_inmueble" id="longitud_inmueble" class="form-control" required>
            </div> -->
            <div class="row">
                <div class="col-md-6">
                    <label for="metros_cuadrados_inmueble" class="form-label">Metros Cuadrados:</label>
                    <div class="input-group mb-3">
                        <input type="number" name="metros_cuadrados_inmueble" id="metros_cuadrados_inmueble" class="form-control" required>
                        <span class="input-group-text">m²</span>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <label for="precio_inmueble" class="form-label">Precio del Inmueble:</label>
                    <div class="input-group mb-3">
                        <input type="number" name="precio_inmueble" id="precio_inmueble" class="form-control" required>
                        <span class="input-group-text">€</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="municipio" class="form-label">Municipio:</label>
                        <select name="municipio" id="municipio" class="form-select" required>
                            <option value="">-- Selecciona un Municipio --</option>
                            <?php foreach($datos['municipios'] as $municipio):?>
                                <option value="<?php echo $municipio->id_municipio?>"><?php echo $municipio->nombre_municipio?></option>    
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado:</label>
                        <select name="estado" id="estado" class="form-select" required>
                            <option value="">-- Selecciona un Estado --</option>
                            <?php foreach($datos['estados'] as $estado):?>
                                <option value="<?php echo $estado->id_estado?>"><?php echo $estado->estado?></option>    
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="num_habitaciones" class="form-label">Nº habitaciones:</label>
                    <input type="number" name="num_habitaciones" id="num_habitaciones" class="form-control" required> 
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="tipo_vivienda" class="form-label">Tipo vivienda:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipo_vivienda" id="exampleRadios1" value="Casa" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Casa
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipo_vivienda" id="exampleRadios2" value="Piso">
                            <label class="form-check-label" for="exampleRadios2">
                                Piso
                            </label>
                        </div>
                </div>
            </div>

            </div>

                    
            <!-- <?php foreach($datos['entidades'] as $entidad):?>
                <input type="hidden" name="id_entidad" id="id_entidad" value="<?php echo $entidad->id_entidad ?>">           
            <?php endforeach ?> -->
            
            <hr>

            <div class="mb-3">
                <h4>Datos local(Opcional):</h4>
            </div>

            <div class="mb-3">
                <label for="nombre_local" class="form-label">Nombre del Local:</label>
                <input type="text" name="nombre_local" id="nombre_local" class="form-control">
            </div>

            <div class="mb-3">
                <label for="capacidad_local" class="form-label">Capacidad del Local:</label>
                <input type="text" name="capacidad_local" id="capacidad_local" class="form-control">
            </div>

            <div class="mb-3">
                <label for="recursos_local" class="form-label">Recursos del Local:</label>
                <textarea name="recursos_local" id="recursos_local" class="form-control"></textarea>
            </div>

            <!-- <div class="mb-3">
                <label for="img_inmueble" class="form-label">Fotos del Inmueble:</label>
                <input type="file" name="fotos_inmueble[]" multiple accept="image/*" class="form-control-file" required>
            </div> -->

            <!-- <div class="dz-default dz-message">
                <button class="dz-button" type="button">Subir imagenes del inmueble</button>
            </div> -->
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>