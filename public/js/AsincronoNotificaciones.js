let pageNumber = 1;
let totalElements = 0;
let currentVariable = "";
let inicio = 0;
let fin = 0;
//var currentPage = 3;

//let notificacion = "";


function NotificacionesAPI(variable, inicio, fin) {
  if (variable != currentVariable) {
    pageNumber = 1;
  }

  currentVariable = variable;
  
  
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
  fetch('https://'+location.host+'/Miperfil/NotificacionesAPI/' + variable)
 
    .then(response => {
      if (!response.ok) {
        throw new Error('Error en el fetch' + response.status);
      }
      return response.json();

    })
    .then(data => {
      console.log(data);

      totalElements = data.length; // Actualiza el total de elementos
      //console.log(totalElements);

      const primerRegistro = data[0];
      const latitud = primerRegistro.latitud_servicio;
      const longitud = primerRegistro.longitud_servicio;

      data.slice(inicio, fin).forEach(notificacion => {
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
            horaleido.textContent =  "Fecha leido: "+notificacion.fecha_leido;
            var btndesLeida = document.createElement('a');
            btndesLeida.href = '/Miperfil/NotificacionesDesLeidas/' + notificacion.id_notificacion;
            btndesLeida.className = 'btn btn-primary bg-danger border-0';
            btndesLeida.textContent = 'Desleer';
  
          } else {
            var btnLeida = document.createElement('a');
            btnLeida.href = '/Miperfil/NotificacionLeida/' + notificacion.id_notificacion;
            btnLeida.className = 'btn btn-primary bg-success border-0';
            btnLeida.textContent = 'Marcar como Leída';
          }
  
          cardTitle.textContent = notificacion.titulo_notificacion;
          cardText.textContent = notificacion.contenido_notificacion;
  
          // Construir la estructura anidada
          cardBodyDiv.appendChild(cardTitle);
          cardBodyDiv.appendChild(cardText);
  
          cardDiv.appendChild(cardBodyDiv);
          if (variable == 'Historico'){
            cardDiv.appendChild(horaleido);
            cardDiv.appendChild(btndesLeida);
          } else {
            cardDiv.appendChild(btnLeida);
  
          }
          colDiv.appendChild(cardDiv);
  
          rowDiv.appendChild(colDiv);
  
          // Agregar los nuevos elementos al contenedor
          contenedor.appendChild(rowDiv);
        });
        var npaginacion = totalElements / pageSize;
        npaginacion = Math.ceil(npaginacion);
        var npaginasul = document.createElement('ul');
        npaginasul.classList.add('horizontal-list');
        
        // npaginasul.classList.add('list-unstyled'); 
        // npaginasul.classList.add('d-inline');
        var pagina = "";

        //var cont=-2;
        //console.log(paginaActual);
        //console.log(pageNumber);
        //pageNumber = paginaActual;

        
        // for (let i = pageNumber; i <= pageNumber+4; i++) {
        //   var npaginasli = document.createElement('li');
        //   var npaginabutton = document.createElement('button');
        //   var x = cont + pageNumber;
        //   cont = cont +1;
        //   npaginabutton.textContent = x; 
        //   npaginabutton.setAttribute('value', x);
        //   npaginabutton.onclick = function() {
        //     nextPage(x);
        //   };
        //     npaginabutton.classList.add('nav-link');
        //   npaginasli.appendChild(npaginabutton); 
        //   npaginasul.appendChild(npaginasli);
        // }

        //   var pruebaElement = document.getElementById("prueba");
        
        //   pruebaElement.innerHTML = "";
        
        //   pruebaElement.appendChild(npaginasul);

          for (let i = 1; i <= npaginacion; i++) {
          var npaginasli = document.createElement('li');
          var npaginabutton = document.createElement('button');
          npaginabutton.textContent = i; 
          npaginabutton.setAttribute('value', i);
          npaginabutton.onclick = function() {
            nextPage(i);
          };
            npaginabutton.classList.add('nav-link');
          npaginasli.appendChild(npaginabutton); 
          npaginasul.appendChild(npaginasli);
        }
      
         var pruebaElement = document.getElementById("prueba");
        
         pruebaElement.innerHTML = "";
         
         pruebaElement.appendChild(npaginasul);
    })
    .catch(error => {
      if (error instanceof SyntaxError) {
        console.error('Error: La respuesta del servidor no es un JSON válido.');
      } else {
        console.error('Error en la solicitud Fetch:', error.message, error);
      }
    });

}

function nextPage(i) {
    //console.log(i);
    let incio = (i-1)*pageSize;
    let fin = incio+pageSize;
    //let paginaActual = i;
    //console.log(paginaActual);

    NotificacionesAPI(currentVariable, incio, fin);
  
}

