var filaActual = 0;
var filasPorPagina = 5;

    function paginar(direccion) {
        var filas = document.querySelectorAll('.filaServicio');
        var numFilas = filas.length;
        var numPaginas = Math.ceil(numFilas / filasPorPagina);

        filaActual += direccion;

        if (filaActual < 0) {
            filaActual = numPaginas - 1;
        } else if (filaActual >= numPaginas) {
            filaActual = 0;
        }

        var inicio = filaActual * filasPorPagina;
        var fin = inicio + filasPorPagina;

        for (var i = 0; i < numFilas; i++) {
            if (i >= inicio && i < fin) {
                filas[i].style.display = '';
            } else {
                filas[i].style.display = 'none';
            }
        }
    }
