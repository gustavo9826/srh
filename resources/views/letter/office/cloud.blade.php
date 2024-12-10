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


                        <style>
                            /* Establecemos el contenedor principal para usar Flexbox */
                            .main-container {
                                display: flex;
                                flex-wrap: wrap;
                                /* Permite que los elementos se ajusten en nuevas líneas si es necesario */
                                gap: 20px;
                                /* Espacio entre las columnas */
                                justify-content: space-between;
                            }

                            /* Lado izquierdo y derecho se comportan igual */
                            .left-side,
                            .right-side {
                                flex: 1;
                                /* Hace que cada lado ocupe la misma cantidad de espacio */
                                min-width: 300px;
                                /* Asegura que cada lado no se haga más pequeño que 300px */
                            }

                            /* Los títulos de las secciones tienen un estilo común */
                            .card-description {
                                font-size: 1rem;
                                font-weight: bold;
                                color: #BC955C;
                                font-style: italic;
                                margin-bottom: 10px;
                            }

                            /* Estilo básico para los rectángulos donde se muestra el contenido */
                            .rectangulo {
                                border: 1px solid #ccc;
                                padding: 15px;
                                margin-bottom: 10px;
                            }

                            /* Media Queries para hacerlo responsivo */
                            @media (max-width: 768px) {
                                .main-container {
                                    flex-direction: column;
                                    /* En pantallas pequeñas, ponemos los elementos en una columna */
                                    align-items: center;
                                    /* Centramos el contenido */
                                }

                                .left-side,
                                .right-side {
                                    min-width: 100%;
                                    /* Los lados ocupan el 100% del ancho en pantallas pequeñas */
                                }
                            }
                        </style>




                        <!-- Contenedor principal con flexbox -->
                        <div class="main-container">
                            <!-- Lado izquierdo -->
                            <div class="left-side">
                                <br>
                                <p class="card-description"
                                    style="font-size: 1rem; font-weight: bold; color: #BC955C; font-style: italic;">
                                    Documentos de Entrada
                                </p>

                                <div>
                                    <br>
                                    <x-template-tittle.tittle-caption-secon tittle="Oficios" />
                                    <div id="container_oficio_entrada_vacio" class="rectangulo">
                                        Sin contenido
                                    </div>
                                    <div id="container_oficio_entrada"></div>
                                </div>

                                <div>
                                    <br>
                                    <x-template-tittle.tittle-caption-secon tittle="Anexos" />
                                    <div id="container_anexo_entrada_vacio" class="rectangulo">
                                        Sin contenido
                                    </div>
                                    <div id="container_anexo_entrada"></div>
                                </div>
                            </div>

                            <!-- Lado derecho -->
                            <div class="right-side">
                                <br>
                                <p class="card-description"
                                    style="font-size: 1rem; font-weight: bold; color: #BC955C; font-style: italic;">
                                    Documentos de Salida
                                </p>

                                <div>
                                    <br>
                                    <x-template-tittle.tittle-caption-secon tittle="Oficios" />
                                    <div id="container_oficio_entrada_vacio_" class="rectangulo">
                                        Sin contenido
                                    </div>
                                    <div id="container_oficio_entrada_"></div>
                                </div>

                                <div>
                                    <br>
                                    <x-template-tittle.tittle-caption-secon tittle="Anexos" />
                                    <div id="container_anexo_entrada_vacio_" class="rectangulo">
                                        Sin contenido
                                    </div>
                                    <div id="container_anexo_entrada_"></div>
                                </div>
                            </div>
                            </di </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CODE SCRIPT-->
        <script src="{{ asset('assets/js/app/letter/cloud/cloud.js') }}"></script>
        <script src="{{ asset('assets/js/app/letter/office/cloud.js') }}"></script>

</x-template-app.app-layout>