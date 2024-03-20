function openModalDetalles(variable) {

  // var modalId = 'exampleModal_' + Math.random().toString(36).substr(2, 9); // Generar un ID único
  
  var modal = document.createElement('div');
  modal.className = 'modal fade';
  modal.id = 'exampleModal';
  // modal.id = modalId;
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

  fetch('https://192.168.4.246/Misanuncios/cargarDatosInmueble/' + variable)
    .then(response => {
      if (!response.ok) {
        throw new Error('Error en el fetch' + response.status);
      }
      return response.json();
    })
    .then(data => {
      data.forEach(datos => {
        var detallesTitulo = document.createElement('p');
        detallesTitulo.textContent = 'Título: ' + datos.titulo_oferta;
        modalBody.appendChild(detallesTitulo);

        var detallesDescripcion = document.createElement('p');
        detallesDescripcion.textContent = 'Descripción: ' + datos.descripcion_inmueble;
        modalBody.appendChild(detallesDescripcion);

        var detallesDistribucion = document.createElement('p');
        detallesDistribucion.textContent = 'Distribucion: ' + datos.distribucion_inmueble;
        modalBody.appendChild(detallesDistribucion);

        var detallesCaracteristicas = document.createElement('p');
        detallesCaracteristicas.textContent = 'Caracteristicas: ' + datos.caracteristicas_inmueble;
        modalBody.appendChild(detallesCaracteristicas);

        var detallesEquipamiento = document.createElement('p');
        detallesEquipamiento.textContent = 'Equipamiento: ' + datos.equipamiento_inmueble;
        modalBody.appendChild(detallesEquipamiento);

        var detallesDireccion = document.createElement('p');
        detallesDireccion.textContent = 'Direccion: ' + datos.direccion_inmueble;
        modalBody.appendChild(detallesDireccion);

        var detallesMetrosCuadrados = document.createElement('p');
        detallesMetrosCuadrados.textContent = 'Metros Cuadrados: ' + datos.metros_cuadrados_inmueble + 'm²';
        modalBody.appendChild(detallesMetrosCuadrados);

        var detallesValoradoen = document.createElement('p');
        detallesValoradoen.textContent = 'Valorado en: ' + datos.precio_inmueble + '€';
        modalBody.appendChild(detallesValoradoen);

        var detallesPrecio = document.createElement('p');
        detallesPrecio.textContent = 'Precio: ' + datos.precio_inm + '€';
        modalBody.appendChild(detallesPrecio);

        var detallesFechaPublicacion = document.createElement('p');
        detallesFechaPublicacion.textContent = 'Fecha de Publicación: ' + datos.fecha_publicacion_oferta;
        modalBody.appendChild(detallesFechaPublicacion);

        var detallesEstado = document.createElement('p');
        detallesEstado.textContent = 'Estado: ' + datos.id_estado;
        modalBody.appendChild(detallesEstado);

        var detallesMunicipio = document.createElement('p');
        detallesMunicipio.textContent = 'Municipio: ' + datos.id_municipio;
        modalBody.appendChild(detallesMunicipio);
      });

      modalContent.appendChild(modalHeader);
      modalContent.appendChild(modalBody);

      modalDialog.appendChild(modalContent);
      modal.appendChild(modalDialog);

     // var modalContainer = document.getElementById('modal-container-'+datos.id_oferta);
      var modalContainer = document.getElementById('modal-container');
      modalContainer.innerHTML = '';
      modalContainer.appendChild(modal);

      var bootstrapModal = new bootstrap.Modal(modal);
      bootstrapModal.show();
    })
    .catch(error => {
      console.error('Error fetching data:', error);
    });
}

