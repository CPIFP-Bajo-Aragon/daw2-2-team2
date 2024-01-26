<?php cabecera(); ?>

    <?php
        //echo ($_SESSION['UsuarioSesion[1]']);
        $nif = $_SESSION['UsuarioSesion']->NIF;
        $nombre = $_SESSION['UsuarioSesion']->nombre;
        $apellido = $_SESSION['UsuarioSesion']->apellido;
        $mail = $_SESSION['UsuarioSesion']->correo;
    ?>
<div class="container mt-5">
        <div class="jumbotron text-center">
            <h1 class="display-4">Mi perfil</h1>
        </div>


    <form action="" method="post" class="card-body">
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
    </form>

</div>


<?php 
    //print_r($_SESSION); 
?>



<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
