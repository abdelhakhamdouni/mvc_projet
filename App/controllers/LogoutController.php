<?php

    namespace App\controllers;

    class LogoutController{

        static function index(){
            unset($_SESSION[]);
            header('Location: /');

        }


    }
