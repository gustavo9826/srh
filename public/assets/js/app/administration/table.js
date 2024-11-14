

var iterator = 1; //Se comienza el iterador en 1

$(document).ready(function () {
    searchInit();
    setValue();
});


function searchInit() {

    let searchValue = document.getElementById('searchValue').value;
    let iteradorAux = (iterator * 5) - 5;

    $.get('/srh/public/user/list', {
        iterator: iteradorAux,
        searchValue: searchValue
    }, function (response) {
        $('#user-table tbody').empty();

        response.value.forEach(function (user) {
            $('#user-table tbody').append(
                '<tr>' +
                '<td>' + user.id + '</td>' +
                '<td>' + user.name + '</td>' +
                '<td>' + user.email + '</td>' +
                '</tr>'
            );
        });
    })
}

//Funcion para que al pulsar el boton se incremente uno
function paginatorMax1() {
    iterator++;
    setValue();
    searchInit();
}

//Funcion para que al pulsar el boton se incrementen 5
function paginatorMax5() {
    iterator += 5;
    setValue();
    searchInit();
}

//Funcion para que al pulsar el boton se disminuyan 5
function paginatorMin5() {
    let iteratorAux = iterator;
    iterator = (iteratorAux -= 5) > 0 ? (iterator -= 5) : 1;
    setValue();
    searchInit();
}

//Funcion para que al pulsar el boton se disminuyan 1
function paginatorMin1() {
    let iteratorAux = iterator;
    iterator = (iteratorAux -= 1) > 0 ? (iterator -= 1) : 1;
    setValue();
    searchInit();
}

// se establan los valores de los lavel 
function setValue() {
    let iteratorAux = iterator;
    document.getElementById("is_iterator").innerHTML = iteratorAux;
    document.getElementById("is_iteratorMin").innerHTML = iteratorAux -= 1;
    document.getElementById("is_iteratorMax").innerHTML = iteratorAux += 2;
}

//Al momento de escribir en buscador resetar variable a 1
function searchValue() {
    iterator = 1;
    setValue();
    searchInit();
}