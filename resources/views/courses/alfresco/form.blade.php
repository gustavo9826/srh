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
                        <!-- Formulario de carga de archivo -->
                        <form id="uploadForm" action="{{ route('alfresco.upload.file') }}" method="POST" enctype="multipart/form-data">
                        @csrf  <!-- Campo CSRF para proteger la solicitud -->
                        <label for="file">Sube tu CV:</label>
                        <input type="file" name="file" id="file" required onchange="this.form.submit();"><br><br>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template-app.app-layout>

