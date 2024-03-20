<?php cabecera($this->datos); ?>

<div class="container mt-5">
    <div class="jumbotron text-center">
        <h1 class="display-3">Reservas</h1>
    </div>
    <?php
    // print_r($datos);
    // exit;
    ?>

    <hr class="mt-4">

    <div class="mt-3">
        <?php
            if(count($datos['reservas']) === 0){

            }else{
                ?>
                    <h4>Mis reservas</h4>
                <?php
            }
        ?>

        <?php foreach($datos['reservas'] as $reserva): ?>
        <div class="card mb-3">
            <div class="m-3">
                <h5><?php echo $reserva->titulo_oferta ?></h5>
                <p><?php echo $reserva->condiciones_oferta ?></p>
                <p><?php echo $reserva->descripcion_oferta ?></p>
                <p>Fecha inicio: <?php echo date('d/m/Y', strtotime($reserva->fecha_inicio_oferta)) ?></p>
                <p>Fecha fin: <?php echo date('d/m/Y', strtotime($reserva->fecha_fin_oferta)) ?></p>
            </div>

            <div class="m-3 mt-0">
                <form action="<?php echo RUTA_URL?>/Reservar/EliminarReserva" method="post" class="d-flex justify-content-end">
                    <input type="hidden" name="id_oferta" id="id_oferta" value="<?php echo $reserva->id_oferta ?>">
                    <input type="submit" class="btn btn-danger" value="Eliminar reserva">
                </form>
            </div>
        </div>
        <?php endforeach; ?>

    </div>

    <div class="mt-3">

        <?php
            if(count($datos['reservasami']) === 0){

            }else{
                ?>
                    <h4>Reservas a mis ofertas</h4>
                <?php
            }
        ?>
        
        <?php foreach($datos['reservasami'] as $reservaami): ?>
        <div class="card mb-3">
            <div class="m-3">
                <h5><?php echo $reservaami->titulo_oferta ?></h5>
                <p><?php echo $reservaami->condiciones_oferta ?></p>
                <p><?php echo $reservaami->descripcion_oferta ?></p>
                <p>Fecha inicio: <?php echo date('d/m/Y', strtotime($reservaami->fecha_inicio_oferta)) ?></p>
                <p>Fecha fin: <?php echo date('d/m/Y', strtotime($reservaami->fecha_fin_oferta)) ?></p>
            </div>
            <div class="m-3 mt-0">
                <!-- Button trigger modal -->
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $reservaami->id_oferta?>">
                    Ver usuarios
                    </button>
                </div>
                
                <!-- Modal -->

                <div class="modal fade" id="exampleModal<?php echo $reservaami->id_oferta?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Usuarios</h1>
                        
                       
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <?php 

                    foreach($this->datos['usuarios_para_oferta'][$reservaami->id_oferta] as $usuario_oferta): ?>
                    <div class="row">
                            <p class="col-6 mt-2"><?php echo $usuario_oferta->nombre_usuario." ".$usuario_oferta->apellidos_usuario?></p>
                            <a class="btn btn-primary col-6 mb-2" href="Chat/Inicio/<?php echo cifrar_url_aes($usuario_oferta->id_usuario)?>">Contactar</a>
                    </div>
                    <?php endforeach ?>
                        
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>