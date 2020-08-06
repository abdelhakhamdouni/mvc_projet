<?php
namespace App;
session_start();
use App\Autoloader;
use App\Router;

// suprimer les deux ligne en bas en mode prod pour eviter d'afficher les erreurs aux visiteur
error_reporting(E_ALL);
ini_set("display_errors", 1);


require 'App/Autoloader.php';
Autoloader::register();
Router::routing($_SERVER['REDIRECT_URL'],$_SERVER['QUERY_STRING']);
