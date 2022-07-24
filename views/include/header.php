<?php
if (isset($_POST['check'])) :
    $check = new ReservationController();
    $check->checkReservation();
endif;
$data = new  TerrainController();
$AllTerrains =  $data->getAllTerrain();
$datasport = new  SportController();
$sports = $datasport->getAllSports();
?>
<?php
require_once './views/include/navBar.php';
?>
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <h1>Réserver </h1>
        <h2>votre terrain de sport en quelques clics</h2>
    </div>
    <div class="container choisir-terrain">
        <div class="row" style="justify-content: center;">
            <form method="post" class="form-search">
                <div class="col-md-2 col-select">
                    <select name="sport_id" class="form-select">
                        <option required selected>CHOISIR SPORT</option>
                        <?php foreach ($sports as $sport) : ?>
                            <option value="<?= $sport['sport_id']; ?>"><?= $sport['name_sport']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2 col-select">
                    <select required name="terrain_id" class="form-select">
                        <option selected>CHOISIR TERRAIN</option>
                        <?php foreach ($AllTerrains as $terrain) : ?>
                            <option value="<?= $terrain['terrain_id']; ?>"><?= $terrain['terrain']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2 col-select">
                    <input type="date" name="start_datatime" required="required" placeholder="Date" class="form-select">
                </div>
                <input type="hidden" name="end_datatime" value="">
                <div class="col-md-2 col-select">
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
                <div class="col-md-2 col-select">
                    <select required name="hour_fin" class="form-select">
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
                        <option value="14:00">14:00</option>
                        <option value="15:00" selected="selected">15:00</option>
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
                <div class="col-md-2 col-select">
                    <button id="button" type="submit" name="check" class="btn btn-primary btn-lg btn-block btn">Réservez
                    </button>
                </div>
            </form>
        </div>
    </div>

</section>
<!-- End Hero -->

<!-- END Réservation -->
<div id="choisir">

</div>
<!-- ======= TERRAIN section ======= -->