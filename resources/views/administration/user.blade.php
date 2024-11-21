<!-- TEMPLATE APP-->
<x-template-app.app-layout>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Sistema Integral para Recursos Humanos</h3>
                            <h5 class="font-weight-normal mb-0">Usuarios</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card custom-card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title">Usuarios del sistema</h4>
                                <p class="card-description">
                                    ¿Deseas agregar un usuario nuevo? <a href="{{ route('user.create') }}"
                                        class="text-danger" style="margin-left: 10px;">
                                        <i class="fa fa-arrow-up"></i> Agregar Usuario
                                    </a>
                                </p>
                            </div>
                            <div class="input-group" style="max-width: 300px;">
                                <!-- TEMPLATE SEARCH-->
                                <x-template-table.template-search />
                            </div>
                        </div>

                        <!-- TEMPLATE TABLE -->
                        <x-template-table.template-table>
                            <thead>
                                <tr>
                                    <th>
                                        Menú
                                    </th>
                                    <th>
                                        Usuario
                                    </th>
                                    <th>
                                        Correo electrónico
                                    </th>
                                </tr>
                            </thead>
                        </x-template-table.template-table>

                        <!-- TEMPLATE PAGINATOR-->
                        <x-template-table.template-paginator />

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- CODE SCRIPT-->
    <script src="{{ asset('assets/js/app/administration/user/table.js') }}"></script>

</x-template-app.app-layout>