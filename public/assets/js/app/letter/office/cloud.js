
//Scrip que se ejecuta con el formulario, para funciones u herramientas extras
//Ejecucion cuando carga el formulario
var token = $('meta[name="csrf-token"]').attr('content'); //Token for form
var id_tbl_oficio = $('#id_tbl_oficio').val();//Obtener elemento

//Inicio de variables
$(document).ready(function () {
    getDataCloud();
    getDataDocument();
});

//La funcion lista los documentos que existen en el cloud
function getDataDocument() {
    let container_anexo_entrada_vacio = $('#container_anexo_entrada_vacio');
    let container_anexo_entrada = $('#container_anexo_entrada');
    let container_oficio_entrada_vacio = $('#container_oficio_entrada_vacio');
    let container_oficio_entrada = $('#container_oficio_entrada');

    $.ajax({
        url: '/srh/public/office/cloud/anexos',
        type: 'POST',
        data: {
            id_tbl_oficio: id_tbl_oficio,
            _token: token  // Usar el token extraído de la metaetiqueta
        },
        success: function (response) {
            let anexosEntrada = response.anexosEntrada;  // Suponiendo que la respuesta tiene una propiedad 'value' con los datos
            let oficosEntrada = response.oficosEntrada;

            templateCloud(container_anexo_entrada, container_anexo_entrada_vacio, anexosEntrada); //Listamos la informacion
            templateCloud(container_oficio_entrada, container_oficio_entrada_vacio, oficosEntrada); //Listamos la informacion

        },
    });
}

//La funcion obtiene los datos del encabezado de cloud
function getDataCloud() {

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

function download(uid) {
    console.log(uid);
}

function deleteAnexo(id) {
    console.log(id);
}