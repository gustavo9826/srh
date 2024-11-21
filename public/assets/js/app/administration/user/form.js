
//Scrip que se ejecuta con el formulario, para funciones u herramientas extras
//Ejecucion cuando carga el formulario
$(document).ready(function () {
    $('select').selectpicker();
    checkboxState();
});

//La funcion obtiene el estatus del checkbox para marcar o desmarcar la casilla
function checkboxState() {
    let userEsPorNomina = document.getElementById('userEsPorNomina').value; //se obitnee el valor del checkbox
    let state = true; //se inicializa el status en false
    userEsPorNomina != 'true' ? state = false : state; //Validacion si el chechkbox es verdadero el status se queda en verdadero
    document.getElementById("userEsPorNomina").checked = state; //Se marca o desmarca el checkbox dependiendo del valor
    state ? showDiv('is_nomina') : hideDiv('is_nomina');// se muestra u oculta el contenido dependiendo del check
}

//Se oculta/muestra el div dependiendo si se selecciona el check o no
document.getElementById('userEsPorNomina').addEventListener('change', function () {
    //this.checked ? showDiv('is_nomina') : hideDiv('is_nomina');// se muestra u oculta el contenido dependiendo del check
});