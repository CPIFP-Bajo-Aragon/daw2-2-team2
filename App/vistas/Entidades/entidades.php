<?php cabecera($this->datos); ?>

<div class="container mt-5">
    <div class="jumbotron text-center">
        <h1 class="display-3">Entidades</h1>
    </div>
    <hr class="mt-4">
    <div class="text-center">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Crear entidad
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear entidad</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo RUTA_URL?>/Entidades/anadirEntidad" method="post">

                            <div class="form-group">
                                <label for="nombre_entidad">Nombre Entidad</label>
                                <input type="text" class="form-control" id="nombre_entidad" name="nombre_entidad">
                            </div>

                            <div class="form-group">
                                <label for="cif_entidad">CIF Entidad</label>
                                <input type="text" class="form-control" id="cif_entidad" name="cif_entidad">
                            </div>

                            <div class="form-group">
                                <label for="sector_entidad">Sector Entidad</label>
                                <input type="text" class="form-control" id="sector_entidad" name="sector_entidad">
                            </div>

                            <div class="form-group">
                                <label for="direccion_entidad">Dirección Entidad</label>
                                <input type="text" class="form-control" id="direccion_entidad" name="direccion_entidad">
                            </div>

                            <div class="form-group">
                                <label for="numero_telefono_entidad">Número de Teléfono</label>
                                <input type="text" class="form-control" id="numero_telefono_entidad" name="numero_telefono_entidad">
                            </div>

                            <div class="form-group">
                                <label for="correo_entidad">Correo Electrónico</label>
                                <input type="email" class="form-control" id="correo_entidad" name="correo_entidad">
                            </div>

                            <div class="form-group">
                                <label for="pagina_web_entidad">Página Web</label>
                                <input type="url" class="form-control" id="pagina_web_entidad" name="pagina_web_entidad">
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table text-center">
            <thead>
                <tr>
                    <th>Entidad</th>
                    <th>Añadir usuario</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos['entidades'] as $entidad): ?>
                    <tr>
                        <td><?php echo $entidad->nombre_entidad?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $entidad->nombre_entidad?>">
                                +
                            </button>
                                                        
                            <div class="modal fade" id="exampleModal<?php echo $entidad->nombre_entidad?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir usuario</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="<?php echo RUTA_URL?>/Entidades/anadirUsuarioaEntidad" method="post">
                                    <div class="mb-3">
                                        <label for="dni_usuario" class="form-label">DNI de usuario:</label>
                                        <input type="text" name="dni_usuario" id="dni_usuario" class="form-control" required>
                                        <input type="hidden" name="id_entidad" id="id_entidad" value="<?php echo $entidad->id_entidad ?>">
                                    </div>                                    
                                    <input type="submit" class="btn btn-primary" value="Añadir">
                                </form>
                                <div class="mt-3 text-left">
                                    <p>Usuarios de la entidad:</p>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Rol</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($datos['usuarios'] as $usuario): ?>
                                                    <tr>
                                                        <td><?php echo $usuario->nombre_usuario?></td>
                                                        <td><?php echo $usuario->nombre_rol?></td>
                                                        <td>
                                                            <form action="<?php echo RUTA_URL?>/Entidades/eliminarUsuarioEntidad" method="post">
                                                                <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $usuario->id_usuario?>">
                                                                <input type="hidden" name="id_entidad" id="id_entidad" value="<?php echo $entidad->id_entidad?>">
                                                                <input class="btn btn-danger" type="submit" value="x">
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                </div>
                            </div>
                            </div>
                        </td>
                        <td>
                            <form action="<?php echo RUTA_URL?>/Entidades/eliminarEntidad" method="post">
                                <input type="hidden" name="id_entidad" id="id_entidad" value="<?php echo $entidad->id_entidad ?>">
                                <input type="submit" class="btn btn-danger" value="x">
                            </form>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>




<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
