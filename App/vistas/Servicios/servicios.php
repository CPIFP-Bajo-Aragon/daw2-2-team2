<?php cabecera(); ?>

<div class="container mt-4">
<?php
    if (empty($servicios)) {
        echo '<p>no hay datos disponibles.</p>';
    } else {
        foreach ($servicios as $servicio) {
            echo '<div class="mb-4">';
            echo '<h2>' . $servicio['nombre_municipio'] . '</h2>';

            $serviciosMunicipio = explode(',', $servicio['servicios_por_municipio']);

            echo '<ul class="list-group">';
            foreach ($serviciosMunicipio as $servicioMunicipio) {
                list($nombre, $tipo) = explode(' ', trim($servicioMunicipio));

                echo '<li class="list-group-item">';
                echo '<strong>Nombre:</strong> ' . $nombre;
                echo '<strong>Tipo:</strong> ' . $tipo;
                echo '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>