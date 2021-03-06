<?php
if (isset($_POST['submit'])) :
    $createUser = new UsersController();
    $createUser->register();
endif;
?>

<?php
require_once './views/include/headdash.php';
?>
<main id="main">
    <div class="container">
        <div class="row mb-4" style="margin-top: 6rem;">
            <div class="col-lg-4 col-md-6 mx-auto">
                <div class="authentication-wrapper authentication-basic container-p-y">
                    <div class="authentication-inner">
                        <!-- Register -->
                        <div class="card">
                            <div class="card-body">
                                <!-- Logo -->
                                <div class="app-brand justify-content-center">
                                    <a href="<?php echo BASE_URL; ?>" class="app-brand-link gap-2">
                                        <img style="max-width: 44%;" src="assets/img/LogoNadirSport .png" alt="" class="img-fluid pb-3">
                                    </a>
                                </div>
                                <!-- /Logo -->
                                <h4 class="mb-2">L'aventure commence ici 🚀</h4>
                                <p class="mb-4">Veuillez créer votre compte et commencer l'aventure</p>
                                <?php include('./views/include/alerts.php'); ?>
                                <form id="formAuthentication" class="mb-3" method="POST">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Nom </label>
                                        <input type="text" class="form-control" id="username" name="firstName" placeholder="Entrez votre Nom" autofocus />
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Prénom </label>
                                        <input type="text" class="form-control" id="username" name="lastName" placeholder="Entrez votre Prénom" autofocus />
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Téléphone </label>
                                        <input type="number" class="form-control" id="username" name="phone" placeholder="Entrez votre Téléphone" autofocus />
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Entrer votre Email" autofocus />
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="password">Mot de passe</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" required type="checkbox" id="terms-conditions" name="terms" />
                                            <label class="form-check-label" for="terms-conditions">
                                                Je suis d'accord pour
                                                <a href="javascript:void(0); " class=" text-primary">politique de confidentialité et conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                    <button name="submit" class="btn btn-primary d-grid w-100">S'inscrire</button>
                                </form>

                                <p class="text-center">
                                    <span>Vous avez déjà un compte?</span>
                                    <a href="<?php echo BASE_URL; ?>login">
                                        <span class="text-primary">Connectez-vous à la place</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <!-- /Register -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
require_once './views/include/footerdash.php';
?>