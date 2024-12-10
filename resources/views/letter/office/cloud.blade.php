<!-- TEMPLATE APP-->
<?php include(resource_path('views/config.php')); ?>
<x-template-app.app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Control de correspondencia</h3>
                            <h5 class="font-weight-normal mb-0">Oficios</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card custom-card">
                    <div class="card-body">

                        <div>
                            <x-template-tittle.tittle-caption tittle="Cloud" route="{{ route('office.list') }}" />

                            <x-template-form.template-form-input-hidden name="id_tbl_oficio"
                                value="{{  $id_tbl_oficio }}" />

                            <x-template-tittle.tittle-caption-secon tittle="Oficio seleccionado" />
                            <div class="contenedor">
                                <div class="item">
                                    <label class="etiqueta">No. Oficio:</label>
                                    <label id="_noOficio" class="valor"></label>
                                </div>
                                <div class="item">
                                    <label class="etiqueta">No. Correspondencia:</label>
                                    <label id="_noCorrespondencia" class="valor"></label>
                                </div>
                                <div class="item">
                                    <label class="etiqueta">Año:</label>
                                    <label id="_noAnio" class="valor"></label>
                                </div>
                                <div class="item">
                                    <label class="etiqueta">Fecha de inicio:</label>
                                    <label id="_fechaInicio" class="valor"></label>
                                </div>
                                <div class="item">
                                    <label class="etiqueta">Fecha fin:</label>
                                    <label id="_fechaFin" class="valor"></label>
                                </div>
                            </div>
                        </div>

                        <br>
                        <p class="card-description"
                            style="font-size: 1rem; font-weight: bold; color: #BC955C; font-style: italic;">
                            Documentos de Entrada
                        </p>

                        <div>
                            <x-template-tittle.tittle-caption-secon tittle="Oficio" />

                        </div>

                        <div>
                            <br>
                            <x-template-tittle.tittle-caption-secon tittle="Anexos" />
                            <div id="_anexos_empty" class="rectangulo">
                                Sin contenido
                            </div>
                            <div id="anexos-container"></div>
                        </div>

                        <br>
                        <p class="card-description"
                            style="font-size: 1rem; font-weight: bold; color: #BC955C; font-style: italic;">
                            Documentos de Salida
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- CODE SCRIPT-->
    <script src="{{ asset('assets/js/app/letter/office/cloud.js') }}"></script>

</x-template-app.app-layout>