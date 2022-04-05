<?php
require_once './views/include/headdash.php';
require_once './views/include/sidbar.php';
?>


<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ajouter /</span> Modified Terrain</h4>
        <div class="row">
            <!-- Merged -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Ajouter</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">

                        <div class="input-group input-group-merge mt-2">
                            <input type="text" class="form-control" placeholder="Nom terrain" />
                        </div>

                        <div class="input-group input-group-merge mt-2">
                            <input type="text" class="form-control" placeholder="localisation" />
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-primary d-grid w-100" type="submit">Se connecter</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Hoverable Table rows -->
                <div class="card">
                    <h5 class="card-header">Modifie</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Terrain</th>
                                    <th>Localition</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> image</td>
                                    <td>Terrain 1</td>
                                    <td>Localition</td>
                                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> image</td>
                                    <td>Terrain 1</td>
                                    <td>Localition</td>
                                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> image</td>
                                    <td>Terrain 1</td>
                                    <td>Localition</td>
                                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/ Hoverable Table rows -->
            </div>
        </div>
    </div>
</div>

<?php
require_once './views/include/footerdash.php';
?>