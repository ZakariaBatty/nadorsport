<?php
$data = new ReservationController();
$reservations = $data->getAllReservation();
?>
<!-- Content wrapper -->
<?php
require_once './views/include/sidbar.php';
?>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">/</span> Réservation</h4>
        <!-- Hoverable Table rows -->
        <div class="card">
            <h5 class="card-header">Hoverable rows</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Phone</th>
                            <th>terrain</th>
                            <th>sport</th>
                            <th>date</th>
                            <th>heure</th>
                            <th>Status</th>
                            <th>Actions</th>
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
                                    <td> <?= $reservation['date_']; ?></td>
                                    <td> <?= $reservation['hour_start']; ?> | <?= $reservation['hour_start']; ?></td>
                                    <td><span class="badge bg-label-success me-1"><?= $reservation['status_reservation']; ?></span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
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
        <!--/ Hoverable Table rows -->
    </div>
</div>