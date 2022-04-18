<?php
if (isset($_POST['chnagePassword'])) :
    if ($_POST['newPassword'] === $_POST['password']) :
        $change = new AdminController();
        $change->Password();
    // else :
    //     Session::set('info', 'Le mot de passe est incorrect');
    //     Redirect::to('change-password');;
    endif;

endif;
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
                    <a class="nav-link" href="<?php echo BASE_URL; ?>change-password"><i class="bx bx-bell me-1"></i> Changer le mot de passe</a>
                </li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">
                    <?php include('./views/include/alerts.php'); ?>
                </h5>
                <!-- Account -->
                <div class="card-body">
                    <form id="formAccountSettings" method="POST">
                        <input type="hidden" name="id" value="<?= $_SESSION['admin_info']->id ?>">
                        <!-- <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">le mot de passe</label>
                                <input class="form-control" type="text" name="password" placeholder="*******" />
                            </div>
                        </div> -->
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
            <!-- /Account -->
        </div>
    </div>
</div>
</div>
<!-- / Content -->