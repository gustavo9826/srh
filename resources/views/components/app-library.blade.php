<script src="assets/messages/notyf/notyf.min.js"></script>
<script src="assets/vendors/js/vendor.bundle.base.js"></script>

@if (session('estatus'))
    <x-template-message :message="session('message')" :value="session('value')" />
@endif