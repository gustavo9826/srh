<!-- TEMPLATE APP -->
<x-template-app.app-layout>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <x-template-tittle.tittle-header tittle="Sistema Integral para Recursos Humanos"
                            caption="Usuarios" />
                    </div>
                </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card custom-card">
                    <div class="card-body">
                        <x-template-tittle.tittle-caption tittle="{{ isset($item) ? 'Modificar' : 'Agregar ' }} usuario"
                            route="{{ route('user.list') }}" />
                        <div>
                            <form action="{{ route('user.save') }}" method="POST" class="form-sample">
                                @csrf

                                <x-template-form.template-form-input-hidden name="userId"
                                    value="{{ optional($item)->id ?? '' }}" />

                                <x-template-tittle.tittle-caption-secon tittle="Datos del usuario" />

                                <div class="row">
                                    <x-template-form.template-form-input label="Nombre" type="text" name="userName"
                                        placeholder="Nombre" grid="6" autocomplete=""
                                        value="{{ optional($item)->name ?? '' }}" />
                                    @error('userName')
                                        <x-template-message-required>
                                            {{ $message }}
                                        </x-template-message-required>
                                    @enderror

                                    <x-template-form.template-form-input label="Email" type="email" name="userEmail"
                                        placeholder="Correo electrónico" value="{{ optional($item)->email ?? '' }}"
                                        autocomplete="" grid="6" />
                                    @error('userEmail')
                                        <x-template-message-required>
                                            {{ $message }}
                                        </x-template-message-required>
                                    @enderror
                                </div>

                                @if (!isset($item)) <!-- Ocultar contenido en caso de modificar-->
                                    <div class="row">
                                        <x-template-form.template-form-input label="Password" type="password"
                                            name="userPassword" value="" placeholder="Password" autocomplete="new-password"
                                            grid="6" />
                                        <x-template-form.template-form-input label="Confirmar Password" type="password"
                                            name="userConfirmPassword" autocomplete="new-password"
                                            placeholder="Confirmar password" value="" grid="6" />
                                    </div>
                                @endif


                                <x-template-tittle.tittle-caption-secon tittle="Roles y perfiles" />
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"
                                                style="font-size: 1rem; color: #333;">Roles</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-multiple w-100" multiple="multiple">
                                                    <option value="AL">Alabama</option>
                                                    <option value="WY">Wyoming</option>
                                                    <option value="AM">America</option>
                                                    <option value="CA">Canada</option>
                                                    <option value="RU">Russia</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <x-template-tittle.tittle-caption-secon tittle="Asociacion con Nómina" />
                                <div class="container">
                                    <div class="row">
                                        <x-template-form.template-form-check name="userNomina"
                                            value="¿Vincular con nómina?" />
                                    </div>
                                </div>

                                <style>
                                    .bootstrap-select .dropdown-toggle .filter-option {
                                        position: static;
                                        top: 0;
                                        left: 0;
                                        float: left;
                                        height: 100%;
                                        width: 100%;
                                        text-align: left;
                                        overflow: hidden;
                                        -webkit-box-flex: 0;
                                        -webkit-flex: 0 1 auto;
                                        -ms-flex: 0 1 auto;
                                        flex: 0 1 auto;
                                        color: #495057;
                                        font-size: 0.875rem;
                                        font-family: inherit;
                                    }

                                    .btn {
                                        background-color: white;
                                    }
                                </style>



                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"
                                                style="font-size: 1rem; color: #333;">Tipo de nómina</label>
                                            <div class="col-sm-9">
                                                <select class=" selectpicker dropup show-tick" data-width="auto"
                                                    data-size="5" data-live-search="true" data-dropup-auto="false">
                                                    <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda
                                                    </option>
                                                    <option data-tokens="mustard">Burger, Shake and a Smile</option>
                                                    <option data-tokens="frosting">Sugar, Spice and all things nice
                                                    </option>
                                                    <option data-tokens="frosting">Sugar, Spice and all things nice
                                                    </option>
                                                    <option data-tokens="frosting">Sugar, Spice and all things nice
                                                    </option>
                                                    <option data-tokens="frosting">Sugar, Spice and all things nice
                                                    </option>
                                                    <option data-tokens="frosting">Sugar, Spice and all things nice
                                                    </option>
                                                    <option data-tokens="frosting">Sugar, Spice and all things nice
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- CURP -->
                                    <x-template-form.template-form-input label="CURP" type="text" name="curp"
                                        placeholder="CURP" autocomplete="" grid="6"
                                        value="{{ optional($item)->name ?? '' }}" />
                                </div>

                                <!-- Botón de acción -->
                                <x-template-button.button-form-footer routeBack="{{ route('user.list') }}" />

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-template-app.app-layout>

<!-- Script de inicialización de Bootstrap Select -->
<script>
    $(document).ready(function () {
        console.log('success');
        $('select').selectpicker();
    });
</script>