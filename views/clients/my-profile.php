<?php
if (isset($_POST['submit'])) :
    $change = new ClientController();
    $change->updateClient();
endif;
if (isset($_POST['accountDesactivation'])) :
    $change = new ClientController();
    $change->desactive();
endif;
if (isset($_POST['upload'])) :
    $upload = new ClientController();
    $upload->uploadPhoto();
endif;
if (isset($_POST['changePassword'])) :
    if ($_POST['newPassword'] === $_POST['password']) :
        $change = new ClientController();
        $change->PasswordClient();
    else :
        Session::set('info', 'Le mot de passe est incorrect');
        Redirect::to('my-profile');
    endif;
endif;
$data = new ClientController();
$user = $data->getOneClient();
?>

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs pt-5">
    <div class="container">
        <ol>
            <li><a href="<?php echo BASE_URL; ?>">Acceuil</a></li>
            <li>profile </li>
        </ol>
        <h2>toutes les infos</h2>
    </div>
</section><!-- End Breadcrumbs -->
<main id="main">
    <section class="contact">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo BASE_URL; ?>my-profile"><i class="bx bx-user me-1"></i> Compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>dashbord"><i class="bx bx-check-shield me-1"></i> toutes les réservations</a>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <?php include('./views/include/alerts.php'); ?>
                                <div class="card-body">
                                    <H5 class="card-title pt-2 pb-2">Détails du profil</H5>
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <img src="assets/img/avatars/<?= $user->photo ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                            <div class="button-wrapper">
                                                <form method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?= $user->user_id ?>">
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
                                            <input type="hidden" name="id" value="<?= $user->user_id ?>">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="firstName" class="form-label">Nom</label>
                                                    <input class="form-control" type="text" id="firstName" name="firstName" value="<?= $user->firstName ?>" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">Prénom</label>
                                                    <input class="form-control" type="text" name="lastName" id="lastName" value="<?= $user->lastName ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">E-mail</label>
                                                    <input class="form-control" type="text" id="email" name="email" value="<?= $user->email ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="phoneNumber">Téléphone</label>
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text">Mad (+212)</span>
                                                        <input type="text" id="phoneNumber" name="phone" class="form-control" value="<?= $user->phone ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" name="submit" class="btn btn-primary me-2">confirmer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end /Account -->
                        <!-- password -->
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <H5 class="card-title pt-2 pb-2">Change mot passe</H5>
                                    <form method="POST">
                                        <input type="hidden" name="user_id" value="<?= $user->user_id ?>">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="newPassword" class="form-label">nouveau mot de passe</label>
                                                <input class="form-control" type="password" name="newPassword" placeholder="********" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="password" class="form-label">Confirmez le mot de passe</label>
                                                <input class="form-control" type="password" id="email" name="password" placeholder="******" />
                                            </div>
                                        </div>
                                        <div class=" mt-2">
                                            <button type="submit" name="changePassword" class="btn btn-primary me-2">confirmer</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <H5 class="card-title pt-2 pb-2">Détails du profil</H5>
                            <div class="mb-3 col-12 mb-0">
                                <div class="alert alert-warning">
                                    <h6 class="alert-heading fw-bold mb-1">Êtes-vous sûr de vouloir supprimer votre compte ?</h6>
                                    <p class="mb-0">Une fois que vous avez supprimé votre compte, il n'y a plus de retour en arrière. Soyez certain.</p>
                                </div>
                            </div>
                            <form id="formAccountDeactivation" method="post">
                                <div class="form-check mb-3">
                                    <input type="hidden" name="id" value="<?= $user->user_id ?>" />
                                    <input required class="form-check-input" type="checkbox" name="status" value="0" id="accountActivation" />
                                    <label class="form-check-label" for="accountActivation">Je confirme la désactivation de mon compte</label>
                                </div>
                                <button type="submit" name="accountDesactivation" class="btn btn-danger deactivate-account">Désactiver le compte</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
    </section>
</main>