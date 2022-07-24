<?php
$data = new ClientController();
$clients = $data->getAllClients();
if (isset($_POST['accountDesactivation'])) :
    $status = new AdminController();
    $status->desactiveClient();
endif;
?>

<?php
require_once './views/include/sidbar.php';
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Clients /</span> les information clients</h4>
        <!-- Hoverable Table rows -->
        <div class="card">
            <h5 class="card-header">Informations clients</h5>
            <?php include('./views/include/alerts.php'); ?>
            <div class="table-responsive text-nowrap">
                <table id="dataClients" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($clients as $client) : ?>
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $client['email']; ?></strong></td>
                                <td><?= $client['firstName']; ?></td>
                                <td><?= $client['lastName']; ?></td>
                                <td><?= $client['phone']; ?></td>
                                <td><?= $client['status'] ?
                                        '<span class="badge bg-label-success me-1">Active</span>' :
                                        '<span class="badge bg-label-danger me-1">Désactive</span>'
                                    ?>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form method="post" class="mr-1">
                                                <input type="hidden" name="status" value="1">
                                                <input type="hidden" name="id" value="<?php echo $client['user_id']; ?>">
                                                <button type="submit" name="accountDesactivation" class="dropdown-item"><span class="badge bg-label-success me-1">Active</span></button>
                                            </form>
                                            <form method="post" class="mr-1">
                                                <input type="hidden" name="status" value="0">
                                                <input type="hidden" name="id" value="<?php echo $client['user_id']; ?>">
                                                <button type="submit" name="accountDesactivation" class="dropdown-item"><span class="badge bg-label-danger me-1">Désactive</span></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
</div>