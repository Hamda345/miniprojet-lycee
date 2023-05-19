<?php
    $host = "localhost";//addresse de serveur
    $dbname = "lycée";//nom de la bdd
    $username = "root";//utilisateur qui connecte à la base
    $password = "";//mot de passe (vide)

    try { //execution du code s'il n'ya aucune erreur
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);//connexion à la bdd à travers un objet de type PDO
    } catch (PDOException $e) { //execution de ce code s'il ya une erreur
        var_dump($e->getMessage());//affichage détaillé de l'erreur
        die;
    }
?>
