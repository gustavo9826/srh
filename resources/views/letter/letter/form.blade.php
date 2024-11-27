<!-- TEMPLATE APP -->
<x-template-app.app-layout>

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
                                        name="userName" placeholder="" grid="4" autocomplete=""
                                        value="{{optional($item)->fecha_captura ?? '' }}" />

                                    <x-template-form.template-form-input-required label="Fecha de inicio" type="date"
                                        name="userName" placeholder="" grid="4" autocomplete=""
                                        value="{{optional($item)->fecha_inicio ?? '' }}" />

                                    <x-template-form.template-form-input-required label="Fecha fin" type="date"
                                        name="userName" placeholder="" grid="4" autocomplete=""
                                        value="{{optional($item)->fecha_fin ?? '' }}" />
                                </div>

                                <div class="row">
                                    <x-template-form.template-form-input-required label="No. Documento" type="text"
                                        name="userName" placeholder="No. Documento" grid="4" autocomplete=""
                                        value="{{optional($item)->num_documento ?? '' }}" />

                                    <x-template-form.template-form-input-required label="No. hojas" type="integer"
                                        name="userName" placeholder="No. hojas" grid="4" autocomplete=""
                                        value="{{optional($item)->num_flojas ?? '' }}" />

                                    <x-template-form.template-form-input-required label="No. tomos" type="integer"
                                        name="userName" placeholder="No. tomos" grid="4" autocomplete=""
                                        value="{{optional($item)->num_tomos ?? '' }}" />
                                </div>

                                <div class="row">
                                    <x-template-form.template-form-input-required label="Lugar" type="text"
                                        name="userName" placeholder="Lugar" grid="4" autocomplete=""
                                        value="{{optional($item)->lugar ?? '' }}" />

                                    <x-template-form.template-form-input-required label="Asunto" type="text"
                                        name="userName" placeholder="Asunto" grid="4" autocomplete=""
                                        value="{{optional($item)->asunto ?? '' }}" />
                                </div>

                                <div class="row">
                                    <x-template-form.template-form-input-required label="Observación" type="text"
                                        name="userName" placeholder="Observaciones" grid="4" autocomplete=""
                                        value="{{optional($item)->observaciones ?? '' }}" />
                                </div>

                                <x-template-tittle.tittle-caption-secon tittle="Información institucional" />
                                <div class="row">

<div class="col-md-4">
    <div class="form-group row">
        <label class="col-sm-3 col-form-label" style="font-size: 1rem; color: #333;">Area</label>
        <div class="col-sm-9">
            <div class="col-md-12">
                <select class="form-control custom-select selectpicker"
                    data-style="input-select-selectpicker"
                    aria-label="Default select example" data-live-search="true"
                    data-none-results-text="Sin resultados" name="collectionArea">
                    <option value="">SELECCIONE</option>
                    @foreach ($selectArea as $select)
                        <option value="{{ $select->id }}" 
                            @if ($select->id == $selectAreaEdit->id) selected @endif>
                            {{ $select->descripcion }}
                        </option>
                    @endforeach
                </select>
                @error('collectionArea')
                    <small style="color:red; font-family: Arial, sans-serif;">
                        <i class="fas fa-exclamation-circle" style="color:red;"></i>
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>






                                    <x-template-form.template-form-select grid="4" label="Usuario" name="catArea" />

                                    <x-template-form.template-form-select grid="4" label="Enlace" name="catArea" />

                                </div>

                                <div class="row">

                                    <x-template-form.template-form-select grid="4" label="Unidad" name="catArea" />

                                    <x-template-form.template-form-select grid="4" label="Coordinación"
                                        name="catArea" />

                                </div>


                                <x-template-tittle.tittle-caption-secon tittle="Información de estado de documento" />
                                <div class="row">

                                    <x-template-form.template-form-select grid="4" label="Tramite" name="catArea" />

                                    <x-template-form.template-form-select grid="4" label="Clave" name="catArea" />

                                    <x-template-form.template-form-select grid="4" label="Estatus" name="catArea" />
                                </div>

                                <x-template-tittle.tittle-caption-secon tittle="Información de remitente" />
                                <div class="row">

                                    <x-template-form.template-form-select grid="4" label="Remitente" name="catArea" />

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
<script src="{{ asset('assets/js/app/administration/user/form.js') }}"></script>