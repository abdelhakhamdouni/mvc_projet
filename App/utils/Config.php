<?php

    namespace App\utils;

    class Config {
        
        public static $mod ='dev'; //mode dev ou prod
        public static  $user = '';// base de donnee user
        public static  $pass = '';// base de donnee password
        public static  $bdd_name= "";// abse de donnee name
        public static  $authorised = ''; // personne authorisée
        public static  $requetes = ['home', 'contact', 'about'];/* les urls autoriser a completer example /home appel HomeController pour afficher la page home, a_propos appel A_proposController ...*/

    }
