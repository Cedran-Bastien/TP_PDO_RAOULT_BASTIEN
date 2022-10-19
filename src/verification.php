<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    // connexion à la base de données
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $bdd = filter_var($_POST['bdd'], FILTER_SANITIZE_STRING);
    $verif = false;
    try {
        $db = new PDO("mysql:host=localhost; dbname=$bdd; charset=utf8", $username, $password);
    } catch (PDOException $e) {
        header('Location: Connexion.php?erreur=1');
    }
    try {
        $q = $db->query("Select * from vehicule");
        $verif = true;
    } catch (PDOException $e) {
        header('Location: Connexion.php?erreur=3');
    }
    if ($verif) {
        $_SESSION['bdd'] = $bdd;
        $_SESSION['user'] = $username;
        $_SESSION['pswd'] = $password;
        header('Location: main.php');
    }
} else {
    header('Location: Connexion.php?erreur=1');
}