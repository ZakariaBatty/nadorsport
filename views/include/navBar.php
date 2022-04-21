<?php
if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) :
    $data = new ClientController();
    $user = $data->getOneClient();
endif;
?>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="<?php echo BASE_URL; ?>"" class=" logo"><img src="assets/img/LogoNadirSport .png" alt="" class="img-fluid"></a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="<?php echo BASE_URL; ?>">Acceuil </a></li>
                <li><a class="nav-link scrollto" href="<?php echo BASE_URL; ?>#booking_calendar">Calendrier </a></li>
                <li><a href="<?php echo BASE_URL; ?>contact">Contact</a></li>
                <li><a href="<?php echo BASE_URL; ?>all-terrien">Terrains</a></li>
                <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) { ?>
                    <li class="dropdown"><a href="#"><span><?= $user->email ?></span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?php echo BASE_URL; ?>dashbord">Mon compte</a></li>
                            <li><a href="<?php echo BASE_URL; ?>logout-user">Se déconnecter</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="dropdown"><a href="#"><span>Inscription</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?php echo BASE_URL; ?>login">Connexion </a></li>
                            <li><a href="<?php echo BASE_URL; ?>register">S'inscrire </a></li>
                        </ul>
                    </li>
                <?php }  ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
<!-- End Header -->