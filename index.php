<?php
require_once './views/include/head.php';
require_once './autoload.php';
require_once './controllers/HomeController.php';

$dashboard = new HomeController();

$pages = ['about', 'home'];
if (isset($_GET['page'])) :
    if (in_array($_GET['page'], $pages)) :
        $page = $_GET['page'];
        $dashboard->index($page);
    else :
        include('views/include/404.php');
    endif;
else :
    $dashboard->index('home');
endif;

require_once './views/include/footer.php';
