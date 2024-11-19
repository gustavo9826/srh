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
                        <x-template-tittle.tittle-caption tittle="Agregar / Modificar Usuarios"
                            route="{{ route('user.list') }}" />
                        <div>
                            <form action="{{ route('user.save') }}" method="post" class="form-sample">
                                @csrf

                                <x-template-tittle.tittle-caption-secon tittle="Datos del usuario" />

                                <div class="row">
                                    <x-template-form.template-form-input label="Nombre" type="text" name="name"
                                        id="name" placeholder="Nombre" grid="6" autocomplete="" />
                                    <x-template-form.template-form-input label="Email" type="email" name="email"
                                        id="email" placeholder="Correo electrónico" autocomplete="" grid="6" />
                                </div>

                                <div class="row">
                                    <x-template-form.template-form-input label="Password" type="password"
                                        name="password" id="password" placeholder="Password" autocomplete="new-password"
                                        grid="6" />
                                    <x-template-form.template-form-input label="Confirmar Password" type="password"
                                        name="confirmPassword" id="confirmPassword" autocomplete="new-password"
                                        placeholder="Confirmar password" grid="6" />
                                </div>

                                <x-template-tittle.tittle-caption-secon tittle="Roles y perfiles" />
                                <div class="row">

                                    <!--
                                    <div class="form-group">
                                        <label>ROLE</label>
                                        <select class="js-example-basic-multiple w-100" multiple="multiple">
                                            <option value="AL">Alabama</option>
                                            <option value="WY">Wyoming</option>
                                            <option value="AM">America</option>
                                            <option value="CA">Canada</option>
                                            <option value="RU">Russia</option>
                                        </select>
                                    </div>
-->
                                </div>

                                <x-template-tittle.tittle-caption-secon tittle="Asociacion con Nómina" />
                                <div class="container">
                                    <div class="row">
                                        <x-template-form.template-form-check name="nomina" id="nomina"
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




                                    <!--
                                    <div class="col-md-6">
                                        <label for="nomina" class="form-label">Nomina</label>
                                        <select id="nomina" class="form-control selectpicker" data-live-search="true">
                                            <option value="AL">123</option>
                                            <option value="WY">Wyoming</option>
                                            <option value="AM">America</option>
                                            <option value="CA">Canada</option>
                                            <option value="RU">Russia</option>
                                        </select>
                                    </div>
-->

                                    <!-- CURP -->
                                    <x-template-form.template-form-input label="CURP" type="text" name="curp" id="curp"
                                        placeholder="CURP" autocomplete="" grid="6" />
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