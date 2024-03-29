<?php
print_r($_SESSION['reservation']);
if (!isset($_SESSION['reservation'])) {
    Redirect::to('all-terrien');
}
if (isset($_POST['checkout'])) :
    $data = new ReservationController();
    $reservation = $data->addReservation();
endif;
$reserv = new ReservationController();
$checkout = $reserv->reservationChockout();
?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs pt-5">
        <div class="container">
            <ol>
                <li><a href="<?php echo BASE_URL; ?>">Acceuil</a></li>
                <li>Paiements </li>
            </ol>
            <h2>Paiements de page</h2>
        </div>
    </section><!-- End Breadcrumbs -->
    <div class="container mt-5 p-3 rounded cart">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="product-details mr-2">
                    <div class="d-flex flex-row align-items-center"><i class="fa fa-long-arrow-left"></i><span class="ml-2">Continuer les paiements</span></div>
                    <hr>
                    <h6 class="mb-0">Panier</h6>
                    <div class="d-flex justify-content-between"><span>Vous avez deux façons de payer</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                        <div class="d-flex flex-row"><img class="rounded m-2" src="assets/img/portfolio/<?= $checkout->image ?>" width="40">
                            <div class="ml-2"><span class="font-weight-bold d-block"><?= $checkout->name_sport ?> <?= $checkout->terrain ?></span><span class="spec"><?= $_SESSION['reservation']['start_datatime'] ?> || <?= $_SESSION['reservation']['end_datatime'] ?></span></div>
                        </div>
                        <div class="d-flex flex-row align-items-center"><span class="d-block"></span><span class="d-block ml-5 font-weight-bold"><?= $checkout->prix ?>dh/ 1h</span><i class="fa fa-trash-o ml-3 text-black-50"></i></div>
                    </div>
                    <form method="post">
                        <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                        <input type="hidden" name="terrain_id" value="<?= $checkout->terrain_id ?>">
                        <input type="hidden" name="sport_id" value="<?= $checkout->sport_id ?>">
                        <input type="hidden" name="start_datatime" value="<?= $_SESSION['reservation']['start_datatime'] ?>">
                        <input type="hidden" name="end_datatime" value="<?= $_SESSION['reservation']['end_datatime'] ?>">
                        <input type="hidden" name="status_reservation" value="confirmé">
                        <button class="btn btn-primary mx-auto mt-4" name="checkout" type="submit">Paiements</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="payment-info">
                    <div class="d-flex justify-content-between align-items-center"><span>Card details</span><img class="rounded" src="https://i.imgur.com/WU501C8.jpg" width="30"></div><span class="type d-block mt-3 mb-1">Card type</span><label class="radio"> <input type="radio" name="card" value="payment" checked> <span><img width="30" src="https://img.icons8.com/color/48/000000/mastercard.png" /></span> </label>
                    <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/officel/48/000000/visa.png" /></span> </label>
                    <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/ultraviolet/48/000000/amex.png" /></span> </label>
                    <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/officel/48/000000/paypal.png" /></span> </label>
                    <div><label class="credit-card-label">Name on card</label><input type="text" class="form-control credit-inputs" placeholder="Name"></div>
                    <div><label class="credit-card-label">Card number</label><input type="text" class="form-control credit-inputs" placeholder="0000 0000 0000 0000"></div>
                    <div class="row">
                        <div class="col-md-6"><label class="credit-card-label">Date</label><input type="text" class="form-control credit-inputs" placeholder="12/24"></div>
                        <div class="col-md-6"><label class="credit-card-label">CVV</label><input type="text" class="form-control credit-inputs" placeholder="342"></div>
                    </div>
                    <hr class="line">
                    <div class="d-flex justify-content-between information"><span>Subtotal</span><span>$3000.00</span></div>
                    <div class="d-flex justify-content-between information"><span>Shipping</span><span>$20.00</span></div>
                    <div class="d-flex justify-content-between information"><span>Total(Incl. taxes)</span><span>$3020.00</span></div><button class="btn btn-primary btn-block d-flex justify-content-between mt-3" type="button"><span>$3020.00</span><span>Checkout<i class="fa fa-long-arrow-right ml-1"></i></span></button>
                </div>
            </div>
        </div>
    </div>
</main>