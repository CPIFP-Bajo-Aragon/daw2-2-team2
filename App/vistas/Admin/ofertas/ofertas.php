<?php require_once RUTA_APP . '/vistas/inc/cabecera_admin.php' ?>

<div class="container-fluid">
    <div class="row justify-content-center" >
        <div class="spinner-border m-5" role="status" id="spiner" style="width: 3rem; height: 3rem;">
            <span class="visually-hidden">Loading...</span>
        </div>
            <div  id="contenido" class="col-lg-9 col-md-10 d-none">
            <div id="ofertas" class="content-section">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ofertas</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 100px;">Título</th>
                                    <th style="width: 100px;">Fecha de Inicio</th>
                                    <th style="width: 100px;">Fecha de Fin</th>
                                    <th style="width: 100px;">Precio</th>
                                    <th style="width: 100px;">Condiciones</th>
                                    <th style="width: 100px;">Descripción</th>
                                    <th style="width: 100px;">Fecha de Publicación</th>
                                    <th style="width: 100px;">Actualizar</th>
                                    <th style="width: 100px;">Borrar/Activar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datos['ofertas'] as $oferta): ?>
                                    <tr>
                                        <td><?php echo $oferta->titulo_oferta; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($oferta->fecha_inicio_oferta)); ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($oferta->fecha_fin_oferta)); ?></td>
                                        <td><?php echo $oferta->precio_inm; ?></td>
                                        <td><?php echo $oferta->condiciones_oferta; ?></td>
                                        <td><?php echo $oferta->descripcion_oferta; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($oferta->fecha_publicacion_oferta)); ?></td>
                                        <td>
                                            <!-- Botón para abrir la ventana modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalActualizarOferta_<?php echo $oferta->id_oferta; ?>">
                                                Actualizar
                                            </button>

                                            <!-- Ventana modal -->
                                            <div class="modal fade" id="modalActualizarOferta_<?php echo $oferta->id_oferta; ?>" tabindex="-1" aria-labelledby="modalActualizarOfertaLabel_<?php echo $oferta->id_oferta; ?>" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalActualizarOfertaLabel_<?php echo $oferta->id_oferta; ?>">Actualizar Oferta</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo RUTA_URL ?>/Adminoferta/actualizarofertas" method="POST">
                                                                <div class="form-group">
                                                                    <label for="titulo_oferta">Título</label>
                                                                    <input type="text" class="form-control" name="titulo_oferta" id="titulo_oferta" value="<?php echo $oferta->titulo_oferta; ?>" placeholder="Ingrese el título">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fecha_inicio_oferta">Fecha de Inicio</label>
                                                                    <input type="date" class="form-control" name="fecha_inicio_oferta" id="fecha_inicio_oferta" value="<?php echo $oferta->fecha_inicio_oferta; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fecha_fin_oferta">Fecha de Fin</label>
                                                                    <input type="date" class="form-control" name="fecha_fin_oferta" id="fecha_fin_oferta" value="<?php echo $oferta->fecha_fin_oferta; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="precio_inm">Precio</label>
                                                                    <input type="text" class="form-control" name="precio_inm" id="precio_inm" value="<?php echo $oferta->precio_inm; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="condiciones_oferta">Condiciones</label>
                                                                    <textarea class="form-control" name="condiciones_oferta" id="condiciones_oferta" rows="3"><?php echo $oferta->condiciones_oferta; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="descripcion_oferta">Descripción</label>
                                                                    <textarea class="form-control" name="descripcion_oferta" id="descripcion_oferta" rows="3"><?php echo $oferta->descripcion_oferta; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fecha_publicacion_oferta">Fecha Publicación</label>
                                                                    <input type="date" class="form-control" name="fecha_publicacion_oferta" id="fecha_publicacion_oferta" value="<?php echo $oferta->fecha_publicacion_oferta; ?>">
                                                                </div>
                                                                <input type="hidden" name="id_oferta" value="<?php echo $oferta->id_oferta; ?>">
                                                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if ($oferta->activo == 0): ?>
                                                <form action="<?php echo RUTA_URL ?>/Adminoferta/activarofertas" method="POST">
                                                    <input type="hidden" name="id_oferta" value="<?php echo $oferta->id_oferta; ?>">
                                                    <button type="submit" class="btn btn-success">Activar</button>
                                                </form>
                                            <?php else: ?>
                                                <form action="<?php echo RUTA_URL ?>/Adminoferta/eliminarofertas" method="POST">
                                                    <input type="hidden" name="id_oferta" value="<?php echo $oferta->id_oferta; ?>">
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
                                            <a class="page-link" href="<?php echo RUTA_URL ?>/Adminoferta/index/<?php echo $i; ?>"><?php echo $i; ?></a>
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
<?php

?>
<script>
function ready() {
    mostrar();
}

  document.addEventListener("DOMContentLoaded", ready);

function mostrar() {
    var cont = document.getElementById('contenido'); 
    cont.setAttribute("class", "col-lg-9 col-md-10 d-block"); 
    var cont = document.getElementById('spiner'); 
    cont.setAttribute("class", "d-none"); 
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
