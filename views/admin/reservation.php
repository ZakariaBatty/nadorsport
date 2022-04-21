<?php
$data = new ReservationController();
$reservations = $data->getAllReservation();
if (isset($_POST['chnageStatus'])) :
    $status = new ReservationController();
    $status->changeStatus();
endif;
if (isset($_POST['delete'])) :
    $delete = new ReservationController();
    $delete->deleteReservation();
endif;
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
            <h5 class="card-header">Vérifie maintenant</h5>
            <?php include('./views/include/alerts.php'); ?>
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
                            <th>Prix</th>
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
                                    <td> <?= $reservation['hour_start']; ?> | <?= $reservation['hour_fin']; ?></td>
                                    <td> <?= $reservation['prix']; ?> dh /1h</td>
                                    <td> <?= $reservation['status_reservation'] === 'confirmé' ?
                                                '<span class="badge bg-label-success me-1">confirmé</span>' :
                                                '<span class="badge bg-label-info me-1">attendre</span>'
                                            ?>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <form method="post" class="mr-1">
                                                    <input type="hidden" name="status" value="confirmé">
                                                    <input type="hidden" name="id" value="<?php echo $reservation['reserv_id']; ?>">
                                                    <button type="submit" name="chnageStatus" class="dropdown-item"><span class="badge bg-label-success me-1">confirmé</span></button>
                                                </form>
                                                <form method="post" class="mr-1">
                                                    <input type="hidden" name="status" value="attendre">
                                                    <input type="hidden" name="id" value="<?php echo $reservation['reserv_id']; ?>">
                                                    <button type="submit" name="chnageStatus" class="dropdown-item"><span class="badge bg-label-info me-1">attendre</span></button>
                                                </form>
                                                <form method="post" class="mr-1">
                                                    <input type="hidden" name="status" value="attendre">
                                                    <input type="hidden" name="reserv_id" value="<?php echo $reservation['reserv_id']; ?>">
                                                    <button type="submit" name="delete" class="dropdown-item"><span class="badge bg-label-danger me-1"><i class="bx bx-trash me-1"></i> Delete</span></button>
                                                </form>
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