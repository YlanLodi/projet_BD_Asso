<?php

require_once '../app/controllers/GlobalController.php';
require_once '../app/controllers/ActiviteController.php';


$path = $_SERVER['PATH_INFO'];
switch($path){
    case NULL:
        new GlobalController()->home();
        break;
    
    case "/activite-liste":
        new ActiviteController()->activiteList();
        break;

    default:
        new GlobalController()->notFound();
}
