<?php cabecera(); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php
        //echo ($_SESSION['UsuarioSesion[1]']);
        $nif = $_SESSION['UsuarioSesion']->NIF;
        $nombre = $_SESSION['UsuarioSesion']->nombre;
        $apellido = $_SESSION['UsuarioSesion']->apellido;
        $mail = $_SESSION['UsuarioSesion']->correo;
        // $nif = "33333333F";
        // $nombre = "Diego";
        // $apellido = "Blanco";
        // $mail = "diegoblancoeperez2004@gmail.com";
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
        <p class="lead">Nombre: <?php echo $nombre?></p>
        <p class="lead">Apellidos: <?php echo $apellido?></p>
        <p class="lead">Email: <?php echo $mail?></p>
        <p class="lead">NIF: <?php echo $nif?></p>
    </div>
</div>

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

        <div>
            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input name="nombre_documento" id="nombre_documento" type="text" class="form-control" id="floatingInput" placeholder="n" required>
                    <label for="floatingInput">Nombre</label>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Descripcion:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">Quisiera ser una mosca</textarea>
                </div>
                <label for="formFile" class="form-label">Subir archivos:</label>
                <input class="form-control" type="file" name="" id="">
                <input type="submit" class="btn btn-secondary" value="Subir archivo">
            </form>
        </div>

        <table class="table mt-3">
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
    
    </div>
        <hr class="mt-4">

        <div class="jumbotron text-center">
            <h2 class="display-6">Mis anuncios</h2>
        </div>

   

        <hr class="mt-4">

        <div class="jumbotron text-center">
            <h2 class="display-6">Me gusta</h2>
        </div>

    

</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
