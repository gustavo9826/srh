<x-app-layout>

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

                        <!--
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title">Usuarios del sistema</h4>
                                <p class="card-description">
                                    Agregar usuario <code>.agregar aqui</code>
                                </p>
                            </div>
                            <div class="input-group" style="max-width: 300px;">

                                <div class="input-group-prepend">
                                    <span style="background:#10312B" class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Buscar" id="search-user">
                            </div>
                        </div>

                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            First name
                                        </th>
                                        <th>
                                            Progress
                                        </th>
                                        <th>
                                            Amount
                                        </th>
                                        <th>
                                            Deadline
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            Herman Beck
                                        </td>
                                        <td>
                                            value
                                        </td>
                                        <td>
                                            $ 77.99
                                        </td>
                                        <td>
                                            May 15, 2015
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <br>
                        <div class="container d-flex justify-content-center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button style="background-color: transparent; width: 25px; padding: 5px;" type="button"
                                    class="btn btn-primary">
                                    <i class="ti-control-skip-backward" style="font-size: 10px; color:#777777"></i>
                                </button>
                                <button type="button" style="background-color: transparent; width: 25; padding: 5px;"
                                    class="btn btn-primary">
                                    <i class="ti-arrow-left" style="font-size: 10px; color:#777777"></i>
                                </button>

                                <label for="" class="circle-label-none">0</label>
                                <label for="" class="circle-label">1</label>
                                <label for="" class="circle-label-none">2</label>

                                <button type="button" style="background-color: transparent; width: 25px; padding: 5px;"
                                    class="btn btn-primary">
                                    <i class="ti-arrow-right" style="font-size: 10px; color:#777777"></i>
                                </button>
                                <button type="button" style="background-color: transparent; width: 25px; padding: 5px;"
                                    class="btn btn-primary">
                                    <i class="ti-control-skip-forward" style="font-size: 10px; color:#777777"></i>
                                </button>
                            </div>
                        </div>
-->




                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Age</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will be populated here by AJAX -->
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="assets/js/app/administration/table.js"></script>

</x-app-layout>