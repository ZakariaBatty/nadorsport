<?php
if (isset($_SESSION['terrain_id'])) {
    $data = new TerrainController();
    $terrain = $data->getOneTerrain($_SESSION['terrain_id']);
} else {
    Redirect::to('home');
}

if (isset($_POST['check'])) :
    $check = new ReservationController();
    $check->checkReservation();
endif;
$data = new ReservationController();
$calendar = $data->calendar($terrain->terrain_id);
?>
<!-- content -->
<?php
require_once './views/include/head.php';
require_once './views/include/navBar.php';
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs pt-5">
        <div class="container">
            <ol>
                <li><a href="<?php echo BASE_URL; ?>">Acceuil</a></li>
                <li>Terrain details </li>
            </ol>
        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide">
                                <img src="assets/img/portfolio/<?php echo $terrain->image; ?>" alt="img-terrain">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Project information</h3>
                        <ul>
                            <li><strong>Terrain</strong>: <?php echo $terrain->terrain; ?></li>
                            <li><strong>localisation</strong>: <?php echo $terrain->localisation; ?></li>
                            <li><strong>Prix</strong>: <?php echo $terrain->prix; ?> dh</li>
                            <li><strong>sport</strong>: <a href="#"><?php echo $terrain->name_sport; ?></a></li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>This is an example of portfolio detail</h2>
                        <p>
                            Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->
    <!-- reservation -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container py-5" id="page-container">
            <div class="row">
                <div class="col-md-9">
                    <div id='calendar'></div>
                </div>
                <div class="col-md-3">
                    <div class="cardt rounded-0 shadow">
                        <div class="card-header bg-gradient bg-primary text-light">
                            <h5 class="card-title mx-auto">Réservation en ligne</h5>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <form method="post" id="schedule-form">
                                    <input type="hidden" name="sport_id" value="<?= $terrain->sport_id; ?>">
                                    <input type="hidden" name="terrain_id" value="<?= $terrain->terrain_id; ?>">
                                    <div class="form-group mb-2">
                                        <label for="title" class="control-label">Sport</label>
                                        <input type="text" class="form-control form-control-sm rounded-0" value="<?= $terrain->name_sport; ?>" name="title" id="title" disabled required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="title" class="control-label">Terrain</label>
                                        <input type="text" class="form-control form-control-sm rounded-0" value="<?= $terrain->terrain; ?>" name="title" id="title" disabled required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="start_datetime" class="control-label">le début</label>
                                        <input type="date" class="form-control form-control-sm rounded-0" name="start_datatime" id="start_datatime" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <select required name="hour_start" class="form-select">
                                            <option value="00:00">00:00</option>
                                            <option value="01:00">01:00</option>
                                            <option value="02:00">02:00</option>
                                            <option value="03:00">03:00</option>
                                            <option value="04:00">04:00</option>
                                            <option value="05:00">05:00</option>
                                            <option value="06:00">06:00</option>
                                            <option value="07:00">07:00</option>
                                            <option value="08:00">08:00</option>
                                            <option value="09:00">09:00</option>
                                            <option value="10:00">10:00</option>
                                            <option value="11:00">11:00</option>
                                            <option value="12:00">12:00</option>
                                            <option value="13:00">13:00</option>
                                            <option value="14:00" selected="selected">14:00</option>
                                            <option value="15:00">15:00</option>
                                            <option value="16:00">16:00</option>
                                            <option value="17:00">17:00</option>
                                            <option value="18:00">18:00</option>
                                            <option value="19:00">19:00</option>
                                            <option value="20:00">20:00</option>
                                            <option value="21:00">21:00</option>
                                            <option value="22:00">22:00</option>
                                            <option value="23:00">23:00</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="end_datetime" class="control-label">la fin</label>
                                        <input type="date" class="form-control form-control-sm rounded-0" name="end_datatime" id="end_datatime" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <select required name="hour_end" class="form-select">
                                            <option value="00:00">00:00</option>
                                            <option value="01:00">01:00</option>
                                            <option value="02:00">02:00</option>
                                            <option value="03:00">03:00</option>
                                            <option value="04:00">04:00</option>
                                            <option value="05:00">05:00</option>
                                            <option value="06:00">06:00</option>
                                            <option value="07:00">07:00</option>
                                            <option value="08:00">08:00</option>
                                            <option value="09:00">09:00</option>
                                            <option value="10:00">10:00</option>
                                            <option value="11:00">11:00</option>
                                            <option value="12:00">12:00</option>
                                            <option value="13:00">13:00</option>
                                            <option value="14:00" selected="selected">14:00</option>
                                            <option value="15:00">15:00</option>
                                            <option value="16:00">16:00</option>
                                            <option value="17:00">17:00</option>
                                            <option value="18:00">18:00</option>
                                            <option value="19:00">19:00</option>
                                            <option value="20:00">20:00</option>
                                            <option value="21:00">21:00</option>
                                            <option value="22:00">22:00</option>
                                            <option value="23:00">23:00</option>
                                        </select>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-center">
                                            <button class="btn btn-primary btn-sm rounded-0" name="check" type="submit" form="schedule-form"><i class="fa fa-save"></i> Save</button>
                                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<script>
    var data = <?php echo $calendar ?>;
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
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