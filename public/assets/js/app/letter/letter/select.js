
//Codigo para la seleccion de area y como cambia el valor de los demas select que dependen de ella
$('#id_cat_area').on('change', function () {
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

                $('#id_usuario_enlace').empty();//limpiar catalogo
                $('#id_usuario_area').empty();//limpiar catalogo
                $('#id_cat_tramite').empty();//limpiar catalogo

                $('#id_usuario_enlace').append('<option value="">SELECCIONE</option>');// Agregar una opción por defecto
                $('#id_usuario_area').append('<option value="">SELECCIONE</option>');// Agregar una opción por defecto
                $('#id_cat_tramite').append('<option value="">SELECCIONE</option>');// Agregar una opción por defecto

                $.each(response.selectEnlace, function (index, item) { // Iterar sobre las opciones recibidas y agregarlas al select
                    $('#id_usuario_enlace').append('<option value="' + item.id + '">' + item.descripcion + '</option>');
                });

                $.each(response.selectUsuario, function (index, item) { // Iterar sobre las opciones recibidas y agregarlas al select
                    $('#id_usuario_area').append('<option value="' + item.id + '">' + item.descripcion + '</option>');
                });

                $.each(response.selectTramite, function (index, item) { // Iterar sobre las opciones recibidas y agregarlas al select
                    $('#id_cat_tramite').append('<option value="' + item.id + '">' + item.descripcion + '</option>');
                });

                // Refrescar el selectpicker si estás usando Bootstrap Select
                $('#id_usuario_enlace').selectpicker('refresh');
                $('#id_usuario_area').selectpicker('refresh');
                $('#id_cat_tramite').selectpicker('refresh');

                cleanSelect('#id_cat_clave'); //Se limpia el select
                clearClaveData(); //Limpieza de encabezado
            },
        });
    } else {
        cleanSelect('#id_usuario_area'); //Se limpia el select
        cleanSelect('#id_usuario_enlace'); //Se limpia el select
        cleanSelect('#id_cat_tramite'); //Se limpia el select
        cleanSelect('#id_cat_clave'); //Se limpia el select
        clearClaveData(); //Limpieza de encabezado
    }
});


//Codigo para la seleccion de area y como cambia el valor de los demas select que dependen de ella
$('#id_cat_unidad').on('change', function () {
    let idValue = $(this).val();  // Obtiene el valor de la opción seleccionada
    if (idValue) { // Realiza la solicitud AJAX solo si se ha seleccionado un valor
        $.ajax({
            url: '/srh/public/letter/collection/collectionUnidad',
            type: 'POST',
            data: {
                id: idValue,
                _token: token  // Usar el token extraído de la metaetiqueta
            },
            success: function (response) {
                $('#id_cat_coordinacion').empty();//limpiar catalogo

                $('#id_cat_coordinacion').append('<option value="">SELECCIONE</option>');// Agregar una opción por defecto
                $.each(response.selectCoordinacion, function (index, item) { // Iterar sobre las opciones recibidas y agregarlas al select
                    $('#id_cat_coordinacion').append('<option value="' + item.id + '">' + item.descripcion + '</option>');
                });

                $('#id_cat_coordinacion').selectpicker('refresh');
            },
        });
    } else {
        cleanSelect('#id_cat_coordinacion'); //Se limpia el select
    }
});

//Codigo para la seleccion de Trmaite y como cambia el valor de los demas select que dependen de ella
$('#id_cat_tramite').on('change', function () {
    let idValue = $(this).val();  // Obtiene el valor de la opción seleccionada
    if (idValue) { // Realiza la solicitud AJAX solo si se ha seleccionado un valor
        $.ajax({
            url: '/srh/public/letter/collection/collectionTramite',
            type: 'POST',
            data: {
                id: idValue,
                _token: token  // Usar el token extraído de la metaetiqueta
            },
            success: function (response) {
                $('#id_cat_clave').empty();//limpiar catalogo

                $('#id_cat_clave').append('<option value="">SELECCIONE</option>');// Agregar una opción por defecto
                $.each(response.selectClave, function (index, item) { // Iterar sobre las opciones recibidas y agregarlas al select
                    $('#id_cat_clave').append('<option value="' + item.id + '">' + item.descripcion + '</option>');
                });

                $('#id_cat_clave').selectpicker('refresh');
            },
        });
    } else {
        cleanSelect('#id_cat_clave'); //Se limpia el select
        clearClaveData(); //Limpieza de encabezado
    }
});


//Codigo que al momento de seleccionar la clave, cambian los valores
$('#id_cat_clave').on('change', function () {
    let idValue = $(this).val();  // Obtiene el valor de la opción seleccionada
    if (idValue) { // Realiza la solicitud AJAX solo si se ha seleccionado un valor
        $.ajax({
            url: '/srh/public/letter/collection/collectionClave',
            type: 'POST',
            data: {
                id: idValue,
                _token: token  // Usar el token extraído de la metaetiqueta
            },
            success: function (response) {
                let valueClave = response.valueOfClave;

                $('#_labClave').text(valueClave.descripcion);
                $('#_labClaveCodigo').text(valueClave.redaccion);
                $('#_labClaveRedaccion').text(valueClave.codigo);

            },
        });
    } else {
        clearClaveData();
    }
});

//Limpiar los valores de clave que aparecen en el encabezado
function clearClaveData() {
    $('#_labClave').text('_');
    $('#_labClaveCodigo').text('_');
    $('#_labClaveRedaccion').text('_');
}
