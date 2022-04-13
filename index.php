<?php
require_once './autoload.php';
require_once './controllers/HomeController.php';
$home = new HomeController();
$admin = new CpanelController();

$pages = [
    'logout', 'login-admin', 'home', 'about', 'contact', 'terrien', 'all-terrien-foot',
    'login', 'register', 'c-panel', 'account', 'ajouter-terrain', 'clients', 'reservation',
    'dashbord', 'change-password', 'ajouter-admin', 'reservation-terrain', 'delete', 'all-terrien-basket'
];

if (isset($_GET['page'])) :
    // check if page in array $pages
    if (in_array($_GET['page'], $pages)) :
        $page = $_GET['page'];
        // get page is click
        if (
            $page === 'c-panel' || $page === 'ajouter-admin' || $page === 'reservation' || $page === 'clients' ||
            $page === 'change-password' || $page === "ajouter-terrain" || $page === "account" || $page === 'delete'
        ) :
            require_once './views/include/headdash.php';

            // check if admin connected
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) :
                $admin->index($page);
            else :
                $home->index('login-admin');
            endif;
            require_once './views/include/footerdash.php';
        else :
            $home->index($page);
        endif;
    else :
        include('views/includes/404.php');
    endif;
else :
    $home->index("home");
endif;
