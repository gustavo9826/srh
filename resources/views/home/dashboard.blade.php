<x-template-app.app-layout>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Sistema Integral para Recursos Humanos</h3>
                            <h6 class="font-weight-normal mb-0">¡HOLA {{ Auth::user()->name }}!</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 grid-margin transparent">

                    <div class="row">
                        <!-- item menu users-->
                        @if(session('SESSION_ROLE_USER'))
                            @if(in_array(config('custom_config.ADM_TOTAL'), session('SESSION_ROLE_USER')))
                                <x-template-button-dash class="card card-administration" title="Usuarios del sistema"
                                    field="ADMINISTRACIÓN" href="{{ route('user.list') }}" value="4006"
                                    description="Total de usuarios" />
                            @endif
                        @endif
                        <!-- item menu users-->
                        @if(session('SESSION_ROLE_USER'))
                            @if(in_array(config('custom_config.ADM_TOTAL'), session('SESSION_ROLE_USER')))
                                <x-template-button-dash class="card card-administration" title="Roles del sistema"
                                    field="ADMINISTRACIÓN" href="{{ route('user.list') }}" value="12"
                                    description="Total de roles" />
                            @endif
                        @endif
                    </div>

                    <!-- CORRESPONDENCIA-->
                    <div class="row">
                        <!-- item menu administracion-->
                        @if(session('SESSION_ROLE_USER'))
                            @if(in_array(config('custom_config.ADM_TOTAL'), session('SESSION_ROLE_USER')))
                                <x-template-button-dash class="card card-correspondencia" title="Administración de correspondencia"
                                    field="CORRESPONDENCIA" href="" value="0" description="Administración" />
                            @endif
                        @endif

                        <!-- item menu administracion-->
                        @if(session('SESSION_ROLE_USER'))
                            @if(in_array(config('custom_config.ADM_TOTAL'), session('SESSION_ROLE_USER')))
                                <x-template-button-dash class="card card-correspondencia" title="correspondencia"
                                    field="CORRESPONDENCIA" href="" value="0" description="Correspondencia" />
                            @endif
                        @endif

                        <!-- item menu administracion-->
                        @if(session('SESSION_ROLE_USER'))
                            @if(in_array(config('custom_config.ADM_TOTAL'), session('SESSION_ROLE_USER')))
                                <x-template-button-dash class="card card-correspondencia" title="Expedientes"
                                    field="CORRESPONDENCIA" href="" value="0" description="Expedientes" />
                            @endif
                        @endif

                        <!-- item menu administracion-->
                        @if(session('SESSION_ROLE_USER'))
                            @if(in_array(config('custom_config.ADM_TOTAL'), session('SESSION_ROLE_USER')))
                                <x-template-button-dash class="card card-correspondencia" title="Circulares"
                                    field="CORRESPONDENCIA" href="" value="0" description="Circulares" />
                            @endif
                        @endif

                    </div>

                    <!-- CORRESPONDENCIA-->
                    <div class="row">
                        <!-- item menu Interno-->
                        @if(session('SESSION_ROLE_USER'))
                            @if(in_array(config('custom_config.ADM_TOTAL'), session('SESSION_ROLE_USER')))
                                <x-template-button-dash class="card card-correspondencia" title="Interno"
                                    field="CORRESPONDENCIA" href="" value="0" description="Interno" />
                            @endif
                        @endif

                        <!-- item menu oficios-->
                        @if(session('SESSION_ROLE_USER'))
                            @if(in_array(config('custom_config.ADM_TOTAL'), session('SESSION_ROLE_USER')))
                                <x-template-button-dash class="card card-correspondencia" title="Oficios"
                                    field="CORRESPONDENCIA" href="" value="0" description="Oficios" />
                            @endif
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-template-app.app-layout>