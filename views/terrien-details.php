<?php
if (isset($_POST['id'])) :
    $data = new TerrainController();
    $terrain = $data->getOneTerrain($_POST['id']);
else :
// Redirect::to('home');
endif;

if (isset($_POST['check'])) :
    $check = new ReservationController();
    $check->checkReservation();
endif;
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
                            <li><strong>Prix</strong>: <?php echo $terrain->prix; ?></li>
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

    <!-- REservation  -->
    <section class="portfolio" id="portfolio">
        <div class="container">
            <div class="section-title">
                <h2>
                    RESERVATION
                </h2>
                <h3>Réservez maintenant et obtenez votre <span>place</span></h3>
            </div>
            <div class="section-title">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-8 order-2 order-md-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="pull-right d-none d-md-block ">
                                    <div class="btn-group pb-1 flatpickr" role="group" aria-label="Calendar">
                                        <a href="#" class="btn btn-outline-secondary"><span class="fa-solid fa-arrow-left"></span></a>
                                        <a href="#" class="btn btn-outline-secondary">AUJOURD'HUI</a>
                                        <a href="#" class="btn btn-outline-secondary"><span class="fa-solid fa-arrow-right"></span></a>
                                    </div>
                                </div>

                                <h3 style="margin-top: 0px; margin-bottom: 0px;" class="order-1">
                                    Semaine 11/2022
                                </h3>


                                <div class="pull-right d-block d-md-none">
                                    <div class="btn-group pb-1 flatpickr" role="group" aria-label="Calendar">
                                        <a href="#" class="btn btn-outline-secondary"><span class="fa-solid fa-arrow-left"></span></a>
                                        <a href="#" class="btn btn-outline-secondary">AUJOURD'HUI</a>
                                        <a href="#" class="btn btn-outline-secondary"><span class="fa-solid fa-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>


                            <div class="table-responsive">
                                <table class="table table-bordered calendar">
                                    <thead>
                                        <tr>
                                            <th class="hour day"></th>
                                            <th id="2020-06-08" class="day_column text-truncate day">
                                                Lundi <br>
                                                14/03
                                            </th>
                                            <th id="2020-06-09" class="day_column text-truncate day">
                                                Mardi <br>
                                                16/03
                                            </th>
                                            <th id="2020-06-10" class="day_column text-truncate day">
                                                Mercredi <br>
                                                17/03
                                            </th>
                                            <th id="2020-06-11" class="day_column text-truncate day">
                                                Jeudi <br>
                                                18/03
                                            </th>
                                            <th id="2020-06-12" class="day_column text-truncate day">
                                                Vendredi <br>
                                                19/03
                                            </th>
                                            <th id="2020-06-13" class="day_column text-truncate day">
                                                Samedi <br>
                                                20/03
                                            </th>
                                            <th id="2020-06-14" class="day_column text-truncate day">
                                                Dimanche <br>
                                                21/03
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th id="09-00" scope="row" class="hour">09:00</th>


                                            <td id="2020-06-08-09-00" class="cell day_column">
                                                <a href="#" class="bg-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-09-09-00" class="cell day_column">
                                                <a href="#" class="bg-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-10-09-00" class="cell day_column">
                                                <a href="#" class="bg-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-11-09-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-12-09-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-13-09-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-light">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-14-09-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-light">
                                                    &nbsp;
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th id="10-00" scope="row" class="hour">10:00</th>


                                            <td id="2020-06-08-10-00" class="cell day_column">
                                                <a href="#" class="bg-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-09-10-00" class="cell day_column">
                                                <a href="#" class="bg-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-10-10-00" class="cell day_column">
                                                <a href="#" class="bg-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-11-10-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-12-10-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-13-10-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-14-10-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-danger">
                                                    &nbsp;
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th id="11-00" scope="row" class="hour">11:00</th>


                                            <td id="2020-06-08-11-00" class="cell day_column">
                                                <a href="#" class="bg-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-09-11-00" class="cell day_column">
                                                <a href="#" class="bg-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-10-11-00" class="cell day_column">
                                                <a href="#" class="bg-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-11-11-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-12-11-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-13-11-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-14-11-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-danger">
                                                    &nbsp;
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th id="12-00" scope="row" class="hour">12:00</th>


                                            <td id="2020-06-08-12-00" class="cell day_column">
                                                <a href="#" class="bg-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-09-12-00" class="cell day_column">
                                                <a href="#" class="bg-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-10-12-00" class="cell day_column">
                                                <a href="#" class="bg-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-11-12-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-12-12-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-13-12-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-14-12-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-warning">
                                                    &nbsp;
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th id="13-00" scope="row" class="hour">13:00</th>


                                            <td id="2020-06-08-13-00" class="cell day_column">
                                                <a href="#" class="bg-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-09-13-00" class="cell day_column">
                                                <a href="#" class="bg-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-10-13-00" class="cell day_column">
                                                <a href="#" class="bg-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-11-13-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-12-13-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-13-13-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-14-13-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-warning">
                                                    &nbsp;
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th id="14-00" scope="row" class="hour">14:00</th>


                                            <td id="2020-06-08-14-00" class="cell day_column">
                                                <a href="#" class="bg-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-09-14-00" class="cell day_column">
                                                <a href="#" class="bg-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-10-14-00" class="cell day_column">
                                                <a href="#" class="bg-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-11-14-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-12-14-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-13-14-00" class="cell day_column">
                                                <a href="#" class="bg-striped-success" style="outline: 3px solid black">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-14-14-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-warning">
                                                    &nbsp;
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th id="15-00" scope="row" class="hour">15:00</th>


                                            <td id="2020-06-08-15-00" class="cell day_column">
                                                <a href="#" class="bg-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-09-15-00" class="cell day_column">
                                                <a href="#" class="bg-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-10-15-00" class="cell day_column">
                                                <a href="#" class="bg-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-11-15-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-12-15-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-13-15-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-14-15-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-warning">
                                                    &nbsp;
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th id="16-00" scope="row" class="hour">16:00</th>


                                            <td id="2020-06-08-16-00" class="cell day_column">
                                                <a href="#" class="bg-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-09-16-00" class="cell day_column">
                                                <a href="#" class="bg-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-10-16-00" class="cell day_column">
                                                <a href="#" class="bg-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-11-16-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-12-16-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-13-16-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-14-16-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-danger">
                                                    &nbsp;
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th id="17-00" scope="row" class="hour">17:00</th>


                                            <td id="2020-06-08-17-00" class="cell day_column">
                                                <a href="#" class="bg-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-09-17-00" class="cell day_column">
                                                <a href="#" class="bg-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-10-17-00" class="cell day_column">
                                                <a href="#" class="bg-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-11-17-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-12-17-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-13-17-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-14-17-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-success">
                                                    &nbsp;
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th id="18-00" scope="row" class="hour">18:00</th>


                                            <td id="2020-06-08-18-00" class="cell day_column">
                                                <a href="#" class="bg-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-09-18-00" class="cell day_column">
                                                <a href="#" class="bg-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-10-18-00" class="cell day_column">
                                                <a href="#" class="bg-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-11-18-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-12-18-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-13-18-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-14-18-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-danger">
                                                    &nbsp;
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th id="19-00" scope="row" class="hour">19:00</th>


                                            <td id="2020-06-08-19-00" class="cell day_column">
                                                <a href="#" class="bg-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-09-19-00" class="cell day_column">
                                                <a href="#" class="bg-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-10-19-00" class="cell day_column">
                                                <a href="#" class="bg-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-11-19-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-12-19-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-13-19-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-14-19-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-warning">
                                                    &nbsp;
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th id="20-00" scope="row" class="hour">20:00</th>


                                            <td id="2020-06-08-20-00" class="cell day_column">
                                                <a href="#" class="bg-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-09-20-00" class="cell day_column">
                                                <a href="#" class="bg-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-10-20-00" class="cell day_column">
                                                <a href="#" class="bg-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-11-20-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-warning">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-12-20-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-13-20-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-light">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-14-20-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-light">
                                                    &nbsp;
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th id="21-00" scope="row" class="hour">21:00</th>


                                            <td id="2020-06-08-21-00" class="cell day_column">
                                                <a href="#" class="bg-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-09-21-00" class="cell day_column">
                                                <a href="#" class="bg-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-10-21-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-11-21-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-danger">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-12-21-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-success">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-13-21-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-light">
                                                    &nbsp;
                                                </a>
                                            </td>


                                            <td id="2020-06-14-21-00" class="cell day_column">
                                                <a href="#" class="bg-gradient-light">
                                                    &nbsp;
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-body">
                                <div>
                                    <div class="d-inline-block"><span class="pr-3"><i class="bx bx-solid bx bx-square text-success"></i> Disponible</span>
                                    </div>
                                    <div class="d-inline-block"><span class="pr-3"><i class="bx bx-solid bx bx-square text-warning"></i> Dernière place</span>
                                    </div>
                                    <div class="d-inline-block"><span class="pr-3"><i class="bx bx-solid bx bx-square text-danger"></i> Complet</span>
                                    </div>
                                    <div class="d-inline-block"><span class="pr-3"><i class="bx bx-solid bx bx-square text-light"></i> Heures de fermeture</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-3 order-1 order-md-2">
                        <div class="card">
                            <div class="card-header bg-primary " style="color: white"><b>Réservation en ligne</b></div>
                            <form method="post">
                                <div class="card-body" style="text-align: left;">
                                    <div class="row">
                                        <div class="col">
                                            <label class="required" for="field_rental_booking_time_picker_start">Sport</label>
                                            <select name="terrain_id" class="form-control">
                                                <option selected value="<?= $terrain->sport_id; ?>"><?= $terrain->name_sport; ?></option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="required" for="field_rental_booking_time_picker_start">Terrain</label>
                                            <select name="terrain_id" class="form-control">
                                                <option selected value="<?= $terrain->terrain_id; ?>"><?= $terrain->terrain; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="field_rental_booking_time_picker_date" class="required">Date</label>
                                        <input type="date" name="date_" required="required" class="form-control">
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label class="required" for="field_rental_booking_time_picker_start">De</label>
                                            <select name="hour_start" class="form-control">
                                                <option value="00:00">00:00</option>
                                                <option value="00:30">00:30</option>
                                                <option value="01:00">01:00</option>
                                                <option value="01:30">01:30</option>
                                                <option value="02:00">02:00</option>
                                                <option value="02:30">02:30</option>
                                                <option value="03:00">03:00</option>
                                                <option value="03:30">03:30</option>
                                                <option value="04:00">04:00</option>
                                                <option value="04:30">04:30</option>
                                                <option value="05:00">05:00</option>
                                                <option value="05:30">05:30</option>
                                                <option value="06:00">06:00</option>
                                                <option value="06:30">06:30</option>
                                                <option value="07:00">07:00</option>
                                                <option value="07:30">07:30</option>
                                                <option value="08:00">08:00</option>
                                                <option value="08:30">08:30</option>
                                                <option value="09:00">09:00</option>
                                                <option value="09:30">09:30</option>
                                                <option value="10:00">10:00</option>
                                                <option value="10:30">10:30</option>
                                                <option value="11:00">11:00</option>
                                                <option value="11:30">11:30</option>
                                                <option value="12:00">12:00</option>
                                                <option value="12:30">12:30</option>
                                                <option value="13:00">13:00</option>
                                                <option value="13:30">13:30</option>
                                                <option value="14:00" selected="selected">14:00</option>
                                                <option value="14:30">14:30</option>
                                                <option value="15:00">15:00</option>
                                                <option value="15:30">15:30</option>
                                                <option value="16:00">16:00</option>
                                                <option value="16:30">16:30</option>
                                                <option value="17:00">17:00</option>
                                                <option value="17:30">17:30</option>
                                                <option value="18:00">18:00</option>
                                                <option value="18:30">18:30</option>
                                                <option value="19:00">19:00</option>
                                                <option value="19:30">19:30</option>
                                                <option value="20:00">20:00</option>
                                                <option value="20:30">20:30</option>
                                                <option value="21:00">21:00</option>
                                                <option value="21:30">21:30</option>
                                                <option value="22:00">22:00</option>
                                                <option value="22:30">22:30</option>
                                                <option value="23:00">23:00</option>
                                                <option value="23:30">23:30</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="required" for="field_rental_booking_time_picker_end">Jusque</label>
                                            <select name="hour_fin" class="form-control">
                                                <option value="00:00">00:00</option>
                                                <option value="00:30">00:30</option>
                                                <option value="01:00">01:00</option>
                                                <option value="01:30">01:30</option>
                                                <option value="02:00">02:00</option>
                                                <option value="02:30">02:30</option>
                                                <option value="03:00">03:00</option>
                                                <option value="03:30">03:30</option>
                                                <option value="04:00">04:00</option>
                                                <option value="04:30">04:30</option>
                                                <option value="05:00">05:00</option>
                                                <option value="05:30">05:30</option>
                                                <option value="06:00">06:00</option>
                                                <option value="06:30">06:30</option>
                                                <option value="07:00">07:00</option>
                                                <option value="07:30">07:30</option>
                                                <option value="08:00">08:00</option>
                                                <option value="08:30">08:30</option>
                                                <option value="09:00">09:00</option>
                                                <option value="09:30">09:30</option>
                                                <option value="10:00">10:00</option>
                                                <option value="10:30">10:30</option>
                                                <option value="11:00">11:00</option>
                                                <option value="11:30">11:30</option>
                                                <option value="12:00">12:00</option>
                                                <option value="12:30">12:30</option>
                                                <option value="13:00">13:00</option>
                                                <option value="13:30">13:30</option>
                                                <option value="14:00">14:00</option>
                                                <option value="14:30">14:30</option>
                                                <option value="15:00" selected="selected">15:00</option>
                                                <option value="15:30">15:30</option>
                                                <option value="16:00">16:00</option>
                                                <option value="16:30">16:30</option>
                                                <option value="17:00">17:00</option>
                                                <option value="17:30">17:30</option>
                                                <option value="18:00">18:00</option>
                                                <option value="18:30">18:30</option>
                                                <option value="19:00">19:00</option>
                                                <option value="19:30">19:30</option>
                                                <option value="20:00">20:00</option>
                                                <option value="20:30">20:30</option>
                                                <option value="21:00">21:00</option>
                                                <option value="21:30">21:30</option>
                                                <option value="22:00">22:00</option>
                                                <option value="22:30">22:30</option>
                                                <option value="23:00">23:00</option>
                                                <option value="23:30">23:30</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <hr class="py-0 my-0">
                                <div class="card-body">
                                    <button type="submit" name="check" class="btn btn-primary btn-lg btn-block btn">Réservez maintenant!
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main>

<?php
require_once './views/include/footer.php';
?>