function ChatAPI(variable) {


    chatMessageDiv = document.querySelector('.chat-message');
    chatMessageDiv.innerHTML = '';

   
    fetch('https://'+location.host+'/Chat/mensajes/'+variable)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en el fetch' + response.status);
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            data.forEach(mostrarMensajes => {
                var nuevoDiv = document.createElement('div');

                nuevoDiv.textContent = mostrarMensajes.mensaje_chat;

                if(variable != mostrarMensajes.emisor) {
                    nuevoDiv.classList.add('bg-success', 'text-white', 'other-message', 'rounded', 'p-2', 'col-8', 'ms-5', 'mb-2' );
                } else {
                    nuevoDiv.classList.add('bg-secondary', 'text-white', 'my-message', 'rounded', 'p-2', 'my-6', 'col-8', 'mb-2');
                }

                chatMessageDiv.appendChild(nuevoDiv);

                var element = document.getElementById("chat");
                element.scrollTop = element.scrollHeight;
                
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
