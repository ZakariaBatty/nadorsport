<?php
if (isset($_POST['submit'])) :
    $change = new ClientController();
    $change->updateClient();
endif;
if (isset($_POST['accountDesactivation'])) :
    $change = new ClientController();
    $change->desactive();
endif;
$data = new ClientController();
$user = $data->getOneClient();
?>
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs pt-4">
    <div class="container">
        <ol>
            <li><a href="<?php echo BASE_URL; ?>">toutes les réservations</a></li>
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
                            <a class="nav-link active" href="<?php echo BASE_URL; ?>dasbord"><i class="bx bx-user me-1"></i> Compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>my-reservation"><i class="bx bx-check-shield me-1"></i> toutes les réservations</a>
                        </li>
                    </ul>
                    <div class="card mb-4">
                        <?php include('./views/include/alerts.php'); ?>
                        <div class="card-body">
                            <H5 class="card-title pt-2 pb-2">Détails du profil</H5>
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
                    <!-- end /Account -->
                    <!-- password -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <H5 class="card-title pt-2 pb-2">Détails du profil</H5>
                            <form id="formAccountSettings" method="POST">
                                <input type="hidden" name="id" value="<?= $_SESSION['admin_info']->id ?>">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="firstName" class="form-label">le mot de passe</label>
                                        <input class="form-control" type="text" name="password" placeholder="*******" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="lastName" class="form-label">nouveau mot de passe</label>
                                        <input class="form-control" type="text" name="newPassword" placeholder="********" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">Confirmez le mot de passe</label>
                                        <input class="form-control" type="text" id="email" name="password" placeholder="******" />
                                    </div>
                                </div>
                                <div class=" mt-2">
                                    <button type="submit" name="chnagePassword" class="btn btn-primary me-2">confirmer</button>
                                </div>
                            </form>
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