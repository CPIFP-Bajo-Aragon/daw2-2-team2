<?php cabecera($this->datos); ?>
<div class="container mt-5">
    <div class="jumbotron text-center">
        <h1 class="display-3">Anuncio traspaso</h1>
    </div>
    <hr class="mt-4">
    <div>

        <!-- PONER ESTO EN EL ACTION CUANDO ESTE BIEN HECHO  -->
        <!-- <?php echo RUTA_URL?>/Misanuncios/subirTraspasobd -->

        <form method="POST" action="<?php echo RUTA_URL?>/Misanuncios/subirTraspasobd" class="card p-4" enctype="multipart/form-data">
            <div class="mb-3">
                <h4>Datos oferta:</h4>
            </div>

            <div class="mb-3">
                <label for="titulo_oferta" class="form-label">Título:</label>
                <input type="text" name="titulo_oferta" id="titulo_oferta" class="form-control" required>
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
                <h4>Datos negocio:</h4>
            </div>

            <div class="mb-3">
                <label for="titulo_negocio" class="form-label">Título del Negocio:</label>
                <input type="text" name="titulo_negocio" id="titulo_negocio" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="motivo_traspaso_negocio" class="form-label">Motivo de Traspaso del Negocio:</label>
                <textarea name="motivo_traspaso_negocio" id="motivo_traspaso_negocio" class="form-control" required></textarea>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="coste_traspaso_negocio" class="form-label">Coste de Traspaso del Negocio:</label>
                    <div class="input-group mb-3">
                        <input type="number" name="coste_traspaso_negocio" id="coste_traspaso_negocio" class="form-control" required>
                        <span class="input-group-text">€</span>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="coste_mensual_negocio" class="form-label">Coste Mensual del Negocio:</label>
                    <div class="input-group mb-3">
                        <input type="number" name="coste_mensual_negocio" id="coste_mensual_negocio" class="form-control" required>
                        <span class="input-group-text">€</span>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <label for="capital_minimo_negocio" class="form-label">Capital Mínimo del Negocio:</label>
                    <div class="input-group mb-3">
                        <input type="number" name="capital_minimo_negocio" id="capital_minimo_negocio" class="form-control" required>
                        <span class="input-group-text">€</span>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="descripcion_negocio" class="form-label">Descripción del Negocio:</label>
                <textarea name="descripcion_negocio" id="descripcion_negocio" class="form-control" required></textarea>
            </div>

            
                
            <hr>

            <div class="mb-3">
                <h4>Datos inmueble:</h4>
            </div>

            <div class="mb-3">
                <label for="descripcion_inmueble" class="form-label">Descripción del Inmueble:</label>
                <textarea name="descripcion_inmueble" id="descripcion_inmueble" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="distribucion_inmueble" class="form-label">Distribución del Inmueble:</label>
                <textarea name="distribucion_inmueble" id="distribucion_inmueble" class="form-control" required></textarea>
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
                <label for="equipamiento_inmueble" class="form-label">Equipamiento del Inmueble:</label>
                <textarea name="equipamiento_inmueble" id="equipamiento_inmueble" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="img_inmueble" class="form-label">Fotos del Inmueble:</label>
                <input type="file" name="fotos_inmueble[]" multiple accept="image/*" class="form-control-file" required>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="metros_cuadrados_inmueble" class="form-label">Metros Cuadrados del Inmueble:</label>
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
            <hr>

            <div class="mb-3">
                <h4>Datos local:</h4>
            </div>

            <div class="mb-3">
                <label for="nombre_local" class="form-label">Nombre del Local:</label>
                <input type="text" name="nombre_local" id="nombre_local" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="capacidad_local" class="form-label">Capacidad del Local:</label>
                <input type="text" name="capacidad_local" id="capacidad_local" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="recursos_local" class="form-label">Recursos del Local:</label>
                <input type="text" name="recursos_local" id="recursos_local" class="form-control" required>
            </div>

            <?php foreach($datos['entidades'] as $entidades):?>
                <input type="hidden" name="id_entidad" id="id_entidad" value="<?php echo $entidades->id_entidad ?>">           
            <?php endforeach ?>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>