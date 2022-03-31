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
                                        <img style="max-width: 30%;" src="assets/img/LogoNadirSport 1.png" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <!-- /Logo -->
                                <h4 class="mb-2">Bienvenue à nador sport 👋</h4>
                                <p class="mb-4">Veuillez vous connecter à votre compte et commencer l'aventure</p>

                                <form id="formAuthentication" class="mb-3" action="index.html" method="POST">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email-username" placeholder="Entrer votre Email" autofocus />
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="password">Mot de passe</label>
                                            <a href="auth-forgot-password-basic.html">
                                                <small class="text-primary">Mot de passe oublié?</small>
                                            </a>
                                        </div>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-me" />
                                            <label class="form-check-label" for="remember-me"> Souviens-toi de moi </label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary d-grid w-100" type="submit">Se connecter</button>
                                    </div>
                                </form>

                                <p class="text-center">
                                    <span>Nouveau sur notre plateforme ?</span>
                                    <a href="<?php echo BASE_URL; ?>register">
                                        <span class="text-primary">Créer un compte</span>
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