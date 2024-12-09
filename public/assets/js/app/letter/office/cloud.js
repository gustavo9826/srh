
//Scrip que se ejecuta con el formulario, para funciones u herramientas extras
//Ejecucion cuando carga el formulario
var token = $('meta[name="csrf-token"]').attr('content'); //Token for form

$(document).ready(function () {
    getDataCloud();
});

//La funcion obtiene los datos del encabezado de cloud
function getDataCloud() {

    let id_tbl_oficio = $('#id_tbl_oficio').val();//Obtener elemento

    $.ajax({
        url: '/srh/public/office/cloud/data',
        type: 'POST',
        data: {
            id_tbl_oficio: id_tbl_oficio,
            _token: token  // Usar el token extraído de la metaetiqueta
        },
        success: function (response) {
            let item = response.value; //Obtenemos la consulta

            $('#_noOficio').text(item.num_turno_sistema); // establecer los valores
            $('#_noCorrespondencia').text(item.num_turno_sistema_correspondencia); // establecer los valores
            $('#_noAnio').text(item.anio); // establecer los valores
            $('#_fechaInicio').text(item.fecha_inicio); // establecer los valores
            $('#_fechaFin').text(item.fecha_fin); // establecer los valores
        },
    });
}

