<?php

namespace App\controllers;

use App\utils\DBHandler;


class HomeController
{
	static function index(){
        require 'App/views/homePage.php';
    }
}
