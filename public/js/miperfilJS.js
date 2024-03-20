function showEditForm() {
    document.getElementById('datosContainer').classList.add('hidden');
    document.getElementById('editFormContainer').classList.remove('hidden');
}

function cancelEdit() {
    document.getElementById('datosContainer').classList.remove('hidden');
    document.getElementById('editFormContainer').classList.add('hidden');
}

function showEditForm() {
    document.getElementById('datosContainer').classList.add('hidden');
    document.getElementById('editFormContainer').classList.remove('hidden');
}

function cancelEdit() {
    document.getElementById('datosContainer').classList.remove('hidden');
    document.getElementById('editFormContainer').classList.add('hidden');
}

//DRAG AND DROP
const dropArea = document.querySelector(".drag-area");
const button = dropArea.querySelector('button');
const input = dropArea.querySelector('#formFile');

button.addEventListener('click', () => {
    input.click();
});

input.addEventListener("change", (e) => {
    const files = e.target.files;
    clearPreview(); 
    showFiles(files);
});

dropArea.addEventListener("dragenter", (e) => {
    e.preventDefault();
    dropArea.classList.add("active");
});

dropArea.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropArea.classList.add("active");
});

dropArea.addEventListener("dragleave", () => {
    dropArea.classList.remove("unactive");
});

dropArea.addEventListener("drop", (e) => {
    e.preventDefault();
    dropArea.classList.remove("active");
    clearPreview();
    const files = e.dataTransfer.files;
    input.files = files; 
    showFiles(files);
});


function clearPreview() {
    document.getElementById("preview").innerHTML = ''; 
}

function showFiles(files) {
    for (const file of files) {
        processFile(file);
    }
}

function processFile(file) {
    const docType = file.type;
    const validExtensions = ['application/pdf'];

    if (validExtensions.includes(docType)) {
        const fileReader = new FileReader();

        fileReader.onload = function(e) {
            const fileUrl = e.target.result;

            const image = `<div class="file-container">
                <img src="${fileUrl}" alt="${file.name}">
                <div>
                    <span>${file.name}</span>
                    <span class="status-text"></span>
                </div>
            </div>`;

            document.getElementById("preview").innerHTML += image;

        };

        fileReader.readAsDataURL(file);
    } else {
        alert('No es un archivo PDF');
    }
}
