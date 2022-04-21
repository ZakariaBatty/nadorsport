<?php
if (isset($_POST['updated-admin'])) :
    $change = new AdminController();
    $change->updateAdmin();
endif;
if (isset($_POST['accountDesactivation'])) :
    $change = new AdminController();
    $change->desactive();
endif;
if (isset($_POST['upload'])) :
    $upload = new AdminController();
    $upload->uploadPhoto();
endif;
$data = new AdminController();
$admin = $data->getOneAdmin();
?>
<!-- Content -->
<?php
require_once './views/include/sidbar.php';
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Paramètres du compte /</span> Compte</h4>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo BASE_URL; ?>account"><i class="bx bx-user me-1"></i> Compte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>change-password"><i class="bx bx-check-shield me-1"></i> Changer le mot de passe</a>
                </li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Détails du profil</h5>
                <?php include('./views/include/alerts.php'); ?>
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="assets/img/avatars/<?= $admin->photo ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                        <div class="button-wrapper">
                            <form method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $admin->id ?>">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Télécharger une nouvelle photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" name="image" id="upload" class="account-file-input" hidden />
                                </label>
                                <button type="submit" name="upload" class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Confermé</span>
                                </button>
                            </form>
                            <p class="text-muted mb-0">Permis JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <form method="POST">
                        <input type="hidden" name="id" value="<?= $admin->id ?>">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Nom</label>
                                <input class="form-control" type="text" id="firstName" name="firstName" value="<?= $admin->firstName ?>" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Prénom</label>
                                <input class="form-control" type="text" name="lastName" id="lastName" value="<?= $admin->lastName ?>" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="text" id="email" name="email" value="<?= $admin->email ?>" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">Téléphone</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">Mad (+212)</span>
                                    <input type="text" id="phoneNumber" name="phone" class="form-control" value="<?= $admin->phone ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" name="updated-admin" class="btn btn-primary me-2">confirmer</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
            <div class="card">
                <h5 class="card-header">Désactiver le compte</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">Êtes-vous sûr de vouloir supprimer votre compte ?</h6>
                            <p class="mb-0">Une fois que vous avez supprimé votre compte, il n'y a plus de retour en arrière. Soyez certain.</p>
                        </div>
                    </div>
                    <form id="formAccountDeactivation" method="post">
                        <div class="form-check mb-3">
                            <input type="hidden" name="id" value="<?= $admin->id ?>">
                            <input required class="form-check-input" type="checkbox" name="status" value="0" id="accountActivation" />
                            <label class="form-check-label" for="accountActivation">Je confirme la désactivation de mon compte</label>
                        </div>
                        <button type="submit" name="accountDesactivation" class="btn btn-danger deactivate-account">Désactiver le compte</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->