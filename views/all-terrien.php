<?php
require_once './views/include/head.php';
require_once './views/include/navBar.php';
$data = new TerrainController();
$terrains = $data->getAllTerrain();
?>
<section id="hero" style="height: 66vh;">
    <div class="hero-container mx-auto" style="align-items:center; right:0; left:0; top:200px ;width:auto;">
        <h1>Voir tous les terrains de sport </h1>
    </div>
</section>
<main id="main">
    <!-- ======= Terrian Section ======= -->
    <section id="portfolio" class="portfolio bg-light">
        <div class="container">

            <div class="section-title">
                <h3>TERRAIN</h3>
            </div>

            <div class="row portfolio-container">
                <?php foreach ($terrains as $terrain) : ?>
                    <div class="col-lg-4 col-md-6 portfolio-item">
                        <img src="assets/img/portfolio/terrain1 (1).png" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><?php echo $terrain['terrain']; ?></h4>
                            <p><?php echo $terrain['localisation']; ?></p>
                            <form method="post" class="mr-1" action="reservation-terrain">
                                <input type="hidden" name="id" value="<?php echo $terrain['id_terrain']; ?>">
                                <button class=""><i class="bx bx-plus"></i></button>
                            </form>
                            <!-- <a class="portfolio-lightbox preview-link" title="Réservez">
                                <i class="bx bx-plus"></i>
                            </a> -->
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </section>
    <!-- End Terrian Section -->
</main>

<?php
require_once './views/include/footer.php';
?>