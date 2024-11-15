<!-- TEMPLATE APP-->
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

                        <div class="d-flex justify-content-between align-items-center w-100">
                            <!-- Título alineado a la izquierda -->
                            <div>
                                <h2 class="card-title" style="margin-bottom: 0;">Agregar / Modificar Usuarios
                                </h2>
                            </div>

                            <!-- Botón de ancla a la derecha -->
                            <div>
                                <a href="{{ route('user.list') }} class="btn"
                                    style="font-size: 1.3rem; padding: 10px; background-color: #10312B; color: white; border-radius: 50%; border: none; display: inline-flex; justify-content: center; align-items: center;"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Regresar">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                            </div>
                        </div>





                        <div>
                            <form class="form-sample">
                                <p class="card-description" style="font-size: 1rem; font-weight: bold; color: #000;">
                                    Datos del usuario
                                </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"
                                                style="font-size: 1rem; color: #333;">Nombre</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" style="font-size: 1rem;" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"
                                                style="font-size: 1rem; color: #333;">Correo</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" style="font-size: 1rem;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"
                                                style="font-size: 1rem; color: #333;">Gender</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" style="font-size: 1rem;">
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"
                                                style="font-size: 1rem; color: #333;">Date of Birth</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" placeholder="dd/mm/yyyy"
                                                    style="font-size: 1rem;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"
                                                style="font-size: 1rem; color: #333;">Category</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" style="font-size: 1rem;">
                                                    <option>Category1</option>
                                                    <option>Category2</option>
                                                    <option>Category3</option>
                                                    <option>Category4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"
                                                style="font-size: 1rem; color: #333;">Membership</label>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            name="membershipRadios" id="membershipRadios1" value=""
                                                            checked>
                                                        Free
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            name="membershipRadios" id="membershipRadios2"
                                                            value="option2">
                                                        Professional
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="card-description" style="font-size: 1rem; font-weight: bold; color: #000;">
                                    Address
                                </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"
                                                style="font-size: 1rem; color: #333;">Address 1</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" style="font-size: 1rem;" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"
                                                style="font-size: 1rem; color: #333;">State</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" style="font-size: 1rem;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"
                                                style="font-size: 1rem; color: #333;">Address 2</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" style="font-size: 1rem;" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"
                                                style="font-size: 1rem; color: #333;">Postcode</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" style="font-size: 1rem;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"
                                                style="font-size: 1rem; color: #333;">City</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" style="font-size: 1rem;" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"
                                                style="font-size: 1rem; color: #333;">Country</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" style="font-size: 1rem;">
                                                    <option>America</option>
                                                    <option>Italy</option>
                                                    <option>Russia</option>
                                                    <option>Britain</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Botones de acción -->
                                <div class="form-group mt-4">
                                    <div class="d-flex justify-content-end">
                                        <!-- Botón Cancelar -->
                                        <button type="button" class="btn btn-secondary"
                                            style="font-size: 1rem; padding: 10px 20px; margin-left: 10px; background-color: 	#6c757d; color: white; border: none;">
                                            <i class="fas fa-times"></i> Cancelar
                                        </button>

                                        <!-- Botón Guardar con color personalizado -->
                                        <button type="submit" class="btn"
                                            style="font-size: 1rem; padding: 10px 20px; margin-left: 10px; background-color: #10312B; color: white; border: none;">
                                            <i class="fas fa-save"></i> Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>