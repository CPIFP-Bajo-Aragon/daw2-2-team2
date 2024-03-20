<?php cabecera($this->datos); ?>
<style>
    .chat-message {
        height: 50vh;
        /* Altura fija */
        overflow-y: auto;
        /* Activar el scroll vertical cuando sea necesario */
        border: 1px solid #ccc;
        /* Borde para mejorar la apariencia */
        padding: 10px;
        /* Espaciado interno */
    }
</style>

<?php if (isset($datos['chatactivo'])): ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            ChatAPI(<?php echo $datos['chatactivo'] ?>);
        });
    </script>

<?php endif ?>



<div class="row">
    <div class="col-1"></div>
    <div class="col-2 mt-4 ml-4">
        <div class="card">
            <ul class="list-group list-group-flush">
                <?php if (empty($datos['chatsActivos'])): ?>
                    <p>No existen chats activos</p>
                <?php endif ?>
                <?php foreach ($datos['chatsActivos'] as $chatsActivos): ?>

                    <a href='<?php echo RUTA_URL ?>/Chat/Inicio/<?php echo cifrar_url_aes($chatsActivos->id_usuario) ?> '
                        class="chat-link" data-id="<?php echo $chatsActivos->id_usuario ?>">
                        <li class="list-group-item">
                            <?php echo $chatsActivos->nombre_usuario . " " . $chatsActivos->apellidos_usuario ?>
                        </li>
                    </a>
                <?php endforeach ?>

            </ul>
        </div>
    </div>

    <div class="col-8">
        <?php
        if (isset($this->datos['usuario']) && $this->datos['usuario'] !== null) {
            echo "<h5>Chat: {$this->datos['usuario']->nombre_usuario} {$this->datos['usuario']->apellidos_usuario}</h5>";
        }
        ?>

        <div class="card">
            <div class="card-body">
                <div class="chat-message" id="chat">
                </div>
            </div>
            <!-- -->
            <div class="card-footer">
                <form action="" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Escribe tu mensaje..." name="mensaje"
                            id="mensaje">
                        <div class="input-group-append">
                            <button class="btn btn-primary" name="enviar" id="enviar" type="submit">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo RUTA_URL ?>/js/AsincronoChat.js"></script>

<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>