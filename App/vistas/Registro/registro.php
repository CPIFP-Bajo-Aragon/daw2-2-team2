<?php cabecera($this->datos); ?>
<link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/registro.css">

<div id="fondo" style="padding-top: 100px;">
    
<div id="contenido"  class="container" >
<div  ></div>

        <div class="jumbotron text-center" >
            <h1 class="display-4">Registrarse</h1>
        </div>

        <form action="" id="formulario" class="formulario" method="post" >
        <div class="formulario__grupo" id="grupo__nif">
            <div class="formulario__grupo-input">       
                <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingNIF" placeholder="1234567F" id="nif" name="nif" required>
                        <label for="floatingNIF">NIF</label>
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
            </div>    
            <p class="formulario__input-error">Introduce un nif valido</p>
        </div>
        <div class="formulario__grupo" id="grupo__nombre">    
            <div class="formulario__grupo-input">     
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingNombre" placeholder="Jose Antonio" id="nombre" name="nombre" required>
                    <label for="floatingNombre">Nombre</label>
                </div>
            </div>
            <p class="formulario__input-error">Introduce un nombre valido.</p>
        </div>    

        <div class="formulario__grupo" id="grupo__apellidos">
            <div class="formulario__grupo-input">  
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingApellidos" placeholder="Gonzalez Lopez" id="apellidos" name="apellidos" required>
                    <label for="floatingApellidos">Apellidos</label>
                </div>
            </div>    
            <p class="formulario__input-error">Introduce un apellido valido.</p>
        </div> 

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" id="email" name="email" required>
                <label for="floatingInput">Email</label>
            </div>

            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="floatingInput" id="fecha_nac" name="fecha_nac" required>
                <label for="floatingInput">Fecha Nacimiento</label>
            </div>   
            
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="123 456 789" id="telf" name="telf" required>
                <label for="floatingInput">Telefono</label>
            </div>
            <!--Falta por comparar ambas contraseñas -->

        <div class="formulario__grupo" id="grupo__password">
            <div class="formulario__grupo-input">
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña" id="password" name="password" required>
                    <label for="floatingPassword">Contraseña</label>
                </div>
            </div>
            <p class="formulario__input-error">La contraseña tiene que ser de 8 a 16 dígitos.</p>
        </div>

        <div class="formulario__grupo" id="grupo__password2">
            <div class="formulario__grupo-input">
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPPassword2" placeholder="Repetir contraseña" id="password2" name="password2" required>
                    <label for="floatingPPassword2">Repetir contraseña</label>
                </div>
            </div>
            <p class="formulario__input-error">La contraseña tiene que ser iguales.</p>
        </div>

		
        <input type="submit" class="btn btn-primary" name="envio" value="Registrarse">
        </form>
        </div>

        <!-- Error las contraseñas no coinciden -->
        <?php if (isset($datos['error'])&& $datos['error']=='error-1'): ?>
        <div class="alert alert-danger" role="alert">
            Error al registrarte 
        </div>
        <?php endif ?>

        <!-- Error Registro Incorrecto -->
        <?php if (isset($datos['error'])&& $datos['error']=='error-2'): ?>
            <div class="alert alert-danger" role="alert">
            Error las contraseñas no coinciden
        </div>
        <?php endif ?>

</div>
<script src="<?php echo RUTA_URL.'/js/validarRegistro.js'?>"></script>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>