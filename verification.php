<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
 
 $db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;', 'root', '')
 or die('could not connect to database');
 
 // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
 // pour éliminer toute attaque de type injection SQL et XSS
 $username = htmlspecialchars($_POST['username']); 
 $password = htmlspecialchars($_POST['password']);
 
 if($username !== "" && $password !== "")
 {
    $checkUserExist = $db->prepare('SELECT * FROM users WHERE username = ?');
    $checkUserExist->execute(array($username));

    if($checkUserExist->rowCount() > 0) // nom d'utilisateur et mot de passe correctes
    {
        $_SESSION['username'] = $username;
        header('Location: principale.php');
    }
    else
    {
        header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
    }
 }
 else
 {
    header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
 }
}
else
{
 header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
?>