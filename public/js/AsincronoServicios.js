let pageNumber = 1;
let pageSize = 8;
let totalElements = 0;
let currentVariable = 0; // Variable para almacenar el municipio seleccionado
let map;
let municipio = "";


function initializeMap() {
    if (map != undefined) {
        map.off();
        map.remove();
    }
    map = L.map('mi_mapa').setView([0, 0], 2);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
}

function ServiciosAPI(variable) {
    if (variable != currentVariable) {
        pageNumber = 1;
    }
    currentVariable = variable;
    const startIndex = (pageNumber - 1) * pageSize;
    const endIndex = startIndex + pageSize;

    initializeMap();

    if (variable == 0) {
        Swal.fire({
            position: "center",
            icon: "question",
            title: "Selecciona algun municipio para empezar tu busqueda...",
            showConfirmButton: false,
            timer: 2500,
        });
    }

    var cardBodyDiv = document.getElementById('contenido');
    cardBodyDiv.innerHTML = '';
    var cardBodyDivresenas = document.getElementById('resenas');
    cardBodyDivresenas.innerHTML = '';

    fetch('https://'+location.host+'/Servicio/CargarServicios/' + variable)
        .then(response => {
            if (!response.ok) { 
                throw new Error('Error en el fetch' + response.status);
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
          
            totalElements = data.length; // Actualiza el total de elementos

          

            const primerRegistro = data[0];

            const latitud = primerRegistro.latitud_servicio;
            const longitud = primerRegistro.longitud_servicio;
            map.setView([latitud, longitud], 16);

            
            data.slice(startIndex, endIndex).forEach(servicios => {
      
       
            municipio = servicios.id_municipio;
            

                var tr = document.createElement('tr');
                var td0 = document.createElement('td');
                var td1 = document.createElement('td');
                var td2 = document.createElement('td');
                var td3 = document.createElement('td');
                var i = document.createElement('i');

                td1.textContent = servicios.nombre_servicio;
                td2.textContent = servicios.descripcion_servicio;
                td3.textContent = servicios.nombre_tipo_servicio;
                i.className = servicios.Icono_tipo_servicio;

                td0.appendChild(i);

                tr.appendChild(td0);
                tr.appendChild(td1);
                tr.appendChild(td2);
                tr.appendChild(td3);

                cardBodyDiv.appendChild(tr);

                L.marker([servicios.latitud_servicio, servicios.longitud_servicio]).addTo(map).bindPopup(servicios.nombre_servicio);
            });
        })
        .catch(error => {
            if (error instanceof SyntaxError) {
                console.error('Error: La respuesta del servidor no es un JSON válido.');
            } else {
                console.error('Error en la solicitud Fetch:', error.message, error);
            }
        })
        .finally(() => {
            updatePaginationButtons();
        });
        



        fetch('https://'+location.host+'/Servicio/Cargarresenas/' + variable)
        .then(response => {
            if (!response.ok) { 
                throw new Error('Error en el fetch' + response.status);
            }
            return response.json();
            
        })
        .then(data => {
            console.log(data);

            data.forEach(resenas => {
                console.log('hola');

                var div1 = document.createElement("div");
                var div2 = document.createElement("div");
                var p1 = document.createElement('p');
                var p2 = document.createElement('p');

                div1.classList.add("card", "w-2");
                div2.classList.add("card-body");
                

                // Calcular estrellas en formato específico (4 blancas y 1 negra)
                var estrellasFormato = '';
                switch (resenas.estrellas_municipio) {
                    case 1:
                        estrellasFormato = '★☆☆☆☆'; 
                        break;
                    case 2:
                        estrellasFormato = '★★☆☆☆'; 
                        break;
                    case 3:
                        estrellasFormato = '★★★☆☆';
                        break;
                    case 4:
                        estrellasFormato = '★★★★☆'; 
                        break;
                    case 5:
                        estrellasFormato = '★★★★★';
                        break;
                    default:
                        estrellasFormato = '-';
                }
                
                p1.textContent = estrellasFormato+" - "+resenas.nombre_usuario;
                p2.textContent = resenas.valoracion;
                
                div2.appendChild(p1);
                div2.appendChild(p2);

                div1.appendChild(div2)


                cardBodyDivresenas.appendChild(div1)

            });
        })
        .catch(error => {
            if (error instanceof SyntaxError) {
                console.error('Error: La respuesta del servidor no es un JSON válido.');
            } else {
                console.error('Error en la solicitud Fetch:', error.message, error);
            }
        })
        .finally(() => {
            updatePaginationButtons();
        });
}


    ServiciosAPI(1);


function previousPage() {
    if (pageNumber > 1) {
        pageNumber--;
        ServiciosAPI(currentVariable);
    }
}

function nextPage() {
  if(pageNumber*pageSize<=totalElements){
    pageNumber++;
    ServiciosAPI(currentVariable);
  }
}

function updatePaginationButtons() {
    const previousButton = document.getElementById('previousButton');
    const nextButton = document.getElementById('nextButton');

    previousButton.style.display = pageNumber > 1 ? 'block' : 'none';
    nextButton.style.display = pageNumber * pageSize < totalElements ? 'block' : 'none';
}
