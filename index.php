<?php
require_once './autoload.php';
require_once './controllers/HomeController.php';
$home = new HomeController();
$admin = new CpanelController();
$client = new ClientsController();


$pages = [
    'logout', 'login-admin', 'home', 'about', 'contact', 'terrien-details', 'all-terrien',
    'login', 'register', 'c-panel', 'account', 'ajouter-terrain', 'clients', 'reservation',
    'dashbord', 'change-password', 'ajouter-admin', 'reservation-terrain', 'delete', 'all-terrien-basket', 'checkout', 'my-profile', 'logout-user'
];

if (isset($_GET['page'])) :
    // check if page in array $pages
    if (in_array($_GET['page'], $pages)) :
        $page = $_GET['page'];
        // get page is click
        //@ pages admin
        if (
            $page === 'c-panel' || $page === 'ajouter-admin' || $page === 'reservation' || $page === 'clients' ||
            $page === 'change-password' || $page === "ajouter-terrain" || $page === "account" || $page === 'delete'
        ) {
            require_once './views/include/headdash.php';
            // check if admin connected
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) :
                $admin->index($page);
            else :
                $home->index('login-admin');
            endif;
            require_once './views/include/footerdash.php';
            //@ pages clients
        } else if ($page === 'dashbord' || $page === 'my-profile' || $page === 'checkout') {
            require_once './views/include/head.php';
            require_once './views/include/navBar.php';
            // check if admin connected
            if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) :
                $client->index($page);
            else :
                $home->index('login');
            endif;
            require_once './views/include/footerdash.php';
        } else {
            $home->index($page);
        }
    else :
        include('./views/include/404.php');
    endif;
else :
    $home->index("home");
endif;
