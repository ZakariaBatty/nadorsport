<?php
require_once './views/include/head.php';
require_once './autoload.php';
require_once './controllers/HomeController.php';

$home = new HomeController();
$pages = ['home', 'about', 'contact', 'terrien'];

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

require_once './views/include/footer.php';
