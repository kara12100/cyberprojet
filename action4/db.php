<?php
    
    try {
        //$bdd sera la variable qui se connectera à la base de données
        $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;', 'root', '');
    } catch (Exception $e) {
        //die equivaut à exit et on envoie l'erreur
        die('error : '.$e->getMessage());
    }
?>