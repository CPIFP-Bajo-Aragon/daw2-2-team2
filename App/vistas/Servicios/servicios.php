<?php cabecera($this->datos); ?>


<?php
$serviciosPorMunicipio = [];


foreach ($datos['servicios'] as $resultado) {
    $nombreMunicipio = $resultado->nombre_municipio;

    $serviciosPorMunicipio[$nombreMunicipio][] = [
        'nombre' => $resultado->nombre,
        'tipo' => $resultado->tipo,
    ];
}

foreach ($serviciosPorMunicipio as $nombreMunicipio => $servicios) :
?>
    <h2><?= $nombreMunicipio ?></h2>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Nombre del Servicio</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicios as $servicio) : ?>
                <tr>
                    <td><?= $servicio['nombre'] ?></td>
                    <td><?= $servicio['tipo'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php endforeach; ?>

<button onclick="paginar(-1)">Anterior</button>
<button onclick="paginar(1)">Siguiente</button>

<script type="text/javascript" src="/var/www/html/public/js/paginar.js"></script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>