<?php
$data = new ReservationController();
$reservations = $data->getOneReservation();
?>
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs pt-5">
    <div class="container">
        <ol>
            <li><a href="<?php echo BASE_URL; ?>">Acceuil</a></li>
            <li>toutes les réservations </li>
        </ol>
        <h2>toutes les infos</h2>
    </div>
</section><!-- End Breadcrumbs -->

<main id="main">
    <section class="contact">
        <!-- Content wrapper -->
        <div class="content-wrapper">

            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <!-- Hoverable Table rows -->
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo BASE_URL; ?>my-profile"><i class="bx bx-user me-1"></i> Compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>dashbord"><i class="bx bx-check-shield me-1"></i> toutes les réservations</a>
                    </li>
                </ul>
                <div class="card">
                    <div class="card-body">
                        <?php include('./views/include/alerts.php'); ?>
                        <h5 class="card-title pt-2 pb-2">Réservations</h5>
                        <div class="table-responsive text-nowrap">
                            <table id="myreservation" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Phone</th>
                                        <th>sport</th>
                                        <th>terrain</th>
                                        <th>date et heure de début</th>
                                        <th>date et heure de fin</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php if (count($reservations) > 0) : ?>
                                        <?php foreach ($reservations as $reservation) : ?>
                                            <tr>
                                                <td><?= $reservation['firstName']; ?> <?= $reservation['lastName']; ?></td>
                                                <td> <?= $reservation['phone']; ?></td>
                                                <td> <?= $reservation['terrain']; ?></td>
                                                <td> <?= $reservation['name_sport']; ?></td>
                                                <td> <?= $reservation['start_datatime']; ?></td>
                                                <td> <?= $reservation['end_datatime']; ?></td>
                                                <td><span class="badge bg-success me-1"><?= $reservation['status_reservation']; ?></span></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td>
                                                <div class="alert alert-info">aucun réservation trouvé</div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/ Hoverable Table rows -->
            </div>
        </div>
    </section>
</main>