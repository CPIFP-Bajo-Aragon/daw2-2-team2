var valores_alquiler = new Array();

function ordenar(opcion) {
    // Obtener el array de datos
    fetch('https://'+location.host+'/Alquiler/CargarDatos/')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en el fetch' + response.status);
            }
            return response.json();
        })
        .then(data => {
            switch (opcion) {
                case "1": // Precio Mayor
                    data.sort((a, b) => b.precio_inm - a.precio_inm);
                    break;
                case "2": // Precio Menor
                    data.sort((a, b) => a.precio_inm - b.precio_inm);
                    break;
                case "3": // Más reciente
                    data.sort((a, b) => new Date(b.fecha_publicacion_oferta) - new Date(a.fecha_publicacion_oferta));
                    break;
                case "4": // Más antigua
                    data.sort((a, b) => new Date(a.fecha_publicacion_oferta) - new Date(b.fecha_publicacion_oferta));
                    break;
                default:
                    break;
            }
            // Llamar a la función para renderizar los elementos en el DOM
            AlquilerAPI(data);
        })
        .catch(error => {
            console.error('Error en la solicitud:', error);
        });
  }
  
  
  function buscar(){
    fetch('https://'+location.host+'/Alquiler/CargarDatos/')
    .then(response => {
        if (!response.ok) {
            throw new Error('Error en el fetch' + response.status);
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
         const datosBuscado = data.filter(dato=> dato.titulo_oferta.toLowerCase().includes(document.getElementById('buscador').value));
         console.log(datosBuscado);

         AlquilerAPI(datosBuscado);
    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
    });
  }

  function ordenarMunicipio(val) {
      fetch('https://'+location.host+'/Alquiler/CargarDatos/')
      .then(response => {
          if (!response.ok) {
              throw new Error('Error en el fetch' + response.status);
          }
          return response.json();
      })
      .then(data => {
          // Filtrar los datos por id_municipio
          console.log(data);
          const datosFiltrados = data.filter(dato => dato.id_municipio == val);
          console.log(datosFiltrados);
  
          AlquilerAPI(datosFiltrados);
      })
      .catch(error => {
          console.error('Error en la solicitud:', error);
      });
  }
  
  
  
  function ordenarPorPrecio(val) {
  
    var output = document.querySelector('.price-output');
    valmin = val - 50;
    output.textContent = valmin + "€ - " + val + "€";
  
    fetch('https://'+location.host+'/Alquiler/CargarDatos/')
    .then(response => {
        if (!response.ok) {
            throw new Error('Error en el fetch' + response.status);
        }
        return response.json();
    })
      .then(data => {
            // Filtrar los datos por el rango de precios
            const datosFiltrados = data.filter(datos => {
                const precio = datos.precio_inm;
                return precio >= valmin && precio <= val;
            });
  
            // Llamar a la función para renderizar los elementos en el DOM
            AlquilerAPI(datosFiltrados);
        })
        .catch(error => {
            console.error('Error en la solicitud:', error);
        });
  }
  
  
  function AlquilerAPI(data) {
    const container = document.querySelector('#contenido');
    container.innerHTML = "";

    const hoy = new Date(); // Obtener la fecha actual

    data.forEach((datos, index) => {
        const colDiv = document.createElement('div');
        colDiv.classList.add('col');

        const cardDiv = document.createElement('div');
        cardDiv.classList.add('card', 'h-100'); 

        const carouselId = `carouselExampleControls${index}`;
        const carouselDiv = document.createElement('div');
        carouselDiv.id = carouselId;
        carouselDiv.classList.add('carousel', 'slide');

        const carouselInnerDiv = document.createElement('div');
        carouselInnerDiv.classList.add('carousel-inner');

        let isFirstImage = true;

        datos.rutas_imagenes.split(',').forEach((ruta, i) => {
            const carouselItem = document.createElement('div');
            carouselItem.classList.add('carousel-item');
            if (isFirstImage) {
                carouselItem.classList.add('active');
                isFirstImage = false;
            }
            const img = document.createElement('img');
            img.src = ruta.trim();
            img.classList.add('img-casa', 'd-block', 'w-100');
            img.setAttribute('width','170');
            img.setAttribute('height','300');
            carouselItem.appendChild(img);
            carouselInnerDiv.appendChild(carouselItem);
        });

        const prevButton = document.createElement('button');
        prevButton.classList.add('carousel-control-prev');
        prevButton.setAttribute('type', 'button');
        prevButton.setAttribute('data-bs-target', `#${carouselId}`);
        prevButton.setAttribute('data-bs-slide', 'prev');
        prevButton.innerHTML = '<span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span>';

        const nextButton = document.createElement('button');
        nextButton.classList.add('carousel-control-next');
        nextButton.setAttribute('type', 'button');
        nextButton.setAttribute('data-bs-target', `#${carouselId}`);
        nextButton.setAttribute('data-bs-slide', 'next');
        nextButton.innerHTML = '<span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span>';

        const cardBodyDiv = document.createElement('div');
        cardBodyDiv.classList.add('card-body');

        const cardTitle = document.createElement('h5');
        cardTitle.classList.add('card-title');
        cardTitle.textContent = datos.titulo_oferta;
        cardTitle.style.fontSize ='1.2em';

        const cardText = document.createElement('p');
        cardText.classList.add('card-text');
        cardText.innerHTML = `<i class="bi bi-tag"></i> ${datos.precio_inm}€ - <i class="bi bi-superscript"></i> ${datos.metros_cuadrados_inmueble}m²</p><p><i class="bi bi-calendar"></i> Fecha de inicio: ${datos.fecha_inicio_oferta}</p><p><i class="bi bi-calendar"></i> Fecha de fin: ${datos.fecha_fin_oferta}</p><p><i class="bi bi-map"></i> ${datos.direccion_inmueble}</p>`;
        cardText.style.fontSize = '1em';

        const verMasButton = document.createElement('button');
        verMasButton.setAttribute('type', 'button');
        verMasButton.classList.add('btn', 'btn-secondary', 'btn-sm');
        verMasButton.textContent = 'Ver más';

        verMasButton.addEventListener('click', function() {
            const nuevaUrl = 'Alquiler/VerMas/'+datos.id_oferta;
            window.location.href = nuevaUrl;
        });

        const alquilarButton = document.createElement('button');
        alquilarButton.setAttribute('type', 'button');
        alquilarButton.classList.add('btn', 'btn-primary', 'btn-sm');
        alquilarButton.textContent = 'Contactar';
        alquilarButton.style.marginLeft= '1em';

        alquilarButton.addEventListener('click', function() {
            const nuevaUrlChat = 'Chat/Inicio/'+datos.id_usuario;
            window.location.href = nuevaUrlChat;
        });

        carouselDiv.appendChild(carouselInnerDiv);
        carouselDiv.appendChild(prevButton);
        carouselDiv.appendChild(nextButton);

        cardBodyDiv.appendChild(cardTitle);
        const fechaInicio = new Date(datos.fecha_publicacion_oferta);
        const diferenciaDias = Math.ceil((hoy - fechaInicio) / (1000 * 60 * 60 * 24));
        if (diferenciaDias < 5) {
            const newBadge = document.createElement('span');
            newBadge.classList.add('badge', 'bg-success', 'mb-3', 'fs-6');
            newBadge.textContent = 'Nueva';
            cardBodyDiv.appendChild(newBadge);
        }
        cardBodyDiv.appendChild(cardText);
        cardBodyDiv.appendChild(verMasButton);
        if (parseInt(sesion) > 0) {
            cardBodyDiv.appendChild(alquilarButton);
        }

        cardDiv.appendChild(carouselDiv);
        cardDiv.appendChild(cardBodyDiv);

        colDiv.appendChild(cardDiv);

        container.appendChild(colDiv);
    });
}

