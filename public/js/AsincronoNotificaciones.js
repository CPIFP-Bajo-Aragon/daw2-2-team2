function NotificacionesAPI(variable) {
  
  if (variable == 'Historico'){
    document.getElementById("activas").className = "nav-link";
    document.getElementById("historico").className = "nav-link active";
  } else {
    document.getElementById("activas").className = "nav-link active";
    document.getElementById("historico").className = "nav-link";
  }
  
  // Limpiar el contenido actual
  var contenedor = document.getElementById('contenido');
  contenedor.innerHTML = '';

  // Realizar la solicitud Fetch y procesar la respuesta
  fetch('http://192.168.18.120/Miperfil/NotificacionesAPI/' + variable)
 
    .then(response => {
      if (!response.ok) {
        throw new Error('Error en el fetch' + response.status);
      }
      return response.json();

    })
    .then(data => {
      console.log(data);

      data.forEach(notificacion => {
        var rowDiv = document.createElement('div');
        rowDiv.className = 'row';

        var colDiv = document.createElement('div');
        colDiv.className = 'row-sm-5';

        var cardDiv = document.createElement('div');
        cardDiv.className = 'card';

        var cardBodyDiv = document.createElement('div');
        cardBodyDiv.className = 'card-body';

        var cardTitle = document.createElement('h5');
        cardTitle.className = 'card-title';

        var cardText = document.createElement('p');
        cardText.className = 'card-text';


        if (variable == 'Historico'){
          var horaleido = document.createElement('p');
          horaleido.className = 'card-text';

          horaleido.textContent = notificacion.Fecha_Leido;
        } else {
          var btnLeida = document.createElement('a');
          btnLeida.href = '/Miperfil/NotificacionLeida/' + notificacion.id_notificacion;
          btnLeida.className = 'btn btn-primary';
          btnLeida.textContent = 'Marcar como Leída';
        }
      

        cardTitle.textContent = notificacion.tipo;
        cardText.textContent = notificacion.contenido;

        // Construir la estructura anidada
        cardBodyDiv.appendChild(cardTitle);
        cardBodyDiv.appendChild(cardText);

        cardDiv.appendChild(cardBodyDiv);
        if (variable == 'Historico'){
          cardDiv.appendChild(horaleido);

        } else {
          cardDiv.appendChild(btnLeida);

        }
        colDiv.appendChild(cardDiv);

        rowDiv.appendChild(colDiv);

        // Agregar los nuevos elementos al contenedor
        contenedor.appendChild(rowDiv);
      });
    })
    .catch(error => {
      if (error instanceof SyntaxError) {
        console.error('Error: La respuesta del servidor no es un JSON válido.');
      } else {
        console.error('Error en la solicitud Fetch:', error.message, error);
      }
    });
}
