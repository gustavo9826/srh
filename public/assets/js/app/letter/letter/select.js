
var token = $('meta[name="csrf-token"]').attr('content'); //Token for form

//Codigo para la seleccion de area y como cambia el valor de los demas select que dependen de ella
$('#collectionArea').on('change', function () {
    let idValue = $(this).val();  // Obtiene el valor de la opción seleccionada
    if (idValue) { // Realiza la solicitud AJAX solo si se ha seleccionado un valor
        $.ajax({
            url: '/srh/public/letter/collection/collectionArea',
            type: 'POST',
            data: {
                id: idValue,
                _token: token  // Usar el token extraído de la metaetiqueta
            },
            success: function (response) {

                $('#collectionAreaEnlace').empty();//limpiar catalogo
                $('#collectionAreaUser').empty();//limpiar catalogo

                $('#collectionAreaEnlace').append('<option value="">SELECCIONE</option>');// Agregar una opción por defecto
                $('#collectionAreaUser').append('<option value="">SELECCIONE</option>');// Agregar una opción por defecto

                $.each(response.selectEnlace, function (index, item) { // Iterar sobre las opciones recibidas y agregarlas al select
                    $('#collectionAreaEnlace').append('<option value="' + item.id + '">' + item.name + '</option>');
                });

                $.each(response.selectUsuario, function (index, item) { // Iterar sobre las opciones recibidas y agregarlas al select
                    $('#collectionAreaUser').append('<option value="' + item.id + '">' + item.name + '</option>');
                });

                // Refrescar el selectpicker si estás usando Bootstrap Select
                $('#collectionAreaEnlace').selectpicker('refresh');
                $('#collectionAreaUser').selectpicker('refresh');

            },
        });
    } else {
        console.log('no seleccionado');
        $('#collectionAreaEnlace').empty();
    }
});

