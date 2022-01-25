<?php
require_once './config/autoload.php';

$home = new HomeController();
$pages = ['home', 'login', 'register','active'];
$page = 'home';
$pagesLogged = ['edit', 'profile', 'logout', 'resetPass',...$pages];
if (isset($_GET['page'])) {
    if (isset($_SESSION['logged']) && $_SESSION['logged']) {
        if (in_array($_GET['page'], $pagesLogged)) {
            $page = $_GET['page'];
        } 
    }else if(!isset($_SESSION['logged'])){
        if (in_array($_GET['page'], $pages)) {
            $page = $_GET['page'];
        } 
    }else{
        $page = "404";
    }
    
}else {
    $page = "home";
}
$title = $page;
include_once './views/includes/nav.php';
$home->index($page);
include_once './views/includes/footer.php';
