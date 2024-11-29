//La funcion limpia un select volviendo a su estado normaL
function cleanSelect(value) {
    $(value).val('');
    $(value).selectpicker('refresh');
    $('.selectpicker').selectpicker();
}