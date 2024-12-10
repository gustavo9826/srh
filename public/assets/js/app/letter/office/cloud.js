
//Scrip que se ejecuta con el formulario, para funciones u herramientas extras
//Ejecucion cuando carga el formulario
var token = $('meta[name="csrf-token"]').attr('content'); //Token for form
var id_tbl_oficio = $('#id_tbl_oficio').val();//Obtener elemento

//Inicio de variables
$(document).ready(function () {
    getDataCloud();
    getDataAnexos();
});

//La funcion lista los anexos que existen en el cloud
function getDataAnexos() {
    let _anexos_empty = $('#_anexos_empty');
    let $anexosContainer = $('#anexos-container'); // El contenedor de los anexos

    $.ajax({
        url: '/srh/public/office/cloud/anexos',
        type: 'POST',
        data: {
            id_tbl_oficio: id_tbl_oficio,
            _token: token  // Usar el token extraído de la metaetiqueta
        },
        success: function (response) {
            let anexos = response.value;  // Suponiendo que la respuesta tiene una propiedad 'value' con los datos
            // Limpiamos el contenedor antes de insertar los elementos
            $anexosContainer.empty();
            if (anexos.length !== 0) {
                // Si hay información en los anexos, ocultamos el mensaje "sin contenido"
                _anexos_empty.hide();
                // Iteramos sobre los anexos y creamos los elementos HTML dinámicamente
                anexos.forEach(function (anexo) {
                    // Creamos el HTML para cada anexo
                    let fileHTML = `
                        <div class="custom-file-container">
                            <div class="custom-file-icon-container">
                                <i style="color:#777777" class="fa fa-file" aria-hidden="true"></i>
                                <div class="custom-button-container">
                                    <button onclick="getInfo('${anexo.id}')" style="background: #003366" class="custom-button" title="Usuario">
                                        <i style="color: white" class="fa fa-user"></i>
                                    </button>
                                    <button onclick="getInfo('${anexo.uid}')" style="background: #1D5B3B" class="custom-button" title="Ver">
                                        <i style="color: white" class="fa fa-eye"></i>
                                    </button>
                                    <button onclick="download('${anexo.uid}')" style="background: #707070" class="custom-button" title="Descargar">
                                        <i style="color: white" class="fa fa-download"></i>
                                    </button>
                                    <button onclick="deleteAnexo('${anexo.id}')" style="background: #6A1B3D" class="custom-button" title="Eliminar">
                                        <i style="color: white" class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="custom-file-name">
                                <p>${anexo.nombre}</p>
                            </div>
                        </div>
                    `;
                    // Insertamos el HTML generado en el contenedor
                    $anexosContainer.append(fileHTML);
                });
            } else {
                // Si no hay información, mostramos el mensaje de "sin contenido"
                _anexos_empty.show();
            }
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