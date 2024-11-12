<x-app-layout>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Sistema Integral para Recursos Humanos</h3>
                            <h6 class="font-weight-normal mb-0">version</h6>


                            <h2>Roles del Usuario</h2>
                            @if(session('SESSION_ROLE_USER'))
                                <ul>
                                    @foreach(session('SESSION_ROLE_USER') as $role)
                                        <li>{{ $role }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p>No se encontraron roles para este usuario.</p>
                            @endif

                            <h4>value</h4>
                            <h6>{{ config('custom_config.ADM_TOTAL') }}</h6>

                           


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>