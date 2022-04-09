<?php
require_once './views/include/headdash.php';
require_once './views/include/sidbar.php';
$data = new ClientController();
$clients = $data->getAllClients();
?>


<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Clients /</span> les information clients</h4>
        <!-- Hoverable Table rows -->
        <div class="card">
            <h5 class="card-header">Informations clients</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Client</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($clients as $client) : ?>
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $client['email']; ?></strong></td>
                                <td><?php echo $client['name']; ?></td>
                                <td><?php echo $client['phone']; ?></td>
                                <td><?php echo $client['status'] ?
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
                                            <form method="post" class="mr-1" action="update">
                                                <input type="hidden" name="id" value="<?php echo $client['user_id']; ?>">
                                                <button class="dropdown-item"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                                            </form>
                                            <form method="post" class="mr-1" action="delete">
                                                <input type="hidden" name="id" value="<?php echo $client['user_id']; ?>">
                                                <button class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
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


<?php
require_once './views/include/footerdash.php';
?>