<?php
require_once './autoload.php';
require_once './controllers/HomeController.php';

$home = new HomeController();
$pages = ['logout', 'login-admin', 'home', 'about', 'contact', 'terrien', 'all-terrien', 'login', 'register', 'c-panel', 'account', 'ajouter-terrain', 'clients', 'reservation', 'dashbord', 'change-password', 'ajouter-admin', 'reservation-terrain'];

if (isset($_GET['page'])) :
    if (in_array($_GET['page'], $pages)) :
        $page = $_GET['page'];
        $home->index($page);
    else :
        include('views/include/404.php');
    endif;
else :
    $home->index('home');
endif;
