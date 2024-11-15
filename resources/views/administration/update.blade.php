<!-- TEMPLATE APP-->
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
                            <form class="form-sample">

                                <x-template-tittle.tittle-caption-secon tittle="Datos del usuario" />

                                <div class="row">
                                    <x-template-form.template-form-input label="Nombre" type="text" name="name"
                                        id="name" placeholder="Nombre" grid="6" />
                                    <x-template-form.template-form-input label="Email" type="email" name="email"
                                        id="email" placeholder="Correo electrónico" grid="6" />
                                </div>

                                <div class="row">
                                    <x-template-form.template-form-input label="Password" type="password"
                                        name="password" id="password" placeholder="Password" grid="6" />
                                    <x-template-form.template-form-input label="Confirmar Password" type="password"
                                        name="confirmPassword" id="confirmPassword" placeholder="Confirmar password"
                                        grid="6" />
                                </div>

                                <x-template-tittle.tittle-caption-secon tittle="Roles y perfiles" />
                                <div class="row">
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
                                </div>

                                <x-template-tittle.tittle-caption-secon tittle="Asociacion con Nómina" />
                                <div class="container">
                                    <div class="row">
                                        <x-template-form.template-form-check name="nomina" id="nomina"
                                            value="¿Vincular con nómina?" />
                                    </div>
                                </div>

                                <div class="row">
                                    <x-template-form.template-form-input label="CURP" type="text" name="curp" id="curp"
                                        placeholder="CURP" grid="6" />
                                </div>




                                <x-template-button.button-form-footer />

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-template-app.app-layout>