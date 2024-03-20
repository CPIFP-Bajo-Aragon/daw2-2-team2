<?php cabecera($this->datos); ?>

<link rel="stylesheet" href="<?php echo RUTA_URL?>/css/miperfilCSS.css">

    <?php
        $nif = $_SESSION['UsuarioSesion']->nif;
        // $nombre = $_SESSION['UsuarioSesion']->nombre;
        // $apellido = $_SESSION['UsuarioSesion']->apellido;
        // $mail = $_SESSION['UsuarioSesion']->correo;
    ?>
<div class="container mt-5">
    <div class="jumbotron text-center">
        <h1 class="display-3">Mi perfil</h1>
    </div>

    <hr class="mt-4">

    <div class="jumbotron text-center">
        <h2 class="display-6">Mis datos</h2>
    </div>
    <div class="row">
        <div class="px-5 col-lg-6 col-sm-12" id="datosContainer">
            <?php
             $imagenPrimera = RUTA_URL_IMAGENES."/fotoperfil/".$nif.".png";
             $imagenDefault = RUTA_URL_IMAGENES."/fotoperfil/fotoperfl.jpg";
            
            if (!file_exists($imagenDefault)) {
                ?>
                <img src="<?php echo $imagenPrimera ?>"  width="350" class="img-thumbnail">
                <?php
            } else {
                ?>
                <img src="<?php echo $imagenDefault ?>"  width="350" class="img-thumbnail">
                <?php
            }
            ?>
        </div>

        <?php foreach($datos['usuario'] as $usuario):?>
        <div class="col-lg-6 col-sm-12 mt-2" id="datosContainer">
            <p id="nombre" class="lead">Nombre: <?php echo $usuario->nombre_usuario?></p>
            <p id="apellidos" class="lead">Apellidos: <?php echo $usuario->apellidos_usuario?></p>
            <p id="fecha_nac" class="lead">Fecha Nacimiento: <?php echo date('d/m/Y', strtotime($usuario->fecha_nacimiento_usuario)); ?></p>
            <p id="telefono" class="lead">Telefono: <?php echo $usuario->telefono_usuario?></p>
            <p id="email" class="lead">Email: <?php echo $usuario->correo_usuario?></p>
            <p id="nif" class="lead">NIF: <?php echo $usuario->nif?></p>
        </div>
        
        <div id="editFormContainer" class="col-6 hidden">
            <form id="editForm" action="<?php echo RUTA_URL?>/Miperfil/editarUsuarios" method="post">
                <div class="form-group lead">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $usuario->nombre_usuario?>">
                </div>

                <div class="form-group mt-2 lead">
                    <label for="apellido">Apellidos:</label>
                    <input type="text" id="apellido" name="apellido" value="<?php echo $usuario->apellidos_usuario?>">
                </div>

                <div class="form-group mt-2 lead">
                    <input type="hidden" id="mail" name="mail" value="<?php echo $usuario->correo_usuario?>">
                </div>
                <div class="form-group mt-2 lead">
                    <label for="fnacimiento">Fecha Nacimiento:</label>
                    <input type="date" id="fnacimiento" name="fnacimiento" value="<?php echo $usuario->fecha_nacimiento_usuario?>">
                </div>
                <div class="form-group mt-2 lead">
                    <label for="telefono">Telefono:</label>
                    <input type="text" id="telefono" name="telefono" value="<?php echo $usuario->telefono_usuario?>">
                </div>
                <input type="hidden" id="nif" name="nif" value="<?php echo $nif?>">

                <div class="mt-2">
                    <input type="submit" class="btn btn-success" value="Guardar cambios">
                    <button type="button" class="btn btn-danger" onclick="cancelEdit()">Cancelar</button>
                </div>
            </form>
        </div>
        <?php endforeach ?>
    </div>

    <div class="row">
        <div class="col-6">
            <form action="" method="POST" enctype="multipart/form-data">
                <input name="imagen" class="form-control" type="file" id="formFile">
                <input type="submit" name="subir" value="Subir imagen"/>
            </form>
        </div>

        <div class="col-6 d-flex justify-content-end align-items-end">
            <button class="btn btn-primary" onclick="showEditForm()">Editar datos</button>
        </div>
    </div>        

    <div class="container mt-5">

        <hr class="mt-4">

        <div class="jumbotron text-center">
            <h2 class="display-6">Mis documentos</h2>
        </div>

        <!-- INICIO MODAL -->

        <!-- Button trigger modal -->
        <div class="d-flex justify-content-center align-items-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Subir archivo</button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Subir archivo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
               

                    <form action="<?php echo RUTA_URL?>/Miperfil/subirDocumento" method="post" enctype="multipart/form-data" class="d-flex flex-column justify-content-center">
                        <div class="modal-body">
                            <div class="drag-area" class="mb-3 d-flex flex-column justify-coneten-center">
                                <h3>Arrastra y suelta el archivo</h3>
                                <span>o</span>
                                <input type="file" class="form-control" id="formFile" name="archivo" hidden required>
                                <button class="btn btn-primary" for="formFile">Selecciona tus archivos</button>
                            </div>

                            <div id="preview"></div>
                        </div>

                        <div class="form-floating mb-3 mx-2">
                            <input type="text" class="form-control" id="nombre_documento" name="nombre_documento" placeholder=" " required>
                            <label for="nombre_documento">Nombre</label>
                        </div>
                        
                        <div class="form-floating mb-3 mx-2">
                            <textarea class="form-control" id="descripcion_documento" name="descripcion_documento" rows="5" placeholder=" " required></textarea>
                            <label for="descripcion_documento">Descripción</label>
                        </div>

                        <input type="hidden" name="nif" value="<?php echo $nif?>">

                        <input type="submit" class="btn btn-secondary mt-3 mx-2 mb-2" value="Subir archivo">
                    </form>


                </div>
            </div>
        </div>
        <!-- FIN MODAL -->

        <!-- MOSTRAR DOCUMENTOS(SI ESE USUARIO TIENE) -->

        <?php
        echo "<br>";
        if (count($datos['documentos']) === 0) {
                
        } else {
            ?>
                <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha subida</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos['documentos'] as $documentos):?>
                    <tr>
                        <td class="align-middle"><?php echo $documentos->nombre_documento?></td>
                        <td class="align-middle"><?php echo $documentos->fecha_subida?></td>
                        <td>
                            <form action="<?php echo RUTA_URL?>/Miperfil/eliminardocumentosUsuarios" method="post">
                                <input type="hidden" value="<?php echo $documentos->id_documento?>" name="id_documento" id="">
                                <input type="hidden" value="<?php echo $documentos->ruta_archivo?>" name="archivoeliminar" id="">
                                <input type="submit" class="btn btn-danger" value="Eliminar">
                            </form> 
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                </table>
            <?php
        }
        ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo RUTA_URL?>/js/miperfilJS.js"></script>
<script src="<?php echo RUTA_URL?>/js/guardardatossesion.js"></script>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>