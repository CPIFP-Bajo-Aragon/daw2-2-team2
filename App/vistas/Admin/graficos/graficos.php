<?php require_once RUTA_APP . '/vistas/inc/cabecera_admin.php' ?>

<html>
<head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(fetchAndDrawCharts);

        function fetchAndDrawCharts() {
            fetch('http://' + location.host + '/Admingraficos/graficomunicipio')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en el fetch' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    drawChart(data, 'Inmuebles por Municipio', 'chart_div');
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });

            let datos2 = <?php echo json_encode($datos['graficoofertasactivas'])?>;
            console.log(datos2);
            drawChart2(datos2);
        }

        function drawChart(chartData, title, elementId) {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Municipio');
            data.addColumn('number', 'Inmueble');

            chartData.forEach(item => {
                data.addRow([item.nombre_municipio, item.inmueble]);
            });

            var options = {
                'title': title,
                'width': 1000,
                'height': 900
            };

            var chart = new google.visualization.PieChart(document.getElementById(elementId));
            chart.draw(data, options);
        }

        function drawChart2(chartData) {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Estado');
        data.addColumn('number', 'Ofertas');

        chartData.forEach(item => {
            // Determinar el estado de la oferta
            var estado = item.activo == 1 ? 'Activa' : 'Inactiva';
            // Añadir fila al DataTable
            data.addRow([estado, item.oferta]);
        });

        var options = {
            'title': 'Estado de Ofertas',
            'width': 1000,
            'height': 900
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
    }

    </script>
</head>

<body >
    <div class="d-flex flex-row">
        <div id="chart_div"></div>
        <div id="chart_div2"></div>
    </div>
</body>
</html>
