<script src="{{ asset('assets/messages/notyf/notyf.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/js/other/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/other/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/other/template.js') }}"></script>
<script src="{{ asset('assets/js/other/settings.js') }}"></script>
<script src="{{ asset('assets/js/other/todolist.js') }}"></script>


@if (session('estatus'))
    <x-template-message :message="session('message')" :value="session('value')" />
@endif

<script>
    // Espera a que el documento esté completamente cargado
    document.addEventListener('DOMContentLoaded', function () {
        // Inicializa todos los tooltips en la página
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>