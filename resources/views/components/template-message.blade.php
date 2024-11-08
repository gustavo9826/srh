@if (session('estatus'))
    <script>

        let notyf = new Notyf({
            duration: 4000,
            position: {
                x: 'right',
                y: 'top'
            },
            dismissible: true
        });
        let message = "{{ session('message') }}";
        let value = "{{ session('value') }}";

        if (value === "success") {
            notyf.success(message);  // Mostrar notificación de éxito
        }
        else if (value === "warning") {
            notyf.warning(message);  // Mostrar notificación de advertencia
        }
        else {
            notyf.error(message);  // Mostrar notificación de error
        }

    </script>
@endif