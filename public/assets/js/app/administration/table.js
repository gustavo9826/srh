
$(document).ready(function () {
    $('#example').DataTable({
        "paging": true,              // Habilita la paginación
        "lengthChange": false,       // Desactiva la opción de cambiar el número de filas por página
        "searching": true,           // Habilita la búsqueda
        "ordering": true,            // Habilita la ordenación
        "info": true,                // Muestra la información de la tabla
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "search": "Buscar:",
            "paginate": {
                "first": "Primera",
                "last": "Última",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
});