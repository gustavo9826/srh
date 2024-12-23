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
                            route="{{ route('tableinstructor.list') }}" />
                        
                        <br>
                        
                        <!-- Formulario de carga de archivo -->
                        <form action="{{ route('alfresco.upload.file') }}" method="POST" enctype="multipart/form-data">
                            @csrf  <!-- Campo CSRF para proteger la solicitud -->
                            <label for="file">Selecciona un archivo:</label>
                            <input type="file" name="file" id="file" required><br><br>
                            <button type="submit">Subir archivo</button>
                        </form>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template-app.app-layout>

