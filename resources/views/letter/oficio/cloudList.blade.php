<!-- TEMPLATE APP-->
<?php include(resource_path('views/config.php')); ?>
<x-template-app.app-layout>

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
                            <h4 class="card-title">Cloud</h4>

                            <x-template-tittle.tittle-caption-secon tittle="Documento seleccionado" />
                            <div class="contenedor">
                                <div class="item">
                                    <label class="etiqueta">No. Correspondencia:</label>
                                    <label id="_labNoCorrespondencia" class="valor"></label>
                                </div>
                                <div class="item">
                                    <label class="etiqueta">Fecha de captura:</label>
                                    <label id="_labFechaCaptura" class="valor"></label>
                                </div>
                                <div class="item">
                                    <label class="etiqueta">Año:</label>
                                    <label id="_labAño" class="valor"></label>
                                </div>
                                <div class="item">
                                    <label class="etiqueta">Clave:</label>
                                    <label id="_labClave" class="valor"></label>
                                </div>
                                <div class="item">
                                    <label class="etiqueta">Clave / código:</label>
                                    <label id="_labClaveCodigo" class="valor"></label>
                                </div>
                                <div class="item">
                                    <label class="etiqueta">Clave / redacción:</label>
                                    <label id="_labClaveRedaccion" class="valor"></label>
                                </div>
                            </div>

                        </div>

                        <style>
                            /* Estilo para el contenedor del input con forma personalizada */
                            .file-input-wrapper {
                                position: relative;
                                width: 90px;
                                /* Ancho ajustado */
                                height: 150px;
                                /* Alto ajustado */
                                background-color: #fff;
                                /* Fondo blanco */
                                border: 2px dotted #ccc;
                                /* Bordes grises punteados */
                                border-radius: 8px;
                                /* Bordes redondeados */
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                cursor: pointer;
                                margin-top: 20px;
                                clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%, 70% 0);
                                /* Corte diagonal en la esquina superior derecha */
                            }

                            /* Estilo para el input de tipo archivo (file) */
                            .file-input {
                                position: absolute;
                                width: 100%;
                                height: 100%;
                                opacity: 0;
                                /* Hacer el input invisible */
                                cursor: pointer;
                            }

                            /* Estilo para el ícono de "más" */
                            .file-icon {
                                font-size: 24px;
                                /* Tamaño del ícono */
                                color: #888;
                                /* Color gris claro para el ícono */
                                z-index: 10;
                                /* Asegura que el ícono esté encima del campo */
                            }

                            /* Cambio de color cuando el input tiene contenido */
                            .file-input:focus+.file-icon,
                            .file-input:valid+.file-icon {
                                color: #888;
                                /* El ícono es gris cuando se selecciona un archivo */
                            }

                            /* Estilo para el texto dentro del input cuando está vacío */
                            .file-input::placeholder {
                                color: #bbb;
                            }

                            /* Eliminar el corte diagonal para el input, se corrige en el contenedor */
                            .file-input-wrapper {
                                clip-path: none;
                                /* Remueve el corte diagonal */
                                background-color: #fff;
                                /* Blanco como una hoja */
                                border: 2px dotted #ccc;
                                /* Bordes punteados en todo el contorno */
                            }
                        </style>

                        <div>
                            <br>
                            <x-template-tittle.tittle-caption-secon tittle="Oficio" />

                            <!-- Input personalizado con estilo de archivo -->
                            <div class="file-input-wrapper">
                                <input type="file" id="file-input" class="file-input"
                                    placeholder="Seleccionar archivo...">
                                <i class="fa fa-plus file-icon"></i> <!-- Ícono de "más" -->
                            </div>
                        </div>

                        <div>
                            <br>
                            <x-template-tittle.tittle-caption-secon tittle="Anexos" />
                            <!-- Tabla responsiva -->

                            <style>
                                /* Estilos generales */
                                .custom-file-container {
                                    text-align: center;
                                    font-family: Arial, sans-serif;
                                }

                                /* Estilos del icono de archivo con borde gris y fondo blanco */
                                .custom-file-icon-container {
                                    position: relative;
                                    display: inline-block;
                                    font-size: 80px;
                                    color: white;
                                    background-color: #f5f5f5;
                                    border: 2px solid #ccc;
                                    padding: 30px;
                                    width: 120px;
                                    height: 150px;
                                    text-align: center;
                                    box-sizing: border-box;
                                    position: relative;
                                    margin-bottom: 10px;
                                    border-radius: 10px;
                                }

                                /* Líneas como si estuviera escrito en el papel */
                                .custom-file-icon-container::after {
                                    content: "";
                                    position: absolute;
                                    top: 10px;
                                    left: 10px;
                                    width: 100%;
                                    height: 100%;
                                    background: repeating-linear-gradient(to bottom, transparent, transparent 2px, #e0e0e0 2px, #e0e0e0 4px);
                                    z-index: 1;
                                }

                                /* Contenedor de los botones dentro del ícono */
                                .custom-button-container {
                                    position: absolute;
                                    bottom: 10px;
                                    left: 50%;
                                    transform: translateX(-50%);
                                    display: flex;
                                    justify-content: center;
                                    gap: 0;
                                    z-index: 2;
                                }

                                /* Estilos de los botones */
                                .custom-button {
                                    background-color: #007bff;
                                    border: none;
                                    border-radius: 5px;
                                    padding: 8px;
                                    font-size: 14px;
                                    cursor: pointer;
                                    transition: background-color 0.3s;
                                    margin: 0;
                                    width: 30px;
                                    height: 30px;
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                }

                                /* Cambio de color al pasar el ratón sobre los botones */
                                .custom-button:hover {
                                    background-color: #0056b3;
                                }

                                /* Nombre del archivo debajo del ícono */
                                .custom-file-name p {
                                    font-size: 13px;
                                    color: #333;
                                    margin-top: 15px;
                                    margin-bottom: 0;
                                }

                                /* Estilo del tooltip (leyenda) que aparece al pasar el mouse */
                                .custom-button[title]:hover::after {
                                    content: attr(title);
                                    /* Muestra el texto del atributo title */
                                    position: absolute;
                                    top: -30px;
                                    /* Posiciona el tooltip arriba del botón */
                                    left: 50%;
                                    transform: translateX(-50%);
                                    background-color: #333;
                                    color: white;
                                    padding: 5px;
                                    border-radius: 5px;
                                    font-size: 12px;
                                    white-space: nowrap;
                                    opacity: 1;
                                    z-index: 3;
                                    /* Asegura que el tooltip esté por encima de los botones */
                                }
                            </style>


                            @php
                                // Definimos los archivos de ejemplo directamente en el archivo Blade
                                $archivos = [
                                    ['nombre' => 'Este es un ejemplo de un archivo.pdf'],
                                    ['nombre' => 'Este es un ejemplo de un archivo.pdf'],
                                    ['nombre' => 'Este es un ejemplo de un archivo.pdf'],
                                    ['nombre' => 'Este es un ejemplo de un archivo.pdf'],
                                    ['nombre' => 'Este es un ejemplo de un archivo.pdf'],
                                    ['nombre' => 'Archivo6.pdf'],
                                    ['nombre' => 'Archivo7.pdf'],
                                    ['nombre' => 'Archivo8.pdf'],
                                    ['nombre' => 'Archivo9.pdf'],
                                    ['nombre' => 'Archivo10.pdf']
                                ];
                            @endphp

                            <div class="archivo-container">
                                @foreach ($archivos as $archivo)
                                    <div class="custom-file-container">
                                        <div class="custom-file-icon-container">
                                            <i style="color:#777777" class="fa fa-file" aria-hidden="true"></i>
                                            <div class="custom-button-container">
                                                <button style="background: #003366" class="custom-button" title="Usuario">
                                                    <i style="color: white" class="fa fa-user"></i>
                                                </button>
                                                <button style="background: #1D5B3B" class="custom-button" title="Ver">
                                                    <i style="color: white" class="fa fa-eye"></i>
                                                </button>
                                                <button style="background: #707070" class="custom-button" title="Descargar">
                                                    <i style="color: white" class="fa fa-download"></i>
                                                </button>
                                                <button style="background: #6A1B3D" class="custom-button" title="Eliminar">
                                                    <i style="color: white" class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="custom-file-name">
                                            <p>{{ $archivo['nombre'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Estilo con Flexbox -->
                            <style>
                                .archivo-container {
                                    display: flex;
                                    flex-wrap: wrap;
                                    gap: 15px;
                                    /* Espacio entre los elementos */
                                }

                                .custom-file-container {
                                    width: 18%;
                                    /* Ajusta el porcentaje según el número de archivos por fila */
                                    min-width: 150px;
                                    box-sizing: border-box;
                                }

                                /* Aseguramos que en pantallas pequeñas se acomode adecuadamente */
                                @media (max-width: 768px) {
                                    .custom-file-container {
                                        width: 48%;
                                        /* 2 elementos por fila en pantallas pequeñas */
                                    }
                                }

                                @media (max-width: 480px) {
                                    .custom-file-container {
                                        width: 100%;
                                        /* 1 elemento por fila en pantallas muy pequeñas */
                                    }
                                }
                            </style>






                            <!-- final de la tabla responsiva-->
                        </div>
                    </div>



                </div>
            </div>
        </div>

    </div>
    </div>

    <!-- CODE SCRIPT-->
    <script src="{{ asset('assets/js/app/letter/letter/table.js') }}"></script>

</x-template-app.app-layout>