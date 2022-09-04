<?php
// check if resirvation is find in table
if (isset($_POST['check'])) :
    $check = new ReservationController();
    $check->checkReservation();
endif;
// call controller terrain
$data = new  TerrainController();
// get function limit terrain
$terrains = $data->getAllTerrainLimit();
// call controller sport
$datasport = new  SportController();
// function recover all sport
$sports = $datasport->getAllSports();
// function recover terrain
$AllTerrains =  $data->getAllTerrain();
// call controller reservation
$reservations = new ReservationController();
// get all reservation
$calendar_home =  $reservations->calendar_home();
// stock the row in varibale for send to js calender
?>
<!-- content -->
<?php
require_once './views/include/head.php';
require_once './views/include/header.php';
?>
<main id="main">

    <!-- ======= Terrian Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title">
                <h2>TERRAIN</h2>
                <h3>Choisissez votre sport <span> préféré</span></h3>
                <a href="<?php echo BASE_URL; ?>all-terrien" style="float: right;font-size: 18px; color: #2793f2;">Voir tous les terrains</a>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <?php foreach ($sports as $sport) : ?>
                            <li data-filter=".<?= $sport['name_sport']; ?>"><?= $sport['name_sport']; ?></li>
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
                                    <h4><?php echo $terrain['terrain']; ?> </h4>
                                    <p><?php echo $terrain['localisation']; ?></p>
                                </div>
                                <form method="post" class="mr-1" action="terrien-details">
                                    <?php $_SESSION['terrain_id'] = $terrain['terrain_id'] ?>
                                    <input type="hidden" name="id" value="<?php echo $terrain['terrain_id']; ?>">
                                    <button class="btn btn-primary"><i class="bx bx-plus"></i></button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <div class="col-lg-4 col-md-6 portfolio-item">
                            <div class="alert alert-info">aucun terrains trouvé</div>
                        </div>
                    </tr>
                <?php endif; ?>
            </div>

        </div>
    </section>
    <!-- End Terrian Section -->

    <!-- REservation  -->
    <!-- <section class="bg-light" id="booking_calendar">
        <div class="container">
            <div class="section-title">
                <h2>
                    RESERVATION
                </h2>
                <h3>Réservez maintenant et obtenez votre <span>place</span></h3>
            </div>
            <div class="section-title">
                <div class="row">
                    <div class="col-md-12">
                        <div id='calendar_home'></div>
                    </div>
                </div>
            </div>
    </section> -->
    <?php include('./views/pricing.php'); ?>
    <section id="services" class="services">
        <div class="container">

            <div class="section-title">
                <h2>SERVICE</h2>
                <h3>Nous offrons des <span>Services</span> impressionnants</h3>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 card-services">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-calendar-check"></i></div>
                        <h4 class="title"><a href="">Réservation en ligne</a></h4>
                        <p class="description">Vos membres réservent 24h/24 7j/7 en ligne en toute autonomie.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 card-services">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-coin"></i></div>
                        <h4 class="title"><a href="">Paiement en ligne</a></h4>
                        <p class="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore dicta</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 card-services">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-calendar-check"></i></div>
                        <h4 class="title"><a href="">Disponibilité en temps réel</a></h4>
                        <p class="description">Les sportifs croisent facilement leur agenda avec les disponibilités du centre pour organiser leurs prochaines sessions. </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section><!-- End TERRAIN Section -->
</main><!-- End #main -->
<script>
    var data = <?php echo $calendar_home ?>;
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar_home');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            nowIndicator: true,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'timeGridWeek,timeGridDay,listWeek'
            },
            navLinks: true,
            selectable: true,
            selectMirror: true,
            dayMaxEvents: true,
            events: data,
        });

        calendar.render();
    });
</script>
<?php
require_once './views/include/footer.php';
?>