<!-- entidades.php -->

<?php require_once RUTA_APP . '/vistas/inc/cabecera_admin.php' ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-10">
            <div id="entidades" class="content-section">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Entidades</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                <th style="width: 100px;">Nombre</th>
                                <th style="width: 100px;">CIF</th>
                                <th style="width: 100px;">Sector</th>
                                <th style="width: 100px;">Dirección</th>
                                <th style="width: 100px;">Teléfono</th>
                                <th style="width: 100px;">Correo</th>
                                <th style="width: 100px;">Página Web</th>
                                <th style="width: 100px;">Actualizar</th>
                                <th style="width: 100px;">Eliminar/Activar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datos['entidades'] as $entidad): ?>
                                    <tr>
                                        <td><?php echo $entidad->nombre_entidad; ?></td>
                                        <td><?php echo $entidad->cif_entidad; ?></td>
                                        <td><?php echo $entidad->sector_entidad; ?></td>
                                        <td><?php echo $entidad->direccion_entidad; ?></td>
                                        <td><?php echo $entidad->numero_telefono_entidad; ?></td>
                                        <td><?php echo $entidad->correo_entidad; ?></td>
                                        <td><?php echo $entidad->pagina_web_entidad; ?></td>
                                        <td>
                                            <!-- Botón para abrir la ventana modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalActualizarEntidad_<?php echo $entidad->id_entidad; ?>">
                                                Actualizar
                                            </button>

                                            <!-- Ventana modal -->
                                            <div class="modal fade" id="modalActualizarEntidad_<?php echo $entidad->id_entidad; ?>" tabindex="-1" aria-labelledby="modalActualizarEntidadLabel_<?php echo $entidad->id_entidad; ?>" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalActualizarEntidadLabel_<?php echo $entidad->id_entidad; ?>">Actualizar Entidad</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="<?php echo RUTA_URL ?>/Adminentidades/actualizarentidades" method="POST">
                                                            <div class="form-group">
                                                                <label for="nombre_entidad">Nombre</label>
                                                                <input type="text" class="form-control" name="nombre_entidad" id="nombre_entidad" value="<?php echo $entidad->nombre_entidad; ?>" placeholder="Ingrese el nombre de la entidad">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cif_entidad">CIF</label>
                                                                <input type="text" class="form-control" name="cif_entidad" id="cif_entidad" value="<?php echo $entidad->cif_entidad; ?>" placeholder="Ingrese el CIF de la entidad">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="sector_entidad">Sector</label>
                                                                <input type="text" class="form-control" name="sector_entidad" id="sector_entidad" value="<?php echo $entidad->sector_entidad; ?>" placeholder="Ingrese el sector de la entidad">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="direccion_entidad">Dirección</label>
                                                                <input type="text" class="form-control" name="direccion_entidad" id="direccion_entidad" value="<?php echo $entidad->direccion_entidad; ?>" placeholder="Ingrese la dirección de la entidad">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="numero_telefono_entidad">Teléfono</label>
                                                                <input type="text" class="form-control" name="numero_telefono_entidad" id="numero_telefono_entidad" value="<?php echo $entidad->numero_telefono_entidad; ?>" placeholder="Ingrese el número de teléfono de la entidad">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="correo_entidad">Correo</label>
                                                                <input type="email" class="form-control" name="correo_entidad" id="correo_entidad" value="<?php echo $entidad->correo_entidad; ?>" placeholder="Ingrese el correo electrónico de la entidad">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="pagina_web_entidad">Página Web</label>
                                                                <input type="text" class="form-control" name="pagina_web_entidad" id="pagina_web_entidad" value="<?php echo $entidad->pagina_web_entidad; ?>" placeholder="Ingrese la página web de la entidad">
                                                            </div>
                                                            <input type="hidden" name="id_entidad" value="<?php echo $entidad->id_entidad; ?>">
                                                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                    <!-- Boton de activar en verde y boton de eliminar en rojo -->
                                            <?php if ($entidad->activo == 0): ?>
                                                <form action="<?php echo RUTA_URL ?>/Adminentidades/activarentidades" method="POST">
                                                <button type="submit" class="btn btn-success">Activar</button>
                                                </form>
                                            <?php else: ?>
                                                <form action="<?php echo RUTA_URL ?>/Adminentidades/eliminarentidades" method="POST">
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            <?php endif; ?>
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
                                            <a class="page-link" href="<?php echo RUTA_URL ?>/Adminentidades/index/<?php echo $i; ?>"><?php echo $i; ?></a>
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
