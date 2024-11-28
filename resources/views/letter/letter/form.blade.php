<!-- TEMPLATE APP -->
<x-template-app.app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <x-template-tittle.tittle-header tittle="Control de correspondencia"
                            caption="Correspondencia" />
                    </div>
                </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card custom-card">
                    <div class="card-body">
                        <x-template-tittle.tittle-caption
                            tittle="{{ isset($item->id_tbl_correspondencia) ? 'Modificar' : 'Agregar ' }} Correspondencia"
                            route="{{ route('letter.list') }}" />
                        <div>
                            <form action="{{ route('letter.save') }}" method="POST" class="form-sample">
                                @csrf

                                <x-template-form.template-form-input-hidden name="letterId"
                                    value="{{ optional($item)->id_tbl_correspondencia ?? '' }}" />

                                <!-- VALUE OF DISBLED -->

                                <x-template-tittle.tittle-caption-secon tittle="Información general" />

                                <div class="row">
                                    <x-template-form.template-form-input-required label="Fecha de captura" type="date"
                                        name="userName" placeholder=""
                                        grid="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4" autocomplete=""
                                        value="{{optional($item)->fecha_captura ?? '' }}" />

                                    <x-template-form.template-form-input-required label="Fecha de inicio" type="date"
                                        name="userName" placeholder=""
                                        grid="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4" autocomplete=""
                                        value="{{optional($item)->fecha_inicio ?? '' }}" />

                                    <x-template-form.template-form-input-required label="Fecha fin" type="date"
                                        name="userName" placeholder=""
                                        grid="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4" autocomplete=""
                                        value="{{optional($item)->fecha_fin ?? '' }}" />
                                </div>

                                <div class="row">
                                    <x-template-form.template-form-input-required label="No. Documento" type="text"
                                        name="userName" placeholder="No. Documento"
                                        grid="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4" autocomplete=""
                                        value="{{optional($item)->num_documento ?? '' }}" />

                                    <x-template-form.template-form-input-required label="No. hojas" type="integer"
                                        name="userName" placeholder="No. hojas"
                                        grid="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4" autocomplete=""
                                        value="{{optional($item)->num_flojas ?? '' }}" />

                                    <x-template-form.template-form-input-required label="No. tomos" type="integer"
                                        name="userName" placeholder="No. tomos"
                                        grid="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4" autocomplete=""
                                        value="{{optional($item)->num_tomos ?? '' }}" />
                                </div>

                                <div class="row">
                                    <x-template-form.template-form-input-required label="Lugar" type="text"
                                        name="userName" placeholder="Lugar"
                                        grid="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4" autocomplete=""
                                        value="{{optional($item)->lugar ?? '' }}" />

                                    <x-template-form.template-form-input-required label="Asunto" type="text"
                                        name="userName" placeholder="Asunto"
                                        grid="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4" autocomplete=""
                                        value="{{optional($item)->asunto ?? '' }}" />
                                </div>

                                <div class="row">
                                    <x-template-form.template-form-input-required label="Observación" type="text"
                                        name="userName" placeholder="Observaciones"
                                        grid="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4" autocomplete=""
                                        value="{{optional($item)->observaciones ?? '' }}" />
                                </div>

                                <x-template-tittle.tittle-caption-secon tittle="Información institucional" />
                                <div class="row">

                                    <x-template-form.template-form-select-required :selectValue="$selectArea"
                                        :selectEdit="$selectAreaEdit" name="collectionArea" tittle="Área"
                                        grid="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4" />

                                    <x-template-form.template-form-select-required :selectValue="$selectUser"
                                        :selectEdit="$selectUserEdit" name="collectionAreaUser" tittle="Usuario"
                                        grid="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4" />

                                    <x-template-form.template-form-select-required :selectValue="$selectEnlace"
                                        :selectEdit="$selectUnidadEdit" name="collectionAreaEnlace" tittle="Enlace"
                                        grid="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4" />
                                </div>

                                <div class="row">
                                    <x-template-form.template-form-select-required :selectValue="$selectUnidad"
                                        :selectEdit="$selectAreaEdit" name="collectionUnidad" tittle="Unidad"
                                        grid="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4" />

                                    <x-template-form.template-form-select-required :selectValue="$selectCoordinacion"
                                        :selectEdit="$selectCoordinacionEdit" name="collectionCoordinacion"
                                        tittle="Coordinación" grid="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4" />
                                </div>


                                <x-template-tittle.tittle-caption-secon tittle="Información de estado de documento" />
                                <div class="row">
                                    <x-template-form.template-form-select-required :selectValue="$selectStatus"
                                        :selectEdit="$selectStatusEdit" name="collectionStatus" tittle="Estatus"
                                        grid="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4" />

                                    <x-template-form.template-form-select-required :selectValue="$selectTramite"
                                        :selectEdit="$selectTramiteEdit" name="collectionTramite" tittle="Tramite"
                                        grid="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4" />

                                    <x-template-form.template-form-select-required :selectValue="$selectClave"
                                        :selectEdit="$selectClaveEdit" name="collectionClave" tittle="Clave"
                                        grid="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4" />

                                </div>

                                <x-template-tittle.tittle-caption-secon tittle="Información de remitente" />
                                <div class="row">
                                    <x-template-form.template-form-check name="userEsPorNomina"
                                        value="{{ !isset($item->es_por_nomina) ? 'false' : $item->es_por_nomina }}"
                                        text="¿Agregar remitente?" />

                                </div>




                                <div id="is_nomina">
                                    <div class="row">



                                        <x-template-form.template-form-input-required label="CURP" type="text"
                                            name="curp" placeholder="CURP" autocomplete="" grid="6"
                                            value="{{ optional($item)->name ?? '' }}" />
                                    </div>
                                </div>


                                <x-template-button.button-form-footer routeBack="{{ route('letter.list') }}" />

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-template-app.app-layout>

<!-- CODE SCRIPT-->
<script src="{{ asset('assets/js/app/letter/letter/form.js') }}"></script>
<script src="{{ asset('assets/js/app/letter/letter/select.js') }}"></script>