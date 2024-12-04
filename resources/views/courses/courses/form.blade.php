<!-- TEMPLATE APP -->
<x-template-app.app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <x-template-tittle.tittle-header tittle="Catalogo de cursos" caption="Beneficio" />
                    </div>
                </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card custom-card">
                    <div class="card-body">
                        <x-template-tittle.tittle-caption
                            tittle="{{ isset($item->id_beneficio) ? 'Modificar' : 'Agregar ' }} Curso Beneficio"
                            route="{{ route('courses.list') }}" />
                        
                        <br>
                       <!--<x-template-tittle.tittle-caption-secon tittle="Información Catalogo Beneficio" />-->

                        <form method="POST" action="{{ route('courses.create') }}">
                            @csrf
                            <div class="row">

                                <x-template-form.template-form-input-required label="Descripcion" type="text"
                                    name="descripcion" placeholder="Descripcion"
                                    grid="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8" autocomplete=""
                                    value="{{ optional($item)->descripcion ?? '' }}" />

                                    <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <label for="estatus">Estatus</label>
                                        <input type="checkbox" id="estatus" name="estatus" class="toggle-switch" {{ optional($item)->estatus ? 'checked' : '' }}>
                                    </div>
                                    
                                    <style>
                                    .toggle-switch {
                                        appearance: none;
                                        width: 40px;
                                        height: 20px;
                                        background-color: grey;
                                        border-radius: 10px;
                                        position: relative;
                                        cursor: pointer;
                                        outline: none;
                                        transition: background-color 0.3s;
                                    }
                                    
                                    .toggle-switch:checked {
                                        background-color: green;
                                    }
                                    
                                    .toggle-switch::before {
                                        content: '';
                                        position: absolute;
                                        width: 18px;
                                        height: 18px;
                                        background-color: white;
                                        border-radius: 50%;
                                        top: 1px;
                                        left: 1px;
                                        transition: transform 0.3s;
                                    }
                                    
                                    .toggle-switch:checked::before {
                                        transform: translateX(20px);
                                    }
                                    </style>
                            </div>

                            <x-template-button.button-form-footer routeBack="{{ route('courses.list') }}" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template-app.app-layout>
