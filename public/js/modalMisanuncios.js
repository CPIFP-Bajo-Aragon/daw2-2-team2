function openModalDetalles(anuncio) {
    var modal = document.createElement('div');
    modal.className = 'modal fade';
    modal.id = 'exampleModal';
    modal.tabIndex = '-1';
    modal.setAttribute('aria-labelledby', 'exampleModalLabel');
    modal.setAttribute('aria-hidden', 'true');
  
    var modalDialog = document.createElement('div');
    modalDialog.className = 'modal-dialog modal-xl';
  
    var modalContent = document.createElement('div');
    modalContent.className = 'modal-content';
  
    var modalHeader = document.createElement('div');
    modalHeader.className = 'modal-header';
  
    var modalTitle = document.createElement('h1');
    modalTitle.className = 'modal-title fs-5';
    modalTitle.id = 'exampleModalLabel';
    modalTitle.textContent = 'Detalles';
  
    var closeButton = document.createElement('button');
    closeButton.type = 'button';
    closeButton.className = 'btn-close';
    closeButton.setAttribute('data-bs-dismiss', 'modal');
    closeButton.setAttribute('aria-label', 'Close');
  
    modalHeader.appendChild(modalTitle);
    modalHeader.appendChild(closeButton);
  
    var modalBody = document.createElement('div');
    modalBody.className = 'modal-body';
  
    var detalles = document.createElement('p');
    detalles.textContent = 'Fotos: ' + anuncio.fotos;
    modalBody.appendChild(detalles);

    var detallesTitulo = document.createElement('p');
    detallesTitulo.textContent = 'Título: ' + anuncio.titulo;
    modalBody.appendChild(detallesTitulo);

    var detallesDescripcion = document.createElement('p');
    detallesDescripcion.textContent = 'Descripción: ' + anuncio.descripcion;
    modalBody.appendChild(detallesDescripcion);

    var detallesMetrosCuadrados = document.createElement('p');
    detallesMetrosCuadrados.textContent = 'Metros Cuadrados: ' + anuncio.metros_cuadrados + 'm²';
    modalBody.appendChild(detallesMetrosCuadrados);

    var detallesPrecio = document.createElement('p');
    detallesPrecio.textContent = 'Precio: ' + anuncio.precio + '€';
    modalBody.appendChild(detallesPrecio);

    var detallesFechaPublicacion = document.createElement('p');
    detallesFechaPublicacion.textContent = 'Fecha de Publicación: ' + anuncio.fecha_publicacion;
    modalBody.appendChild(detallesFechaPublicacion);

    var detallesEstado = document.createElement('p');
    detallesEstado.textContent = 'Estado: ' + anuncio.estado;
    modalBody.appendChild(detallesEstado);

    var detallesMunicipio = document.createElement('p');
    detallesMunicipio.textContent = 'Municipio: ' + anuncio.nombre_municipio;
    modalBody.appendChild(detallesMunicipio);
  
    modalContent.appendChild(modalHeader);
    modalContent.appendChild(modalBody);
  
    modalDialog.appendChild(modalContent);
    modal.appendChild(modalDialog);
  
    var modalContainer = document.getElementById('modal-container');
    modalContainer.innerHTML = '';
    modalContainer.appendChild(modal);
  
    var bootstrapModal = new bootstrap.Modal(modal);
    bootstrapModal.show();
  }
  