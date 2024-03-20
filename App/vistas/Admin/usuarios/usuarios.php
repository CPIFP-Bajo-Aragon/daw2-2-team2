<?php require_once RUTA_APP . '/vistas/inc/cabecera_admin.php' ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-10">
            <div id="usuarios" class="content-section">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Usuarios</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>NIF</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Teléfono</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar/Activar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datos['usuarios'] as $usuario): ?>
                                    <tr>
                                        <td><?php echo $usuario->nif; ?></td>
                                        <td><?php echo $usuario->nombre_usuario; ?></td>
                                        <td><?php echo $usuario->apellidos_usuario; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($usuario->fecha_nacimiento_usuario)); ?></td>
                                        <td><?php echo $usuario->telefono_usuario; ?></td>
                                        <td>
                                            <!-- Botón para abrir la ventana modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalActualizarUsuario_<?php echo $usuario->id_usuario; ?>">
                                                Actualizar
                                            </button>

                                            <!-- Ventana modal -->
                                            <div class="modal fade" id="modalActualizarUsuario_<?php echo $usuario->id_usuario; ?>" tabindex="-1" aria-labelledby="modalActualizarUsuarioLabel_<?php echo $usuario->id_usuario; ?>" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalActualizarUsuarioLabel_<?php echo $usuario->id_usuario; ?>">Actualizar Usuario</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo RUTA_URL ?>/Adminusuarios/actualizarusuarios" method="POST">
                                                                <div class="form-group">
                                                                    <label for="nombre_usuario">Nombre</label>
                                                                    <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario" value="<?php echo $usuario->nombre_usuario; ?>" placeholder="Nombre del usuario">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="apellidos_usuario">Apellidos</label>
                                                                    <input type="text" class="form-control" name="apellidos_usuario" id="apellidos_usuario" value="<?php echo $usuario->apellidos_usuario; ?>" placeholder="Apellidos del usuario">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fecha_nacimiento_usuario">Fecha de Nacimiento</label>
                                                                    <input type="date" class="form-control" name="fecha_nacimiento_usuario" id="fecha_nacimiento_usuario" value="<?php echo $usuario->fecha_nacimiento_usuario; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="telefono_usuario">Teléfono</label>
                                                                    <input type="tel" class="form-control" name="telefono_usuario" id="telefono_usuario" value="<?php echo $usuario->telefono_usuario; ?>" placeholder="Teléfono del usuario">
                                                                </div>
                                                                <input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario; ?>">
                                                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if ($usuario->activo == 0): ?>
                                                <form action="<?php echo RUTA_URL ?>/Adminusuarios/activarusuarios" method="POST">
                                                    <input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario; ?>">
                                                    <button type="submit" class="btn btn-success">Activar</button>
                                                </form>
                                            <?php else: ?>
                                                <form action="<?php echo RUTA_URL ?>/Adminusuarios/eliminarusuarios" method="POST">
                                                    <input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario; ?>">
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
                                            <a class="page-link" href="<?php echo RUTA_URL ?>/Adminusuarios/index/<?php echo $i; ?>"><?php echo $i; ?></a>
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
