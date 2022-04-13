<?php
// function for gel reservation
$data = new ReservationController();
$reservations = $data->getAllReservation();
// function for gel client
$data = new ClientController();
$clients = $data->getLimitClients();
?>
<!-- Content wrapper -->
<?php
require_once './views/include/sidbar.php';
?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- client -->
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">10 derniers clients</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                        </div>
                        <?php if (count($clients) > 0) : ?>
                            <?php foreach ($clients as $client) : ?>
                                <ul class="p-0 m-0">
                                    <li class="d-flex mb-4 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                            <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-mobile-alt"></i></span>
                                        </div>
                                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <h6 class="mb-0"><?= $client['firstName'] ?> <?= $client['lastName'] ?></h6>
                                                <small class="text-muted"><?= $client['email'] ?></small>
                                            </div>
                                            <div class="user-progress">
                                                <small class="fw-semibold"><?= $client['phone'] ?></small>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <ul class="p-0 m-0">
                                <li class="d-flex mb-4 pb-1">
                                    <div class="alert alert-info">aucun clients trouvé</div>
                                </li>
                            </ul>
                        <?php endif; ?>
                        <div class="user-progress d-flex align-items-center gap-1">
                            <a href="<?php echo BASE_URL; ?>clients" class="mb-0 link-primary">Voir toutes les clients</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Order Statistics -->
            <!-- reservation -->
            <div class="col-md-6 col-lg-4 order-1 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">10 derniers Réservations</h5>
                    </div>
                    <div class="card-body">
                        <?php if (count($reservations) > 0) : ?>
                            <?php foreach ($reservations as $reservation) : ?>
                                <ul class="p-0 m-0">
                                    <li class="d-flex mb-4 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                            <img src="assets/img/portfolio/<?= $reservation['image']; ?>" alt="terrain img" class="rounded" />
                                        </div>
                                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <small class="text-muted d-block mb-1"><?= $reservation['terrain']; ?> (<?= $reservation['name_sport']; ?>)</small>
                                                <h6 class="mb-0"><?= $reservation['email']; ?></h6>
                                            </div>
                                            <div class="user-progress d-flex align-items-center gap-1">
                                                <h6 class="mb-0"><?= $reservation['prix']; ?></h6>
                                                <span class="text-muted">h</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <ul class="p-0 m-0">
                                <li class="d-flex mb-4 pb-1">
                                    <div class="alert alert-info">aucun réservation trouvé</div>
                                </li>
                            </ul>
                        <?php endif; ?>
                        <div class="user-progress d-flex align-items-center gap-1">
                            <a href="<?php echo BASE_URL; ?>reservation" class="mb-0 link-primary">Voir toutes les réservations</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Transactions -->
            <div class="col-lg-4 col-md-4 order-2">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                            <a class="dropdown-item" href="<?php echo BASE_URL; ?>clients">Voir plus</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Clients</span>
                                <!-- <h3 class="card-title mb-2">$12,628</h3> -->
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +<?= count($clients) ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                            <a class="dropdown-item" href="<?php echo BASE_URL; ?>reservation">Voir plus</a>
                                        </div>
                                    </div>
                                </div>
                                <span>Réservation</span>
                                <!-- <h3 class="card-title text-nowrap mb-1">$4,679</h3> -->
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +<?= count($reservations) ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->