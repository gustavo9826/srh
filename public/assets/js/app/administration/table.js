var iterator = 1;

$(document).ready(function () {



    console.log('success');
    setValue();
});


function paginatorMax1() {
    iterator++;
    setValue();
    console.log(iterator);
}

function paginatorMax5() {
    iterator += 5;
    setValue();
    console.log(iterator);
}

function paginatorMin5() {
    let iteratorAux = iterator;
    iterator = (iteratorAux -= 5) > 0 ? (iteratorAux -= 5) : 1;
    setValue();
}

function paginatorMin1() {
    let iteratorAux = iterator;
    iterator = (iteratorAux -= 1) > 0 ? (iteratorAux -= 1) : 1;
    setValue();
    console.log(iterator);
}

function setValue() {
    console.log(iterator);
    let iteratorAux = iterator;
    document.getElementById("is_iterator").innerHTML = iteratorAux;
    document.getElementById("is_iteratorMin").innerHTML = (iteratorAux = iteratorAux -= 1 >= 0 ? iteratorAux-- : 0);
    document.getElementById("is_iteratorMax").innerHTML = (iteratorAux += 2);
}

function searchValue() {
    iterator = 1;
    setValue();
}