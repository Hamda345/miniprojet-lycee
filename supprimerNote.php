<?php 
    $id = $_REQUEST['dd'];//affecter la requete dans $id 
    include("bdd.php");//connexion à la bdd
    $conn->exec("DELETE from note WHERE id_etudiant = $id");//effacer la ligne où id= $id 
    header("Location:listeNotes_ens.php");//redirection vers la page listeNotes_ens
?>
