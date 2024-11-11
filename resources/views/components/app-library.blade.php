<script src="assets/messages/notyf/notyf.min.js"></script>
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<script src="assets/js/other/off-canvas.js"></script>
<script src="assets/js/other/hoverable-collapse.js"></script>
<script src="assets/js/other/template.js"></script>
<script src="assets/js/other/settings.js"></script>
<script src="assets/js/other/todolist.js"></script>

@if (session('estatus'))
    <x-template-message :message="session('message')" :value="session('value')" />
@endif