<?php cabecera($this->datos); ?>

    <?php
        $nif = $_SESSION['UsuarioSesion']->NIF;
        $nombre = $_SESSION['UsuarioSesion']->nombre;
        $apellido = $_SESSION['UsuarioSesion']->apellido;
        $mail = $_SESSION['UsuarioSesion']->correo;
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
   

   <div class="col-6">
       <?php
       $imagenPrimera = RUTA_URL_IMAGENES . 'fotoperfil/'.$nif.'.jpg';
       $imagenDefault = RUTA_URL_IMAGENES . 'fotoperfil/fotoperfil.jpg';
       
       if (file_exists($imagenPrimera)) {
           ?>
           <img src="<?php echo $imagenPrimera ?>" class="bd-placeholder-img rounded-circle" width="140">
           <?php
       } else {
           ?>
           <img src="<?php echo $imagenDefault ?>" class="bd-placeholder-img rounded-circle" width="140">
           <?php
       }
       ?>
   </div>

<div class="col-6">
   <p class="lead">Nombre: <?php echo $nombre?></p>
   <p class="lead">Apellidos: <?php echo $apellido?></p>
   <p class="lead">Email: <?php echo $mail?></p>
   <p class="lead">NIF: <?php echo $nif?></p>
</div>
</div>

<div class="row">
    <div class="col-6">
        <form action="" method="POST" enctype="multipart/form-data">
        <input name="imagen" id="archivo" type="file"/>
        <input type="submit" name="subir" value="Subir imagen"/>
        </form>
    </div>

            <div class="col-6 d-flex justify-content-end align-items-end">
                <form action="" method="post">
                    
                </form>
                <button class="btn btn-primary">Editar datos</button>
            </div>
</div>        
        

    <!-- <form action="" method="post" class="card-body">
        <div class="mt-3 mb-3">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $nombre?>" class="form-control form-control-lg">
        </div>
        <div class="mt-3 mb-3">
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" value="<?php echo $apellido?>" class="form-control form-control-lg">
        </div>
        <div class="mt-3 mb-3">
            <label for="correo">Correo:</label>
            <input type="text" name="correo" id="correo" value="<?php echo $mail?>" class="form-control form-control-lg">
        </div>
        <div class="mt-3 mb-3">
            <label for="nif">NIF:</label>
            <input type="text" name="nif" id="nif" value="<?php echo $nif?>" class="form-control form-control-lg">
        </div>
        <input type="button" value="Editar">
    </form> -->
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
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-floating mb-3">
                        <input name="nombre_documento" id="nombre_documento" type="text" class="form-control" id="floatingInput" placeholder="n" required>
                        <label for="floatingInput">Nombre</label>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripcion:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div> -->
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder=" "></textarea>
                        <label for="exampleFormControlTextarea1">Descripcion</label>
                    </div>

                    <label for="formFile" class="form-label">Subir archivos:</label>
                    <input class="form-control" type="file" name="" id="">
                    <input type="submit" class="btn btn-secondary mt-3" value="Subir archivo">
                </form>
            </div>
            </div>
        </div>
        </div>
    <!-- FIN MODAL -->

    <!-- MOSTRAR DOCUMENTOS(SI ESE USUARIO TIENE) -->

        <?php
        echo "<br>";
        if (count($datos['documentos']) === 0) {
                
        }else{
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
                        <td><?php echo $documentos->nombre?></td>
                        <td><?php echo $documentos->fecha_carga?></td>
                        <td>
                            <form action="<?php echo RUTA_URL?>/Miperfil/eliminardocumentosUsuarios" method="post">
                                <input type="hidden" value="<?php echo $documentos->id_documento?>" name="id_documento" id="">
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

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
