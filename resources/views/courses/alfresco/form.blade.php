<!-- TEMPLATE APP -->
<x-template-app.app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <x-template-tittle.tittle-header tittle="Alfresco" caption="Nube" />
                    </div>
                </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card custom-card">
                    <div class="card-body">
                        <x-template-tittle.tittle-caption
                            tittle="{{ isset($item->id_tipocursos) ? 'Cargar' : 'Agregar ' }} Subir Archivos"
                            route="{{ route('alfresco.upload.form') }}" />
                        
                        <br>
                        
                        <form action="{{ route('alfresco.upload.file') }}" method="POST" enctype="multipart/form-data">
                            @csrf  <!-- Campo CSRF para proteger la solicitud -->
                            <label for="file">Selecciona un archivo:</label>
                            <input type="file" name="file" id="file" required onchange="showFileNameAndPreview()"><br><br>
                            
                            <!-- Aquí se mostrará el nombre del archivo -->
                            <p id="file-name"></p>
                            
                            <!-- Vista previa para imágenes (en tamaño pequeño) -->
                            <div id="image-preview-container" style="display:none; max-width: 150px; max-height: 150px;">
                                <img id="image-preview" src="" alt="Vista previa de imagen" style="width: 100%; height: 100%; object-fit: contain;" />
                            </div>
                        
                            <!-- Vista previa para PDF (en tamaño pequeño) -->
                            <div id="pdf-preview-container" style="display:none; width: 150px; height: 150px; overflow: hidden;">
                                <embed id="pdf-preview" src="" type="application/pdf" width="100%" height="100%" />
                            </div>
                        
                            <button type="submit">Subir archivo</button>
                        </form>
                        
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/app/courses/alfresco/table.js') }}"></script>
</x-template-app.app-layout>

