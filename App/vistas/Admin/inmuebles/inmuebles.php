<?php require_once RUTA_APP . '/vistas/inc/cabecera_admin.php' ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-10">
            <div id="ofertas" class="content-section">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Inmuebles</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 100px">Metros Cuadrados</th>
                                    <th style="width: 100px">Descripcion</th>
                                    <th style="width: 100px">Distribucion</th>
                                    <th style="width: 100px">Precio</th>
                                    <th style="width: 100px">Caracteristicas</th>
                                    <th style="width: 100px">Equipamiento</th>
                                    <th style="width: 100px">Actualizar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datos['inmuebles'] as $inmueble): ?>
                                    <tr>
                                        <td><?php echo $inmueble->metros_cuadrados_inmueble; ?></td>
                                        <td><?php echo $inmueble->descripcion_inmueble; ?></td>
                                        <td><?php echo $inmueble->precio_inmueble; ?></td>
                                        <td><?php echo $inmueble->direccion_inmueble; ?></td>
                                        <td><?php echo $inmueble->caracteristicas_inmueble; ?></td>
                                        <td><?php echo $inmueble->equipamiento_inmueble; ?></td>
                                        <td>
                                            <!-- Botón para abrir la ventana modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalActualizarOferta_<?php echo $inmueble->id_inmueble; ?>">
                                                Actualizar
                                            </button>

                                            <!-- Ventana modal -->
                                            <div class="modal fade" id="modalActualizarOferta_<?php echo $inmueble->id_inmueble; ?>" tabindex="-1" aria-labelledby="modalActualizarOfertaLabel_<?php echo $inmueble->id_inmueble; ?>" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalActualizarOfertaLabel_<?php echo $inmueble->id_inmueble; ?>">Actualizar Oferta</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo RUTA_URL ?>/Admininmuebles/actualizarinmuebles" method="POST">
                                                                <div class="form-group">
                                                                    <label for="titulo_oferta">Metros Cuadrados</label>
                                                                    <input type="text" class="form-control" name="metros_cuadrados_inmueble" id="metros_cuadrados_inmueble" value="<?php echo $inmueble->metros_cuadrados_inmueble; ?>" placeholder="Ingrese el título">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="direccion_inmueble">Direccion</label>
                                                                    <input type="text" class="form-control" name="direccion_inmueble" id="direccion_inmueble" value="<?php echo $inmueble->direccion_inmueble; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="precio_inmueble">Precio</label>
                                                                    <input type="text" class="form-control" name="precio_inmueble" id="precio_inmueble" value="<?php echo $inmueble->precio_inmueble; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="descripcion_inmueble">Descripcion</label>
                                                                    <textarea class="form-control" name="descripcion_inmueble" id="descripcion_inmueble" rows="3"><?php echo $inmueble->descripcion_inmueble; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="caracteristicas_inmueble">Caracteristicas</label>
                                                                    <textarea class="form-control" name="caracteristicas_inmueble" id="caracteristicas_inmueble" rows="3"><?php echo $inmueble->caracteristicas_inmueble; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="equipamiento_inmueble">Equipamiento</label>
                                                                    <textarea class="form-control" name="equipamiento_inmueble" id="equipamiento_inmueble" rows="3"><?php echo $inmueble->equipamiento_inmueble; ?></textarea>
                                                                </div>
                                                                <input type="hidden" name="id_inmueble" value="<?php echo $inmueble->id_inmueble; ?>">
                                                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- menu navegacion -->
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                <?php for ($i = 1; $i <= $datos['numeropaginas']; $i++): ?>
                                        <li class="page-item <?php if ($pagina == $i) echo 'active'; ?>">
                                            <a class="page-link" href="<?php echo RUTA_URL ?>/Admininmuebles/index/<?php echo $i; ?>"><?php echo $i; ?></a>
                                        </li>
                                    <?php endfor; ?>
                                </ul>
                            </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
