<?php

namespace App;

use App\controllers\LoginController;
use App\controllers\MailController;
use App\controllers\ConnexionController;
use App\utils\DBHandler;
use App\utils\Config;

    class Router{

        static function routing($req, $get = null){
            if($get === null){
                    $req = str_replace('/', '', $req);
                    if(in_array($req, Config::$requetes)){
                        $req = substr_replace($req,strtoupper($req[0]), 0,1);
                        $class = 'App\controllers\\' . $req.'Controller';
                        $class::index();
                    }else{
                        \App\controllers\HomeController::index();
                    }
            }
            else{
                    $req = str_replace('/', '', $req);
                    if(in_array($req, Config::$requetes)){
                        $req = substr_replace($req,strtoupper($req[0]), 0,1);
                        $class = 'App\controllers\\' . $req.'Controller';
                        $class::index($get);
                    }else{
                        \App\controllers\HomeController::index();
                    }
           }
   
        }

    }
