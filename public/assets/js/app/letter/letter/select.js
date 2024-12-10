
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
                //proceso de select 
                foreachSelect(response.selectEnlace, '#id_usuario_enlace');
                foreachSelect(response.selectUsuario, '#id_usuario_area');
                foreachSelect(response.selectTramite, '#id_cat_tramite');

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

                //Proceso de select
                foreachSelect(response.selectCoordinacion, '#id_cat_coordinacion');
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
                //Proceso de select
                foreachSelect(response.selectClave, '#id_cat_clave');
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
