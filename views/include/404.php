<?php
require_once './views/include/headdash.php';
?>
<!-- Error -->
<main id="main">
    <div class="container">
        <div class="row" style="margin-top: 6rem; text-align: center">>
            <div class="col-lg-4 col-md-6 mx-auto">
                <div class="misc-wrapper">
                    <h2 class="mb-2 mx-2">Page Not Found :(</h2>
                    <p class="mb-4 mx-2">Oops! 😖 The requested URL was not found on this server.</p>
                    <a href="<?php echo BASE_URL; ?>" class="btn btn-primary">Back to home</a>
                    <div class="mt-3">
                        <img src="./assets/img/page-misc-error-light.png" alt="page-misc-error-light" width="500" class="img-fluid" data-app-dark-img="illustrations/page-misc-error-dark.png" data-app-light-img="illustrations/page-misc-error-light.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- /Error -->

<?php
require_once './views/include/footerdash.php';
?>