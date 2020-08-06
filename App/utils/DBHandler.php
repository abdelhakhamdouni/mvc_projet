<?php
namespace App\utils;

use \PDO;

use App\utils\Config;

class DBHandler{ 
    
    static private function connect(){
    
        $pdo = new PDO('mysql:host=localhost;dbname='. $bdd_name ,$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    static function logMombre($email, $password){
        $pdo = self::connect();
        $stmt = $pdo->prepare('SELECT * FROM mombre WHERE email = :emailrole IN (:a, :b)');
        $stmt->execute(array(
            ':email' => $email,
            ':a' => 'USER',
            ':b' => 'ADMIN'
        ));
        $res = $stmt->fetch();
        return password_verify($password, $res['adherent_mdp'])? $res : false;            
    }
    
    static function insertMombre($_array, $cotisation_array){
        $req = false;
        $pdo = self::connect();
        $pdo->beginTransaction();
        $stmt = $pdo->prepare('INSERT INTO 
                                    mombre (adherent_nom, 
                                                adherent_prenom, 
                                                adherent_adresse,
                                                adherent_ville,
                                                adherent_cp, 
                                                adherent_telephone,
                                                adherent_mdp, 
                                                adherent_email
                                                adherent_role ) 
                                        VALUES (:adherent_nom, 
                                                :adherent_prenom, 
                                                :adherent_adresse,
                                                :adherent_ville,
                                                :adherent_cp, 
                                                :adherent_telephone, 
                                                :adherent_mdp,
                                                :adherent_email )');
        $req = $stmt->execute($_array);
        return $req;
    }
    
    }
}
