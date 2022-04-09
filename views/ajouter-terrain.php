<?php
if (isset($_POST['submit'])) :
    $terrain = new TerrainController();
    $terrain->addTerrain();
endif;
$data = new TerrainController();
$terrains = $data->getAllTerrain();
?>
<?php
require_once './views/include/headdash.php';
require_once './views/include/sidbar.php';
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
                        <form id="formAuthentication" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <?php include('./views/include/alerts.php'); ?>
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
                            <div class="mt-4">
                                <button name="submit" class="btn btn-primary d-grid w-100" type="submit">Ajouter terrain</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Hoverable Table rows -->
                <div class="card">
                    <h5 class="card-header">Modifier</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Terrain</th>
                                    <th>Localisation</th>
                                    <th>prix</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php foreach ($terrains as $terrain) : ?>
                                    <tr>
                                        <td>
                                            <img src="./assets/img/portfolio/<?php echo $terrain['image']; ?>" alt="image terrain" class="w-px-40 h-auto rounded" />
                                        </td>
                                        <td><?php echo $terrain['terrain']; ?></td>
                                        <td><?php echo $terrain['localisation']; ?></td>
                                        <td><span class="badge bg-label-primary me-1"><?php echo $terrain['prix']; ?></span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <form method="post" class="mr-1" action="update">
                                                        <input type="hidden" name="id" value="<?php echo $terrain['id_terrain']; ?>">
                                                        <button class="dropdown-item"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                                                    </form>
                                                    <form method="post" class="mr-1" action="delete">
                                                        <input type="hidden" name="id" value="<?php echo $terrain['id_terrain']; ?>">
                                                        <button class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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