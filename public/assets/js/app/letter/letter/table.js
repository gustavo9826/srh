var iterator = 1; // Se comienza el iterador en 1
var emptyContent = false;

$(document).ready(function () {
    searchInit();
    setValue();
});

function searchInit() {
    const searchValue = document.getElementById('searchValue').value;
    const iteradorAux = (iterator * 5) - 5;

    $.get('/srh/public/user/list', {
        iterator: iteradorAux,
        searchValue: searchValue
    }, function (response) {

        const tbody = $('#template-table tbody');
        tbody.empty(); // Limpiar la tabla

        if (response.value && response.value.length > 0) {
            response.value.forEach(function (user) {
                const finalUrl = `/srh/public/user/edit/${user.id}`;

                // Generar el HTML con template literals
                const rowHTML = `
                    <tr>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-transparent dropdown-toggle-split icon-btn" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: transparent;" data-toggle="tooltip" data-placement="top" title="Menu">
                                    <i class="fas fa-ellipsis-h" style="color: #9F2241; font-size: 2rem;"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                    <h6 class="dropdown-header">Acciones</h6>
                                    <a class="dropdown-item" href="${finalUrl}">
                                        <span style="background:#1D5B3B" class="icon-container-template">
                                            <div style="text-align: center;">
                                                <i class="fa fa-pencil item-icon-menu"></i>
                                            </div>
                                        </span>
                                        Modificar
                                    </a>
                                    <button class="dropdown-item" onclick="showModalTempleta(${user.id})">
                                        <span style="background:#707070" class="icon-container-template">
                                            <div style="text-align: center;">
                                                <i class="fa fa-unlock item-icon-menu"></i>
                                            </div>
                                        </span>
                                        Cloud
                                    </button>
                                    <a class="dropdown-item" href="#">
                                        <span style="background:#003366" class="icon-container-template">
                                            <div style="text-align: center;">
                                                <i class="fa fa-user item-icon-menu"></i>
                                            </div>
                                        </span>
                                        Usuario
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <span style="background:#6A1B3D" class="icon-container-template">
                                            <div style="text-align: center;">
                                                <i class="fa fa-trash item-icon-menu"></i>
                                            </div>
                                        </span>
                                        Eliminar
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td>${user.email}</td>
                        <td>${user.name}</td>
                        <td>${user.email}</td>
                        <td>${user.email}</td>
                        <td>${user.email}</td>
                        <td>${user.email}</td>
                    </tr>
                `;
                tbody.append(rowHTML);
            });
            emptyContent = false;
        } else {
            tbody.html('<tr><td colspan="8" class="text-center">No se encontraron resultados</td></tr>');
            emptyContent = true;
            setValue();
        }
    });
}

function updateIterator(increment) {
    iterator = emptyContent ? iterator : Math.max(1, iterator + increment); // Evitar valores negativos
    setValue();
    searchInit();
}

function paginatorMax1() {
    updateIterator(1); // Incrementar en 1
}

function paginatorMax5() {
    updateIterator(5); // Incrementar en 5
}

function paginatorMin1() {
    updateIterator(-1); // Decrementar en 1
}

function paginatorMin5() {
    updateIterator(-5); // Decrementar en 5
}

function setValue() {
    let iteratorAux = iterator;
    document.getElementById("is_iterator").innerHTML = iteratorAux;
    document.getElementById("is_iteratorMin").innerHTML = iteratorAux - 1;
    document.getElementById("is_iteratorMax").innerHTML = iteratorAux + 1;
}

// Al momento de escribir en el buscador, resetear el iterador a 1
function searchValue() {
    iterator = 1;
    setValue();
    searchInit();
}