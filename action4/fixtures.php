<?php
    require('db.php');

    $mdp = "bonjour";
    $username = "admin2";
    $email = "admin2@admin.com";

    $check = $bdd->prepare("SELECT * FROM users WHERE username = ?");
    $check->execute(array($username));

    if ($check->rowCount() == 0) {
        $pwd = password_hash($mdp, PASSWORD_BCRYPT);
        $insertUser = $bdd->prepare('INSERT INTO users(username, password, email)VALUES(?, ?, ?)');
        //on execute l'insertion
        $insertUser->execute(array($username, $pwd, $email));
        print($username . " created");
    }

?>