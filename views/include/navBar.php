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
                 <li class="dropdown"><a href="#"><span>Terrains de sport</span> <i class="bi bi-chevron-down"></i></a>
                     <ul>
                         <li><a href="<?php echo BASE_URL; ?>all-terrien-foot">Terrains de foot</a></li>
                         <li><a href="<?php echo BASE_URL; ?>all-terrien-basket">Terrains de basket</a></li>
                         <li><a href="<?php echo BASE_URL; ?>">Terrains de basket</a></li>
                     </ul>
                 </li>
                 <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) { ?>
                     <li class="dropdown"><a href="#"><span>zbatty1297@gmail.com</span> <i class="bi bi-chevron-down"></i></a>
                         <ul>
                             <li><a href="<?php echo BASE_URL; ?>dashbord">Mon compte</a></li>
                             <li><a href="<?php echo BASE_URL; ?>logout">Se déconnecter</a></li>
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