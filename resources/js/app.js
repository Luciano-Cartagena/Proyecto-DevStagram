import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('.dropzone', {
    dictDefaultMessage: "Sube aquí tu imagen",
    acceptedFiles: "png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false,

    // Se ejecuta automáticamente cuando dropzone es inicializado.
    init: function () { 
        const imagenInput = document.querySelector('[name="imagen"]');

        // Verifica si hay un valor en el input y crea el objeto de la imagen
        if (imagenInput.value.trim()) {
            const imagenPublicada = {}; // Creamos un objeto.
            imagenPublicada.name = imagenInput.value; // Asignar el nombre de la imagen
            imagenPublicada.size = 1234; // Asegúrate de usar el tamaño correcto aquí

            // Usa emit en lugar de options para agregar el archivo
            this.emit("addedfile", imagenPublicada);

            // Asignar la URL correcta de la miniatura
            this.emit("thumbnail", imagenPublicada, `/uploads/${imagenPublicada.name}`);

            // Marcar como completada
            imagenPublicada.previewElement.classList.add("dz-success", "dz-complete");
        }
    },
});

// Al cargar una imagen, guarda su nombre en el input
dropzone.on("success", function (file, response) {
    document.querySelector('[name="imagen"]').value = response.imagen; // Asegúrate de que esto sea correcto
});

// Al eliminar un archivo, limpiar el input
dropzone.on('removedfile', function () {
    document.querySelector('[name="imagen"]').value = '';
});
