@if (session('estatus'))
    <x-template-message :message="session('message')" :value="session('value')" />
@endif