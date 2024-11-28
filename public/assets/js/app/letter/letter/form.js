
//Scrip que se ejecuta con el formulario, para funciones u herramientas extras
//Ejecucion cuando carga el formulario
$(document).ready(function () {
    $('select').selectpicker();
    //checkboxState();
    setData();
});

//la funcion obtiene los datos al iniciar el formulario, como fecha inicio, año etc
function setData() {
    let fecha_captura = $('#fecha_captura').val();//fecha de captura
    $('#_labFechaCaptura').text(fecha_captura); //establecer los varoles
}



//La funcion obtiene el estatus del checkbox para marcar o desmarcar la casilla
function checkboxState() {
    let userNameRe = document.getElementById('userNameRe').value; //se obitnee el valor del checkbox
    let state = true; //se inicializa el status en false
    userNameRe != 'true' ? state = false : state; //Validacion si el chechkbox es verdadero el status se queda en verdadero
    document.getElementById("userNameRe").checked = state; //Se marca o desmarca el checkbox dependiendo del valor
    state ? showDiv('is_nomina') : hideDiv('is_nomina');// se muestra u oculta el contenido dependiendo del check
}

//Se oculta/muestra el div dependiendo si se selecciona el check o no
document.getElementById('userNameRe').addEventListener('change', function () {
    //this.checked ? showDiv('is_nomina') : hideDiv('is_nomina');// se muestra u oculta el contenido dependiendo del check
});