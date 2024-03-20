function verMasDistribucion(id,botontexto,texto) {
    var distribucion = document.getElementById(texto + id);
    var enlace = document.getElementById(botontexto + id);

    if (distribucion.style.display === 'none') {
        distribucion.style.display = 'block';
        enlace.textContent = 'Ver mas';
    } else {
        distribucion.style.display = 'none';
        enlace.textContent = 'Ver menos';
    }
}


