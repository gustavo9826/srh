function showFileNameAndPreview() {
    const fileInput = document.getElementById('file');
    const fileNameDisplay = document.getElementById('file-name');
    const imagePreviewContainer = document.getElementById('image-preview-container');
    const pdfPreviewContainer = document.getElementById('pdf-preview-container');
    const imagePreview = document.getElementById('image-preview');
    const pdfPreview = document.getElementById('pdf-preview');

    const file = fileInput.files[0];

    // Mostrar el nombre del archivo seleccionado
    fileNameDisplay.textContent = "Archivo seleccionado: " + file.name;

    // Resetear las vistas previas
    imagePreviewContainer.style.display = 'none';
    pdfPreviewContainer.style.display = 'none';

    // Mostrar vista previa para imágenes
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (e) {
            imagePreview.src = e.target.result;
            imagePreviewContainer.style.display = 'block'; // Mostrar la vista previa de la imagen
        };
        reader.readAsDataURL(file);
    }

    // Mostrar vista previa para PDFs
    else if (file && file.type === 'application/pdf') {
        const reader = new FileReader();
        reader.onload = function (e) {
            pdfPreview.src = e.target.result;
            pdfPreviewContainer.style.display = 'block'; // Mostrar la vista previa del PDF
        };
        reader.readAsDataURL(file);
    }

    // No hay vista previa si no es imagen ni PDF
    else {
        imagePreviewContainer.style.display = 'none';
        pdfPreviewContainer.style.display = 'none';
    }
}
