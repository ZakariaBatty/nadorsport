<?php
if (isset($_POST['submit'])) :
    $terrain = new TerrainController();
    $terrain->addTerrain();
endif;
if (isset($_POST['Modifier'])) :
    $updateTerrain = new TerrainController();
    $updateTerrain->updateTerrain();
endif;
$data = new TerrainController();
$terrains = $data->getAllTerrain();
$sport = new SportController();
$sports = $sport->getAllSports();
?>


<?php
include('./views/include/sidbar.php');
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ajouter /</span> Modifier Terrain</h4>
        <div class="row">
            <!-- Merged -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Ajouter</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <?php include('./views/include/alerts.php'); ?>
                        <form id="formAuthentication" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Project Screenshot/Image (Minimum 600px X 600px, Maxsize 2mb)</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="form-control" placeholder="Nom terrain" />
                                    </div>
                                </div>
                            </div>
                            <div class="input-group input-group-merge mt-2">
                                <input type="text" name="terrain" class="form-control" placeholder="Nom terrain" />
                            </div>
                            <div class="input-group input-group-merge mt-2">
                                <input type="text" name="localisation" class="form-control" placeholder="Localisation" />
                            </div>

                            <div class="input-group input-group-merge mt-2">
                                <input type="number" name="prix" class="form-control" placeholder="Prix par heur" />
                            </div>
                            <div class="mb-3">
                                <label for="defaultSelect" class="form-label">Choise sport</label>
                                <select id="defaultSelect" class="form-select" name="sport_id">
                                    <option>Choise sport</option>
                                    <?php foreach ($sports as $sport) : ?>
                                        <option value="<?php echo $sport['sport_id']; ?>"><?php echo $sport['name_sport']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mt-4">
                                <button name="submit" class="btn btn-primary d-grid w-100" type="submit">Ajouter terrain</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <!-- Hoverable Table rows -->
                <div class="card">
                    <h5 class="card-header">Modifier</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nom de terrain</th>
                                    <th>Localisation</th>
                                    <th>sport</th>
                                    <th>prix</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <!-- check if was product -->
                                <?php if (count($terrains) > 0) : ?>
                                    <!-- loop for products -->
                                    <?php foreach ($terrains as $terrain) : ?>
                                        <!-- show table terrains -->
                                        <tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?php echo $terrain['terrain_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modifier terrain</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="formAuthentication" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="terrain_id" value="<?= $terrain['terrain_id']; ?>">
                                                                <input type="hidden" name="image-terrain" value="<?= $terrain['image']; ?>">

                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <img src="./assets/img/portfolio/<?= $terrain['image']; ?>" class="oo img-thumbnail">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label>Project Screenshot/Image (Minimum 600px X 600px, Maxsize 2mb)</label>
                                                                        <div class="custom-file">
                                                                            <input type="file" name="image" class="form-control" value="<?= $terrain['image'] ?>" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group input-group-merge mt-2">
                                                                    <input type="text" name="terrain" class="form-control" value="<?= $terrain['terrain']; ?>" />
                                                                </div>
                                                                <div class="input-group input-group-merge mt-2">
                                                                    <input type="text" name="localisation" class="form-control" value="<?= $terrain['localisation']; ?>" />
                                                                </div>

                                                                <div class="input-group input-group-merge mt-2">
                                                                    <input type="number" name="prix" class="form-control" value="<?= $terrain['prix']; ?>" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="defaultSelect" class="form-label">Choise sport</label>
                                                                    <select id="defaultSelect" class="form-select" name="sport_id">
                                                                        <?php foreach ($sports as $sport) : ?>
                                                                            <option value="<?php echo $sport['sport_id']; ?>"><?php echo $sport['name_sport']; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="mt-4">
                                                                    <button name="Modifier" class="btn btn-primary d-grid w-100" type="submit">Modifier</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <td>
                                                <img src="./assets/img/portfolio/<?php echo $terrain['image']; ?>" alt="image terrain" class="w-px-40 h-auto rounded" />
                                            </td>
                                            <td><?php echo $terrain['terrain']; ?></td>
                                            <td><?php echo $terrain['localisation']; ?></td>
                                            <td><?php echo $terrain['name_sport']; ?></td>
                                            <td><span class="badge bg-label-success me-1"><?php echo $terrain['prix']; ?> dh</span>/h</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $terrain['terrain_id']; ?>">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </button>
                                                        <form method="post" class="mr-1" action="delete">
                                                            <input type="hidden" name="id_terrain" value="<?php echo $terrain['terrain_id']; ?>">
                                                            <button class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end foreach -->
                                    <?php endforeach; ?>
                                    <!-- else -->
                                <?php else : ?>
                                    <tr>
                                        <td>
                                            <div class="alert alert-info">aucun terrain trouvé</div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/ Hoverable Table rows -->
            </div>
        </div>
    </div>
</div>