// Espera a que el documento esté completamente cargado
document.addEventListener('DOMContentLoaded', function () {
    // Inicializa todos los tooltips en la página
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
});