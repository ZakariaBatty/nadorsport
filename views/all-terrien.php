<?php
$data = new TerrainController();
$terrains = $data->getAllTerrain();
$datasport = new  SportController();
$sports = $datasport->getAllSports();
?>

<!-- content -->
<?php
require_once './views/include/head.php';
require_once './views/include/navBar.php';
?>
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs pt-5">
    <div class="container">
        <ol>
            <li><a href="<?php echo BASE_URL; ?>">Acceuil</a></li>
            <li>Terrains </li>
        </ol>
    </div>
</section><!-- End Breadcrumbs -->
<main id="main">
    <!-- ======= Terrian Section ======= -->
    <section id="portfolio" class="portfolio bg-white">
        <div class="container">
            <?php require_once './views/include/alerts.php'; ?>
            <div class="section-title">
                <h2>TERRAIN</h2>
                <h3>Choisissez votre sport <span> préféré</span></h3>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <?php foreach ($sports as $sports) : ?>
                            <li data-filter=".<?= $sports['name_sport']; ?>"><?= $sports['name_sport']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container">
                <?php if (count($terrains) > 0) : ?>
                    <?php foreach ($terrains as $terrain) : ?>
                        <div class="col-lg-4 col-md-6 portfolio-item <?= $terrain['name_sport']; ?>">
                            <img src="assets/img/portfolio/<?= $terrain['image']; ?>" class="img-fluid" alt="">
                            <div class="portfolio-info" style="    display: flex; justify-content: space-between;">
                                <div>
                                    <h4><?= $terrain['terrain']; ?> </h4>
                                    <p><?= $terrain['localisation']; ?></p>
                                </div>
                                <form method="post" class="mr-1" action="terrien-details">
                                    <?php $_SESSION['terrain_id'] = $terrain['terrain_id'] ?>
                                    <input type="hidden" name="id" value="<?= $terrain['terrain_id']; ?>">
                                    <button class="btn btn-primary"><i class="bx bx-plus"></i></button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <div class="col-lg-4 col-md-6 portfolio-item">
                            <div class="alert alert-info">aucun terrians trouvé</div>
                        </div>
                    </tr>
                <?php endif; ?>
            </div>

        </div>
    </section>
    <!-- End Terrian Section -->
</main>

<?php
require_once './views/include/footer.php';
?>